<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    /** @use HasFactory<\Database\Factories\HotelFactory> */
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name',
        'address',
        'city',
        'description',
        'rating',
        'verification_status',
        'facility',
        'foto_hotel',
    ];

    protected $casts = [
        'facility' => 'array',
        'rating' => 'decimal:2',
    ];

    /**
     * Relasi ke pemilik/admin hotel.
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
     * Relasi ke foto-foto galeri hotel.
     */
    public function photos(): HasMany
    {
        return $this->hasMany(HotelPhoto::class);
    }

    /**
     * Relasi ke tipe-tipe kamar milik hotel ini.
     * (Room Type model akan dibuat di modul berikutnya)
     */
    public function roomTypes(): HasMany
    {
        return $this->hasMany(RoomType::class);
    }
}