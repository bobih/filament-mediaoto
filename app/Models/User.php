<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements HasName
{
    use HasApiTokens, HasFactory, Notifiable;

    public function canAccessPanel(Panel $panel): bool
    {
        // Bypass Auth
        //return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        return true;
    }

    public function getFilamentName(): string
    {
        return $this->getAttributeValue('nama');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id','position_id','acctype','email','nama',
        'password','phone','quota','alamat','province_id',
        'city_id','lokasi','showroom','brand','image','ktp','npwp','fcmtoken',
        'created_at',
        'updated_at',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function cities(): BelongsTo
    {
        return $this->belongsTo(
            related: City::class,
            ownerKey: 'id',
            foreignKey:'city_id');
    }

    public function province() : BelongsTo
    {
        return $this->belongsTo(
            related: Province::class,
            foreignKey: 'province_id',
            ownerKey: 'id'
        );
    }

    public function brands(): BelongsTo
    {
        return $this->belongsTo(
            related: Brand::class,
            ownerKey: 'id',
            foreignKey: 'brand');
    }

    public function showrooms(): BelongsTo
    {
        return $this->belongsTo(
            related: Showroom::class,
            ownerKey: 'id',
            foreignKey: 'showroom');
    }

    public function positions(): BelongsTo
    {
        return $this->belongsTo(
            related: Position::class,
            ownerKey: 'id',
            foreignKey: 'position_id');
    }




    public function pakets(): BelongsTo
    {
        return $this->belongsTo(
            related: Paket::class,
            ownerKey: 'id',
            foreignKey: 'acctype');
    }

}
