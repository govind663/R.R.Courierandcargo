<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weight extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'customer_id',
        'weight_range',
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
