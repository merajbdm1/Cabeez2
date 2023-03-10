
<style>



h1{
  position:absolute;
  left:20px;
}

.container{
  position:fixed;
  top:10px;
  right:15px;
  width:500px;
}

.notification{
  position:relative;
  width:300px;
  margin-bottom:15px;
  line-height:20px;
  padding:15px;
  border-radius:10px;
  float:right;
  animation:grow 0.5s ease-in;

  &.notification-info{
    background:#C4FFF5;
  }
  &.notification-success{
    background:#C4FFE3;
  }
  &.notification-warning{
    background:#F0C85F;
  }
  &.notification-danger{
    background:#F0685F;
  }
  & b{
    text-transform:uppercase;
  }
  &.slide-out{
    transform:translateX(500px);
  }
  &.hide{
    transition: all 1s ease-out;
  }
}

@keyframes grow{
  from{
    opacity:0;
    transform:scale(0.5);
  }
  to{
    opacity:1;
    transform:scale(1);
  }
}

</style>
<div class="wrapper">
    {{-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('admin/dist/img/cabe.jpg') }}" alt="CAB-E Logo" height="66"
            width="128">
    </div> --}}

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            {{-- <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li> --}}
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>

                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>


            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('admin/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('admin/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('admin/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>


            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                    role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li> --}}
            </ul>
              <li class="dropdown list-unstyled">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: grey"> {{ $datasession->email }} </a>
                <ul class="dropdown-menu list-unstyled">
                    <li><a href="{{ route('signout') }}">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-sign-out-alt" style="color: rgb(105, 103, 103)" title="Logout">Sign-out</a></i>
                </ul>
            </li>


              {{-- <div class="noticontainer">

                </div> --}}

    </nav>
<script>
 const container = document.querySelector(".noticontainer");
const TYPES = {
  INFO: "info",
  SUCCESS: "success",
  WARNING: "warning",
  DANGER: "danger"
};

function addNotification(type, text) {
  const newNotification = document.createElement("div");
  newNotification.classList.add("notification", `notification-${type}`);

  const innerNotification = `<b>${type}</b>: ${text}`;

  newNotification.innerHTML = innerNotification;

  container.appendChild(newNotification);

  return newNotification;
}

function removeNotification(notification) {
  notification.classList.add("hide");
  notification.classList.add("slide-out");

  setTimeout(() => {
    container.removeChild(notification);
  }, 500);
}

const info = addNotification(
  TYPES.INFO,
  "Your booking has been made. Please wait 3-5 days for final confirmation."
);
setTimeout(() => {
  removeNotification(info);
}, 3000);

setTimeout(() => {
  const success = addNotification(
    TYPES.SUCCESS,
    "Congratulations! You've won this round!!"
  );
  setTimeout(() => {
    removeNotification(success);
  }, 3000);
}, 2000);

setTimeout(() => {
  const warning = addNotification(
    TYPES.WARNING,
    "If you proceed, you will lose any unsaved work"
  );
  setTimeout(() => {
    removeNotification(warning);
  }, 3000);
}, 1500);

setTimeout(() => {
  const danger = addNotification(TYPES.DANGER, "Post deleted");
  setTimeout(() => {
    removeNotification(danger);
  }, 4000);
}, 2200);

</script>
