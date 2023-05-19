<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        // 'name', 'detail', 'image'
        'name', 'manu_id', 'type_id', 'price', 'image', 'description', 'feature'
    ];

    public function manufactures()
    {
        return $this->belongsTo('App\Manufactures');
    }

}
