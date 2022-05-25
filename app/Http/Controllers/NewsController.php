<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $modelNews = app(News::class);
        $modelCategory = app(Category::class);
        $categories = $modelCategory->getCategories();
        $news = $modelNews->getAllNews();
        return view('news.index',[
            'categories' => $categories,
            'newsList' => $news
        ]);
    }

    public function showCategory(int $idCategory)
    {
        if($idCategory > 5){
            abort(404);
        }

        $modelNews = app(News::class);
        $modelCategory = app(Category::class);
        $categories = $modelCategory->getCategories();
        $news = $modelNews->getNewsByCategory($idCategory);
        return view('news.index',[
            'categories' => $categories,
            'newsList' => $news,
            'chooseCategory' => $idCategory
        ]);
    }

    public function show(int $idCategory, int $id)
    {
        if($idCategory > 5 || $id > 20 || $id < 11){
            abort(404);
        }
        $modelNews = app(News::class);
        $modelCategory = app(Category::class);
        $category = $modelCategory->getCategory($idCategory);
        $news = $modelNews->getNews($id);
        return view('news.showNews',[
            'news' => $news,
            'categoryName' => $category
        ]);
    }
}
