<?php

namespace App\Models;
use App\Enums\Car\BodyType;
use App\Enums\Car\Transmission;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carvariant extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'car_variant';

    protected $fillable = [
        'id',
        'model_id',
        'brand_id',
        'name',
        'body_type',
        'seat',
        'fuel',
        'transmission',
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


    protected $casts = [
        'bodytype'      => BodyType::class,
        'transmission'  => Transmission::class
    ];

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




}
