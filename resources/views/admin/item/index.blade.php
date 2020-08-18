@extends('admin.layouts.layout')

@section('content')

<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box">
          <div class="box-header ">
              <h3 class="box-title">All Items  In Resturant</h3>
                </div>
<!--
            <div class="row">
                
                <div class="col-md-10">
                <h3>All Menus  In Resturant</h3>
                </div>
                
                <div class="col-md-2">
                    <a href="menus/create" class="btn btn-primary" style="margin-left:-26px;"><span class="glyphicon glyphicon-plus"> </span> Add New Menu</a>
                </div>
            </div>
           </div>
-->
    <div class="box-body">
        <table class="table table-bordered table-stripped table-hover">
            <thead>
                <th>#</th>
                <th>title</th>
                <th>description</th>
                <th>status</th>
                <th>image</th>
                <th>price</th>
                <th>created By</th>
                <th>type_menu</th>
                <th>created at</th>
                <th>control</th>
          
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <th>{{$item->id}}</th>
                    <th>{{$item->title}}</th>
                    <td>{{substr($item->description,0,50)}}{{strlen($item->description)>50?"....":""}}</td>
                    <td>{{$item->status==0?"Not Activate":"Activate"}}</td>
                   
                    <td>
                     @if($item->image =='')
                   <img src="{{asset('/images/default.png')}}"width="50" height="80" alt="user" class="img-responsive">
                   @else
                        <img src="{{asset('/images/'.$item->image)}}" width="50" height="80" class="img-responsive">
                    @endif
                    </td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->menu->title}}</td>
                    <td>{{date('M j, Y',strtotime($item->created_at))}}</td>
                     <td><a href="{{route('items.edit',$item->id)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                           
                           <!----delete model---->
                <button type="button" class="btn btn-danger btn-xs" ; data-toggle="modal" data-target="#del_item{{$item->id}}" ><span class="glyphicon glyphicon-trash"></span></button>

<!-- Modal -->
                <div id="del_item{{$item->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
         {!!Form::open(['route'=>['items.destroy',$item->id],'method'=>'delete'])!!}
      <div class="modal-body">
        <h4>هل تريد تاكيد الحذف ؟ </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          {!!Form::submit('Yes',['class'=>'btn btn-danger'])!!}
      </div>
        {!!Form::close()!!}
    </div>

  </div>
</div>
                           <!--end Modal -->
                        
                       </td>
                  
                </tr>
                @endforeach
               
            </tbody>
        </table>
            </div>

    </div>
    </div>
    
</div>
</section>

@endsection