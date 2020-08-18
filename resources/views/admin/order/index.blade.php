@extends('admin.layouts.layout')

@section('content')
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">All Order for This Customer</h3>
                </div>

        <div class="box-body">
        <table class="table table-bordered table-stripped table-hover">
            <thead>
                <th>#</th>
                <th>orders</th>
                <th>total_price</th>
                <th>created By</th>
                <th>created at</th>
             
          
            </thead>
            @if(count($orders)>0)
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
             
                    <td> 
                        @foreach($order->items as $item)
                        <span class="label label-default">{{$item->title}}</span>
                    @endforeach
                        </td>
                    <th>{{$order->total_price}}</th>
<!--
                   
                   
-->
                 
                
                    <td>{{$order->user->name}}</td>
                    <td>{{date('M j, Y',strtotime($order->created_at))}}</td>
   
                  
                </tr>
                @endforeach
               
            </tbody>
            @else
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
               Data not Exist In DataBase.
              </div>
            @endif
        </table>
        </div>
       </div>    
     </div>
    </div>
</section>
@endsection