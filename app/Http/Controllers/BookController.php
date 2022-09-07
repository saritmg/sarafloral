<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Repository\Repository;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['book']=Book::orderBy('created_at','desc')->get();

       $data['book']=Book::leftJoin('flower_types','flower_types.id','='                               
        ,'book.flower_id')
                        ->select(array('flower_types.id as type_id','book.id','flower_types.name as name','book.no_of_flowers','book.date'))->orderBy('flower_types.id','desc')->get();
        return view('book.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['book']=DB::select("select * from flower_types");
        return view('book.create',$data);
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
        'no_of_flowers'     =>  'required', 
        'date'     =>  'required',       
        

    );
       $validator  =   Validator::make(Input::all(),$validator);



       if($validator->fails()){       
        if(strlen($id)>0){
           return Redirect::route('book.edit',$id)->withErrors($validator->messages())->withInput();
       }
       else{
           return Redirect::route('book.create')->withErrors($validator->messages())->withInput();
       }
   }
   else{

    $book=new Book();

    if(@strlen($id)>0){
        $book         =   Book::find($id);                  
        $msg        =   'Book updated successfully !';    
    }
}

    $book->flower_id=$request->input('type');
    $book->no_of_flowers=$request->input('no_of_flowers');
    $book->date=$request->input('date');
    
$book->save();

return redirect('/home')->with('success','Booking Successfully Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
