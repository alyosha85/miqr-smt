  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars fa-lg"></i></a>
      </li>
    </ul>
    <!-- <ul class="navbar-nav ml-auto"> -->
      <!-- Disable Logout for SSO (windows Authentication) -->
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link float-right" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt fa-lg"></i>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
      </li> -->

    <!-- </ul> -->

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell fa-lg"></i>
          @if(auth()->user()->unreadnotifications->count())
          <span class="badge badge-warning navbar-badge">{{auth()->user()->unreadnotifications->count()}}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- <span class="dropdown-item dropdown-header">{{auth()->user()->notifications->count()}} </span> -->
          @foreach(auth()->user()->unreadnotifications as $notification)
          <a href="#" class="dropdown-item">
            <i class="fas fa-circle mr-2" style="color:#661421"></i> {{@$notification->data['Ersteller']}}
            <span class="float-right text-muted text-sm">{{@$notification->updated_at->diffForHumans()}}</span>
          </a>
          <!-- <div class="dropdown-divider"></div> -->
          @endforeach
          <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
