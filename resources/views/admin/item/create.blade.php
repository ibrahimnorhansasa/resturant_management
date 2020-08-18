@extends('admin.layouts.layout')
@section('header')
<style>
   
    .custom-file{
        background-color: #EEE;
        width: 450px;
        height: 40px;
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
              <h3 class="box-title">All Items  In Resturant</h3>
             
           </div>
           
    <div class="box-body">
    
        {!! Form::open(array('route'=>'items.store','files'=>true)) !!}
        <div class="form-group col-md-3">
        {{Form::label('title','Title:')}}
        {{Form::text('title',null,array('class'=>'form-control','style'=>'border-radius:10px;','placeholder'=>'Item Title'))}}
        </div> 
       <div class="form-group col-md-3">
        {{Form::label('status','Status:')}}
        {{Form::select('status',['1'=>'Activate','0'=>'Not Activate'],null,array('class'=> 'form-control','style'=>'border-radius:10px;','placeholder'=>' Item Status'))}}
        </div>
        
        <div class="form-group col-md-3">
        {{Form::label('price','Price:')}}
        {{Form::text('price',null,array('class'=>'form-control','style'=>'border-radius:10px;','placeholder'=>'Item Price'))}}
        </div>
           <div class="form-group col-md-3"> 
       {{Form::label('menu_id','Menu:')}}
        <select class="form-control" style="border-radius:10px;" name="menu_id" placeholder="Menu include This item">
            @foreach($menus as $menu)
                <option value="{{$menu->id}}">{{$menu->title}}</option>
            @endforeach
        </select>
        </div>
        <div class=form-group>
        {{Form::label('description','Description:')}}
        {{Form::textarea('description',null,array('class'=>'form-control','style'=>'border-radius:10px;','placeholder'=>'Item Description'))}}
        </div>
        
      
      
  
     <div class="row">
        
        <div class="form-group col-md-8">
          {{Form::label('image','Image:')}}
       <div class="custom-file">
           <input type="file" class="custom-file-input image" name="image">
           
           <label class="custom-file-label">Choose Image </label>
         
        </div>
        </div> 
   <div class="form-group col-md-4">
                <img src="{{asset('images/default.png')}}" alt="" style="width:200px;height:100px;border-radius:10px;" class="image-preview">
        </div>
          </div>
       
     <div class="form-group" >
       {{Form::submit('Create New Item',array('class'=>'btn btn-primary btn-lg','style'=>'margin-top:15px;border-radius:20px;font-family:cursive'))}}
        {!! Form::close() !!}
        </div> 

        
    </div>
 </div>
</div>
</div>
</section>

@endsection