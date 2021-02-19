<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createBrands('BMW', 'Mercedes', 'VW', 'Humbaur');
    }

    private function createBrands(string...$names): void
    {
        foreach ($names as $name) {
            Brand::factory()->create([
                'name' => $name
            ]);
        }
    }
}
