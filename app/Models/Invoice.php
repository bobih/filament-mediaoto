<?php

namespace App\Models;

use App\Models\Scopes\InvoiceScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    protected function model(): Attribute
    {

        return Attribute::make(

            get: function ($value){
                if($value){
                    return explode(',', $value);
                } else {
                    return null;
                }
            },
            set: function ($value){
                if($value){
                    return implode(',', $value);
                } else {
                    return null;
                }
            },


        );
    }

    protected $fillable = [
                'id',
                'userid',
                'paketid',
                'brand',
                'model',
                'status',
                'tanggal',
                'datadate',
                'createdby',
                'approved',
                'created_at',
                'updated_at',
                ];


    protected static function booted()
    {
        //static::addGlobalScope(new InvoiceScope);
    }

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

    public function pushtemp(): HasMany
    {
        return $this->hasMany(
            related: PushTemp::class,
            foreignKey: 'userid',
            localKey: 'userid');
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
