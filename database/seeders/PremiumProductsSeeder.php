<?php

namespace Database\Seeders;

use App\Models\PremiumProducts;
use Illuminate\Database\Seeder;

class PremiumProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PremiumProducts::factory()
            ->count(10)
            ->create();
    }
}
