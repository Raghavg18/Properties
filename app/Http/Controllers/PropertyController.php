<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Jobs\GenerateRecommendations;

class PropertyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'agent_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'address' => 'required|string',
        ]);

        $property = Property::create($validated);
        GenerateRecommendations::dispatch($property);

        return response()->json([
            'message' => 'Property created. Recommendations are being generated.',
            'property' => $property
        ]);
    }

    public function index()
    {
        return Property::with('recommendations')->get();
    }

    public function show($id)
    {
        $property = Property::with('recommendations')->findOrFail($id);
        return response()->json($property);
    }
}
