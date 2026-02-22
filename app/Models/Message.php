<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'reply',
        'replied_at',
    ];

    protected $casts = [
        'replied_at' => 'datetime',
    ];

    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    public function markAsRead()
    {
        $this->update(['status' => 'read']);
    }

    public function markAsReplied($reply)
    {
        $this->update([
            'status' => 'replied',
            'reply' => $reply,
            'replied_at' => now(),
        ]);
    }
}
