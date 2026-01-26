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
use App\Models\Notification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    // ---------------- Mass assignable fields ----------------
    protected $fillable = [
        "photo",
        "first_name",
        "last_name",
        "email",
        "phone",
        "password",
        "is_active",
        "is_blocked",
        "blocked_at",
        "block_reason",
        "last_login_at",
        "login_attempts",
        "email_verified_at",
    ];

    // ---------------- Hidden attributes ----------------
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factory_recovery_codes',
        'remember_token',
    ];

    // ---------------- Attribute casts ----------------
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
        'is_blocked' => 'boolean',
        'last_login_at' => 'datetime',
        'blocked_at' => 'datetime',
        'login_attempts' => 'integer',
    ];

    // ---------------- Appended accessors ----------------
    protected $appends = [
        'full_name',
        'avatar_url',
    ];

    // ---------------- ACCESSORS ----------------
    
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getAvatarUrlAttribute(): string
    {
        return $this->photoURL() ?? "https://ui-avatars.com/api/?name={$this->initials()}&color=FFFFFF&background=4CAF50";
    }

    public function initials(): string
    {
        return Str::of($this->getFullNameAttribute())
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    // ---------------- RELATIONSHIPS ----------------

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function activities()
    {
        return $this->hasMany(UserActivity::class);
    }

    public function receivedNotifications()
    {
        // Only select fields necessary for API / Flutter
        return $this->hasMany(Notification::class, 'receiver_id')
            ->select(['id','title','message','sender_id','receiver_id','is_read','created_at']);
    }

    public function sentNotifications()
    {
        return $this->hasMany(Notification::class, 'sender_id')
            ->select(['id','title','message','sender_id','receiver_id','is_read','created_at']);
    }

    // ---------------- METHODS ----------------

    public function lastLogin()
    {
        $lastSession = $this->sessions()->orderBy('last_activity', 'desc')->first();
        return $lastSession ? \Carbon\Carbon::createFromTimestamp($lastSession->last_activity)->toDateTimeString() : null;
    }

    public function photoURL(): ?string
    {
        return $this->photo ? Storage::url($this->photo) : null;
    }

    public static function generateDefaultPassword(): string
    {
        return Str::random(8);
    }

    public function canLogin(): bool
    {
        return $this->is_active && !$this->is_blocked;
    }

    public function resetLoginAttempts(): void
    {
        $this->update(['login_attempts' => 0]);
    }

    public function block(string $reason = null): void
    {
        $this->update([
            'is_blocked' => true,
            'blocked_at' => now(),
            'block_reason' => $reason,
        ]);
    }

    public function unblock(): void
    {
        $this->update([
            'is_blocked' => false,
            'blocked_at' => null,
            'block_reason' => null,
            'login_attempts' => 0,
        ]);
    }

    public function isEmailVerified(): bool
    {
        return !is_null($this->email_verified_at);
    }
}
