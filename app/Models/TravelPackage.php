<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TravelPackage extends Model
{
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'package_slug' => [
                'source' => 'package_name',
                'maxLength'          => null,
                'maxLengthKeepWords' => true,
                'method'             => null,
                'separator'          => '-',
                'unique'             => true,
                'uniqueSuffix'       => null,
                'includeTrashed'     => false,
                'reserved'           => null,
                'onUpdate'           => false
            ]
        ];
    }

    protected $fillable = [
        'package_name',
        'package_slug',
        'destination',
        'duration',
        'price',
        'description',
        'package_image',
        'created_by'
    ];

    
    public function bookings() : HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
