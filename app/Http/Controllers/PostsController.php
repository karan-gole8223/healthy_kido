<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware ('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $post= DB::select('SELECT * FROM posts');   //this is normal SQL query to fetch data
       //$posts= Post::all()-> paginate(1); //here 1 means. one post per page
       
       //$posts= Post::all();     //this is eloquont laravel query to fetch data
        $posts = Post::orderBy('created_at','desc')->paginate(5); //get posts in ascending order and paginate 1 means one post per page
        //$posts = Post::orderBy('title','asc')->take(1)->get(); --it takes and show only one post
        //return Post::where('title','kali');->get(); returns only post with title kali
        return view ('posts.index')->with('posts',$posts);
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
        $this -> validate( $request,[
            'title'=> 'required',
            'body'=> 'required',
            'writer'=> 'required',
            'cover_image'=> 'image|nullable|max:1999'
        ]);

        //handle file uploading
        if($request->hasFile('cover_image'))
        {
             //get file with extension
             $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
             //get file name
             $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
             //get file extension
             $extension = $request->file('cover_image')->getClientOriginalExtension();
             //file name to store
             $fileNameToStore= $fileName.'_'.time().'.'.$extension;
             //upload image
             $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }
        //create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->writer = $request->input('writer');
        $post->user_id=auth()->user()->id;
        $post->cover_image = $fileNameToStore; 
        $post->save();
        return redirect('/posts')->with('success','Post created successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error','unathorized access attempt..!');  
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate( $request,[
            'title'=> 'required',
            'body'=> 'required',
            'writer'=> 'required'
        ]);
         //handle file uploading
         if($request->hasFile('cover_image'))
         {
              //get file with extension
              $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
              //get file name
              $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
              //get file extension
              $extension = $request->file('cover_image')->getClientOriginalExtension();
              //file name to store
              $fileNameToStore= $fileName.'_'.time().'.'.$extension;
              //upload image
              $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
         }
        //create post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->writer = $request->input('writer');
        if($request->hasFile('cover_image'))
        {
            $post->cover_image= $fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success','Post updated successfully...!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error','unathorized access attempt..!');
            
        }

        if($post->cover_image != 'noimage.jpg')
        {
            //deleting an image
            Storage::delete('/public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success','Post removed..!!');

    }
}
