<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;

class DenormDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ClassroomDenormSeeder::class,
        ]);
    }
}
