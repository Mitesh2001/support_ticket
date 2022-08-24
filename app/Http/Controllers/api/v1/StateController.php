<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Validator;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all('name','id');

        return response()->json([
            'states' => $states,
            'status' => 'SUCCESS',
            'message' => 'All states fatched successfully !'
        ]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:states',
        ]);

        if($validator->fails()){
            $errorString = implode(",", $validator->messages()->all());
            return response()->json([
                'status' => 'FAIL',
                'message' => $errorString
            ]);
        }

        $state = State::create(['name' => $request->name]);

        return response()->json([
            'state' => $state,
            'status' => 'SUCCESS',
            'message' => 'state created successfully !'
        ]);

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
        $state = State::find($id);

        $state -> update(['name' => $request->name]);

        return response()->json([
            'state' => $state,
            'status' => 'SUCCESS',
            'message' => 'state updated successfully !'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::find($id);

        $state -> delete();

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'state Removed successfully !'
        ]);
    }
}
