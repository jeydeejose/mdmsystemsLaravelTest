@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Viewing Codes of ') }} {{$user->name}}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="float-end">
                        Export : 
                        <a href="{{route('groups.export', [$userid,'excel'])}}"><button type="button" class="btn btn-success">Excel</button></a>
                        <a href="{{route('groups.export', [$userid,'csv'])}}"><button type="button" class="btn btn-success">CSV</button></a>
                    </div>
                    

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($query[0]->voucherData as $voucher)
                        <tr>

                            <td>{{$voucher->code}}</td>
                            <td>{{$voucher->created_at}}</td>
                        
                        </tr>
                        @endforeach


                        </tbody>
                    </table>      
         


                                    




                </div>
            </div>           

            
        </div>
    </div>

</div>
 
@endsection   

