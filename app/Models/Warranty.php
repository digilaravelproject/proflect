<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'car_model',
        'job_description',
        'unique_number',
        'warranty_date',
        'expiry_date',
        'otp_code',
        'otp_expires_at',
        'otp_verified_at',
    ];

    protected $casts = [
        'warranty_date' => 'datetime',
        'expiry_date' => 'datetime',
        'otp_expires_at' => 'datetime',
        'otp_verified_at' => 'datetime',
    ];

    /**
     * Get the warranty timestamp.
     * Falls back to created_at if warranty_date is not set.
     */
    public function getWarrantyDateAttribute($value)
    {
        if ($value instanceof \DateTimeInterface) {
            return $value;
        }

        if (! $value) {
            return $this->created_at;
        }

        return \Illuminate\Support\Carbon::parse($value);
    }
}

