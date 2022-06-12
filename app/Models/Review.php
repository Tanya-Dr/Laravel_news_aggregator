<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $table = "reviews";

    protected $fillable = [
        'user_id',
        'text_review'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
