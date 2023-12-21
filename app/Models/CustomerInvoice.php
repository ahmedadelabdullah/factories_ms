<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInvoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function details(){
        return $this->hasMany(CustomerInvoiceDetail::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
