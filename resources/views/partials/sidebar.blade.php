<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('dist/img/logocsnm.jpeg')}}" alt="Logo" class="brand-image img-circle elevation-2" style="opacity: .9">
      <span class="brand-text font-weight-light">CSNM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->nombre}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Citas
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right" id="info-count-citas">0</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('cita.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agendar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('paciente.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pacientes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('consulta.index')}}" class="nav-link">
              <i class="nav-icon fas fa-user-edit"></i>
              <p>
                Consultas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-question-circle"></i>
              <p>
                Ayuda
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>