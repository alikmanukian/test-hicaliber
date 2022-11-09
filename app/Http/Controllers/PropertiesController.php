<?php

namespace App\Http\Controllers;

use App\Http\Resources\PropertyResource;
use App\Http\Services\PropertyService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PropertiesController extends Controller
{
    /**
     * @param Request $request
     * @param PropertyService $propertyService
     * @return Response
     */
    public function __invoke(Request $request, PropertyService $propertyService): Response
    {
        $properties = $propertyService->getPropertiesBySearchParams($request);

        return Inertia::render('Search', [
            'properties' => PropertyResource::collection($properties)
        ]);
    }
}
