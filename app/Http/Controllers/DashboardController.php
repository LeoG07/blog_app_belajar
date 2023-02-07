<?php
 
namespace App\Http\Controllers;
 
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class DashboardController extends Controller
{

    public function index()
    {
    $data['users'] = DB::table('users')->count();
    $data['posts'] = DB::table('posts')->count();
    $data['comment'] = DB::table('comment')->count();
    return view('admin.index', compact('data'));
    }
}