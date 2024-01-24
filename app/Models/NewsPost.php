<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class NewsPost extends Model implements HasMedia
{
    use HasFactory;
    //use SoftDeletes;
    use InteractsWithMedia;
    use HasTags;


    protected $table = 'news_posts';

    protected $fillable = [
        'id',
        'article_id',
        'userid',
        'source',
        'image',
        'title',
        'slug',
        'description',
        'content',
        'published_at',
        'featured',
        'created_at',
        'updated_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }


    protected $casts = [
        'published_at' => 'datetime',

    ];


    public function author(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'userid',
            ownerKey: 'id'
        );
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            NewsCategory::class,
            'news_category_post'
        );
    }

    public function scopePublished($query)
    {

        $query->where('published_at', '<=', Carbon::now());
    }


    public function scopeFeatured($query)
    {

        $query->where('featured', true);
    }

    public function getReadingTime()
    {
        $mins = str_word_count($this->content) / 250;
        return ($mins < 1) ? 1 : $mins;
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->content), 150, '...');
    }

    public function getThumbnailImage()
    {
        $isUrl = str_contains($this->image, 'http');
        return ($isUrl) ? $this->image : $this->getFirstMediaUrl();
    }

    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }
}
