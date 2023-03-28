@extends('admin.layout.master')
@section('style')
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
    integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>MAP MY INDIA</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">MAP MY INDIA</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-title">Global Setting</h3> --}}
                                <li class="list-unstyled">
                                    <a type="button" href="{{ url('add_global_setting') }}"
                                        class="btn btn-default float-right bg-primary">
                                        Add
                                    </a>
                                </li>

                                <div class="card-body">
                                    <table class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>

                                                <th class="text-center">CLIENT ID</th>
                                                <th class="text-center">CLIENT SECREAT KEY</th>
                                                <th class="text-center">API MAP SDK KEY</th>
                                                <th class="text-center">ACTION</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($viewglobalsett as $key => $value)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>

                                                <td class="text-center">{{ $value->client_id }}</td>
                                                <td class="text-center">{{ $value->client_secreat_key }}</td>
                                                <td class="text-center">
                                                    @if ($value->status == '1')
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">InActive</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <li class="list-unstyled">
                                                        <a href="{{ url('edit_global_map', $value->_id) }}"
                                                            class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>

                                                        <a href="{{ url('delete_map', $value->_id) }}"
                                                            class="btn btn-danger" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this key?');"><i
                                                                class="fas fa-trash"></i></a>
                                                    </li>
                                                    </td>
                                            </tr>
                                            @endforeach


                                        </tbody>


                                    </table>
                                </div>






                            </div>
                            <!-- /.card-header -->

                        </div>
                    </div>

                </div>



            </div>

        </section>

    </div>
@endsection

@section('script')
@endsection
