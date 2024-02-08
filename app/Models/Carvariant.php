<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Carmodel;
use App\Models\CarBodytype;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CarVariant extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'car_variant';

    protected $fillable = [
        'id',
        'model_id',
        'brand_id',
        'name',
        'bodytype_id',
        'seat',
        'door',
        'fuel_id',
        'transmission_id',
        'engine_volume',
        'engine_type',
        'description',
        'image',
        'otr',
        'url',
        'rating',
        'review',
        'created_at',
        'updated_at'
    ];


    public function registerMediaConversions(Media $media = null): void
    {


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

        $this->addMediaConversion('webpnomark')
            ->sharpen(10)
            ->format(Manipulations::FORMAT_WEBP)
            ->width(1200);

        $this->addMediaConversion('webpthumbnomark')
            ->sharpen(10)
            ->format(Manipulations::FORMAT_WEBP)
            ->width(600);
    }


    public function brand(): BelongsTo
    {
        return $this->belongsTo(
            related: Brand::class,
            ownerKey: 'id',
            foreignKey: 'brand_id');
    }

    public function model() : BelongsTo
    {
        return $this->belongsTo(
            related: Carmodel::class,
            foreignKey: 'model_id',
            ownerKey: 'id'
        );
    }

    public function bodytype(): BelongsTo
    {
        return $this->belongsTo(
            related: CarBodytype::class,
            ownerKey: 'id',
            foreignKey: 'bodytype_id');
    }

    public function transmission(): BelongsTo
    {
        return $this->belongsTo(
            related: CarTransmission::class,
            ownerKey: 'id',
            foreignKey: 'transmission_id');
    }

    public function fuel(): BelongsTo
    {
        return $this->belongsTo(
            related: CarFuel::class,
            ownerKey: 'id',
            foreignKey: 'fuel_id');
    }
}
