<?php

namespace App\Models;

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
        'bodytype_id',
        'seat',
        'door',
        'fuel_id',
        'transmission_id',
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



    public function brand(): BelongsTo
    {
        return $this->belongsTo(
            related: Brand::class,
            ownerKey: 'id',
            foreignKey: 'brand_id');
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


    public function variant(): HasMany
    {
        return $this->hasMany(
            related: Carvariant::class,
            foreignKey: 'model_id',
            localKey: 'id');
    }

    public function getVariant(){
        $list = Carvariant::where('model_id',$this->id)->get();
        return $list;
    }
}
