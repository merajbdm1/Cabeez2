@extends('admin.layout.master')
@section('style')
@endsection


<style>
    nav svg {
        max-height: 10px;
    }
</style>
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Driver Rating & Reviews</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Driver Rating & Reviews</li>
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

                                        <form action="{{ route('search') }}" method="GET">
                                            <div class="form_group">
                                                <label for="">From Date</label>
                                                <input type="date" name="fromDate" value="{{ request('fromDate') }}"
                                                    class="form-control" placeholder="dd/mm/yyyy">
                                            </div>
                                            <br>
                                            <div class="form_group">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                                <a href="{{ url('driver_reviews') }}" class="btn btn-primary">Clear</a>
                                            </div>
                                       

                                                    </div>

                                                    <div class=" col-md-4">

                                                    
                                                            <div class="form_group">

                                                                <label for="">To Date</label>
                                                                <input type="date" name="toDate" value="{{ request('toDate') }}"
                                                                    class="form-control" placeholder="dd/mm/yyyy">

                                                            </div>
                                                        
                                                        

                                                    </div>

                                                  <div class="col-md-4">

                                      
                                                 <div class="form_group">


                                                <label for="">Driver Mobile Number</label>
                                                <input type="text" name="search" value="{{ request('search') }}"
                                                    class="form-control" placeholder="Mobile Number">
                                                </div>
                                           
                                        </form>

                                    </div>
                                </div>



                                <!-- /.card-header -->
                                <div class="card-body">
                                    {{-- @if(count($fareview)>0) --}}

                                    <table class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Driver Mobile Number</th>
                                                <th>Rider Name Form</th>
                                                <th>Driver Name To</th>
                                                <th>Driver Rating</th>
                                                <th>Driver Reviews</th>
                                                <th>Created Date</th>
                                                <th>Updated Date</th>
                                                <th>ACTION</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                         
                                        </tbody>

                                    </table>
                                         {{-- @else

                                        <h3>No Result found</h3>
                                        @endif --}}
                                    <br>

                                    {{-- //{{ $fareview->links() }} --}}
                                    {{-- {{ $fareview->appends(['sort'=>'date'])->links() }} --}}

                                    {{-- {{ $fareview->appends(Request::all())->links() }} --}}
                                    {{-- @if (isset($fareview))
                                    {{ $fareview->appends($fareview)->links() }}
                                    @else --}}
                                    {{-- {{ $fareview->links() }} --}}
                                    {{-- @endif --}}
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
