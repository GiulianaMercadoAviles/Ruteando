<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesMaintenance extends Model
{
    /** @use HasFactory<\Database\Factories\TypesMaintenanceFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
    public function maintenance()
    {
        return $this->hasMany(Maintenance::class, 'type_maintenance_id');
    }
}
