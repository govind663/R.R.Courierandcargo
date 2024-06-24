<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parcel extends Model
{
    use HasFactory, SoftDeletes, Loggable;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'parcel_Id',
        'customer_id',
        'pickup_dt',
        'c_note_number',
        'destination',
        'within_mumbai_thane',
        'surface',
        'weight',
        'unit_id',
        'amount',
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

    // == relationship between Unit
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
