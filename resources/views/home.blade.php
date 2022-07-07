@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Voucher Code(s)') }}
                        <generate-voucher-component></generate-voucher-component>
           
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- @hasanyrole('SuperAdmin|GroupAdmin')
                        I am a Admin!
                    @else
                        I am not a admin...
                    @endrole


                    @can('group-lists')
                        Group List
                    @endcan  

                    @can('add-group')
                        Add Group
                    @endcan -->

                                       

                    <!-- {{ __('You are logged in!') }} -->

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Created Date</th>
                                <th>Action</th>
                       
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Data</td>
                                <td>Data</td>
                              
                         
                            </tr>
                        </tbody>
                    </table>



                </div>
            </div>

            <!-- <example-component></example-component> -->
        </div>
    </div>
</div>
 
@endsection   
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $('#example').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('voucher-code.index') }}",
        columns: [
        { data: 'code', name: 'code' },
        { data: 'created_at', name: 'created_at' },

        ],
        pageLength: 5,
        order: [[ 1, 'desc' ]],
    });
});
</script>   
