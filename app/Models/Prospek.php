<?php

namespace App\Models;

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

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(
            related: User::class,
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
