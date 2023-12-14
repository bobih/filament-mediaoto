<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    use HasFactory;

    protected $table = 'showrooms';

    protected $fillable = ['id',
    'city',
    'showroom',
    'alamat',
    'brand',
    'province',
    'created_at',
    'updated_at',];




}
