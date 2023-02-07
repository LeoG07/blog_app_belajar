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

        $posts = DB::table('posts') 
            
            ->join ( 'comment' , 'posts.id', '=', 'comment.post_id')->latest('posts.created_at')
            ->where('comment.comment_approve', '=', null)
            ->paginate(5);

        $posts2 = DB::table('posts') 
            
            ->join ( 'comment' , 'posts.id', '=', 'comment.post_id')->latest('posts.created_at')
            ->where('comment.comment_approve', '=', 1)
            ->paginate(5);

        $posts3 = DB::table('posts') 
            
            ->join ( 'comment' , 'posts.id', '=', 'comment.post_id')->latest('posts.created_at')
            ->where('comment.comment_approve', '=', 2)
            ->paginate(5);
          
        $comments = DB::table('comment') 
            ->select ('*')
            ->get();


        return view('admin.posts.comment', compact('posts' , 'comments', 'posts2', 'posts3'));
    }

 public function approve(Request $request, $id)
    {
        DB::table('comment')
              ->where('id', $request->input('comment_approve'))
              ->update(['comment_approve' => 1]);

               return back()->withInput()->with('success, Approve updated successfully');
       
    }
 public function reject(Request $request, $id)
    {
        DB::table('comment')
              ->where('id', $request->input('comment_approve'))
              ->update(['comment_approve' => 2]);

               return back()->withInput()->with('success, Reject updated successfully');
       
    }

 public function pending(Request $request, $id)
    {
        DB::table('comment')
              ->where('id', $request->input('comment_approve'))
              ->update(['comment_approve' => Null]);

               return back()->withInput()->with('success, Pending updated successfully');
       
    }

 public function destroy(Request $request, $id)
    {
        $id->delete();

        return redirect()->route('posts.comment')
                        ->with('success','Post deleted successfully');
    }
}