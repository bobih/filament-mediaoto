<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsPost extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;


    protected $table = 'news_posts';

    protected $fillable = [
        'id',
        'userid',
        'image',
        'title',
        'slug',
        'content',
        'published_at',
        'featured',
        'created_at',
        'updated_at',
    ];
}
