<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        return response()->json(Workshop::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'owner_id' => 'required|exists:users,id',
            'code' => 'required|string|unique:workshops,code',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'photo' => 'required|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'open_time' => 'required|date_format:H:i',
            'close_time' => 'required|date_format:H:i',
            'operational_day' => 'required|string',
            'is_active' => 'required|boolean',
        ]);

        $workshop = Workshop::create($validated);

        return response()->json($workshop, 201);
    }

    public function show(Workshop $workshop)
    {
        return response()->json($workshop);
    }

    public function update(Request $request, Workshop $workshop)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:workshops,code,' . $workshop->id,
            'owner_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'photo' => 'nullable|string',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'open_time' => 'nullable|date_format:H:i',
            'close_time' => 'nullable|date_format:H:i',
            'operational_day' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
        ]);

        $workshop->update($validated);

        return response()->json($workshop);
    }

    public function destroy(Workshop $workshop)
    {
        $workshop->delete();

        return response()->json(['message' => 'Workshop deleted']);
    }
}

