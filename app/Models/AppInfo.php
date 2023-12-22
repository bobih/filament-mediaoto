<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppInfo extends Model
{
    use HasFactory;

    protected $table = 'appinfo';

    protected $fillable = ['userid','version', 'fcmtoken','updated_at'];

    public function users() : BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'userid',
            ownerKey: 'userid'
        );
    }
}
