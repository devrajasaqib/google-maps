<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marker;
use Illuminate\Support\Facades\Log;

class MarkerController extends Controller {

    /**
     * Display a listing of all markers.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Exception
     */
    public function index() {
        try {
            $markers = Marker::all();
            return response()->json($markers);

        } catch(\Exception $e) {
            Log::error('Error retrieving markers: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['error' => 'An error occurred while retrieving the markers'], 500);
        }
    }
    
    /**
     * Store a newly created marker in the database.
     *
     * This method accepts a POST request with latitude and longitude parameters
     * and stores the marker information in the database. It validates the input
     * data to ensure that latitude and longitude are numeric and required. Upon
     * successful storage, it logs the event and returns a success message.
     * If there is an error during the process, it logs the exception and returns
     * an error response.
     *
     * @param \Illuminate\Http\Request $request The incoming HTTP request containing
     * the marker data.
     * @return \Illuminate\Http\JsonResponse A JSON response indicating the result
     * of the operation. On success, returns
     * a message with HTTP status 201. On failure,
     * returns an error message with HTTP status 500.
     *
     * @throws \Illuminate\Validation\ValidationException If the validation fails.
     * @throws \Exception If an unexpected error occurs during the execution.
     */
    public function store(Request $request) {
        try {
            $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            $marker = new Marker();
            $marker->latitude = $request->latitude;
            $marker->longitude = $request->longitude;
            $marker->save();

            return response()->json(['message' => 'Marker saved successfully']);
        } catch(\Exception $e) {
            Log::error('Error saving marker: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['error' => 'An error occurred while saving the marker'], 500);

        }
    }
}
