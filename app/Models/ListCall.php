<?php

namespace App\Models;

use App\Models\Scopes\ListCallScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListCall extends Model
{
    use HasFactory;

    protected $table = 'list_call';

    protected $fillable = ['id','userid','leadsid','tanggal','created_at'];

    protected static function booted()
    {
        static::addGlobalScope(new ListCallScope);
    }

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
            related: Prospek::class,
            foreignKey: 'leadsid',
            ownerKey: 'id'
        );
    }
}
