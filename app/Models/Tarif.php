<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = ['name']; // Add the appropriate fields

    // Define the relationship with TarifSession
    public function tarifSessions()
    {
        return $this->hasMany(TarifSession::class);
    }
}
