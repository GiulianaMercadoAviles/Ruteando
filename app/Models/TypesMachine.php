<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypesMachine extends Model
{
    protected $fillable = [
        'name',
    ];

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }
}
