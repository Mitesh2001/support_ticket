<?php

namespace App\Http\Controllers;

use App\Models\RIDF;
use Illuminate\Http\Request;

class RidfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ridf.index');
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
     * @param  \App\Models\RIDF  $rIDF
     * @return \Illuminate\Http\Response
     */
    public function show(RIDF $rIDF)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RIDF  $rIDF
     * @return \Illuminate\Http\Response
     */
    public function edit(RIDF $rIDF)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RIDF  $rIDF
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RIDF $rIDF)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RIDF  $rIDF
     * @return \Illuminate\Http\Response
     */
    public function destroy(RIDF $rIDF)
    {
        //
    }
}
