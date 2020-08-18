@extends('admin.layouts.layout')
@section('header')
{!!Html::style('css/select2.min.css')!!}
<style>
   
    .custom-file{
        background-color: #EEE;
        width: 350px;
        height: 38px;
        border: 1px solid #ccc;
        position: relative;
        z-index: 1;
        border-radius: 10px;
    }
    .custom-file label{
        width: 100%;
        height: 100%;
        position: absolute;
        border-radius: 5px;
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
              <h3 class="box-title">Add Meals  In Resturant</h3>
             
           </div>
           
    <div class="box-body">
        {!! Form::open(array('route'=>'meals.store','files'=>true)) !!}
        <div class="form-group col-md-4">
        {{Form::label('title','Title:')}}
        {{Form::text('title',null,array('class'=>'form-control','style'=>'border-radius:10px;','placeholder'=>' meal Title'))}}
        </div> 
     
       
        
        <div class="form-group col-md-4">
        {{Form::label('status','Status:')}}
        {{Form::select('status',['1'=>'Activate','0'=>'Not Activate'],null,array('class'=> 'form-control','style'=>'border-radius:10px;','placeholder'=>' meal  Status'))}}
        </div>
     
        <div class="form-group col-md-4">
        {{Form::label('price','Price:')}}
        {{Form::text('price',null,array('class'=>'form-control','style'=>'border-radius:10px;','placeholder'=>'meal Price'))}}
        </div> 
   
      <div class="form-group col-md-12">
        {{Form::label('description','Description:')}}
        {{Form::textarea('description',null,array('class'=>'form-control','style'=>'border-radius:10px;','placeholder'=>'meal Description'))}}
        </div>
      
     
    
     <div class="form-group col-md-12">
    {{Form::label('items','Items Belongs This Meal:')}}
        <select class="form-control select2-multi" name="items[]"  multiple="multiple">
            @foreach($items as $item)
                <option value='{{$item->id}}'>{{$item->title}}</option>
            @endforeach
        </select>
     </div>
    
             <div class="row">     
        <div class="form-group col-md-8">
         {{Form::label('image','Image:')}}
        <div class="custom-file ">
           <input type="file" class="custom-file-input image " name="image">
           
           <label class="custom-file-label">Choose Image </label>     
        </div>
        </div>
            <div class="form-group col-md-4">
                <img src="{{asset('images/default.png')}}" alt="" style="width:200px;height:100px;border-radius:10px;" class="image-preview">
        </div>
        </div> 
        <div class="form-group col-md-offset-2"> 
       {{Form::submit('Create New Meal',array('class'=>'btn btn-primary btn-lg pull-right','style'=>'margin:35px; margin-right:20px;border-radius:20px;'))}}
         </div>
        {!! Form::close() !!}
        
    </div>
 </div>
</div>
</div>
</section>
@endsection
@section('scripts')
{!!Html::script('js/select2.min.js')!!}
<script type="text/javascript">
    $('.select2-multi').select2();
 </script>
@endsection