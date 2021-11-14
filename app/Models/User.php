<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
  use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'name',
    'date_of_birth',
    'gender',
    'profession',
    'avatar',

    'longitude',
    'latitude',
    'address',
    'city_id',

    'phone',
    'email',
    'password',
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('user-avatars')->singleFile();
  }

  public function city(): BelongsTo
  {
    return $this->belongsTo(City::class);
  }
}
