<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcmWeb extends Model
{
    use HasFactory;

    protected $table = 'fcm_web';

    protected $fillable = [
        'fcmtoken',
        'platform',
        'created_at',
        'updated_at'
    ];
}
