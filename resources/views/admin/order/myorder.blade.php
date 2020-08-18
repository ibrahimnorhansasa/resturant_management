@extends('layouts.app')
@section('title','My Orders')
@section('content')
<section class="content">
    <div class="container">
        <div class="row">
        <div class="col-md-9 col-md-offset-2" style="margin-left:115px;">
                
        <div class="box box-danger">
            
          <div class="box-header ">
              <h3 class="box-title"> My Orders</h3>
             
           </div>
            
          @foreach($myorder as $order)
           <div class="box-body">
              
               <div class="panel-group">

                   <div class="panel panel-danger">
                  
                       <div class="panel-heading">
                           <h4 class="panel-title">
                               <a data-toggle="collapse" href="#oneorder-{{$order->id}}">{{date(' j /M/ Y - H:i:s',strtotime($order->created_at))}}</a>
                           </h4>
                       </div>
                       <div id="oneorder-{{$order->id}}" class="panel-collapse collapse">
                          <div class="panel-body">
                                @if($order->items->count()>0)
                
                              <table class="table table-hover">
                                  <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Price</th>
                                  </tr>
                                 </thead>
                                  <tbody>
                                      @foreach($order->items as $item)
                                      <tr>
                                          <td>{{$item->title}}</td>
                                          <td>{{$item->price}}</td>
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
             
           </div>
             @endforeach  
     </div>
             
             <div class="text-center">
            {!!$myorder->links();!!}
        </div>
    </div>
        </div>
    </div>
</section>
@endsection