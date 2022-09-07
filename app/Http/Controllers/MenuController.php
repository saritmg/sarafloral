<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Repository\Repository;


class MenuController extends Controller
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
       
         $data['menu']=Menu::orderBy('created_at','desc')->get();
        return view('admin.menu.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
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
        

    );
       $validator  =   Validator::make(Input::all(),$validator);



       if($validator->fails()){       
        if(strlen($id)>0){
           return Redirect::route('menu.edit',$id)->withErrors($validator->messages())->withInput();
       }
       else{
           return Redirect::route('menu.create')->withErrors($validator->messages())->withInput();
       }
   }
   else{

    $menu=new Menu();

    if(@strlen($id)>0){
        $menu         =   Menu::find($id);                  
        $msg        =   'Menu updated successfully !';    
    }
}

    $menu->title=$request->input('title');

$menu->save();

            // Flash::success('Successfully saved!');
    //return Redirect::back();7
return redirect()->to('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu,$id)
    {
         $data['menu']=DB::table('menu')->where([
            ['id','=',$id]
        ])->get();
        return view('admin.menu.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
    public function delete($id){
       $id         =   $id;
       if($id){
        Menu::where('id','=',$id)->delete();

        $msg = "Menu deleted successfully !";
                                    // Session::flash('success-message', $msg);
    }

    return redirect()->to('menu');
}
}
