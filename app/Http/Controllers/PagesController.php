<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Repository\Repository;
use App\Occasion;
use App\Flower;
use App\Contact;
use App\About;

class PagesController extends Controller
{
    
    public function index(){
    
       $title='Welcome to Laravel !';
       //return view('pages.index',compact('title')); 
       return view('pages.index')->with('title', $title);               
    }

    public function about(){
        // return 'Index';
        $data['about']=About::orderBy('created_at','asc')->get();
        return view('pages.about-us',$data);                 
     }

     public function occasion(){
        // return 'Index';
        $data['occasion']=Occasion::orderBy('created_at','desc')->get();
        return view('pages.occasion_list',$data);                   
     }

       public function flowertype(){
        // return 'Index';
        $data['flowers']=Flower::orderBy('created_at','desc')->get();
        return view('pages.flower_type',$data);                   
     }



     public function contactus(){
        // return 'Index';
         $data['contact']=Contact::orderBy('created_at','desc')->get();
        return view('pages.contact-us',$data);                    
     }

     // public function menu(){
     //    $data['menu']=Menu::orderBy('created_at','desc')->get();
     //    return view('website.menu',$data);
     // }
}
