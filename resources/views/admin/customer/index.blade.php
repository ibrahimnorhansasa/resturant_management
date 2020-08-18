@extends('admin.layouts.layout')

@section('content')

<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box">
          <div class="box-header ">
              <h3 class="box-title">All customer In Resturant</h3>
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
                <th>Name</th>
                <th>Email</th>
                <th>Created_at</th>
                <th>Orders</th>
          
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a class="btn btn-primary" href="{{url('showOrder/'.$user->id)}}">View Ordes</a></td>
                
                    <td>       
                           <!----delete model---->
                <button type="button" class="btn btn-danger btn-xs" ; data-toggle="modal" data-target="#del_user{{$user->id}}" ><span class="glyphicon glyphicon-trash"></span></button>

<!-- Modal -->
                <div id="del_user{{$user->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
         {!!Form::open(['route'=>['customers.destroy',$user->id],'method'=>'delete'])!!}
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