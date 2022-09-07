<?php

namespace App\Http\Controllers;

use App\Occasion;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Repository\Repository;

class OccasionController extends Controller
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
        $data['occasion']=Occasion::orderBy('created_at','desc')->get();
        return view('admin.occasion.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.occasion.create');
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
        'oc_title'     =>  'required',
        'short_desc'      =>  'required'
        );
    $validator  =   Validator::make(Input::all(),$validator);



    if($validator->fails()){       
        if(strlen($id)>0){
         return Redirect::route('occasionedit',$id)->withErrors($validator->messages())->withInput();
     }
     else{
         return Redirect::route('occasion.create')->withErrors($validator->messages())->withInput();
     }
 }
 else{

    $occasion=new Occasion();

    if(@strlen($id)>0){
        $occasion         =   Occasion::find($id);                  
        $msg        =   'Occasion updated successfully !';    
    }
}
$occasion->oc_title=$request->input('oc_title');
$occasion->short_desc=$request->input('short_desc');
$picture = Input::file('image');

    /*
    ------------------------------
     photo exists
    ------------------------------
    */
    
    if (($picture)) {         
        if ($picture->isValid()) {
            $dest = 'files/images/occasion';
            $ext = $picture->getClientOriginalExtension();
            $filename = sha1(time()) . '.' . $ext;

            $occasion->image= $dest . '/' . $filename;
            $picture->move($dest, $filename);
        } else {


            return redirect()->back()->withInput();
        }
    }
    $occasion->save();

            // Flash::success('Successfully saved!');
    return redirect()->to('occasion');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function show(Occasion $occasion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function edit(Occasion $occasion,$id)
    {
        $data['occasion']=DB::table('occasions')->where([
            ['id','=',$id]
        ])->get();
        return view('admin.occasion.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occasion $occasion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occasion $occasion)
    {
        //
    }

    public function delete($id){
       $id         =   $id;
       if($id){
        Occasion::where('id','=',$id)->delete();

        $msg = "Occasion deleted successfully !";
                                    // Session::flash('success-message', $msg);
    }

    return redirect()->to('occasion');
}
}
