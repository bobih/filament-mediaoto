<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';


    protected $fillable = [
                'id',
                'userid',
                'paketid',
                'status',
                'tanggal',
                'createdby',
                'approved',
                'created_at',
                'updated_at',
                ];

    public function users() : BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'userid',
            ownerKey: 'id'
        );
    }

    public function approveduser() : BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'approved',
            ownerKey: 'id'
        );
    }

    public function createduser() : BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'createdby',
            ownerKey: 'id'
        );
    }
    public function pakets() : BelongsTo
    {
        return $this->belongsTo(
            related: Paket::class,
            foreignKey: 'paketid',
            ownerKey: 'id'
        );
    }
}
