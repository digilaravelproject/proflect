<?php

namespace App\Models;

use App\Models\Warranty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'owner_name',
        'owner_email',
        'status',
        'used_at',
        'warranty_id',
    ];

    protected $casts = [
        'used_at' => 'datetime',
    ];

    public function warranty()
    {
        return $this->belongsTo(Warranty::class, 'warranty_id');
    }
}
