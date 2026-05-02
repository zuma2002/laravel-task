<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // This line proves the seeder is actually running
        $this->command->info('Creating 100,000 products...');

        // Using a loop with DB::insert is the most efficient way for 100k records
        for ($i = 0; $i < 100; $i++) {
            $batch = Product::factory()->count(1000)->make()->toArray();
            DB::table('products')->insert($batch);
        }

        $this->command->info('Adding the final 5 products...');
        Product::factory()->count(5)->create();

        $this->command->info('Finished seeding 100,005 records!');
    }
}
