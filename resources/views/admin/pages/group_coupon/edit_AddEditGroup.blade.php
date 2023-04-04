
 @extends('admin.layout.master')
 @section('style')
     <style>
         .rider_data {
             background: #fff;
             height: 350px;
             overflow-x: hidden;
             border: 1px solid rgb(177, 164, 214) !important;
         }

         .rider_dataclass {
             background: #fff;
             height: 350px;
             overflow-x: hidden;
             border: 1px solid rgb(177, 164, 214) !important;
         }
     </style>
 @endsection

 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Add/Edit Group</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item active">Add/Edit Group</li>
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
                         @if ($message = Session::get('RiderDetailSuccess'))
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

                             <div class="card card-primary">
                                 <div class="card-header">
                                     <h3 class="card-title">Add/Edit Group</small></h3>
                                     <a type="button" href="{{ url('view_group_promocode') }}"
                                         class="btn btn-default float-right bg-primary">
                                         Back

                                     </a>
                                 </div>


                                 <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 0px;">
                                            <label for="exampleFirstName">Rider List<span>

                                        </div>

                                        <style>
                                            .fixedsearch {

                                                padding: 0 0 0 0;
                                                margin: 0 auto;
                                                position: fixed;
                                                min-width: 100%;
                                                height: 90px;
                                                display: table;
                                            }

                                            .fixedsearch {
                                                text-align: center;
                                                /* 	font-size: 4vw; */
                                                font-weight: bold;
                                                display: table-cell;
                                                vertical-align: middle;
                                            }
                                        </style>
                                <form action="{{url('groupAdd_phone_number',$gppromid->_id)}}" method="POST">
                                    @csrf
                                        <div class="rider_data" class="fixedsearch">
                                            <div class="card-body">
                                                <form action="" method="GET">
                                                <table class="table table-bordered table-striped"
                                                    id="example3">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" data-sortable="true">NO
                                                            </th>
                                                            <th class="text-center" data-sortable="true">
                                                                FIRST NAME</th>
                                                            <th class="text-center" data-sortable="true">
                                                                LAST NAME</th>
                                                            <th class="text-center" data-sortable="true">
                                                                MOBILE NO</th>
                                                            <th class="text-center" data-sortable="true">
                                                                Select Rider</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    <tbody id="myList2">
                                                        @foreach ($viewrider as $rider_model)

                                                            {{-- @foreach ($editgroup->rider_mobile as $checkitem)
                                                            @endforeach
                                                            @if ($driver_model->phone_number ==  $checkitem)
                                                                @continue
                                                            @else --}}
                                                                <tr>
                                                                    <td class="text-center">
                                                                        {{ $i++ }}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{ $rider_model->first_name }}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{ $rider_model->last_name }}</td>
                                                                    <td class="text-center">
                                                                        {{ $rider_model->phone_number }}
                                                                    </td>
                                                                    <td class="text-center">

                                                                         <input type="hidden" style="height:40px;" name="gp_pm_id" value="{{$gppromid->_id}}"/>
                                                                         <input type="checkbox" style="height:40px;" name="rider_mobile[]" value="{{$rider_model->phone_number}}"/>
                                                                    </td>
                                                                </tr>
                                                            {{-- @endif --}}

                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary" value="submit">DONE</button>
                                     </div>
                                    </form>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFirstName">Selected Rider<span
                                                    class="text-danger">*</span></label>
                                            <div class="rider_dataclass">
                                                <ul class="list-unstyled">
                                                    <li id="displaylet">

                                                        <?php

                                                            foreach ($gpmcodeidridermobile as $key => $value)

                                                               foreach ($value as $key => $item)
                                                                {
                                                                            echo $item;
                                                                ?>
                                                                <a href="{{url('deletegpmridermobile/'.$gpridermobile.'/'.'mobile/'.$item)}}"><Span class="badge badge-danger">X</Span></a> &nbsp;
                                                              <?php }
                                                            ?>
                                                         {{-- @foreach ($gpmcodeidridermobile as $item)
                                                                {{$item}}
                                                         @endforeach --}}
                                                                {{-- @if(isset($gpmcodeidridermobile))
                                                                   @if(count($gpmcodeidridermobile) == 0)
                                                                   @php $felimit = 0; @endphp
                                                                   @else
                                                                   @php $felimit = count($gpmcodeidridermobile) - 1; @endphp
                                                                   @endif
                                                                    @foreach ($gpmcodeidridermobile[$felimit] as $item)
                                                                            {{$item}} <a href=""><Span class="badge badge-danger">X</Span></a>
                                                                    @endforeach
                                                                @endif

                                                        {{-- </form> --}}


                                                    </li><br>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                 <!-- /.card-header -->
                                 <!-- form start -->
                                 {{-- <form id="quickForm" action="" method="POST"
                                     enctype="multipart/form-data">
                                     @csrf
                                     <div class="card-body">
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <div class="form-group">
                                                     <label for="exampleFirstName">Choose Rider<span
                                                             class="text-danger">*</span></label>

                                                 </div>




                                             </div>
                                         </div>
                                     </div>
                             </div>
                             <!-- /.card-body -->

                             </form> --}}


                     </div>



                     <!-- /.card -->
                 </div>
                 <!--/.col (left) -->
                 <!-- right column -->
                 <div class="col-md-6">

                 </div>
                 <!--/.col (right) -->
             </div>
             <!-- /.row -->
     </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
     </div>
 @endsection

 @section('script')
     <script>

         var d = new Array();

         function chkbox(this1) {
             var s = this1.value;
             if (this1.checked) {

                 d.push(s);
                 document.getElementById("displaylet").innerHTML = d;

             } else {
                 var index = d.indexOf(s);
                 if (index > -1) {
                     d.splice(index, 1);
                     document.getElementById("displaylet").innerHTML = d;
                 }
             }

         }
     </script>
 @endsection
