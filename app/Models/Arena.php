<?php

namespace App\Models;

use App\Enums\BookStatus;
use App\Enums\ArenaStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arena extends Model
{
    use HasFactory;

    protected $fillable = [
        'lapangan',
        'status',
        'arenaStatus',
    ]; 

    protected $casts = [
        'status' => ArenaStatus::class,
        'arenaStatus' => BookStatus::class
    ];

    protected $table = 'arena';
    
    public function Booking()
    {
        return $this->hasMany(Booking::class);
    }
}

