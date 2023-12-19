<?php

namespace App\Models;

use App\Models\Scopes\PushTempScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PushTemp extends Model
{
    use HasFactory;

    protected $table = 'push_temp';

    //Disable timestamp
    public $timestamps = false;

    protected $fillable = ['id','userid', 'leadsid', 'tanggal' ];

    protected static function booted()
    {
        static::addGlobalScope(new PushTempScope());
    }

    public function users() : BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'userid',
            ownerKey: 'id'
        );
    }

    public function invoice() : BelongsTo
    {
        return $this->belongsTo(
            related: Invoice::class,
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

    public function brands() : BelongsTo
    {
        return $this->belongsTo(
            related: Brand::class,
            foreignKey: 'brand',
            ownerKey: 'id'
        );
    }

}
