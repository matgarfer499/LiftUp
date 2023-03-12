<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'idUse',
        'idClo',
        'score',
        'comment',
    ];


    public function userReview(){
        return $this->hasManyThrough(User::class, Clothe::class, 'id', 'id', 'idUse', 'id');
    }
  
}
