<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
 

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        
        return view("posts.index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|string",
            "description"=>"required|string",
            "image"=>"required|array"
        ]);
        $images=array();
        
        if($files=$request->file("image")){
            foreach($files as $file){
            $imageN=$file->getClientOriginalName()."-".time().".".$file->getClientOriginalExtension();
            $imageName=$imageN;
            $file->move(public_path("/images/posts"),$imageN);
            $images[]=$imageName;

            }
        
        }
        Post::create([
            "title"=>$request->title,
            "description"=>$request->description,
            /*"image"=>implode("|",$images)*/
            'image'=>$images
        ]);
        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $images=array();
        
        if($files=$request->file("image")){
            $request->validate([
                "title"=>"required|string",
                "description"=>"required|string",
                "image"=>"required|array"
            ]);
            foreach($files as $file){
            $imageN=$file->getClientOriginalName()."-".time().".".$file->getClientOriginalExtension();
            $imageName=$imageN;
            $file->move(public_path("/images/posts"),$imageN);
            $images[]=$imageName;

            }
            /*$x = explode ("|", $post->image);*/
            $x=$post->image;
            foreach($x as $val){
             $image_path=public_path("/images/posts/".$val);
             if(file_exists($image_path))
              {
               unlink($image_path);
              }
            }
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                /*"image"=>implode("|",$images)*/
                "image"=>$images
    
            ]);
        }else{
            $request->validate([
                "title"=>"required|string",
                "description"=>"required|string"
            ]);
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

        }
 
        return redirect()->route('posts.index'); 
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize("manageUser",User::class);
            /*$x = explode ("|", $post->image);*/
            $x=$post->image;
            foreach($x as $val){
             $image_path=public_path("/images/posts/".$val);
             if(file_exists($image_path))
              {
               unlink($image_path);
              }
            }
        
        $post->delete();
        return redirect()->route('posts.index');
    }
}
