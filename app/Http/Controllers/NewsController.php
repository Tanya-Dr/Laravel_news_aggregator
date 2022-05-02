<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $categories = $this->getCategories();
        return view('news.index',[
            'categoriesList' => $categories
        ]);
    }

    public function showCategory(int $idCategory)
    {
        if($idCategory > 5){
            abort(404);
        }

        $category = $this->getCategories($idCategory);
        $news = $this->getNews($idCategory);
        return view('news.showCategory',[
            'category' => $category,
            'newsList' => $news
        ]);
    }

    public function show(int $idCategory, int $id)
    {
        if($idCategory > 5 || $id > 4){
            abort(404);
        }

        $news = $this->getNews($idCategory,$id);
        return view('news.showNews',[
            'news' => $news,
            'idCategory' => $idCategory
        ]);
    }
}
