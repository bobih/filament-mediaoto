<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarTransmission extends Model
{
    use HasFactory;

    protected $table = 'car_transmission';

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];
}
