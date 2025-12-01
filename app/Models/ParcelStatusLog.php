<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParcelStatusLog extends Model
{
    protected $fillable = [
        'parcel_id',
        'status',
        'location',
        'description',
    ];

    public function parcel()
    {
        return $this->belongsTo(Parcel::class);
    }
    
}
