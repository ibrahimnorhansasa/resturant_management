@extends('layouts.app')
@section('content')
      <div class="container">
          <h1 class="text-center">Details About ({{$item->title}})</h1>
        <div class="row">    
              <div class="col-md-6 ftco-animate img" data-animate-effect="fadeInRight">
            <img src="{{asset('/images/'.$item->image)}}" height="500px" width="400px" alt="Free Template by Free-Template.co">
          </div>
          <div class="col-md-5 ftco-animate mb-5">
            <h4 class="ftco-sub-title">{{$item->title}}</h4>
            <h2 class="ftco-primary-title display-4">Welcome</h2>
            <p>{{$item->description}}</p>

            <p class="hide-more">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
      
          </div>
            
          <div class="col-md-1"></div>
        </div>
            <div class="row">
                <div class="col-md-3 col-offset-4 pull-right">
            <button class="btn btn-success btn-lg more-btn"> Add To Card</button>
                    </div>
          </div>  
      </div>
@endsection