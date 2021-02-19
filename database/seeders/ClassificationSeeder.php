<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createClassifications('Car', 'Truck', 'Trailer');
    }

    private function createClassifications(string...$names): void
    {
        foreach ($names as $name) {
            Classification::factory()->create([
                'name' => $name
            ]);
        }
    }
}
