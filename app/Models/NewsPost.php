<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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


    protected $casts = [
        'published_at' => 'datetime',

    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'userid',
            ownerKey: 'id'
        );
    }


    public function scopePublished($query){

        $query->where('published_at','<=', Carbon::now());
    }


    public function scopeFeatured($query){

        $query->where('featured', true);

    }

    public function getReadingTime(){
        $mins = str_word_count($this->content) / 250;
        return ($mins < 1) ? 1 : $mins ;
    }

    public function getExcerpt(){
        return Str::limit(strip_tags($this->content), 150, '...');
    }
}
