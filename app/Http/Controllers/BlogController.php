<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        $posts = DB::table('users') 
            ->join ( 'posts' , 'users.id', '=', 'posts.user_id')->latest('posts.created_at')
            
            ->paginate(5);
            // ->get();

        
        // $posts = Post::latest()->paginate(2);
        return view('blog.index',compact('posts'));
    }
        // $posts = Post::latest()->paginate(5);
        // $nama = "asimili";
        

            // foreach ($query as $row) {
            //     $nama = $row->name;
            // };
         
        
            // ->with('i', (request()->input('page', 1) - 1) * 5);
   

  
    public function show($id)
    {
        $post = $id;

        $posts = DB::table('posts')
                ->where('id', '=', $id)
                ->get();

        $user = DB::table('users') 
            ->join ( 'posts' , 'users.id', '=', 'posts.user_id')
            ->where('posts.id', '=', $id)
            ->get();
        // echo var_dump($users);

        // $comments = DB::table('posts')
        //         ->where('id', '=', $id)
        //         ->get();

        $comments = DB::table('comment')
        ->select('*')
        ->where('post_id', '=', $id)
        ->where('comment_approve', '=', 1)
        ->get();

        $image = DB::table('posts') 
            ->join ( 'images' , 'posts.id', '=', 'images.post_id')
            ->where('post_id', '=', $id)
            ->get();

        return view('blog.post.post',compact('posts', 'comments', 'post', 'image', 'user'));
    }

   
    public function comment (Request $request)
        {
            $request->validate([

                'name' => 'required',
                'email' => 'required',
                // 'comment' => 'required'
                // 'post_id' => 'required'

            ]);
        
            DB::table('comment')-> insert([
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
                'post_id' => $request->post_id,
                'created_at' => $request->created_at,
            ]);
        
            // return redirect()->route('home')->with('success', 'Komentar Berhasil. Silahkan Cek!!!');
            return back()->withInput();

        }

        // public function showcomment($id)
        // {
        // $post = $id;

        // $posts = DB::table('comment')
        //         ->where('id', '=', $id)
        //         ->get();
        // // echo var_dump($users);
        // return view('blog.post.post',compact('posts'));
        // }

        public function test($id)
        {
            $id;
            echo $id;
        }
}