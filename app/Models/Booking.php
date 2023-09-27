<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'travel_package_id',
        'name',
        'contact',
        'travel_date',
        'booking_number',
        'package_price',
        'total_amount',
    ];
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function travel_package() : BelongsTo
    {
        return $this->belongsTo(TravelPackage::class);
    }

}
