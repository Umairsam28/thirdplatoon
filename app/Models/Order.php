<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'country','first_name','last_name','company_name','address','address2','town','email',
        'phone','total','subtotal','charge_id','payment_status'
    ];
    public function items(){
        return $this->hasMany(OrderProduct::class);
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
