<?php

namespace App\Http\Controllers;

use App\Models\Inward;
use Illuminate\Http\Request;

class InwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inward.index');
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
     * @param  \App\Models\Inward  $inward
     * @return \Illuminate\Http\Response
     */
    public function show(Inward $inward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inward  $inward
     * @return \Illuminate\Http\Response
     */
    public function edit(Inward $inward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inward  $inward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inward $inward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inward  $inward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inward $inward)
    {
        //
    }
}
