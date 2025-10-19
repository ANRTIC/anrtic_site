<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Session;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        "photo",
        "first_name",
        "last_name",
        "email",
        "phone",
        "password",
        "is_blocked"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factory_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function lastLogin()
    {
        $lastSession = $this->sessions()
                        ->orderBy('last_activity', 'desc')
                        ->first();

        if ($lastSession) {
            return \Carbon\Carbon::createFromTimestamp($lastSession->last_activity)->toDateTimeString();
        }

        return;
    }

    public function sessions()
    {
        return $this->hasOne(Session::class);
    }

    public function isEmailVerified() {
        return !is_null($this->email_verified_at);
    }

    public function photoURL()
    {
        return Storage::url($this->photo);
    }

    public static function generateDefaultPassword()
    {
        return Str::random(8);
    }
}
