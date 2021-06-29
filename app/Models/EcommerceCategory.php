<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommerceCategory extends Model
{
    use HasFactory;
    protected $table='ecommerce_category';
    protected $fillable = [
        'parent_id','name','slug','total_products','is_active'
    ];
    
}
