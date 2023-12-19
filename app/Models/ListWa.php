<?php

namespace App\Models;

use App\Models\Scopes\ListWaScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListWa extends Model
{
    use HasFactory;

    protected $table = 'list_wa';

    protected $fillable = ['id','userid','leadsid','tanggal','created_at'];

    protected static function booted()
    {
        static::addGlobalScope(new ListWaScope());
    }
    public function users() : BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'userid',
            ownerKey: 'userid'
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
