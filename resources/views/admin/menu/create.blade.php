@extends('admin.layouts.layout')
@section('header')
<style>
   
    .custom-file{
        background-color: white;
        width: 300px;
        height: 34px;
        border: 1px solid #ccc;
        position: relative;
        z-index: 1;
        border-radius: 15px;
    }
    .custom-file label{
        width: 100%;
        height: 100%;
        position: absolute;
        border-radius: 15px;
        text-align: center;
    }
    .custom-file input[type="file"]{
        width:100%;
        height: 100%;
        opacity: 0;
        z-index: 3;
        position: absolute;
        top:0px;
        left: 0px;
    }


</style>
@endsection
@section('content')
<section class="content">
<div class="row">
 <div class="col-md-12">
       <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title">Add Menus  In Resturant</h3>
             
           </div>
           
    <div class="box-body">
        {!! Form::open(array('route'=>'menus.store','files'=>true)) !!}
        <div class=form-group>
        {{Form::label('title','Title:')}}
        {{Form::text('title',null,array('class'=>'form-control','style'=>'border-radius:10px;','placeholder'=>'Menu Title'))}}
        </div> 
        <div class=form-group>
        {{Form::label('type','Type:')}}
        {{Form::select('type',['food'=>'Foods','drink'=>' Drinks','sweet'=>'Sweets'],null,array('class'=> 'form-control','style'=>'border-radius:10px;','placeholder'=>'Menu Type'))}}
        </div>  
        <div class=form-group>
        {{Form::label('status','Status:')}}
        {{Form::select('status',['1'=>'Activate','0'=>'Not Activate'],null,array('class'=> 'form-control','style'=>'border-radius:10px;','placeholder'=>'Menu Type'))}}
        </div>
        <div class="form-group">
        {{Form::label('description','Description:')}}
        {{Form::textarea('description',null,array('class'=>'form-control','style'=>'border-radius:10px;','placeholder'=>'Menu Title'))}}
        </div>
       
     
      
        <div class="form-group ">
         {{Form::label('image','Image:')}}
       <div class="custom-file">
           <input type="file" class="custom-file-input image" name="image">
           
           <label class="custom-file-label">Choose Image </label>
         
        </div>
       
        </div> 
        <div class="row">
        <div class="form-group col-md-8">
                <img src="{{asset('images/default.png')}}" alt="" style="width:200px;height:100px;border-radius:10px;" class="image-preview">
        </div>
       
     <div class="form-group  col-md-4" >
       {{Form::submit('Create New Menu',array('class'=>'btn btn-primary btn-lg','style'=>'margin-top:15px;border-radius:20px;font-family:cursive'))}}
        {!! Form::close() !!}
        </div> 
    </div>
      
    </div>
 </div>
</div>
</div>
</section>
@endsection