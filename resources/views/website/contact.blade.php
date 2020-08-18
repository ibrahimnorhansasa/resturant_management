@extends('layouts.app')
@section('title','Contact')
@section('content')

      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <h1>Contact Me</h1>
              <hr>
           <form >
               <div class="form-group">
              {{Form::label('name','Name:')}}
              {{Form::text('name',null,array('class'=> 'form-control'))}}
              </div>
            <div class="form-group">
              {{Form::label('email','Email:')}}
              {{Form::email('email',null,array('class'=> 'form-control'))}}
            </div>
           
            <div class="form-group">
              {{Form::label('subject','Subject:')}}
              {{Form::text('subject',null,array('class'=> 'form-control'))}}
             </div>  
              
            <div class="form-group">
              
              {{Form::label('body','Message:')}}
              {{Form::textarea('body',null,array('class'=> 'form-control'))}}
              </div>
           <div class="form-group">
               {{Form::submit('Send Message',['class'=>'btn btn-primary'])}}
              </div>
         </form>
          </div>
      </div>
@endsection