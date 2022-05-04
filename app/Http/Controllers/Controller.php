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
                'title' => $faker->text(10),
                'created_at' => now('Europe/Moscow')
            ];
        }

        for($i = 0; $i < 5; $i++) {
            $categories[] = [
                'id' => $i + 1,
                'title' => $faker->text(10),
                'created_at' => now('Europe/Moscow')
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

        for($i = 0; $i < 9; $i++) {
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

    public function getAllNews(): array
    {
        $news = [];
        $faker = Factory::create();

        for($i = 0; $i < 5*9; $i++) {
            $news[] = [
                'idCategory' => intdiv($i,9)+1,
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
