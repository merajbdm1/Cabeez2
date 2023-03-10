@extends('admin.layout.master')
@section('style')
@endsection
<style>
    nav svg {
        max-height: 10px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Activity Log users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Activity Logs</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        @if ($message = Session::get('DriverDetailSuccess'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif @if ($message = Session::get('DriverDetailError'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <!-- jquery validation -->
                                
                            <div class="card">

                                <div class=" row p-3">
                                    <div class="col-md-4">

                                        <form  id="myForm" method="POST">
                                            <div class="form_group">
                                                <label for="">From Date</label>
                                                <input type="date" name="fromDate" class="form-control input-daterange" placeholder="dd/mm/yyyy" value="{{ request('fromDate') }}">
                                            </div>
                                            <br>
                                            <div class="form_group">
                                                <button class="btn btn-primary" id="filter" type="submit">Search</button>
                                                <a href="{{ url('activity_user_log') }}" id="refresh" class="btn btn-primary">Clear</a>
                                            </div>
                                                    </div>

                                                    <div class=" col-md-4">

                                                    
                                                            <div class="form_group">

                                                                <label for="">To Date</label>
                                                                <input type="date" name="toDate" class="form-control" placeholder="dd/mm/yyyy" value="{{ request('toDate') }}">

                                                            </div>
                                                        
                                                        

                                                    </div>

                                                  <div class="col-md-4">

                                      
                                                 <div class="form_group">


                                                <label for="">USERNAME</label>
                                                <input type="text" name="done_by"  class="form-control" placeholder="Enter User Name" value="{{ request('done_by') }}">
                                                </div>
                                           
                                        </form>

                                    </div>
                                </div>



                             
                                
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered table-striped" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>CHANGE IN VALUE OF</th>
                                                <th>USER NAME</th>
                                                <th>SERVER IP ADDRESS</th>
                                                <th>CLIENT IP ADDRESS</th>
                                                <th>Data Table</th>
                                                <th>CREATED AT</th>
                                                <th>UPDATED AT</th>
                                                {{-- <th>ACTION</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            @foreach ($useractivity as $key=>$act)
                                               
                                            <tr>
                                                <td>{{ ($useractivity->currentpage()-1) * $useractivity->perpage() + $key + 1 }}</td>
                                                <td>{{ $act->log_type }}</td>
                                               
                                                <td>{{ $act->done_by }}</td>
                                                <td>{{ $act->ip_adress }}</td>
                                                <td>{{ $act->server_ip_address }}</td>
                                                <td>{{ $act->data_table }}</td>
                                                <td>{{ $act->created_at }}</td>
                                                <td>{{ $act->updated_at }}</td>
                                                {{-- <td><a href="{{url('activity_delete/'.$act->_id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Fare?');"><i
                                                    class="fas fa-trash"></i></a></td> --}}
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>


                                    <br>
                                   
                                 
                                    {{ $useractivity->links() }}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                    </div>
                    
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script>

//     $(document).ready(function () {
//         var date= new Date();

//         $('.input-daterange').datepicker({

//             todayBtn: 'linked',
//             format:'yyyy-mm-dd',
//             autoclose:true,


//          });
//          var -token=$('input[name="_token"]').val();

//          function fetch_data(fromDate, toDate)
//           {
//             $.ajax({

//                 url:"/daterange/fetch_data",
//                 method: 'POST',
//                 data:{
//                      fromDate: fromDate,toDate:toDate,_token:token
//                 },
//                 dataType:'json',

//                 success: function (data) {
//                     var output = '' ;
//                       $('#toatal_records').text(data.length);
//                     for (var count = 0; i < data.length; count++) 
//                     {
//                         output += '<tr>';
//                             output += '<td>'+data[count].fromDate+'</td>';
//                             output += '<td>'+data[count].toDate+'</td>';
                            
//                     }
//                     $('tbody').html(output);

//                 }
//                 })


//          }
//         $('#filter').click(function(){
//         var fromDate = $('#fromDate').val();
//         var toDate = $('#toDate').val();
//         if(fromDate != '' &&  toDate != '')
//         {
//         fetch_data(fromDate, toDate);
//         }
//         else
//         {
//         alert('Both Date is required');
//         }
//         });

//         $('#refresh').click(function(){
//         $('#fromDate').val('');
//         $('#toDate').val('');
//         fetch_data();
//         });


// });



// $(document).ready(function(){
//     $('#myForm').on('submit', function(e){
//     e.preventDefault();
//     alert("gr");
//     var frm = $('#myForm');
//     $.ajax({
//      type: frm.attr('method'),
//     url: '{{ route('daterange.fetch_data') }}',
//     data: frm.serialize(),
//     success: function (res) {
// 	if(res==1){
//         alert('Success');
//     }
// },

// });
//     });
// });
// </script>