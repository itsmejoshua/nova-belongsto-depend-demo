<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = State::all();

        // USA
        $california = $states->where('name', 'California')->first();
        $this->createCity($california, 'Los Angeles', 'San Diego', 'San Francisco');

        $northDakota = $states->where('name', 'North Dakota')->first();
        $this->createCity($northDakota, 'Bismarck', 'Fargo', 'Minot');

        $texas = $states->where('name', 'Texas')->first();
        $this->createCity($texas, 'Houston', 'Dallas', 'Austin');

        // Germany
        $niedersachsen = $states->where('name', 'Niedersachsen')->first();
        $this->createCity($niedersachsen, 'Hannover', 'Braunschweig', 'Oldenburg');

        $hessen = $states->where('name', 'Hessen')->first();
        $this->createCity($hessen, 'Wiesbaden', 'Frankfurt am Main', 'Marburg');

        $bayern = $states->where('name', 'Bayern')->first();
        $this->createCity($bayern, 'München', 'Nürnberg', 'Regensburg');

        // Sweden
        $blekinge = $states->where('name', 'Blekinge')->first();
        $this->createCity($blekinge, 'Karlskrona', 'Sölvesborg', 'Ronneby');

        $gotland = $states->where('name', 'Gotland')->first();
        $this->createCity($gotland, 'Visby', 'Klintehamn', 'Slite');

        $halland = $states->where('name', 'Halland')->first();
        $this->createCity($halland, 'Kungsbacka', 'Halmstad', 'Laholm');
    }

    private function createCity(State $state, string...$names): void
    {
        foreach ($names as $name) {
            City::factory()->create([
                'name' => $name,
                'state_id' => $state->id,
            ]);
        }
    }
}
