<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Http\Services\PropertyService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\View\View;

class PropertiesController extends Controller
{
    /**
     * @param Request $request
     * @param PropertyService $propertyService
     * @return AnonymousResourceCollection
     */
    public function __invoke(Request $request, PropertyService $propertyService): AnonymousResourceCollection
    {
        $properties = $propertyService->getPropertiesBySearchParams($request);

        return PropertyResource::collection($properties);
    }
}
