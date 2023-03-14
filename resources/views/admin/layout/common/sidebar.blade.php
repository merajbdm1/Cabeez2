<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('dashboard')}}" class="brand-link">
        <img src="{{ asset('admin/dist/img/cabe.jpg') }}" alt="CAB-E Logo" class="brand-image" style="margin-left:0px;">
        <span class="brand-text font-weight-normal">CAB-E Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle
        elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
    </div>
    </div> --}}

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                {{-- {{  App\Models\AllDataTableRolesAndPermission::all()
               }} --}}
                <li class="nav-item menu-open">
                    <a href="{{ url('dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-car-side nav-icon"></i>
                        <p>
                            Drivers
                            <i class="fas fa-angle-left right "></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <?php
                        $check_role= Session::get('role');
                        $data = \App\Models\AllDataTableRolesAndPermission::get();
                        foreach($data as $item)
                        {
                         $check_role_name = $item->role_name;
                          foreach ($item->driver_permissions as $value)
                          {
                               if($value == 'Add') //users
                               {
                                $checkAdd = $value;

                                if($check_role == $check_role_name && $checkAdd)
                                  {
                              ?>
                              <li class="nav-item">
                                  <a href="{{ url('admin/add_driver')}}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Add Driver</p>
                                  </a>
                              </li>
                         <?php }   } } }?>

                         <?php
                         $check_role= Session::get('status');

                                 if($check_role == '1' || $check_role == '2' ) //developer or super admin


                                   {
                               ?>
                               <li class="nav-item">
                                   <a href="{{ url('admin/add_driver')}}" class="nav-link">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Add Driver</p>
                                   </a>
                               </li>
                          <?php }  ?>


                        <li class="nav-item">
                            <a href="{{ url('admin/driver') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Driver</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('driver_request')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Driver Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ url('promocode') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Settlement</p>
                          </a>
                      </li>

                    </ul>
                </li>



                <li class="nav-item">
                    <a href="{{ url('admin/riders') }}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>
                            Riders
                            {{-- <i class="fas fa-angle-left right"></i> --}}
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{url('book_now')}}" class="nav-link">
                        <i class="fas fa-road nav-icon"></i>
                        <p>
                            Rides
                            {{-- <i class="fas fa-angle-left right"></i> --}}
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>

                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-globe nav-icon"></i>
                        <p>
                            Tracking
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>





                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-gift nav-icon"></i>
                        <p>
                            Promocode
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ url('promocode') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Promocodes</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ url('promocode') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Groups Promocode</p>
                            </a>
                          </li>

                    </ul>
                </li>





                <li class="nav-item">
                  <a href="{{ url('all_manual_ride_booking') }}" class="nav-link">
                    <i class="nav-icon fas fa-motorcycle"></i>
                      <p>
                        Manual Ride Booking
                          {{-- <i class="fas fa-angle-left right"></i> --}}
                          {{-- <span class="badge badge-info right">6</span> --}}
                      </p>
                  </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Rating & Reviews
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('rider_reviews') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rider Reviews</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('driver_reviews') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Driver Reviews</p>
                            </a>
                        </li>

                    </ul>
                  </li>

                <li class="nav-item">
                  <a href="{{ url('view_hubs') }}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                        Charging Hub
                          {{-- <i class="fas fa-angle-left right"></i> --}}
                          {{-- <span class="badge badge-info right">6</span> --}}
                      </p>
                  </a>
                </li>


              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                    Reports
                        {{-- <i class="fas fa-angle-left right"></i> --}}
                        {{-- <span class="badge badge-info right">6</span> --}}
                    </p>
                </a>
              </li>




            <li class="nav-item">
              <a href="{{url('list_attendance')}}" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                Attendance
                      {{-- <i class="fas fa-angle-left right"></i> --}}
                      {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
              </a>
            </li>





                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog nav-icon"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Vehicle Setting
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/vehicle/category') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Vehicle Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/vehicle/make') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Vehicle Make</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/vehicle/model') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Vehicle Model</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('fare_view_setting') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fare Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Global Setting</p>
                            </a>
                        </li>
                    </ul>
                </li>

                  <?php
                       if (Session::get('status') == '1')
                     { ?>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="fas fa-cog nav-icon"></i>
                          <p>
                             Activity Logs
                              <i class="right fas fa-angle-left"></i>
                          </p>

                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item">
                              <a href="{{ url('activity_user_log') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Activity Log</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                   <?php }?>


                   <?php
                   if (Session::get('status') == "2")
                 { ?>
                 <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="fas fa-cog nav-icon"></i>
                      <p>
                          Account Setting
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                          <a href="{{ url('role_list') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Users</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('role_list_and_permission') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Role & Permission</p>
                          </a>
                      </li>

                  </ul>
              </li>

            <?php }?>



                    <?php
                         if (Session::get('status') == '1')
                       { ?>
                       <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-cog nav-icon"></i>
                            <p>
                                Account Setting
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ url('role_list') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('role_list_and_permission') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Role & Permission</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                  <?php }?>

              <?php
                  if (Session::get('status') == '0')
                { ?>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="fas fa-cog nav-icon"></i>
                      <p>
                          Account Setting
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                          <a href="{{ url('role_list') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Users</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('role_list_and_permission') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Role & Permission</p>
                          </a>
                      </li>

                  </ul>
                </li>

             <?php }?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
