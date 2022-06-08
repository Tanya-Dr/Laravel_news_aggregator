<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\Contract\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Parser $parser)
    {
//        dd($parser->setLink('https://news.yandex.ru/music.rss')->parse());
        $newsList = $parser->setLink('https://news.yandex.ru/music.rss')->parse();

        foreach ($newsList['news'] as $news) {
            $news['slug'] = \Str::slug($news['title']);
            $news['category_id'] = 10;
            $news['source_id'] = 13;

            $newNews = News::create($news);
            if(!$newNews) {
                throw new \Exception('Problem with adding news to DB');
            }
        }

        return redirect()->route('admin.news.index');
    }
}
