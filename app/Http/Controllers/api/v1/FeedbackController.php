<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

use function GuzzleHttp\Promise\all;

class FeedbackController extends Controller
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
        $status = $request->status;
        $complaint_type = $request->complaint_type;
        $feedbacks = Feedback::select('*')->with('client')->with('complainTypeDetails')->latest();

        if($complaint_type){

            $feedbacks->where(function ($query) use ($complaint_type)
            {
                if ($complaint_type) {
                    $query->where('complaint_type',$complaint_type);
                }
            });

        } else if ($status || $search_text) {

            $feedbacks->where(function ($query) use ($search_text,$status)
            {
                $query->where('status',$status);

                if ($search_text) {
                    $query->where('feedback', 'LIKE', '%'.$search_text.'%');
                }

            });

        }

        $feedbacks = $paginate ? $feedbacks->paginate() : $feedbacks->get();

        return response()->json([
            'feedbacks' => $feedbacks,
            'status' => 'SUCCESS',
            'message' => 'All Feedback Fetched']
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
        $feedback = Feedback::create([
            'external_id' => Uuid::uuid4()->toString(),
            'client_id' => $request->client_id,
            'feedback' => $request->feedback,
            'complaint_type' => $request->complaint_type,
            'user_id' => auth()->id()
        ]);


        return response()->json([
            'feedback' => $feedback,
            'status' => 'SUCCESS',
            'message' => 'Feedback saved !']
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
        $feedback = Feedback::find($request->feedback_id);
        $feedback->status = $request->status_id;
        $feedback->save();

        return response()->json([
            'feedback' => $feedback,
            'status' => 'SUCCESS',
            'message' => 'Status updated successfully !']
            ,200
        );
    }

}
