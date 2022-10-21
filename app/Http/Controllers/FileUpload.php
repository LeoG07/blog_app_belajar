<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class FileUpload extends Controller
{
    public function index()
    {
        return view('image');
    }

    public function fileupload(Request $req)
    {
        $req->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $fileModel = new image;
        if($req->image()) {
            $fileName = time().'_'.$req->image->getClientOriginalName();
            $destinationPath = 'images';
            $req->file->move(public_path($destinationPath), $fileName);
            // $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = $fileName;
            $fileModel->file_path = '/images/' . $fileName;
            $fileModel->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
    }
}