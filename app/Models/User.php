<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "username",
        "name",
        "country",
        "avatar",
        "email",
        "password",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ["password", "remember_token"];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value
                ? Storage::disk("public")->url($value)
                : null
        );
    }

    protected function mergedName(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => preg_replace(
                "/\s+/",
                "",
                $attributes["name"]
            )
        );
    }

    protected function pureName(): Attribute
    {
        return Attribute::make(get: fn() => strtolower($this->merged_name));
    }

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    // TODO: Look at Eloquent: API Resources
    public function infoAttributes(): array
    {
        return [
            "name" => $this->name,
            "mergedName" => $this->merged_name,
            "country" => $this->country,
            "avatar" => $this->avatar,
        ];
    }

    public static function findByNameWithoutWhitespaces(string $name): self|null
    {
        return self::whereRaw("LOWER(REPLACE(`name`, ' ' ,'')) = ?", [
            strtolower($name),
        ])->first();
    }
}
