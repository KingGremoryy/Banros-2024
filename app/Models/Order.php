<?php

namespace App\Models;

use App\Models\Field;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_name',
        'customer_phone', 
        'field_id',
        'tarif_session_id',
        'total_price',
        'payment_status',
        'date',
    ];
    
    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
    }

    public function tarifSession()
    {
    return $this->belongsToMany(TarifSession::class, 'order_tarif_session', 'order_id', 'tarif_session_id');
    }

}
