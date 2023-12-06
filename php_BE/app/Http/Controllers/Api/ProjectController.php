<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $projects = Projects::where('id_user','=',$userId)
        ->get();
        return response()->json([
            'code'=>200,
            'data'=>$projects
        ]);
    }

    // public function index()
    // {
    //     $projects = Projects::all();
    //     return response()->json([
    //         'code' => 200,
    //         'data' => $projects
    //     ]);
    // }
    public function index1()
    {
        $userId = Auth::id();
        $projects1 = Projects::where('id_user', '=', $userId)->get();
        return response()->json([
            'code' => 200,
            'data' => $projects1
        ]);
    }


    public function listFavorites()
    {
        $userId = Auth::id();
        $project_favorites = Projects::where('project_favorites', '=', 1)->where('id_user', '=', $userId)->get();
        return response()->json([
            'code' => 200,
            'data' => $project_favorites
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        // Lấy id_user của người đăng nhập
        $data['id_user'] = Auth::id();

        // Tạo mới dự án
        $project = Projects::create($data);

        return response()->json([
            'code' => 200,
            'data' => $project
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Projects $project)
    {
        //
       
          return $project;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projects $project)
    {
        return response()->json([
            'code' => 200,
            'data' => $project->update($request->all())
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        if ($project->tasks()->count() > 0) {
            $project->tasks()->delete();
        }
        $project->delete();
        return response()->json(['message' => 'Xóa project thành công'],200);
    }
}
