<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\Support\ImageFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
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

            $this
            ->addMediaConversion('thumb')
            ->width(300);

            $this
            ->addMediaConversion('mobile')
            ->width(320);

            $this
            ->addMediaConversion('desktop')
            ->width(1200);
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

    public function scopeActive($query)
    {
        $query->where('active', '=', 1);
    }

    public function scopePublished($query)
    {

        $query->where('published_at', '<=', Carbon::now())->where('active','=',1);
    }


    public function scopeFeatured($query)
    {

        $query->where('featured', true);
    }

    public function scopeSitemap($query)
    {

        $query->published();
    }

    public function getReadingTime()
    {
        $mins = str_word_count($this->content) / 250;
        return ($mins < 1) ? 1 : $mins;
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->description), 150, '...');
    }

    public function getFullContent(){
        $arrPic = [
            "<img alt='01-{$this->title}' title='01-{$this->title}' class='mt-4 h-auto w-full object-fit drop-shadow-xl rounded-lg' ",
            "<img alt='02-{$this->title}' title='02-{$this->title}' class='mt-4 h-auto w-full object-fit drop-shadow-xl rounded-lg' ",
            "<img alt='03-{$this->title}' title='03-{$this->title}' class='mt-4 h-auto w-full object-fit drop-shadow-xl rounded-lg' ",
        ];
        //return Str::replaceMatches('<img', $this->content,"<img title='piic01'");
        return Str::replaceArray('<img', $arrPic, $this->content);
    }

    public function getThumbnailImage()
    {
        $isUrl = str_contains($this->image, 'http');
        if($isUrl){
            $urlLocation = $this->image;
         } else {
            $urlLocation = $this->getFirstMediaUrl();
        }
        return  $urlLocation;
    }

    public function getImageType(){
        $is_mime = isset($this->getFirstMedia()->mime_type);

        return ($is_mime)? $this->getFirstMedia()->mime_type : "image/jpeg";
    }

    public function getImageInfo(){
        $isUrl = str_contains($this->image, 'http');
        if($isUrl){
            $width = '600';
            $height = '300';
            $mime = "image/jpeg";
         } else {
            $imageInstance = ImageFactory::load($this->getFirstMediaPath());
            $width =  $imageInstance->getWidth();
            $height =  $imageInstance->getHeight();
            if(isset($this->getFirstMedia()->mime_type)){
                $mime = $this->getFirstMedia()->mime_type;
            } else {
                $mime = "image/jpeg";
            }

        }
        $arrobject = (object) [
            "height" => $height,
            "width" => $width,
            "mime_type" => $mime
        ];
        return $arrobject;
    }

    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }
}
