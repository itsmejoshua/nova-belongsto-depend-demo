<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createCountry('USA', 'Germany', 'Sweden');
    }

    /**
     * @param string ...$names
     * @return void
     */
    private function createCountry(string...$names): void
    {
        foreach ($names as $name) {
            Country::factory()->create([
                'name' => $name
            ]);
        }
    }
}
