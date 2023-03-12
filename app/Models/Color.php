<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'color',
    ];

    public function ClothingColor(){
        return $this->belongsToMany(Clothing::class, 'clothes_colors', 'idCol', 'idClo');
    }
}
