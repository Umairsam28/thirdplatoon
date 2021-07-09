<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','stock','meta_description','meta_keywords','meta_title','short_description','description',
        'price','discount','user_id','category_id'
    ];
    public function images () {
        return $this->hasMany(ProductImage::class,'product_id','id')
        ->orderBy('id','desc');
    }
    public function orders(){
        return $this->hasMany(OrderProduct::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
