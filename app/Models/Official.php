<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Official extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo',
        'phone',
        'email',
        'bio',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    /**
     * Public profile data, kept behind one method so the controller can stay thin.
     */
    public static function forProfile(): Collection
    {
        return static::query()->active()->get();
    }
}
