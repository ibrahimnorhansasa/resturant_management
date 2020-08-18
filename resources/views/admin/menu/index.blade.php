@extends('admin.layouts.layout')

@section('content')
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">All Menus  In Resturant</h3>
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
                <th>type</th>
                <th>description</th>
                <th>status</th>
                <th>image</th>
                <th>created By</th>
                <th>created at</th>
                <th>control</th>
          
            </thead>
            @if(count($menus)>0)
            <tbody>
                @foreach($menus as $menu)
                <tr>
                    <th>{{$menu->id}}</th>
                    <td>{{$menu->title}}</td>
                    <td>{{$menu->type}}</td>
                    <td>{{substr($menu->description,0,50)}}{{strlen($menu->description)>50?"....":""}}</td>
                    <td>{{$menu->status==0?"Not Activate":"Activate"}}</td>
                   
                    <td>
                     @if($menu->image =='')
                   <img src="{{asset('/images/default.png')}}"width="50" height="80" alt="user" class="img-responsive">
                   @else
                        <img src="{{asset('/images/'.$menu->image)}}" width="50" height="80" class="img-responsive">
                    @endif
                    </td>
                
                    <td>{{$menu->user->name}}</td>
                    <td>{{date('M j, Y',strtotime($menu->created_at))}}</td>
                     <td>
                         <a href="{{route('menus.edit',$menu->id)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                           
                           <!----delete model---->
                <button type="button" class="btn btn-danger btn-xs" ; data-toggle="modal" data-target="#del_menu{{$menu->id}}" ><span class="glyphicon glyphicon-trash"></span></button>

<!-- Modal -->
                <div id="del_menu{{$menu->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
         {!!Form::open(['route'=>['menus.destroy',$menu->id],'method'=>'delete'])!!}
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