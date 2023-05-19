<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufactures extends Model
{
    use HasFactory;

    protected $table = 'manufactures';

    protected $primaryKey = 'manu_id';

    protected $fillable = [
        'manu_name'
    ];

    public function product()
    {
        return $this->hasMany(Products::class, 'manu_id', 'type_id', 'id');
    }
}
