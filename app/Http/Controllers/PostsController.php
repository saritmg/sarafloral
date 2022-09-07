<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
Use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Repository\Repository;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        
       
        //$posts=Post::all();
       // return Post::where('title', 'Post two')->get();
      //Alteranative method using sql by just using db
            // $posts =DB::select('Select * from posts');
           // $posts= Post::orderBy('title', 'desc')->paginate(1); //calling
           $posts= Post::orderBy('created_at', 'desc')->paginate(10);
           // $posts= Post::orderBy('title', 'asc')->take(1) ->get();
        return view('posts.index')->with('posts', $posts);
    }

     public function getPosts()
    {
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        return view('pages.blog_dashboard')->with('posts',$user->posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //load view
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *                                                                                 b v    v 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $id         =   base64_decode(Input::get('id'));


    
    $validator  =   array(
        'title'     =>  'required',
        'body'      =>  'required',
        );
    $validator  =   Validator::make(Input::all(),$validator);



    if($validator->fails()){       
        if(strlen($id)>0){
         return Redirect::route('postedit',$id)->withErrors($validator->messages())->withInput();
     }
     else{
         return Redirect::route('post.create')->withErrors($validator->messages())->withInput();
     }
 }
 else{

    $post=new Post();

    if(@strlen($id)>0){
        $post         =   Post::find($id);                  
        $msg        =   'Posts updated successfully !';    
    }
}
$post->title=$request->input('title');
$post->body=$request->input('body');
 $post->user_id = auth()->user()->id;
$picture = Input::file('cover_image');

    /*
    ------------------------------
     photo exists
    ------------------------------
    */
    
    if (($picture)) {         
        if ($picture->isValid()) {
            $dest = 'files/images/flower';
            $ext = $picture->getClientOriginalExtension();
            $filename = sha1(time()) . '.' . $ext;

            $post->cover_image= $dest . '/' . $filename;
            $picture->move($dest, $filename);
        } else {


            return redirect()->back()->withInput();
        }
    }
    $post->save();

            // Flash::success('Successfully saved!');
            

            return redirect('/posts')->with('success','Post Created');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        return view('posts.show')-> with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);

        //check for correct user
        if(auth()->user()->id !== $post->user_id){
        return redirect('/posts')-> with('error', 'Unauthorized Page');    
    }
     return view('posts.edit')-> with('post', $post);
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
          // $id         =   base64_decode(Input::get('id'));


    
    $validator  =   array(
        'title'     =>  'required',
        'body'      =>  'required',
        );
    $validator  =   Validator::make(Input::all(),$validator);



    if($validator->fails()){       
        if(strlen($id)>0){
         return Redirect::route('postedit',$id)->withErrors($validator->messages())->withInput();
     }
     else{
         return Redirect::route('post.create')->withErrors($validator->messages())->withInput();
     }
 }
 else{

    $post=new Post();

    if(@strlen($id)>0){
        $post         =   Post::find($id);                  
        $msg        =   'Posts updated successfully !';    
    }
}
$post->title=$request->input('title');
$post->body=$request->input('body');
 $post->user_id = auth()->user()->id;
$picture = Input::file('cover_image');

    /*
    ------------------------------
     photo exists
    ------------------------------
    */
    
    if (($picture)) {         
        if ($picture->isValid()) {
            $dest = 'files/images/flower';
            $ext = $picture->getClientOriginalExtension();
            $filename = sha1(time()) . '.' . $ext;

            $post->cover_image= $dest . '/' . $filename;
            $picture->move($dest, $filename);
        } else {


            return redirect()->back()->withInput();
        }
    }
    $post->save();


            return redirect('/posts')->with('success','Post Updated');
    
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);

        if($post->cover_image !='noimage.jpg'){
            //Delte Image
        Storage::delete('public/cover_images/'.$post->cover_image);

        }

        $post->delete();

        return redirect('/posts')->with('success','Post Deleted');
    }
}

//  dd($post);
