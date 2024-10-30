<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fields;

class FieldsTableSeeder extends Seeder
{
    public function run()
    {
        $fields = [
            ['name' => 'Lapangan 1', 'price' => 100000],
            ['name' => 'Lapangan 2', 'price' => 150000],
            ['name' => 'Lapangan 3', 'price' => 200000],
            ['name' => 'Lapangan 4', 'price' => 250000],
        ];

        foreach ($fields as $field) {
            Fields::create($field);
        }
    }
}
