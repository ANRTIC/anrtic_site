<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'photo',
        'is_active',
        'is_blocked',
        'blocked_at',
        'block_reason',
        'last_login_at',
        'last_login_ip',
        'login_attempts',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
        'is_blocked' => 'boolean',
        'last_login_at' => 'datetime',
        'blocked_at' => 'datetime',
        'login_attempts' => 'integer',
    ];

    protected $appends = [
        'full_name',
        'avatar_url',
    ];

    // Full name accessor
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // Avatar URL accessor
    public function getAvatarUrlAttribute()
    {
        if ($this->photo) {
            return asset('media/user_profiles/' . $this->photo); // Correct URL path for the photo
        }
        $initials = strtoupper(substr($this->first_name, 0, 1) . substr($this->last_name, 0, 1));
        return "https://ui-avatars.com/api/?name={$initials}&color=FFFFFF&background=4CAF50";  // Fallback to avatar initials if no photo
    }

    public function canLogin(): bool
    {
        return $this->is_active && !$this->is_blocked;
    }

    public function resetLoginAttempts()
    {
        $this->update(['login_attempts' => 0]);
    }

    public function block($reason = null)
    {
        $this->update([
            'is_blocked' => true,
            'blocked_at' => now(),
            'block_reason' => $reason
        ]);
    }

    public function unblock()
    {
        $this->update([
            'is_blocked' => false,
            'blocked_at' => null,
            'block_reason' => null,
            'login_attempts' => 0
        ]);
    }

    public function activities()
    {
        return $this->hasMany(UserActivity::class);
    }
}
