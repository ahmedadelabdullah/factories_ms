<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInvoiceDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer_invoice(){
        return $this->belongsTo(CustomerInvoice::class);
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
