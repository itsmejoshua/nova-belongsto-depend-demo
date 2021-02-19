<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function models(){
        return $this->hasMany(VehicleModel::class, 'brand_id', 'id');
    }

    public function classifications(){
        return $this->belongsToMany(Classification::class, 'vehicle_models',
            'brand_id', 'classification_id',
            'id', 'id')
            ->distinct();
    }
}
