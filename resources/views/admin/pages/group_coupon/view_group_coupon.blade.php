{{--
    <?php
    echo "<pre>";print_r($driver);exit();

    ?> --}}

    @extends('admin.layout.master')

    @section('style')


        <style>
            /* Custom CSS for toggle button */

        .btn-toggle {
          background-color: grey;
          color: #212529;
          border: none;
          outline: none;
          box-shadow: none;
          padding: 0.5rem 1rem;
          font-size: 1rem;
          line-height: 1.5;
          border-radius: 0.25rem;
        }
        .btn-toggle :hover{
            color:white;
        }
        /* .btn-toggle.active,
        .btn-toggle:active {
          background-color: green;
          color: #fff;
        } */

        .btn-toggle:focus {
          outline: none;
          box-shadow: none;
        }
        </style>
        @endsection



    @section('content')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6">
                            <h1>Group Promocode</h1>

                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Group Promocode</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <div class="card mx-3">
                <div class="card-header">
                    <h3 class="card-title">Group Promocode</h3>
                          <li class="list-unstyled">
                            <a type="button" href="{{url('add_group')}}" class="btn btn-default float-right bg-primary">
                               Make Group
                            </a>
                          </li>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped " id="example1">

                        <thead>
                            <tr>
                                <th class="text-center" data-sortable="true">NO</th>
                                <th class="text-center" data-sortable="true">GROUP NAME</th>
                                <th class="text-center" data-sortable="true">Promocodes</th>

                                <th class="text-center" data-sortable="true">CREATED DATE</th>

                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @php
                                $i=1;
                        @endphp
                        <tbody>

                            @foreach ($vi_prom as $item)
                            <tr>
                                <td class="text-center">{{ $i++; }}</td>
                                <td class="text-center">{{ $item->group_name }}</td>
                                <td class="text-center">{{ isset($item->promcode->title)?$item->promcode->title:'Not Found'; }}</td>
                                {{-- <td class="text-center">{{ $item->rider_mobile }}</td> --}}
                                <td class="text-center">{{ $item->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ url('edit_group_code', $item->_id) }}" class="btn btn-info"><i
                                        class="fas fa-pencil-alt" title="Edit"></i></a>
                                        <a href="{{ url('edit_addEdit_group',$item->_id)}}"  class="btn btn-primary" title="Add Groups"><i class="fa fa-users" aria-hidden="true"></i></a>
                                        <a href="{{ url('delete_group_code',$item->_id)}}" title="Delete" onclick="return confirm('Are you sure you want to delete this Group?');"  class="btn btn-danger"><i
                                            class="fas fa-trash"></i></a>



                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <br>
                    {{-- showign 1 to 6 total 7057  --}}


                   {{-- //'pagination.paginationlinks' --}}
                    {{-- {{ $driver->links() }} --}}
                </div>
                <!-- /.card-body -->
            </div>








        </div>
    @endsection

    @section('script')




    @endsection
