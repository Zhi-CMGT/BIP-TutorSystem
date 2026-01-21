<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject_id',
        'level_id',
        'experience_years',
        'hours_available',
        'bio',
        'rating',
        'reviews_count',
        'hours_this_week',
        'status'
    ];

    protected $casts = [
        'rating' => 'decimal:2',
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function getInitialsAttribute()
    {
        $names = explode(' ', $this->name);
        return strtoupper(substr($names[0], 0, 1) . (isset($names[1]) ? substr($names[1], 0, 1) : ''));
    }
}
