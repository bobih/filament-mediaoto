<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBodytype extends Model
{
    use HasFactory;
    protected $table = 'car_bodytype';

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];
}
