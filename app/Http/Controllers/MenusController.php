<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\item;
use Image;
use Storage;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\validation\Role;


class MenusController extends Controller
{
    
//    public function __construct(){
//        
//        $this->middleware('auth');
//    }
   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus=Menu::all();
        return view('admin.menu.index')->with('menus',$menus);
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
        
        // validate the data
        $this->validate($request,array(
            'title'=>'required|max:255|unique:menus',
            'type'=>'required',
            'status'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg'
        ));
          $menu=new Menu;
        // store in the database 
        if($request->hasFile('image')){
        $image=$request->file('image');
        $imgExt=$image->getClientOriginalExtension();
        $imgName=time().'.'.$imgExt;
        $location=public_path('images/' . $imgName);
        Image::make($image)->resize(600,400)->save($location);
        $menu->image=$imgName;
        }
      else{
     
      $menu->image='default.png';
           
      }
        
      
        $menu->title=$request->title;
        $menu->type=$request->type;
        $menu->status=$request->status;
        $menu->description=$request->description;
        $menu->user_id=auth()->user()->id;
        $menu->save();
      
        Session::flash('success','The menu was Succesfully save');
        //redirect to another page
         return redirect()->route('menus.index');
    }

    /**
     * Display the specified resou
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu=Menu::find($id);
      
        return view('website.show',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $menu=Menu::findOrFail($id);
         return view('admin.menu.edit',compact('menu'));
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
      $menu=Menu::findOrFail($id);
         $this->validate($request,array(
            'title'=>['required','max:255'],
            'type'=>'required',
            'status'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg'
        ));
  
        // store in the database 
        if($request->hasFile('image')){
            if($menu->image!='default.png'){
             Storage::disk('public_uploads')->delete($menu->image); 
            }
        $image=$request->file('image');
        $imgExt=$image->getClientOriginalExtension();
        $imgName=time().'.'.$imgExt;
        $location=public_path('images/' . $imgName);
        Image::make($image)->resize(300,null,function($constraint){
            $constraint->aspectRatio();
        })->save($location);
        $menu->image=$imgName;
     
    
        }
        $menu->title=$request->title;
        $menu->type=$request->type;
        $menu->status=$request->status;
        $menu->description=$request->description;
        $menu->user_id=auth()->user()->id;
        $menu->save();
      
          Session::flash('success','The menu was Succesfully updated');
        //redirect to another page
         return redirect()->route('menus.index');
    }
    
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu=Menu::findOrFail($id);
        if($menu->image!='default.png'){
            Storage::disk('public_uploads')->delete($menu->image);
        }
        $menu->delete();
        Session::flash('success','The menu was Succesfully deleted');
        return redirect()->back();
    }
}
