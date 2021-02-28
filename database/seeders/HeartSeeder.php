<?php

namespace Database\Seeders;

use App\Models\Heart;
use Illuminate\Database\Seeder;

class HeartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Heart::factory()->count(400)->create();
    }
}
