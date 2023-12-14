<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = ['id','name','provinces_id','created_at','updated_at'];

    public function province() : BelongsTo
    {
        return $this->belongsTo(
            related: Province::class,
            foreignKey: 'provinces_id',
            ownerKey: 'id'
        );
    }
}
