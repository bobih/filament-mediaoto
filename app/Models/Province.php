<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';

    public $timestamps = true;

    protected $fillable = ['id','name','created_at','updated_at'];

    public function cities() : HasMany {
        return $this->hasMany(
            related: City::class,
            foreignKey:'province_id',
            localKey:'id');
    }

    public function user() : BelongsTo {
        return $this->belongsTo(
            related: User::class,
            foreignKey:'province_id',
            ownerKey: 'id');
    }
}
