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
                        <h1>Global Setting</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Global Setting</li>
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


                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th class="text-center">KEY</th>
                                                <th class="text-center">VALUE</th>
                                                <th class="text-center">STATUS</th>
                                                <th class="text-center">ACTION</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="" method="GET">
                                                @csrf
                                            <th class="text-center">MAP MY INDIA REST MAP SDK KEY</th>
                                            <td class="text-center"><input type="text" name="rest_map_sdk_key" disabled value="{{isset($edimapsdkkey)?$edimapsdkkey:null}}" placeholder="REST MAP SDK KEY" class="form-control"></td>
                                            <td class="text-center">
                                                @if('1')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td class="text-center"><a href="{{'../view_global/'.$restmapkey}}" class="btn btn-primary" value="submit" name="submit">Edit</a></td>
                                            </form>
                                        </tbody>
                                        <tbody>
                                            <form action="{{url('updateClientApikey/'.$clientapikey)}}" method="POST">
                                                @csrf
                                            <th class="text-center">MAP MY INDIA CLIENT KEY</th>
                                            <td class="text-center"><input type="text" name="map_my_india_client_key" value="{{isset($clientapikey)?$clientapikey:null}}" placeholder="CLIENT KEY" class="form-control"></td>
                                            <td class="text-center">
                                                @if('1')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td class="text-center"><button type="submit" class="btn btn-primary" >Update</button></td>
                                            </form>
                                        </tbody>
                                        <tbody>
                                            <form action="">
                                            <th class="text-center">MAP MY INDIA SECRET KEY</th>
                                            <td class="text-center"><input type="text" name="map_my_india_secret_key" disabled value="{{isset($secretkey)?$secretkey:null}}" placeholder="SECRET KEY" class="form-control"></td>
                                            <td class="text-center">
                                                @if('1')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td class="text-center"><a href="{{'../view_global_map_my_india_secret_key/'.$secretkey}}" class="btn btn-primary" value="submit" name="submit">Edit</a></td>
                                            </form>
                                        </tbody>

                                        <tbody>
                                            <form action="">
                                            <th class="text-center">NIGHT FARE START TIME</th>
                                            <td class="text-center"> <input type="time" id="appt" class="form-control" disabled value="{{isset($ng_start_time)?$ng_start_time:null}}" placeholder="REST MAP SDK KEY" name="night_fare_start_time"></td>
                                            <td class="text-center">
                                                @if('1')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td class="text-center"><a href="{{'../view_night_fare_start_time/'.$ng_start_time}}" class="btn btn-primary" value="submit" name="submit">Edit</a></td>
                                            </form>
                                        </tbody>
                                        <tbody>
                                            <form action="">
                                            <th class="text-center">NIGHT FARE END TIME</th>
                                            <td class="text-center">  <input type="time" class="form-control" disabled  id="appt" value="{{isset($ng_end_time)?$ng_end_time:null}}" name="night_fare_end_time"></td>
                                            <td class="text-center">
                                                @if('1')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td class="text-center"><a href="{{'../view_end_time/'.$ng_end_time}}" class="btn btn-primary" value="submit" name="submit">Edit</a></td>
                                            </form>
                                        </tbody>
                                        <tbody>
                                            <form action="">
                                            <th class="text-center">NIGHT FARE MULTIPLYER</th>
                                            <td class="text-center">  <input type="number" disabled value="{{isset($night_fare_multiplyaer)?$night_fare_multiplyaer:null }}" class="form-control" id="appt" name="night_fare_multiplyaer"></td>
                                            <td class="text-center">
                                                @if('1')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td class="text-center"><a href="{{'../view_night_Player/'.$night_fare_multiplyaer}}" class="btn btn-primary" value="submit" name="submit">Edit</a></td>
                                            </form>
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
