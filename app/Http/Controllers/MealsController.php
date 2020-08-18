<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Item;
use App\Menu;
use Storage;
use Session;
use Image;
use Illuminate\Support\Facades\Auth;
class MealsController extends Controller
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
        $meals=Meal::all();
        return view('admin.meal.index')->with('meals',$meals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $items=Item::all();
         return view('admin.meal.create',compact('items'));
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
            'title'=>'required|max:255|unique:meals',
            'description'=>'required',
            'status'=>'required',
            'price'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg'
        ));
          $meal=new Meal;
        // store in the database 
        if($request->hasFile('image')){
        $image=$request->file('image');
        $imgExt=$image->getClientOriginalExtension();
        $imgName=time().'.'.$imgExt;
        $location=public_path('images/' . $imgName);
        Image::make($image)->resize(200,200)->save($location);
        $meal->image=$imgName;
        }
      else{
     
      $meal->image='default.png';
           
      }
        
      
        $meal->title=$request->title;
        $meal->status=$request->status;
        $meal->description=$request->description;
        $meal->price=$request->price;
        $meal->user_id=auth()->user()->id;
        $meal->save();
        $meal->items()->sync($request->items,false);
       
          Session::flash('success','The meal was Succesfully saved');
        //redirect to another page
         return redirect()->route('meals.index');
    }

    /**
     * Display the specified resou
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  $meal=Meal::findOrFail($id);
        $menus=Menu::all();
   
         return view('admin.meal.edit',compact('meal','menus'));
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
      $meal=Meal::find($id);
         $this->validate($request,array(
            'title'=>'required|max:255',
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
        Image::make($image)->resize(200,200)->save($location);
        $meal->image=$imgName;
        }

        
        $meal->title=$request->title;
        $meal->description=$request->description;
        $meal->status=$request->status;
        $meal->price=$request->price;

        $meal->user_id=auth()->user()->id;
        $meal->save();
        
          Session::flash('success','The meal was Succesfully updated');
        //redirect to another page
         return redirect()->route('meals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal=Meal::findOrFail($id);
         if($meal->image!='default.png'){
            Storage::disk('public_uploads')->delete($meal->image);
        }
        $meal->items()->detach();
        $meal->delete();
        
        Session::flash('success','The meal was Succesfully deleted');
        return redirect()->back();
    }
}
