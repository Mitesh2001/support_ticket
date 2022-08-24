<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\v1\TaskController;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Task;
use Illuminate\Http\Request;

class Data
{
    public $total;
    public $counts;
}

class Counts
{
    public $StatusId;
    public $statusTitle;
    public $counts;
}

class DashboardController extends Controller
{

    public $status_titles = [
        1 => "open",
        2 => "re_open",
        3 => "hold",
        4 => "close"
    ];

    public function countData($model)
    {
        $total = 0;
        $counts = [];
        for ($i=1; $i <= 4; $i++) {
            $taskCounts = new Counts();
            $taskCounts->StatusId = $i;
            $taskCounts->statusTitle = $this->status_titles[$i];
            $taskCounts->counts = $model::where('status',$i)->count();
            $total += $taskCounts->counts;
            $counts[] = $taskCounts;
        }
        $tasks = new Data();
        $tasks->total = $total;
        $tasks->counts = $counts;
        return $tasks;
    }

    public function dashboard()
    {
        return response()->json([
            'tasks' => $this->countData('App\Models\Task'),
            'jobs' => $this->countData('App\Models\Job'),
            'status' => 'SUCCESS',
            'message' => 'Dashboard data fetched !']
            ,200
        );
    }

}
