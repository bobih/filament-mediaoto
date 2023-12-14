<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leads extends Model
{
    use HasFactory;


    protected $table = 'leads';

    protected $fillable = [
        'id',
        'create',
        'name',
        'phone',
        'brand',
        'model',
        'variant',
        'city',
        'lokasi',
        'created_at',
        'updated_at',
    ];


    public function brands() : BelongsTo
    {
        return $this->belongsTo(
            related: Brand::class,
            foreignKey: 'brand',
            ownerKey: 'id'
        );
    }
}
