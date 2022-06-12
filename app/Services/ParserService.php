<?php

namespace App\Services;

use App\Models\News;
use App\Models\Source;
use App\Services\Contract\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    protected string $link;
    protected array $data;

    public function setLink(string $link): Parser
    {
        $this->link = $link;
        return $this;
    }

    public function parse(): void
    {
        $xml = XmlParser::load($this->link);

        $this->data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'lastBuildDate' => [
                'uses' => 'channel.lastBuildDate'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
    }

    public function saveNews(): void
    {
        $source = Source::where('url', $this->link)->first();
        $source = $source->fill([
            'title' => $this->data['title'],
            'description' => $this->data['description'],
            'image' => $this->data['image'],
            'last_build_date' =>$this->data['lastBuildDate']
        ]);
        $source->save();

        foreach($this->data['news'] as $news) {
            $checkNews = News::where('title', $news['title'])->count();
            if($checkNews == 0) {
                $news['pub_date'] = $news['pubDate'];
                $news['category_id'] = $source->category_id;
                $news['source_id'] = $source->id;

                $newNews = News::create($news);

                if(!$newNews) {
                    throw new \Exception('Problem with adding news to DB');
                }
            }
        }

    }
}
