<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Showroom extends Model
{
    use HasFactory;

    protected $table = 'showrooms';

    public $timestamps = false;

    protected $fillable = ['id',
    'city',
    'showroom',
    'alamat',
    'brand',
    'province',
    'created_at',
    'updated_at',];


      public function cities(): BelongsTo
    {
        return $this->belongsTo(
            related: City::class,
            ownerKey: 'id',
            foreignKey:'city');
    }

    public function provinces() : BelongsTo
    {
        return $this->belongsTo(
            related: Province::class,
            foreignKey: 'province',
            ownerKey: 'id'
        );
    }

    public function brands(): BelongsTo
    {
        return $this->belongsTo(
            related: Brand::class,
            ownerKey: 'id',
            foreignKey: 'brand');
    }



}
