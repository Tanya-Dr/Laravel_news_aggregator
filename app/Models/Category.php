<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'title',
        'description'
    ];

//    перечисляются поля, которые запрещаются
//    protected $guarded = [
//        'id'
//    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }

    public function source(): HasMany
    {
        return $this->hasMany(Source::class, 'category_id', 'id');
    }
}
