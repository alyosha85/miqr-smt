  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/images/admin_images/logo.png" alt="MIQR Logo" class="brand-image-xl" style="max-height: 55px; width: 100%;">
      <br>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel text-center">
        <div class="info">
          <a href="{{route ('profile')}}" class="d-block text-uppercase">{{Auth::user()->vorname}} {{Auth::user()->name}}</a>
          <a href="{{route ('profile')}}" class="d-block"><strong>{{ substr(Auth::user()->roles->pluck('name'),2,-2) }}</strong></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column text-uppercase" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt" style="color: #B17A57"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('/settings') }}" class="nav-link">
							<i class="nav-icon fas fa-cogs" style="color: #5bc0de"></i>
              <p>
                Einstellungen
              </p>
						</a>
					</li>
          <li class="nav-item has-treeview">
            <a href="{{ url('/inventory') }}" class="nav-link">
              <i class="nav-icon fas fa-boxes" style="color:#f0ad4e;"></i>
              <p>
                Inventar 
              </p>
						</a>
					</li>
          @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Super_Admin')) 
          <li class="nav-item has-treeview">
            <a href="{{ url('/contacts') }}" class="nav-link">
              <i class="nav-icon fas fa-address-book" style="color:#6969B3;"></i>
              <p>
                MIQR Mitarbeiter
              </p>
						</a>
					</li>
          @endif
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-sitemap" style="color:green;"></i>
              <p>
                Standort
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview text-capitalize">
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Berlin
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview font-weight-light">
                    <li class="nav-item">
                    <a href="{{ url('/matrix/berlin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>B-Trachenberg93</p>
                    </a>
                    </li>
                </ul>
                </li>
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                    Chemnitz
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                  <ul class="nav nav-treeview font-weight-light">
                      <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Barbarossa2</p>
                      </a>
                      </li>
                      <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Park28</p>
                      </a>
                      </li>
                  </ul>
                </li>
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                    Dresden
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview font-weight-light">
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Glashütter101</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>B-Glashütter101 A</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Löscher16</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mendelssohn18</p>
                    </a>
                    </li>
                </ul>
                </li>
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                    Erfurt
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview font-weight-light">
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>BHof1</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>BHof2</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>BHof4</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>BHof18</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>H89</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>H92</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Otto35</p>
                    </a>
                    </li>
                </ul>
                </li>
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                    Leipzig
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview font-weight-light">
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Landsberger4</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>B-Landsberger23</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mehring3</p>
                    </a>
                    </li>
                </ul>
                </li>
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                    Suhl
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview font-weight-light">
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Blücher6</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Puschkin1</p>
                    </a>
                    </li>
                </ul>
                </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-ticket-alt" style="color:orangered;"></i>
              <p>
                Ticket
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview text-capitalize">
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        IT
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview font-weight-light">
                    <li class="nav-item">
                    <a href="{{ route('ticket.opentickets') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Open</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ url('/matrix/berlin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Unassigned</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ url('/matrix/berlin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>My Tickets</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ url('/matrix/berlin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Recently updated</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ url('/matrix/berlin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>B-Trachenberg93</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ url('/matrix/berlin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Solved</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ url('/matrix/berlin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Solved</p>
                    </a>
                    </li>
                </ul>
                </li>
                <li class="nav-item">
                  <a href="{{ route('ticket.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Ticket Erstellen</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/usertickets') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Meine Tickets</p>
                  </a>
                </li>
            </ul>
          </li>

            <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Erfurt
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
