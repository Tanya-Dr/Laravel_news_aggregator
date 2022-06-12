<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Queries\QueryBuilderNews;

class NewsController extends Controller
{
    /**
     * @param QueryBuilderNews $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(QueryBuilderNews $news)
    {
        $categories = Category::all();
        return view('news.index',[
            'categories' => $categories,
            'newsList' => $news->getNews(9)
        ]);
    }

    /**
     * @param QueryBuilderNews $news
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCategory(QueryBuilderNews $news, Category $category)
    {
        $categories = Category::all();
        return view('news.index',[
            'categories' => $categories,
            'newsList' => $news->getNewsByCategory($category),
            'category' => $category
        ]);
    }

    /**
     * @param QueryBuilderNews $news
     * @param Source $source
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showSource(QueryBuilderNews $news, Source $source)
    {
        $categories = Category::all();
        return view('news.index',[
            'categories' => $categories,
            'newsList' => $news->getNewsBySource($source),
            'source' => $source
        ]);
    }

    /**
     * @param string $slug
     * @param QueryBuilderNews $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(string $slug, QueryBuilderNews $news)
    {
        return view('news.showNews', ['news' => $news->getNewsBySlug($slug)->first()]);
    }
}
