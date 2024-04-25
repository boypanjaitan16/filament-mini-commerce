<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Laravel\Sanctum\HasApiTokens;
use Filament\Panel;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements LaratrustUser, FilamentUser, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRolesAndPermissions, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'phone_dial_code',
        'phone_number',
        'phone_number_verified_at',
        'password',
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
        'phone_number_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = [
        'is_email_verified',
        'is_phone_verified',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('small')
            ->fit(Manipulations::FIT_CROP, 150, 150)
            ->nonQueued();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole('admin');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function dialCode(): BelongsTo
    {
        return $this->belongsTo(DialCode::class, 'phone_dial_code', 'id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    public function getIsEmailVerifiedAttribute()
    {
        return $this->email_verified_at != null;
    }

    public function getIsPhoneVerifiedAttribute()
    {
        return $this->phone_number_verified_at != null;
    }
}
