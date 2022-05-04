<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $categories = $this->getCategories();
        $news = $this->getNews(rand(0,5));
        return view('news.index',[
            'categoriesList' => $categories,
            'newsList' => $news
        ]);
    }

    public function showCategory(int $idCategory)
    {
        if($idCategory > 5){
            abort(404);
        }

        $categories = $this->getCategories();
        $news = $this->getNews($idCategory);
        return view('news.index',[
            'categoriesList' => $categories,
            'newsList' => $news,
            'chooseCategory' => $idCategory
        ]);
    }

    public function show(int $idCategory, int $id)
    {
        if($idCategory > 5 || $id > 9){
            abort(404);
        }

        $category = $this->getCategories($idCategory);
        $news = $this->getNews($idCategory,$id);
        return view('news.showNews',[
            'news' => $news,
            'categoryName' => $category
        ]);
    }
}
