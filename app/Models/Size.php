<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=[
        'size',
    ];

    public function clothingSize(){
        return $this->belongsToMany(Clothing::class, 'clothes_sizes', 'idSiz', 'idClo');
    }
}
