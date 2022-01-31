  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars fa-lg"></i></a>
      </li>
      @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Super_Admin'))
      <!-- Disable Logout for SSO (windows Authentication) -->
       <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link float-right"  href="{{ route('ticket.opentickets') }}">
          <i class="fas fa-yin-yang fa-lg"></i>
      </a>
      </li> 
      @endif
    </ul>
    <!-- <ul class="navbar-nav ml-auto"> 
      @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Super_Admin'))
       Disable Logout for SSO (windows Authentication) 
       <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link float-right"  href="{{ route('ticket.opentickets') }}">
          <i class="fas fa-clipboard-list fa-2x"></i>
      </a>
      </li> 
      @endif
     </ul> -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <div id="notification_bell">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell fa-lg"></i>
            @if(auth()->user()->unreadnotifications->count())
            <span class="badge badge-warning navbar-badge" id="notifciation_count">{{auth()->user()->unreadnotifications->count()}}</span>
            @endif
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <p class="dropdown-item">Sie haben {{auth()->user()->unreadnotifications->count()}} neue Benachrichtigungen </p>
            @foreach(auth()->user()->unreadnotifications as $notification)
            <input type="hidden" value="{{@$notification->id}}">
            @if($notification)
            <a href="{{url ('ticket/'.$notification->data['id'])}}" class="dropdown-item">
              <i class="fas fa-paperclip mr-2" style="color:#461b23"></i> {{@$notification->data['title']}}<br>
              <i class="far fa-user mr-2" style="color:#461b23"></i> {{@$notification->data['Ersteller']}}<br>
              <i class="fas fa-question-circle mr-2" style="color:blue;"></i> {{@$notification->data['problem_type']}}<br>
              <i class="fas fa-hourglass-start mr-2" style="color:green"></i> {{@$notification->updated_at->diffForHumans()}}<br>
              <!-- <span class="float-right text-muted text-sm">{{@$notification->data['problem_type']}}</span>
              <p class="float-right text-muted text-sm">{{@$notification->updated_at->diffForHumans()}}</p> -->
            </a>
            @endif
            <hr>
            <!-- <div class="dropdown-divider"></div> -->
            @endforeach
            <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
          </div>
        </div>
      </li>
    </ul>

    
  </nav>
  <!-- /.navbar -->


  

