<?php

namespace App\Http\Controllers;

use App\Models\Bucket;
use Illuminate\Http\Request;

class BucketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buckets = Bucket::all();
        return view('bucket.index', compact('buckets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bucket.create');
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
            'bucket_name' => 'required',
            'capacity' => 'required|integer|min:1',
        ]);
        $bucket = Bucket::create([
            'bucket_name' => $request->input('bucket_name'),
            'capacity' => $request->input('capacity'),
            'empty_volume' => $request->input('capacity'), // Initially, empty volume equals capacity
        ]);

        return redirect()->route('buckets.index')->with('success', 'Bucket added successfully.');
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
    public function destroy(Bucket $bucket)
    {
         // Remove all balls associated with this bucket
         $bucket->balls()->detach();

         // Delete the bucket
         $bucket->delete();
 
         return redirect()->route('buckets.index')->with('success', 'Bucket deleted successfully.');
    }
}
