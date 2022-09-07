<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Repository\Repository;


class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['contact_us']=ContactUs::orderBy('created_at','desc')->get();
        return view('contact_us.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.contact-us');
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
        'subject'     =>  'required',       
        'message'      =>  'required'
        

    );
       $validator  =   Validator::make(Input::all(),$validator);



       if($validator->fails()){       
        if(strlen($id)>0){
           return Redirect::route('contact_us.edit',$id)->withErrors($validator->messages())->withInput();
       }
       else{
           return Redirect::route('contact_us.create')->withErrors($validator->messages())->withInput();
       }
   }
   else{

    $contact_us=new ContactUs();

    if(@strlen($id)>0){
        $contact_us         =   ContactUs::find($id);                  
        $msg        =   'Contactus updated successfully !';    
    }
}

    $contact_us->email=$request->input('email');
    $contact_us->subject=$request->input('subject');
    $contact_us->message=$request->input('message');

$contact_us->save();


            // Flash::success('Successfully saved!');
    //return Redirect::back();7
return redirect('/contact_us')->with('success','Thankyou For contacting Us!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
