<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $userId = Auth::id();
        $query1 = $request->input('query');
        $results = Tasks::leftJoin('projects', function ($join) {
            $join->on('tasks.id_project', '=', 'projects.id')
                ->whereNull('projects.deleted_at');
        })
            ->where(function ($query) use ($query1) {
                $query->where('tasks.task_name', 'like', "%{$query1}%")
                    ->orWhere('tasks.id_project','= ' ,null);
            })
            ->where(function ($query) use ($userId) {
                $query->where('tasks.id_user', $userId)
                    ->orWhereNull('tasks.id_user');
            })
            ->where('tasks.statusht',1)
            ->get(['tasks.*','projects.project_name']);
    
        return response()->json(
            [
                'status'=>200,
                'data'=>$results
            ]);
    }

    public function searchProject(Request $request)
    {
        $userId = Auth::id();
        $query = $request->input('query');
        $results = Projects::Where('projects.project_name', 'like', "%{$query}%")
            ->where('projects.id_user', '=', $userId)
            ->get();

        return response()->json([
            'status'=>200,
            'data'=>$results
        ]);
    }
}
