<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assignment extends Model
{
    /** @use HasFactory<\Database\Factories\AssigmentFactory> */
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'roadwork_id',
        'start_date',
        'end_date',
        'kilometer_travelled',
        'end_reason_id',
    ];

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }

    public function roadWork() 
    {
        return $this->belongsTo(RoadWork::class, 'roadwork_id');
    }

    public function endReason(): BelongsTo
    {
        return $this->belongsTo(EndReason::class);
    }
}
