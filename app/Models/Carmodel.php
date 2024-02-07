<?php

namespace App\Models;

use App\Enums\Car\BodyType;
use App\Enums\Car\Fuel;
use App\Enums\Car\Transmission;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carmodel extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'car_model';

    protected $fillable = [
        'id',
        'brand_id',
        'name',
        'body_type',
        'seat',
        'fuel',
        'transmission',
        'engine_volume',
        'engine_type',
        'otr',
        'description',
        'image',
        'url',
        'rating',
        'review',
        'created_at',
        'updated_at'
    ];

    /*
    protected $casts = [
        'body_type'      => BodyType::class,
        'transmission'  => Transmission::class,
        'fuel'          =>  Fuel::class,
    ];
    */


    public function brand(): BelongsTo
    {
        return $this->belongsTo(
            related: Brand::class,
            ownerKey: 'id',
            foreignKey: 'brand_id');
    }

    public function variant(): HasMany
    {
        return $this->hasMany(
            related: Carvariant::class,
            foreignKey: 'model_id',
            localKey: 'id');
    }
}
