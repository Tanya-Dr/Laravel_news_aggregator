<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCategories(int $idCategory = null): array
    {
        $categories = [];
        $faker = Factory::create();

        if($idCategory){
            return [
              'id' => $idCategory,
              'title' => $faker->text(10)
            ];
        }

        for($i = 0; $i < 5; $i++) {
            $categories[] = [
                'id' => $i + 1,
                'title' => $faker->text(10)
            ];
        }

        return $categories;
    }

    public function getNews(int $idCategory, int $id = null): array
    {
        $news = [];
        $faker = Factory::create();

        if($id) {
            return [
                'idCategory' => $idCategory,
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->name(),
                'image' => $faker->imageUrl(),
                'description' => $faker->text(150),
                'created_at' => now('Europe/Moscow')
            ];
        }

        for($i = 0; $i < 4; $i++) {
            $news[] = [
                'idCategory' => $idCategory,
                'id' => $i + 1,
                'title' => $faker->jobTitle(),
                'author' => $faker->name(),
                'image' => $faker->imageUrl(),
                'description' => $faker->text(150),
                'created_at' => now('Europe/Moscow')
            ];
        }

        return $news;
    }

}
