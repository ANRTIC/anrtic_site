<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Notification extends Model
{
    protected $fillable = [
        'title',
        'message',
        'sender_id',
        'receiver_id',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id')
            ->select(['id','first_name','last_name']); // can be null
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id')
            ->select(['id','first_name','last_name']);
    }
}
