<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Jobs\GenerateRecommendations;
use Illuminate\Http\JsonResponse;

class PropertyController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'agent_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'address' => 'required|string',
        ]);

        // Create property
        $property = Property::create($validated);

        // Dispatch job to generate recommendations
        GenerateRecommendations::dispatch($property);

        return response()->json([
            'message' => 'Property created successfully. Recommendations are being generated.',
            'property' => $property,
        ], 201);
    }

    public function index(): JsonResponse
    {
        $properties = Property::with('recommendations')->get();

        return response()->json([
            'properties' => $properties,
        ]);
    }

    public function show($id): JsonResponse
    {
        $property = Property::with('recommendations')->findOrFail($id);

        return response()->json([
            'property' => $property,
        ]);
    }
}
