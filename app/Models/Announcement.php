<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'kind',
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'event_at',
        'location',
        'author',
        'is_pinned',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'event_at'    => 'datetime',
        'is_pinned'   => 'boolean',
        'is_active'   => 'boolean',
        'sort_order'  => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeKind($query, string $kind)
    {
        return $query->where('kind', $kind);
    }

    public function scopeDisplayed($query)
    {
        return $query->orderByDesc('is_pinned')
            ->orderBy('sort_order')
            ->orderByDesc('event_at')
            ->orderByDesc('created_at');
    }

    public static function publicItems(string $kind, int $limit = 6): Collection
    {
        return static::query()
            ->active()
            ->kind($kind)
            ->displayed()
            ->limit($limit)
            ->get();
    }

    public function getDisplayImageAttribute(): ?string
    {
        return $this->image ? (str_starts_with($this->image, 'http') ? $this->image : asset(ltrim($this->image, '/'))) : null;
    }
}
