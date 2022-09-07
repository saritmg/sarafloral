<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Repository\Repository;


class ContactController extends Controller
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
        $data['contact']=Contact::orderBy('created_at','desc')->get();
        return view('admin.contact.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
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
        'email'     =>  'required', 
        'number'     =>  'required',       
        'location'      =>  'required'
        

    );
       $validator  =   Validator::make(Input::all(),$validator);



       if($validator->fails()){       
        if(strlen($id)>0){
           return Redirect::route('contact.edit',$id)->withErrors($validator->messages())->withInput();
       }
       else{
           return Redirect::route('contact.create')->withErrors($validator->messages())->withInput();
       }
   }
   else{

    $contact=new Contact();

    if(@strlen($id)>0){
        $contact         =   Contact::find($id);                  
        $msg        =   'Contact updated successfully !';    
    }
}

    $contact->email=$request->input('email');
    $contact->number=$request->input('number');
    $contact->location=$request->input('location');




$contact->save();

            // Flash::success('Successfully saved!');
    //return Redirect::back();7
return redirect()->to('contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact,$id)
    {
         $data['contact']=DB::table('contact')->where([
            ['id','=',$id]
        ])->get();
        return view('admin.contact.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }

    public function delete($id){
       $id         =   $id;
       if($id){
        Contact::where('id','=',$id)->delete();

        $msg = "Contact deleted successfully !";
                                    // Session::flash('success-message', $msg);
    }

    return redirect()->to('contact');
}
}
