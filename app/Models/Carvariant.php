<?php

namespace App\Models;
use App\Enums\Car\BodyType;
use App\Enums\Car\Transmission;
use App\Enums\Car\Fuel;
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
        'bodytype_id',
        'seat',
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


    protected $casts = [
        'body_type'      => BodyType::class,
        'transmission'  => Transmission::class,
        'fuel'          =>  Fuel::class,
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
