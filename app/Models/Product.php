<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','stock','meta_description','meta_keywords','meta_title','short_description','description',
        'price','discount',
    ];
    public function images () {
        return $this->hasMany(ProductImage::class,'product_id','id')
        ->orderBy('id','desc');
    }
}
