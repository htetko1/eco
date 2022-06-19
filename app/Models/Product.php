<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function photo(){
        return $this->belongsTo(Photo::class);
    }

    public function getPhotos(){
        return $this->hasMany(Photo::class);

    }

}
