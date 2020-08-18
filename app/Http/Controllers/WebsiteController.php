<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Meal;
use App\Menu;
use App\Item;
use Session;
class WebsiteController extends Controller
{
    public function sendMail(Request $request){
        $request->validate([
          'name'=>'required' ,
            'email'=>'required|email',
            'message'=>'required'
        ]);
        $name=$request->input('name');
        $email=$request->input('email');
        $message=$request->input('message');
        
        Mail::to('elalamy414@gmail.com')->send(new ContactUs($name,$email,$message));
        
        Session::flash('success','The message was Succesfully saved');
       return redirect()->back();
    }
  
    public function showAll(Menu $menu){
        $meals=Meal::all();
       $foods=$menu->where('type','food')->get();
        $sweets=$menu->where('type','sweet')->get();
        $drinks=$menu->where('type','drink')->get();
        
        return view('website',compact('foods','sweets','drinks','meals'));
    }
    public function contact(){
        return view('website.contact');
    }
}
