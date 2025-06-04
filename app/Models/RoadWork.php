<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Assigment;

class RoadWork extends Model
{
    /** @use HasFactory<\Database\Factories\RoadWorkFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'planned_end_date',
        'province_id',
    ];

    public function assignment(): HasMany
    {
        return $this->hasMany(Assignment::class, 'roadwork_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
