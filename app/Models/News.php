<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    public function getNews(int $id)
    {
        return DB::table($this->table)
            ->select([
                'id',
                'category_id',
                'title', 'author',
                'image',
                'status',
                'description',
                'created_at',
                'source_id'
            ])
            ->find($id);
    }

    public function getNewsByCategory(int $categoryId)
    {
        return DB::table($this->table)
            ->select([
                'id',
                'category_id',
                'title', 'author',
                'image',
                'status',
                'description',
                'created_at',
                'source_id'
            ])
            ->where('category_id', '=', $categoryId)
            ->get();
    }

    public function getAllNews()
    {
        return DB::table($this->table)
            ->select([
                'id',
                'category_id',
                'title', 'author',
                'image',
                'status',
                'description',
                'created_at',
                'source_id'
                ])
            ->get();
    }
}
