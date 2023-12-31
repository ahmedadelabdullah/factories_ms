<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function invoices(){
    //     return $this->hasMany(CustomerInvoice::class);
    // }

    // public function sales_returns(){
    //     return $this->hasMany(SalesReturn::class);
    // }

    // public function payments(){
    //     return $this->hasMany(Payment::class);
    // }

    public function accounts(){
        return $this->hasMany(CustomersAccount::class);
    }
}
