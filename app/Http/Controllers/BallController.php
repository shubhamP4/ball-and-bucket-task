<?php

namespace App\Http\Controllers;
use App\Models\Ball;
use Illuminate\Http\Request;

class BallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balls = Ball::all();
        return view('ball.index', compact('balls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ball.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'color' => 'required|string|max:255',
            'size' => 'required|integer|min:1',
        ]);

        Ball::create([
            'color' => $request->input('color'),
            'size' => $request->input('size'),
        ]);

        return redirect()->route('balls.index')->with('success', 'Ball added successfully.');
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
    public function destroy(Ball $ball)
    {
        // Remove the ball from all buckets
        $ball->buckets()->detach();

        // Delete the ball
        $ball->delete();
        return redirect()->route('balls.index')->with('success', 'Ball deleted successfully.');
    }
}
