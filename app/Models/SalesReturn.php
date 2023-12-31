<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReturn extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function details(){
        return $this->hasMany(Sales_return_detail::class , 'sales_returns_id' , 'id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
