<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Inward;
use App\Models\StatusTrack;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Validator;

class InwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_text = $request->search_text;
        $paginate = $request->paginate ?? 0;
        $inward_status = $request->inward_status;
        $inwards = Inward::select('*')->with('task.client')->with('status_track')->latest();

        if ($inward_status) {

            $inwards->where(function ($query) use ($inward_status,$search_text) {

                $query_array = [];

                if ($inward_status) {
                    $query->where('status',$inward_status);
                }

                if ($search_text){
                    $query->where('mode_of_receive', 'LIKE', '%'.$search_text.'%');
                    $query->orwhere('fault', 'LIKE', '%'.$search_text.'%');
                    $query->orwhere('product_description', 'LIKE', '%'.$search_text.'%');
                }

            });

        }

        $inwards = $paginate ? $inwards->paginate() : $inwards->get();

        return response()->json([
            'inwards' => $inwards,
            'status' => 'SUCCESS',
            'message' => ''
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
            'mode_of_receive' => 'required',
            'product_id' => 'required'
        ]);

        if($validator->fails()){
            $errorString = implode(",", $validator->messages()->all());
            return response()->json([
                'status' => 'FAIL',
                'message' => $errorString //$validator->errors()->first()
            ]);
        }

        $inward = Inward::create([
            'external_id' => Uuid::uuid4()->toString(),
            'task_id' => $request->task_id,
            'mode_of_receive' => $request->mode_of_receive,
            'product_id' => $request->product_id,
            'product_description' => $request->product_description,
            'fault' => $request->fault,
            'barcode_scan' => $request->barcode_scan
        ]);

        return response()->json([
            'inward' => $inward,
            'status' => 'SUCCESS',
            'message' => 'Inward created successfull !']
            ,200
        );
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

    public function statusChange(Request $request)
    {
        $inward = Inward::find($request->inward_id);

        $inward->update(['status' => $request->status_id]);

        $status_track = new StatusTrack;
        $status_track->reason = $request->reason;
        $status_track->status = $request->status_id;
        $inward->status_track()->save($status_track);

        return response()->json([
            'task' => $inward,
            'status' => 'SUCCESS',
            'message' => 'Status updated successfully !']
            ,200
        );
    }
}
