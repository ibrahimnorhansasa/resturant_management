<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Menu;
use Image;
use Session;
use Storage;
use Illuminate\Support\Facades\Auth;
class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
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
        $items=Item::all();
        return view('admin.item.index')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $menus=Menu::all();
         return view('admin.item.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        // validate the data
        $this->validate($request,array(
            'title'=>'required|max:255|unique:items',
            'status'=>'required',
            'description'=>'required',
            'price'=>'required',
            'menu_id'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg'
        ));
          $item=new Item;
        // store in the database 
        if($request->hasFile('image')){
        $image=$request->file('image');
        $imgExt=$image->getClientOriginalExtension();
        $imgName=time().'.'.$imgExt;
        $location=public_path('images/' . $imgName);
        Image::make($image)->resize(400,200)->save($location);
        $item->image=$imgName;
        }
      else{
     
      $item->image='default.png';
           
      }
        
      
        $item->title=$request->title;
        $item->status=$request->status;
        $item->description=$request->description;
        $item->price=$request->price;
        $item->menu_id=$request->menu_id;
        $item->user_id=auth()->user()->id;
        $item->save();
        
       Session::flash('success','The item was Succesfully save');
        //redirect to another page
         return redirect()->route('items.index');
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
        
        $item=Item::find($id);
      
        return view('website.showsingle',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $item=Item::find($id);
     
        $menus=Menu::all();
     $menu_array=array();
     foreach($menus as $menu){
         $menu_array[$menu->id]=$menu->title;
     }
         return view('admin.item.edit',compact('item','menu_array'));
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
      $item=Item::find($id);
         $this->validate($request,array(
            'title'=>'required|max:255|unique:items',
            'description'=>'required',
            'status'=>'required',
     
            'image'=>'image|mimes:png,jpg,jpeg',
            'price'=>'required',
        ));
  
        // store in the database 
        if($request->hasFile('image')){
        $image=$request->file('image');
        $imgExt=$image->getClientOriginalExtension();
        $imgName=time().'.'.$imgExt;
        $location=public_path('images/' . $imgName);
        Image::make($image)->resize(600,400)->save($location);
        $item->image=$imgName;
        }
    
        
        $item->title=$request->title;
        $item->description=$request->description;
        $item->status=$request->status;
        $item->price=$request->price;
        $item->menu_id=$request->menu_id;
        $item->user_id=auth()->user()->id;
        $item->save();
      
         Session::flash('success','The item was Succesfully updated');
        //redirect to another page
         return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::findOrFail($id);
         if($item->image!='default.png'){
            Storage::disk('public_uploads')->delete($item->image);
        }
        $item->meals()->detach();
        $item->delete();
         Session::flash('success','The item was Succesfully deleted');
         return redirect()->route('items.index');
    }
}
