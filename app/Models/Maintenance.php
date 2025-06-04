<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Maintenance extends Model
{
    /** @use HasFactory<\Database\Factories\MaintenanceFactory> */
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'maintenance_date',
        'maintenance_kilometers',
        'type_maintenance_id',
        'is_active',
    ];

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }

    public function typesMaintenance(): BelongsTo
    {
        return $this->belongsTo(TypesMaintenance::class, 'type_maintenance_id');
    }
}
