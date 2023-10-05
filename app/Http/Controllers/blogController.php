<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function index() {
        return view('index',[
            'blogs' => Blog::latest()->filter(request(['tag','search']))->get()
        ]);
    }

    public function myBlogs($id) {
        return view('userBlogs',[
            'blogs' => Blog::where('user_id', $id)->get()
        ]);
    }
    public function showPage ($id) {
        return view('show',[
            'blog' => Blog::find($id)
        ]);
    }
    public function editPage ($id) {
        return view('edit',[
            'blog' => Blog::find($id)
        ]);
    }
    public function createBlogPage() {
        return view('create');
    }   
    public function create(Request $request) {
        $addBlog = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'image' => 'required|mimes:png,jpg',
            'content' => 'required',
            'user_id'=> 'required'
        ]);
        
        $imageName = uniqid().'.'. $request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        Blog::create([
            'title' => $request->input('title'),
            'tags' => $request->input('tags'),
            'image' => $imageName,
            'content' => $request->input('content'),
            'user_id'=> $request->input('user_id')
        ]);
        return redirect('/');
    }  

    public function edit(Request $request , $id) {
        $addBlog = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'image' => 'required|mimes:png,jpg',
            'content' => 'required',
            'user_id'=> 'required'
        ]);
        
        $imageName = uniqid().'.'. $request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        Blog::where('id',$id)->update([
            'title' => $request->input('title'),
            'tags' => $request->input('tags'),
            'image' => $imageName,
            'content' => $request->input('content'),
            'user_id'=> $request->input('user_id')
        ]);
        return redirect('/');
    }  
    public function deleteBlog ($id) {
        Blog::where('id',$id)->delete();
        return redirect('/');
    }
    
}
