@extends('layouts.app')
@section('title','Items')
@section('content')
<h1 class="text-center">All Item Belong This Menu ({{$menu->title}})</h1>
<div class="row">
    
    @foreach($menu->items as $item)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{asset('/images/'.$item->image)}}" alt="...">
      <div class="caption">
        <h3 style="font-family:none;">{{$item->title}}</h3>
        <p>...</p>
       <p><a class="btn btn-info" href="{{url('/showItem/'.$item->id)}}">Show Details</a></p>
      </div>
    </div>
  </div>
  @endforeach 
</div>
 

@endsection

