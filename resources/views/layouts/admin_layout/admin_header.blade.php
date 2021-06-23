  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars fa-lg"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
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

    </ul>
  </nav>
  <!-- /.navbar -->
