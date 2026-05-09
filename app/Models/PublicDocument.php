<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PublicDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'file_path',
        'file_name',
        'download_count',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'download_count' => 'integer',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('created_at');
    }

    public static function forPublic(): Collection
    {
        return static::query()->active()->ordered()->get();
    }

    public function getDownloadLabelAttribute(): string
    {
        return $this->file_name ?: basename($this->file_path);
    }
}
