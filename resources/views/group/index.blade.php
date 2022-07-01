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

                    <group-component></group-component>

                                    





                </div>
            </div>           

            
        </div>
    </div>

</div>
 
@endsection   

