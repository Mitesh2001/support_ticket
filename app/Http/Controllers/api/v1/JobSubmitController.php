<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\StatusTrack;
use App\Models\User;
use Illuminate\Http\Request;

class JobSubmitController extends Controller
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
        $job = Job::find($request->job_id);

        if ($job->status == 4) {

            return response()->json([
                'status' => 'FAIL',
                'message' => 'Job Already submited !'
            ],201);
        }

        $image = "";

        if($request->hasFile('image')){

            $name  = 'job_submit';

            $pic_name = $name ."_". time() .".". $request->image->extension();
            $path = 'storage/assets/job_submits/';
            $profile_pic_name = User::createImageFromBase64($request->image, $pic_name, $path);
            $image = $profile_pic_name;

        }

        $jobsubmit = $job->jobSubmit()->create([
            'job_date' => $request->job_date,
            'dignosys' => $request->dignosys,
            'job_id' => $request->job_id,
            'action_taken' => $request->action_taken,
            'task_type' => $request->task_type,
            'is_bike' => $request->is_bike,
            'is_outdoor' => $request->is_outdoor,
            'total' => $request->total,
            'expensive' => $request->expensive,
            'image' => $image
        ]);

        // job status change

        $job->status = 4;

        $job->save();

        $status_track = new StatusTrack;
        $status_track->reason = "Job submitted !";
        $status_track->status = 4;
        $job->status_track()->save($status_track);

        // -------------------------

        // job task status change

        $task = $job->task;
        $task_jobs = $task->jobs;
        $task_submit = true;
        foreach ($task_jobs as $key => $job) {
            if ($job->status != 4) {
                $task_submit = false;
            }
        }
        if ($task_submit) {
            $task->status = 4;
            $task->save();

            $status_track = new StatusTrack;
            $status_track->reason = "All Job submitted !";
            $status_track->status = 4;
            $task->status_track()->save($status_track);
        }

        // ----------------------------

        return response()->json([
            'status' => 'SUCCESS',
            'data' => ['job_details' => $job],
            'message' => 'Job submited successfully !'
        ],201);
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
}
