<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;

    protected $table = 'news_categories';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'text_color',
        'bg_color',
        'created_at',
        'updated_at',
    ];
}
