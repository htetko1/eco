<?php

namespace App\Http\Controllers;

use App\Models\flight;
use App\Http\Requests\StoreflightRequest;
use App\Http\Requests\UpdateflightRequest;

class FlightController extends Controller
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
     * @param  \App\Http\Requests\StoreflightRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreflightRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateflightRequest  $request
     * @param  \App\Models\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateflightRequest $request, flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(flight $flight)
    {
        //
    }
}
