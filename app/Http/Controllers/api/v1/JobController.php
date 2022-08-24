<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Task;
use App\Models\User;
use App\Notifications\supportNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Ramsey\Uuid\Uuid;

class JobCounts
{
    public $jobStatusId;
    public $statusTitle;
    public $counts;
}

class JobController extends Controller
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
        $status = $request->job_status;
        $assign = $request->assign;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $client_id = $request->client_id;

        $jobs = Job::select('*')->with([
            'task.client',
            'asignee' => function ($query)
            {
                $query->select('id','first_name','last_name','email','mobile_number','state_id','city_id','address');
            },
            'status_track'
        ])->latest();

        if ($start_date ||$end_date ) {

            $jobs->where(function ($query) use ($start_date,$end_date,$status) {
                if ($start_date) {
                    $query->where('date','>=',date('Y-m-d',strtotime($start_date)));
                }
                if ($end_date) {
                    $query->where('date','<=',date('Y-m-d',strtotime($end_date)));
                }
                if ($status) {
                    $query->where('status', $status);
                }
            });

        } else if ($status || $search_text) {

            $jobs->where(function ($query) use ($search_text,$status) {

                if ($search_text) {
                    $query->where('instruction', 'LIKE', '%'.$search_text.'%');
                }

                if ($status) {
                    $query->where('status', $status);
                }

            });

        }

        if (!empty($assign)) {
            $jobs->where('assign', $assign);
        }

        if (!empty($client_id)) {
            $jobs->whereHas('task',function (Builder $query) use ($client_id)
            {
                $query->where('client_id',$client_id);
            });
        }

        if ($paginate) {
            $jobs = $jobs->paginate();
        } else {
            $jobs = $jobs->get();
        }

        foreach ($jobs as $key => $job) {
            $job->job_status = $job->status;
            unset($job->status);
        }

        return response()->json([
            'jobs' => $jobs,
            'status' => 'SUCCESS',
            'message' => 'Job data fetched !']
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
        $task = Task::find($request->task_id);

        $job = $task->jobs()->create([
            'external_id' => Uuid::uuid4()->toString(),
            'date' => $request->date,
            'end_date' => $request->end_date,
            'instruction' => $request->instruction,
            'assign' => $request->assign
        ]);

        $data['message'] = "Job is aasigned to you !";
        $assignee  = User::find($request->assign);
        Notification::send($assignee,new supportNotification($data));

        unset($job->status);

        return response()->json([
            'job' => $job,
            'status' => 'SUCCESS',
            'message' => 'Job created successfully !']
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
        $job = Job::find($request->job_id);
        $job->update(['status' => $request->status_id]);
        return response()->json([
            'task' => $job,
            'status' => 'SUCCESS',
            'message' => 'Status updated successfully !']
            ,200
        );
    }

}
