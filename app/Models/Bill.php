<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Bill extends Model
{
    use HasFactory;

    // protected $table = "bills";
    // public $timestamps = true;

    protected $fillable = [
        'bill_month',
        'year',
        'amount',
        'customer_id',
        'status',   
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
