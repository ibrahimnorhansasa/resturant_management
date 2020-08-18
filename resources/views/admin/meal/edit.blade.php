@extends('admin.layouts.layout')
@section('header')
<style>
   
    .custom-file{
        background-color: #EEE;
        width: 180px;
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
              <h3 class="box-title">Edit Meal  In Resturant</h3>
             
           </div>
           
    <div class="box-body">
       {!!Form::model($meal,['route'=>['meals.update',
     $meal->id],'method'=>'PATCH','files'=>true])!!}
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
         {{Form::label('image','Image:')}}
       <div class="custom-file">
           <input type="file" class="custom-file-input" name="image">
         @if($meal->image =='')
                   <img src="{{asset('/images/default.png')}}" alt="user" class="img-responsive">
                   @else
                        <img src="{{asset('/images/'.$meal->image)}}"   class="img-responsive">
                    @endif
          
        </div>
     </div> 
      <div class="form-group col-md-12">
        {{Form::label('description','Description:')}}
        {{Form::textarea('description',null,array('class'=>'form-control','style'=>'border-radius:10px;','placeholder'=>'Item Description'))}}
        </div>
      
     
     <div class="clear-fix"></div>
     <div class="form-group col-md-12">
         @foreach($menus as $menu)
         @if(count($menu->items)>0)
         <h4>{{$menu->title}}</h4>
           <div class="form-group col-md-6">
         <ul>
             @foreach($menu->items as $item)
             <li><input type="checkbox" name="items[]" value="{{$item->id}}">{{$item->title}}</li>
             @endforeach
         </ul>
         </div>
         @endif
        @endforeach
     </div>
         <div class="clear-fix"></div>
        <div class="form-group col-md-8 col-md-offset-2"> 
       {{Form::submit('Update New Meal',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}
         </div>
        {!! Form::close() !!}
        
    </div>
 </div>
</div>
</div>
</section>
@endsection