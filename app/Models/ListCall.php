<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListCall extends Model
{
    use HasFactory;

    protected $table = 'list_call';

    protected $fillable = ['id','userid','leadsid','tanggal','created_at'];


    public function users() : BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'userid',
            ownerKey: 'id'
        );
    }

    public function leadusers() : BelongsTo
    {
        return $this->belongsTo(
            related: Leads::class,
            foreignKey: 'leadsid',
            ownerKey: 'id'
        );
    }
}
