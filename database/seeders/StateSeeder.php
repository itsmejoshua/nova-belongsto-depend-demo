<?php

namespace Database\Seeders;

use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coutries = Country::all();

        $usa = $coutries->where('name', 'USA')->first();
        $this->createState($usa, 'California', 'North Dakota', 'Texas');

        $germany = $coutries->where('name', 'Germany')->first();
        $this->createState($germany, 'Niedersachsen', 'Hessen', 'Bayern');

        $sweden = $coutries->where('name', 'Sweden')->first();
        $this->createState($sweden, 'Blekinge', 'Gotland', 'Halland');
    }

    private function createState(Country $country, string...$names): void
    {
        foreach ($names as $name) {
            State::factory()->create([
                'name' => $name,
                'country_id' => $country->id,
            ]);
        }
    }
}
