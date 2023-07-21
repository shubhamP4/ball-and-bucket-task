<?php

namespace App\Http\Controllers;
use App\Models\Ball;
use App\Models\Bucket;
use Illuminate\Http\Request;

class BucketSuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balls = Ball::all();
        return view('bucket_suggestion.create', compact('balls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Custom validation messages
        $customMessages = [
            'balls.*.required' => 'The quantity of each ball is required.',
            'balls.*.integer' => 'The quantity of each ball must be an integer.',
            'balls.*.min' => 'The quantity of each ball must be at least :min.',
        ];
        // Validate the request
        $request->validate([
            'balls.*' => 'required|integer|min:0', // Quantity of each ball in the request
        ], $customMessages);

        // Get the input values for each ball
        $ballQuantities = $request->input('balls');

        // Sort balls by size (smallest first)
        $sortedBalls = Ball::orderBy('size', 'asc')->get();

        // Initialize an array to hold ball placements
        $placements = [];

        // Iterate through the sorted balls and try to place them in buckets
        foreach ($sortedBalls as $ball) {
            $quantity = $ballQuantities[$ball->id] ?? 0;

            while ($quantity > 0) {
                // Find the bucket with the most empty volume that can accommodate this ball
                $bucket = Bucket::where('empty_volume', '>=', $ball->size)
                                ->orderByDesc('empty_volume')
                                ->first();

                if (!$bucket) {
                    break; // No bucket can accommodate this ball, break the loop
                }

                // Calculate the remaining empty volume of the bucket after placement
                $remainingEmptyVolume = $bucket->empty_volume - $ball->size;

                // Calculate the actual quantity of balls to place in the bucket (limited by remaining empty volume)
                $placedQuantity = min($quantity, floor($remainingEmptyVolume / $ball->size));

                // Place the balls in the bucket (many-to-many relationship using pivot table)
                $bucket->balls()->attach($ball->id, ['quantity' => $placedQuantity]);

                // Update the empty volume of the bucket
                $bucket->update(['empty_volume' => $remainingEmptyVolume]);

                // Update the remaining quantity of balls to place
                $quantity -= $placedQuantity;

                // Save the placement in the placements array for displaying later
                $placements[$bucket->id][$ball->color] = $placedQuantity;
            }
        }
        return view('result', compact('placements'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
