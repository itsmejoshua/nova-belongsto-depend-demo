<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;

    public function models()
    {
        return $this->hasMany(VehicleModel::class, 'classification_id', 'id');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'vehicle_models',
            'classification_id', 'brand_id',
            'id', 'id')
            ->distinct();
    }
}
