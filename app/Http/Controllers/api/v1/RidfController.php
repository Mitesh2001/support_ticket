<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Inward;
use App\Models\product;
use App\Models\RIDF;
use App\Models\StatusTrack;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class RidfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = $request->paginate ?? 0;
        $ridf_status = $request->ridf_status;
        $search_text = $request->search_text;
        $ridfs = RIDF::select('*')->with('inward.task.client')->with('status_track')->with('product')->latest();

        if ($ridf_status) {

            $ridfs->where(function ($query) use ($ridf_status,$search_text) {

                $query->where('status',$ridf_status);

                if ($search_text){

                    $query->whereHas('product',function ($query) use ($search_text)
                    {
                        $query->where('name', 'like', '%'.$search_text.'%');
                    });

                }

            });

        }

        if ($paginate) {
            $ridfs = $ridfs->paginate();
        } else {
            $ridfs = $ridfs->get();
        }

        return response()->json([
            'ridfs' => $ridfs,
            'status' => 'SUCCESS',
            'message' => '']
            ,200
        );
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
        $ridf = RIDF::create([
            'external_id' => Uuid::uuid4()->toString(),
            'inward_id' => $request->inward_id,
            'product_id' => $request->product_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'barcode_scan' => $request->barcode_scan,
            'status' => $request->status_type
        ]);

        $product = product::find($request->product_id);
        $qty = $product->quantity;
        $product->quantity = ($qty-1);
        $product->save();

        $inward = Inward::find($request->inward_id);
        $inward->update(['status' => 2]);
        $status_track = new StatusTrack;
        $status_track->reason = "RIDF created";
        $status_track->status = 2;
        $inward->status_track()->save($status_track);

        return response()->json([
            'ridf' => $ridf,
            'status' => 'SUCCESS',
            'message' => 'RIDF created successfully !']
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
        $ridf = RIDF::find($request->ridf_id);

        $ridf->update(['status' => $request->status_id]);

        $status_track = new StatusTrack();
        $status_track->reason = $request->reason;
        $status_track->status = $request->status_id;
        $ridf->status_track()->save($status_track);

        return response()->json([
            'task' => $ridf,
            'status' => 'SUCCESS',
            'message' => 'Status updated successfully !']
            ,200
        );
    }

}
