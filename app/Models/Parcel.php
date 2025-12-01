<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    // 
    protected $fillable = [
        'tracking_number',   // atau 'tracking_no' ikut migration anda
        'storage',
        'customer_name',
        'pickup_date',
        'delivery_date',
        'status',
    ];

    public function logs()
{
    return $this->hasMany(ParcelStatusLog::class);
}

}