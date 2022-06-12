<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Source extends Model
{
    use HasFactory;

    protected $table = "sources";

    protected $fillable = [
        'title',
        'url',
        'description',
        'image',
        'last_build_date',
        'category_id'
    ];

    protected $casts = [
        'last_build_date' => 'datetime'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'source_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
