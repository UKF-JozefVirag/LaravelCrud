<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Sportsground;
use Illuminate\Database\Seeder;
use App\Models\Rent;

class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rent::factory()
            ->has(Customer::factory())
            ->has(Sportsground::factory())
            ->count(10)
            ->create();
    }
}
