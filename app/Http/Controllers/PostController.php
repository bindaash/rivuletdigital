<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
  
        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
            //'image' =>  'required'
        ]);
        $file = request()->file('image');
        if(!empty($file))
        {
            $filename = $file->getClientOriginalName();
            $fileext = $file->getClientOriginalExtension();
            $filesize = $file->getSize();
            $file_temp = $file->getRealPath();
            $extension=array('jpg','jpeg','png');
            if($filesize > 10485760 || $filesize==0){
            }
            if(in_array($fileext,$extension)==false){
            }
            if(empty($errors))
            {
                $filename= preg_replace('/[^A-Za-z0-9]/', "", $filename);
                $filename=$filename.".".$fileext;
                $path = base_path() . '/public/storage/posts';
               
                if(!\File::isDirectory($path)){
                    \File::makeDirectory($path, 0777, true, true); 
                }
                $file->move($path,$filename);
                $request = new Request($request->all());
                $request->merge([
                    'image' => $filename,
                ]);
            }
        }
  
        Post::create($request->all());
   
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$posts = Post::all();
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $file = $request->file('image');
        if(!empty($file))
        {
            $filename = $file->getClientOriginalName();
            $fileext = $file->getClientOriginalExtension();
            $filesize = $file->getSize();
            $file_temp = $file->getRealPath();
            $extension=array('jpg','jpeg','png');
            if($filesize > 10485760 || $filesize==0){
            }
            if(empty($errors))
            {
                $filename= preg_replace('/[^A-Za-z0-9]/', "", $filename);
                $filename=$filename.".".$fileext;
                $path = base_path() . '/public/storage/posts';
                if(!\File::isDirectory($path)){
                    \File::makeDirectory($path, 0777, true, true); 
                }
                $file->move($path,$filename);
                $request = new Request($request->all());
                $request->merge([
                    'image' => $filename,
                ]);
            }
        }
  
        $post->update($request->all());
  
        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
}
