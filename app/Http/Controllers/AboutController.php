<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Repository\Repository;


class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        $data['about']=About::orderBy('created_at','desc')->get();
        return view('admin.about.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $id         =   base64_decode(Input::get('id'));

       $validator  =   array(
        'title'     =>  'required',       
        'description'      =>  'required', 
        

    );
       $validator  =   Validator::make(Input::all(),$validator);



       if($validator->fails()){       
        if(strlen($id)>0){
           return Redirect::route('about.edit',$id)->withErrors($validator->messages())->withInput();
       }
       else{
           return Redirect::route('about.create')->withErrors($validator->messages())->withInput();
       }
   }
   else{

    $about=new About();

    if(@strlen($id)>0){
        $about         =   About::find($id);                  
        $msg        =   'About updated successfully !';    
    }
}

    $about->title=$request->input('title');
    $about->description=$request->input('description');




$about->save();

            // Flash::success('Successfully saved!');
    //return Redirect::back();7
return redirect()->to('about');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about,$id)
    {
        $data['about']=DB::table('about')->where([
            ['id','=',$id]
        ])->get();
        return view('admin.about.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }

    public function delete($id){
       $id         =   $id;
       if($id){
        About::where('id','=',$id)->delete();

        $msg = "About deleted successfully !";
                                    // Session::flash('success-message', $msg);
    }

    return redirect()->to('about');
}
}
