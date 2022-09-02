<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Socials;
use App\Traits\WithUuid;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use WithUuid,
        Notifiable,
        HasRoles,
        Socials,
        SoftDeletes,
        InteractsWithMedia;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'birthday_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday'          => 'datetime:Y-m-d',
    ];

    protected $with = [
        'media',
    ];

    public function getNameAttribute(): string
    {
        $name = !empty($this->last_name) ? (string) Str::of($this->last_name)->substr(0, 1)->finish('.') : false;
        $name = implode(' ', array_filter([$this->first_name, $name]));

        return !empty($name) ? $name : $this->login;
    }

    public function getFullNameAttribute(): ?string
    {
        $full_name = "{$this->first_name} {$this->last_name}";
        return empty(trim($full_name)) ? null : $full_name;
    }

    public function getLoginAttribute(): string
    {
        return $this->attributes['login'] ?? explode('@', $this->email)[0];
    }

    public function getAgeAttribute(): ?string
    {
        $birthday = Carbon::parse($this->attributes['birthday_at'])->age;

        return $birthday ? sprintf('%d %s', $birthday, trans_choice('choice.age', $birthday)) : null;
    }

    public function getBirthdayAttribute(): ?string
    {
        /** @var \Carbon\Carbon $birthday */
        $birthday = $this->birthday_at;

        return $birthday ? $birthday->format('d.m.Y') : null;
    }

    public function setBirthdayAtAttribute($value)
    {
        $this->attributes['birthday_at'] = Carbon::createFromFormat('d.m.Y', $value)->format('Y-m-d');
    }

    public function getAvatar(int $size = 100, ?string $default = null): string
    {
        $media = $this->getFirstMediaUrl('avatar', $size);

        return !empty($media) ? $media : ($default ?? media());
    }

    public function registerMediaCollections(): void
    {
        $sizes = [50, 100, 250, 500];

        $this->addMediaCollection('avatar')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) use ($sizes) {
                foreach ($sizes as $size) {
                    $this->addMediaConversion((string) $size)
                        ->width($size)
                        ->height($size)
                        ->sharpen(5);
                }
            });
    }
}
