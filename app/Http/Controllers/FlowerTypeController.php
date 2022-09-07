<?php

namespace App\Http\Controllers;

use App\Flower;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Repository\Repository;

class FlowerTypeController extends Controller
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
       $data['flowers']=Flower::orderBy('created_at','desc')->get();
       return view('admin.flower.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flower.create');
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
        'name'     =>  'required',
        'short_desc'      =>  'required',
        'price'      =>  'required',
        );
    $validator  =   Validator::make(Input::all(),$validator);



    if($validator->fails()){       
        if(strlen($id)>0){
         return Redirect::route('floweredit',$id)->withErrors($validator->messages())->withInput();
     }
     else{
         return Redirect::route('flower.create')->withErrors($validator->messages())->withInput();
     }
 }
 else{

    $flower=new Flower();

    if(@strlen($id)>0){
        $flower         =   Flower::find($id);                  
        $msg        =   'Flower updated successfully !';    
    }
}
$flower->name=$request->input('name');
$flower->short_desc=$request->input('short_desc');
$flower->price=$request->input('price');
$picture = Input::file('flower_image');

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

            $flower->flower_image= $dest . '/' . $filename;
            $picture->move($dest, $filename);
        } else {


            return redirect()->back()->withInput();
        }
    }
    $flower->save();

            // Flash::success('Successfully saved!');
    return redirect()->to('flower');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flower  $flower
     * @return \Illuminate\Http\Response
     */
    public function show(Flower $flower)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flower  $flower
     * @return \Illuminate\Http\Response
     */
    public function edit(Flower $flower,$id)
    {
         $data['flowers']=DB::table('flower_types')->where([
            ['id','=',$id]
        ])->get();
        return view('admin.flower.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flower  $flower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flower $flower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flower  $flower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flower $flower)
    {
        //
    }

     public function delete($id){
       $id         =   $id;
       if($id){
        Flower::where('id','=',$id)->delete();

        $msg = "Flower deleted successfully !";
                                    // Session::flash('success-message', $msg);
    }

    return redirect()->to('flower');
}
}
