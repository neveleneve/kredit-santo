<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(KecamatanSeeder::class);
        $this->call(KelurahanSeeder::class);
        $this->call(RumahSeeder::class);
        $this->call(NasabahSeeder::class);
        $this->call(DetailNasabahSeeder::class);
        $this->call(IstriSeeder::class);
        $this->call(KriteriaBobotSeeder::class);
        $this->call(PenilaianSeeder::class);
    }
}
