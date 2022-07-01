@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('-') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                    @hasanyrole('SuperAdmin|GroupAdmin')
                        I am a Admin!
                    @else
                        I am not a admin...
                    @endrole


                    @can('group-lists')
                        Group List
                    @endcan  

                    @can('add-group')
                        Add Group
                    @endcan

                    <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modal">Add Users to Group</button>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($query as $user)
                        <tr>

                            <td>{{$user->name}}</td>
                            <td><a href="{{route('groups.removeUser', [$id, $user->id])}}"><button class="btn btn-danger">Remove</button></a></td>
                        </tr>
                        @endforeach


                        </tbody>
                    </table>      
                    {{ $query->links() }}              


                                    
                    <div class="modal" id="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Adding Users to Group</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                            
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($unGroupusers as $user)
                                        <tr>

                                            <td>{{$user->name}}</td>
                                            <td><a href="{{route('groups.addUser', [$id,$user->id])}}"><button type="button" class="btn btn-success">Add</button></a></td>
                                        </tr>
                                        @endforeach


                                        </tbody>
                                    </table>  

              




                                    
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>




                </div>
            </div>           

            
        </div>
    </div>

</div>
 
@endsection   

