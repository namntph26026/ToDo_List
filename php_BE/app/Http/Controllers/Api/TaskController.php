<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Projects;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userId = Auth::id();
        $tasks = Tasks::leftJoin('projects', function ($join) {
            $join->on('tasks.id_project', '=', 'projects.id')
                ->whereNull('projects.deleted_at');
        })
            ->where(function ($query) {
                $query->where('tasks.id_project', '=', '')
                    ->orWhereNull('tasks.id_project');
            })
            ->where(function ($query) use ($userId) {
                $query->where('tasks.id_user', '=', $userId)
                    ->orWhereNull('tasks.id_user');
            })
            ->where('tasks.statusht',1)
            ->get(['tasks.*']);

        // $tasks = Tasks::where('id_project','=','')
        // -> where('id_user','=',$userId);
        return response()->json([
            'code' => 200,
            'data' => $tasks
        ]);
    }

    public function listTask()
    {
        //
        $userId = Auth::id();
        $tasks = Tasks::leftJoin('projects', function ($join) {
            $join->on('tasks.id_project', '=', 'projects.id')
                ->whereNull('projects.deleted_at');
        })
            ->where(function ($query) use ($userId) {
                $query->where('tasks.id_user', '=', $userId)
                    ->orWhereNull('tasks.id_user');
            })
            ->where('tasks.statusht',1)
            ->get(['tasks.*']);

        // $tasks = Tasks::where('id_project','=','')
        // -> where('id_user','=',$userId);
        return response()->json([
            'code' => 200,
            'data' => $tasks
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $data['id_user']= Auth::id();
        $task =  Tasks::create($data);
        return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $task)
    {
        //
        if (!empty($task)) {
            $id_task = $task->id;
            $userId = Auth::id();
            $data = Comments::where('id_user', '=', $userId)
                ->where('id_task', '=', $id_task)
                ->with('user') // Tải thông tin người dùng liên quan
                ->get();

            $task['comment_list'] = $data;
        }
        return $task;
    }

    public function findByprojectId(Request $request, $id_project)
    {
        $project = Tasks::where('id_project', $id_project)
        ->where('statusht',1)
        ->get();
        return response()->json([
            'code' => 200,
            'data' => $project
        ]);
    }

    public function listgetdate()
    {
        $userId = Auth::id();
        $listdate = Tasks::where('id_user','=',$userId)
        ->where('deadline',DB::raw('CURDATE()'))
        ->where('statusht','=',1)
        ->get();
        return response()->json([
            'code' => 200,
            'data' => $listdate
        ]);
    }

    public function getProjectsTaskCount()
    {
        $userId = Auth::id();
        $projects = Projects::where('id_user', '=', $userId)->get();

        $projectTaskCounts = [];
        foreach ($projects as $project) {
            $taskCount = Tasks::where('id_project', $project->id)->where('statusht','=',1)->count();
            $projectTaskCounts[] = [
                'project' => $project,
                'task_count' => $taskCount
            ];
        }
    
        return response()->json(['project_task_counts' => $projectTaskCounts],200);
    }

    public function getProjectsTaskFavoritesCount()
    {
        $userId = Auth::id();
        $projects = Projects::where('project_favorites', '=', 1)->where('id_user', '=', $userId)->get();

        $projectTaskFavoritesCounts = [];
        foreach ($projects as $project) {
            $taskCount = Tasks::where('id_project', $project->id)->where('statusht','=',1)->count();
            $projectTaskFavoritesCounts[] = [
                'project' => $project,
                'task_count' => $taskCount
            ];
        }
    
        return response()->json(['project_task_favorites_counts' => $projectTaskFavoritesCounts],200);
    }

    
    public function getProjectsTaskInboxCount()
    {
        $userId = Auth::id();
            $taskCount = Tasks::where('id_project','=', null)->where('id_user','=',$userId)->where('statusht','=',1)->count();
        return response()->json(['task_count' => $taskCount],200);
    }

    public function getProjectsTaskTodayCount()
    {
        $userId = Auth::id();
            $taskCount = Tasks::where('deadline',DB::raw('CURDATE()'))->where('id_user','=',$userId)->where('statusht','=',1)->count();
        return response()->json(['task_count' => $taskCount],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $task)
    {
        //
        return $task->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        if ($task->comments()->count() > 0) {
            $task->comments()->delete();
        }
        $task->delete();
        return response()->json(['message' => 'Xóa task và các comment thành công'],200);
    }
}
