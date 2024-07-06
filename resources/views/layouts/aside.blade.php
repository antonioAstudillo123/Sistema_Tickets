 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <span class="brand-text font-weight-light">Sistema de Tickets</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if(Auth::user()->sexo === 'M')
                <img src="{{ asset('img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
            @else
                <img src="{{ asset('img/avatar2.png') }}" class="img-circle elevation-2" alt="User Image">
            @endif

        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      @include('layouts.menu')
    </div>
    <!-- /.sidebar -->
  </aside>
