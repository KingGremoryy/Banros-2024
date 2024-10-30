<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifSession extends Model
{
    use HasFactory;

    protected $fillable = ['field_id', 'day_of_week', 'session_time', 'price'];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function orders()
{
    return $this->belongsToMany(Order::class, 'order_tarif_session', 'tarif_session_id', 'order_id');
}

// public function orderTarifSessions()
// {
//     return $this->hasMany(OrderTarifSession::class, 'tarif_session_id');
// }
}
