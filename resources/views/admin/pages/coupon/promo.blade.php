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
                        <h1>Promo Codes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Promocode</li>
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
                                <h3 class="card-title">All Promocodes</h3>

                                <?php
                                $check_role= Session::get('role');
                                $data = \App\Models\AllDataTableRolesAndPermission::get();
                                foreach($data as $item)
                                {
                                 $check_role_name = $item->role_name;
                                  foreach ($item->promocode_permissions as $valueopp)
                                  {
                                       if($valueopp == 'Add')//User
                                       {
                                        $checkAdd = $valueopp;

                                        if($check_role == $check_role_name && $checkAdd)
                                          {

                                      ?>

                                <li class="list-unstyled">
                                    <a type="button" href="{{ url('add_promocode') }}"
                                        class="btn btn-default float-right bg-primary">
                                        Add Promocode
                                    </a>
                                </li>

                                <?php }}}}?>
                                <?php
                                $check_role= Session::get('status');

                                        if($check_role == '1')//Developer
                                          {
                                    ?>

                                <li class="list-unstyled">
                                    <a type="button" href="{{ url('add_promocode') }}"
                                        class="btn btn-default float-right bg-primary">
                                        Add Promocode
                                    </a>
                                </li>

                                <?php  }?>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">CODE</th>
                                            <th class="text-center">TITLE</th>
                                            <th class="text-center">DISCOUNT TYPE</th>
                                            <th class="text-center">DISCOUNT</th>
                                            <th class="text-center">MAX DISCOUNT</th>
                                            <th class="text-center">LIMIT PER USER</th>
                                            <th class="text-center">STATUS</th>
                                            <th class="text-center">ACTION</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($promocode as $key => $value)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center" class="text-center">{{ $value->code }}</td>
                                                <td class="text-center">{{ $value->title }}</td>
                                                <td class="text-center">{{ $value->discount_type }}</td>
                                                <td class="text-center">{{ $value->discount }}</td>
                                                <td class="text-center">{{ $value->max_discount }}</td>
                                                <td class="text-center">{{ $value->limit_per_user }}</td>
                                                <td class="text-center">
                                                    @if ($value->status == 'active')
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">InActive</span>
                                                    @endif
                                                </td>

                                                <td>

                                                    <?php
                                            $check_role= Session::get('role');
                                            $data = \App\Models\AllDataTableRolesAndPermission::get();
                                            foreach($data as $item)
                                            {
                                             $check_role_name = $item->role_name;
                                              foreach ($item->promocode_permissions as $valueopp)
                                              {
                                                   if($valueopp == 'Edit')//User
                                                   {
                                                    $checkAdd = $valueopp;

                                                    if($check_role == $check_role_name && $checkAdd)
                                                      {

                                                  ?>
                                                    <li class="list-unstyled">
                                                        <a href="{{ url('edit_promocode', $value->_id) }}"
                                                            class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                    </li>
                                                    <?php }   } } }?>

                                                    <?php
                                            $check_role= Session::get('role');
                                            $data = \App\Models\AllDataTableRolesAndPermission::get();
                                            foreach($data as $item)
                                            {
                                             $check_role_name = $item->role_name;
                                              foreach ($item->promocode_permissions as $valuedel)
                                              {
                                                   if($valuedel == 'Delete')//User
                                                   {
                                                    $checkAdd = $valuedel;

                                                    if($check_role == $check_role_name && $checkAdd)
                                                      {
                                                        ?>
                                                    <li class="list-unstyled">
                                                        <a href="{{ url('delete_promocode', $value->_id) }}"
                                                            class="btn btn-danger" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this Promocode?');"><i
                                                                class="fas fa-trash"></i></a>
                                                    </li>

                                                    <?php } } } } ?>

                                                    <?php
                                            $check_role= Session::get('status');

                                                    if($check_role == '1')//Developer
                                                      {
                                                  ?>
                                                    <li class="list-unstyled">
                                                        <a href="{{ url('edit_promocode', $value->_id) }}"
                                                            class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                    </li>
                                                    <?php }?>

                                                    <?php
                                            $check_role= Session::get('status');

                                                    if($check_role == '1')//Developer
                                                      {
                                                  ?>
                                                    <li class="list-unstyled">
                                                        <a href="{{ url('delete_promocode', $value->_id) }}"
                                                            class="btn btn-danger" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this Promocode?');"><i
                                                                class="fas fa-trash"></i></a>
                                                    </li>


                                                    <?php }?>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>


                                </table>
                            </div>

                        </div>
                    </div>

                </div>



            </div>

        </section>

    </div>
@endsection

@section('script')
@endsection
