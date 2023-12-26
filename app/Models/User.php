<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\HasName;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Spatie\Permission\Traits\HasRoles;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject, HasName, FilamentUser, HasAvatar
{
    use HasFactory, Notifiable, HasRoles;

    // use HasApiTokens, HasFactory, Notifiable;

    public function canAccessPanel(Panel $panel): bool
    {
        $isEnable = false;
        // Bypass Auth
        //return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        switch($this->email){
            case "bobby.khrisna@gmail.com":
                $isEnable = true;
            break;
            case "laturiuw@gmail.com":
                $isEnable = true;
            break;
            case "resty.agusti2023@gmail.com":
                $isEnable = true;
            break;
            case "resty.agusti@gmail.com":
                $isEnable = true;
            break;
            case "zusmaidar.az@gmail.com":
                $isEnable = true;
            break;
            default:
            $isEnable = true;
        }
        return $isEnable;
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

    protected $primaryKey = 'id';

    public function getFilamentAvatarUrl(): ?string
    {
       // return asset('images/'.$this->image);
        return getenv('IMAGE_URL').'/images/'.$this->image;
    }


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


     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

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

    public function prospek(): HasMany
    {
        return $this->hasMany(
            related: Prospek::class,
            foreignKey: 'userid',
            localKey: 'id');
    }
    public function pushlist(): HasMany
    {
        return $this->hasMany(
            related: PushList::class,
            foreignKey: 'userid',
            localKey: 'id');
    }

    public function calllist(): HasMany
    {
        return $this->hasMany(
            related: ListCall::class,
            foreignKey: 'userid',
            localKey: 'id');
    }

    public function walist(): HasMany
    {
        return $this->hasMany(
            related: ListWa::class,
            foreignKey: 'userid',
            localKey: 'id');
    }
}
