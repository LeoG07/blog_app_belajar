<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Post;

class CommentController extends Controller
{
 public function index()
    {

        $posts = DB::table('comment') 
            
            ->join ( 'posts' , 'comment.post_id', '=', 'posts.id')->latest('posts.created_at')
            ->paginate(5);
          
        $comments = DB::table('comment') 
            ->select ('*')
            ->get();


        return view('admin.posts.comment', compact('posts' , 'comments'));
    }

 public function update(Request $request, $id)
    {
        DB::table('comment')
              ->where('id', $request->input('comment_approve'))
              ->update(['comment_approve' => 1]);
       
    }
}