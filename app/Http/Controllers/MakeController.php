<?php

namespace App\Http\Controllers;

use App\Make;
use App\make_year;
use App\Http\Resources\Make as MakeResource;
use Illuminate\Http\Request;

class MakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */

    //GETS MAKES BASED ON THE YEAR SELECTED-------------------------------------------------
    public function show(Request $request, make_year $make_year, Make $make)
    {
        $make_ids = $make_year->where('year_id', $request->input('year_id'))->pluck('make_id');
        $makes = $make->wherein('id', $make_ids)->get();

        return MakeResource::collection($makes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function edit(Make $make)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Make $make)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function destroy(Make $make)
    {
        //
    }
}
