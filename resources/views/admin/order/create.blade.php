@extends('layouts.app')
@section('title','Make Order')
@section('header')

@endsection
@section('content')
<section class="content">
    <div class="container">
<div class="row">
    <div class="col-md-6">
       <div class="box box-danger">
          <div class="box-header ">
              <h3 class="box-title">All Menus</h3>
             
           </div>
           <div class="box-body">
               @foreach($menus as $menu)
               <div class="panel-group">
                   <div class="panel panel-danger">
                       <div class="panel-heading">
                           <h4 class="panel-title">
                               <a data-toggle="collapse" href="#{{str_replace(' ','-',$menu->title)}}">{{$menu->title}}</a>
                           </h4>
                       </div>
                       <div id="{{str_replace(' ','-',$menu->title)}}" class="panel-collapse collapse">
                          <div class="panel-body">
                              @if($menu->items->count()>0)
                              <table class="table table-hover">
                                  <thead>
                                  <tr>
                                      <td>Name</td>
                                      <td>Price</td>
                                      <td>Add</td>
                                  </tr>
                                 </thead>
                                  <tbody>
                                      @foreach($menu->items as $item)
                                      <tr>
                                          <td>{{$item->title}}</td>
                                          <td>{{$item->price}}</td>
                                          <td><a href="" id="item-{{$item->id}}"
                                                 data-title="{{$item->title}}"
                                                 data-price="{{$item->price}}"
                                                 data-id="{{$item->id}}"
                                                 class="btn btn-success btn-sm add-item-btn"><i class="fa fa-plus"></i></a></td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                                   @else
                    <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                        No Item Exist  Now In DataBase.
                    </div>
                              @endif
                          </div>
                        </div>
                   </div>
               </div>
               @endforeach
           </div>
     </div>
    </div>
    <div class="col-md-6">
         <div class="box box-danger">
          <div class="box-header ">
              <h3 class="box-title">All Orders</h3>  
           </div>
            <div class="box-body">
<form action="{{route('orders.store')}}" method="POST">
     {{ csrf_field() }}
                <table class="table table-hover">
                       <thead>
                           <tr>
                               <td>Item</td>
                                 <td>Quantity</td>
                               <td>Price</td>
                               <td></td>
                             
                           </tr>
                        </thead>
                        <tbody class="order-list"></tbody>
                    </table>
                <h4 >Total:<input type="text" style="border-radius: 10px;" class="total_price form-control input-sm" value="" name="total_price"></h4>
                    <button class="btn btn-danger btn-block ">Add</button>
    </form>
<!--                end form-->
            </div>
        </div>
    </div>
</div>
        </div>
</section>
@endsection           