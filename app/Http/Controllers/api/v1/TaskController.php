<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\StatusTrack;
use App\Models\Task;
use App\Models\TaskType;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class TaskController extends Controller
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
        $task_type = $request->task_type;
        $task_status = $request->task_status;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $order = $request->order;
        $tasks = Task::select('*')->with('client')->with('status_track')->with('taskType');

        return $tasks->get();

        $order == "all" ? $tasks->latest() : $tasks->orderBy('name');

        if ($start_date || $end_date) {
            $tasks->where(function ($query) use ($start_date,$end_date)
            {
                if ($start_date) {
                    $query->where('created_at','>=',date('Y-m-d',strtotime($start_date)));
                }
                if ($end_date) {
                    $query->where('created_at','<=',date('Y-m-d',strtotime($end_date)));
                }
            });
        }

        if ($task_type) {

            $tasks->where(function ($query) use ($task_type,$task_status) {
                if ($task_type) {
                    $query->where('type_id', $task_type);
                }
            });

        } else if ($search_text || $task_status) {

            $tasks->where(function ($query) use ($search_text, $task_status) {

                if ($search_text) {
                    $query->where('complain_details', 'LIKE', '%'.$search_text.'%');
                    $query->orwhere('name', 'LIKE', '%'.$search_text.'%');
                }

                if ($task_status) {
                    $query->where('status',$task_status);
                }
            });

        }

        if ($paginate) {
            $tasks = $tasks->paginate();
        } else {
            $tasks = $tasks->get();
        }

        foreach ($tasks as $key => $task) {
            $task->task_status = $task->status;
            unset($task->status);
        }

        return response()->json([
            'tasks' => $tasks,
            'status' => 'SUCCESS',
            'message' => 'Task data fetched !']
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
        $client = Client::find($request->client_id);

        $task = $client->tasks()->create([
            'external_id' => Uuid::uuid4()->toString(),
            'name' => $request->name,
            'type_id' => $request->type,
            'complain_details' => $request->complain_details
        ]);

        return response()->json([
            'task' => $task,
            'status' => 'SUCCESS',
            'message' => 'Task created successfully !']
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
        $task = Task::find($request->task_id);

        $status_track = new StatusTrack;
        $status_track->reason = $request->reason;
        $status_track->status = $request->status_id;

        $task->status_track()->save($status_track);

        $task->update(['status' => $request->status_id]);

        return response()->json([
            'task' => $task,
            'status' => 'SUCCESS',
            'message' => 'Status updated successfully !']
            ,200
        );
    }

    public function allTaskTypes()
    {
        $types = TaskType::select('id','title')->get()->toArray();
        return response()->json([
            'types' => $types,
            'status' => 'SUCCESS',
            'message' => '']
            ,200
        );
    }

    public function inwardAbleTasksList()
    {
        $types = Task::select('id','name','status')->where('status',1)->orwhere('status',2)->get();
        return response()->json([
            'types' => $types,
            'status' => 'SUCCESS',
            'message' => '']
            ,200
        );
    }

}
