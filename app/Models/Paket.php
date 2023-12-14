<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'list_paket';

    protected $fillable = [
        'id',
        'paket_id',
        'quota',
        'name',
        'harga',
        'created_at',
        'updated_at',
    ];



}
