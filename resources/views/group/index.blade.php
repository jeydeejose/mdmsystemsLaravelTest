@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Groups') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <group-component></group-component>
                    @hasanyrole('SuperAdmin')
                    <div class="float-end">
                        Export All Voucher Code: 
                        <a href="{{route('groups.export', [0,'excel'])}}"><button type="button" class="btn btn-success">Excel</button></a>
                        <a href="{{route('groups.export', [0,'csv'])}}"><button type="button" class="btn btn-success">CSV</button></a>
                    </div>
                    @endrole

                                    





                </div>
            </div>           

            
        </div>
    </div>

</div>
 
@endsection   

