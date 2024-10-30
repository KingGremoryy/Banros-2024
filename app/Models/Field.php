<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    // Specify the associated table name
    protected $table = 'fields'; // Ensure this matches your database table

    // Fillable attributes for mass assignment
    protected $fillable = ['name', 'image_url'];

    // Define a relationship with TarifSession
    public function tarifSessions()
    {
        return $this->hasMany(TarifSession::class, 'field_id'); // Specify foreign key if it's not 'field_id'
    }
}
