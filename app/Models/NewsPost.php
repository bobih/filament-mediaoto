<?php

namespace App\Models;

use PHPHtmlParser\Dom;
use Spatie\Image\Image;
use Spatie\Tags\HasTags;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Spatie\Image\Manipulations;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\File;
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
use Filament\Forms\Components\Concerns\HasFileAttachments;

class NewsPost extends Model implements HasMedia
{
    use HasFactory;
    //use SoftDeletes;
    use InteractsWithMedia;
    use HasTags;
    use HasFileAttachments;


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
            ->width(600);

        $this
            ->addMediaConversion('mobile')
            ->width(320);

        $this
            ->addMediaConversion('desktop')
            ->width(1200);

        $this->addMediaConversion('webp')
            ->watermark(public_path('watermark4.png'))
            ->watermarkOpacity(15)
            ->watermarkPosition(Manipulations::POSITION_TOP_LEFT)      // Watermark at the top
            ->watermarkHeight(40, Manipulations::UNIT_PERCENT)    // 50 percent height
            ->watermarkWidth(40, Manipulations::UNIT_PERCENT)
            ->watermarkPadding(15)
            ->sharpen(10)
            ->format(Manipulations::FORMAT_WEBP)
            ->width(1200);

        $this->addMediaConversion('webpthumb')
            ->watermark(public_path('watermark4.png'))
            ->watermarkOpacity(20)
            ->watermarkPosition(Manipulations::POSITION_TOP_LEFT)      // Watermark at the top
            ->watermarkHeight(40, Manipulations::UNIT_PERCENT)    // 50 percent height
            ->watermarkWidth(40, Manipulations::UNIT_PERCENT)
            ->watermarkPadding(15)
            ->sharpen(10)
                ->format(Manipulations::FORMAT_WEBP)
                ->width(600);
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

        $query->where('published_at', '<=', Carbon::now())->where('active', '=', 1);
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

    public function getExcerptTitle()
    {
        return Str::limit(strip_tags($this->title), 55, '...');
    }

    public function getFullContent(): string
    {
        $content = $this->content;
        /*
        if (str_contains($content, '<img')) {
            $content = str_replace("<img", "<img loading='lazy' class='my-4 h-auto w-full object-fit drop-shadow-xl rounded-lg' ", $this->content);
        }
        */
        if (str_contains($content, 'src="/images')) {
            $content =  str_replace('src="/images', 'src="' . env('IMAGE_URL', 'https://www.mediaoto.id') . '/images', $content);
        }

        return $content;
    }

    public function getThumbnailImage()
    {

        $isUrl = str_contains($this->image, 'http');
        if ($isUrl) {
            $urlLocation = $this->image;
        } else {
            $urlLocation = $this->getFirstMediaUrl();
        }

        return  $urlLocation;
    }

    public function getWebp()
    {
        $isUrl = str_contains($this->image, 'http');
        if ($isUrl) {
            $urlLocation = $this->image;
        } else {
            if ($this->media[0]->hasGeneratedConversion('webp')) {
                $urlLocation = $this->media[0]->getUrl('webp');
            } else {
                $urlLocation = $this->media[0]->getUrl('desktop');
            }
        }
        return  $urlLocation;
    }

    public function getWebpthumb()
    {
        $isUrl = str_contains($this->image, 'http');
        if ($isUrl) {
            $urlLocation = $this->image;
        } else {
            if ($this->media[0]->hasGeneratedConversion('webpthumb')) {
                $urlLocation = $this->media[0]->getUrl('webpthumb');
            } else {
                $urlLocation = $this->media[0]->getUrl();
            }
        }
        return  $urlLocation;
    }


    public function getImageType()
    {
        $is_mime = isset($this->getFirstMedia()->mime_type);

        return ($is_mime) ? $this->getFirstMedia()->mime_type : "image/jpeg";
    }

    public function getImageInfo()
    {
        // $isUrl = str_contains($this->image, 'http');



        try {
            $imageInstance = ImageFactory::load($this->getFirstMediaPath());
            $width =  $imageInstance->getWidth();
            $height =  $imageInstance->getHeight();
            if (isset($this->getFirstMedia()->mime_type)) {
                $mime = $this->getFirstMedia()->mime_type;
            } else {
                $mime = "image/jpeg";
            }
        } catch (\Exception $e) {
            $width = '600';
            $height = '300';
            $mime = "image/jpeg";
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
