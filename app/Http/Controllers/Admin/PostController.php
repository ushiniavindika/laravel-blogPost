<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\PostFormRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status','0')->get();
        return view('admin.post.create',compact('category'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(PostFormRequest $request)
    {
            //
            $data = $request->validated();
    
            $post = new Post;
            $post->category_id = $data['category_id'];
            $post->title = $data['title'];
            $post->slug= $data['slug'];
            $post->description = $data['description'];

            if($request->hasfile('image')){
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/category/',$filename);
                $post->image = $filename;
                } 
    
            $post->status = $request->status == true? '1':'0';
            $post->created_by = Auth::user()->id;
            $post->save();
    
            return redirect('admin/posts')->with('message','Post Added Successfully');
        }
    
     
     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $category = Category::where('status','0')->get();
        $post = Post::find($post_id);
        return view('admin.post.edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $post_id)
    {
        //
        $data = $request->validated();
    
        $post = Post::find($post_id);
        $post->category_id = $data['category_id'];
        $post->title = $data['title'];
        $post->slug= $data['slug'];
        $post->description = $data['description'];

        if($request->hasfile('image')){

            $destination = 'uploads/category/'.$post->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/',$filename);
            $post->image = $filename;
            } 

        $post->status = $request->status == true? '1':'0';
        $post->created_by = Auth::user()->id;
        $post->update();

        return redirect('admin/posts')->with('message','Post Updated Successfully');
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        if($post)
        {
            $destination = 'uploads/category/'.$post->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $post->delete();
            return redirect('admin/posts')->with('message','Post Deleted Successfully');
        }
        else
        {
            return redirect('admin/posts')->with('message','No Post ID found');
        }
    }
}
