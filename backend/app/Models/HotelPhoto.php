<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HotelPhoto extends Model
{
    /** @use HasFactory<\Database\Factories\HotelPhotoFactory> */
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'photo_url',
    ];

    /**
     * Relasi ke hotel pemilik foto ini.
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}