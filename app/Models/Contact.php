<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    protected $table = 'contact_us';

    protected $fillable = ['id','name','email','notes','created_at','updated_at'];
}
