<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes, Loggable;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'invoice_no',
        'parcel_no',
        'customer_id',
        'from_dt',
        'to_dt',
        'invoice_dt',
        'package_charges',
        'total_amount',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];

    // == relationship between Customer
    public function customer(){
        return $this->belongsTo(Customer::class);

    }
}
