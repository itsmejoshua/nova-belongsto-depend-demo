<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Classification;
use App\Models\VehicleModel;
use Illuminate\Database\Seeder;

class VehicleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classifications = Classification::all();
        $brands = Brand::all();

        $car = $classifications->where('name', 'Car')->first();
        $truck = $classifications->where('name', 'Truck')->first();
        $trailer = $classifications->where('name', 'Trailer')->first();

        $bmw = $brands->where('name', 'BMW')->first();
        $this->createVehicleModels($car, $bmw, '1er', '2er', '3er', 'X1', 'Z4', 'Vision M NEXT');

        $mercedes = $brands->where('name', 'Mercedes')->first();
        $this->createVehicleModels($car, $mercedes, 'A-Klasse', 'B-Klasse', 'C-Klasse', 'E-Klasse');
        $this->createVehicleModels($truck, $mercedes, 'Arocs', 'Atego', 'Econic');

        $vw = $brands->where('name', 'VW')->first();
        $this->createVehicleModels($car, $vw, 'Polo', 'Golf', 'T-Roc', 'Passat', 'Touran');
        $this->createVehicleModels($truck, $vw, 'Crafter', 'Multivan');
        $this->createVehicleModels($trailer, $vw, 'T4');

        $humbaur = $brands->where('name', 'Humbaur')->first();
        $this->createVehicleModels($trailer, $humbaur, 'Kipper', 'Flexbox', 'Tieflader', 'Tandem');
    }

    private function createVehicleModels(Classification $classification, Brand $brand, string...$names): void
    {
        foreach ($names as $name) {
            VehicleModel::factory()->create([
                'name' => $name,
                'brand_id' => $brand->id,
                'classification_id' => $classification->id,
            ]);
        }
    }
}
