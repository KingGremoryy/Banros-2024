<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TarifSession;

class TarifSessionsTableSeeder extends Seeder
{
    /**
     * Seed the tarif_sessions table.
     *
     * @return void
     */
    public function run()
    {
        TarifSession::create([
            'session_time' => '07:00-15:00',
            'price' => 50000,
            'tarif_id' => 1, // Ensure this ID exists in the tarif table
        ]);

        // Add more records as needed
    }
}
