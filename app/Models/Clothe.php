<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothe extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_product',
        'name',
        'gender',
        'discount',
        'discount_rate',
        'price',
        'description',
        'material',
    ];

    public function wishlist(){
        return $this->belongsToMany(User::class, 'wishlists', 'idClo', 'idUse');
    }

    public function purchase(){
        return $this->belongsToMany(User::class, 'purchases', 'idClo', 'idUse');
    }
    
    public function clothingColor(){
        return $this->belongsToMany(Color::class, 'clothes_colors', 'idClo', 'idCol');
    }
    
    public function clothingSize(){
        return $this->belongsToMany(Size::class, 'clothes_sizes', 'idClo', 'idSiz')->withPivot('stock');
    }

    public function images(){
        return $this->hasMany(Image::class, 'idClo', 'id');
    }

    public function review(){
        return $this->hasMany(Review::class, 'idClo');
    }

}
    