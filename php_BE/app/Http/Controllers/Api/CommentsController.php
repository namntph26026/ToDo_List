<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CommentsController extends Controller
{
    //
    public function addComment(Request $request)
    {
        $data = $request->all();
        $data['id_user'] = Auth::id();
        $comment = Comments::create($data);

        return response()->json($comment, 201);
    }

    public function editComment(string $id){
        $comment = Comments::find($id);
        return $comment;
    }

    public function updateComment(string $id, Request $request){
        $comment = Comments::find($id);
        $comment->update($request->all());
        return response()->json($comment, 201);
    }


    // public function listcomment(){
    //     $userId = Auth::id();
    //     $data=Comments::where('id_user','=',$userId)
    //     ->where('id_task','=',)
    //     ->get();
    //     return response()->json([
    //         'code'=>200,
    //         'data'=>$data
    //     ]) ;
    // }
}
