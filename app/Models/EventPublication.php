<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPublication extends Model
{
    protected $fillable = [
        'user_id',
        'package_name',
        'package_price',
        'organizer_name',
        'organizer_address',
        'organizer_description',
        'instagram',
        'website',
        'logo_path',
        'status',
        'registration_periods',
        'payment_type',
        'category',
        'target_audience',
        'activity_type',
        'activity_level',
        'registration_link',
        'guidebook_link',
        'whatsapp_number',
        'poster_path',
        'payment_proof_path',
    ];

    protected $casts = [
        'registration_periods' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
