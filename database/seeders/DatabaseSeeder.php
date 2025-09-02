<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ถ้าไม่ใช้ user seeder สามารถปิดได้
        // User::factory(10)->create();

        // เรียกใช้ NewsSeeder ด้วย
        $this->call(NewsSeeder::class);
    }
}
