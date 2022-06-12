<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory, Sluggable ;

    protected $table = "news";

    protected $fillable = [
        'title',
        'category_id',
        'author',
        'status',
        'description',
        'image',
        'source_id',
        'slug',
        'link',
        'guid',
        'pub_date'
    ];

    protected $casts = [
        'pub_date' => 'datetime'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
