<?php

namespace App\Models;

use App\Models\Scopes\ProspekScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Prospek extends Model
{
    use HasFactory;

    protected $table = 'prospek';

    protected $fillable = [
                'id',
                'userid',
                'leadsid',
                'view',
                'favorite',
                'note',
                'lost',
                'created_at',
                'updated_at',
                ];




    protected static function booted()
    {
        static::addGlobalScope(new ProspekScope);
    }


    public function users() : BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'userid',
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

    public function leadusers() : BelongsTo
    {
        return $this->belongsTo(
            related: Leads::class,
            foreignKey: 'leadsid',
            ownerKey: 'id'
        );
    }

}
