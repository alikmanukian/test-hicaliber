<?php

namespace App\Http\Services;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PropertyService
{
    public function getPropertiesBySearchParams(Request $request): Collection
    {
        return Property::query()
            ->when($request->name, fn($query) => $query->whereLike('name', $request->name))
            ->when($request->price_from, fn($query) => $query->where('price', '>=', $request->price_from))
            ->when($request->price_to, fn($query) => $query->where('price', '<=', $request->price_to))
            ->when($request->bedrooms, fn($query) => $query->where('bedrooms', $request->bedrooms))
            ->when($request->bathrooms, fn($query) => $query->where('bathrooms', $request->bathrooms))
            ->when($request->storeys, fn($query) => $query->where('storeys', $request->storeys))
            ->when($request->garages, fn($query) => $query->where('garages', $request->garages))
            ->get();
    }
}
