<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = ['id','brand','created_at','updated_at',
    ];

    public function model(): HasMany
    {
        return $this->hasMany(
            related: Carmodel::class,
            foreignKey: 'model_id',
            localKey: 'id');
    }

}
