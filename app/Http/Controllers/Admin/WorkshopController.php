<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Workshop::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
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

        try {
            $workshop = Workshop::create($validated);
            return response()->json([
                'message' => 'Workshop berhasil disimpan',
                'data' => $workshop
            ], 201);

        } catch (QueryException $e) {
            Log::error('Gagal insert workshop', [
                'error' => $e->getMessage(),
                'data' => $validated,
            ]);

            return response()->json([
                'error' => 'Gagal menyimpan data workshop',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {
        return response()->json($workshop);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
        $users = User::all();
//        return view('workshops.edit', compact('workshop', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {
        $workshop->delete();
        return response()->json(['message' => 'Workshop deleted']);
    }

    public function destroySelected(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:workshops,id',
        ]);

        Workshop::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Workshops deleted.']);
    }
}
