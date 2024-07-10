     <!-- Sidebar Menu -->
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li id="liUsuarios" class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Usuarios
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('usuarios.configuracion.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon text-primary"></i>
                        <p>Configurar cuenta</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                        <i class="far fa-circle nav-icon text-primary"></i>
                        <p>Historial de solicitudes</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('tickets.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-bug"></i>
                    <p>
                        Reportes
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-server"></i>
                    <p>
                        Inventario Hardware
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                            <i class="far fa-circle nav-icon text-primary"></i>
                            <p>Inventario de activos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                            <i class="far fa-circle nav-icon text-primary"></i>
                            <p>Mantenimientos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                            <i class="far fa-circle nav-icon text-primary"></i>
                            <p>Historial de cambios</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        Estadísticas
                    </p>
                </a>
            </li>
            <li id="liMenuAdmin" class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>
                        Administradores
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li id="liConfigUsers" class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon text-warning"></i>
                          <p>
                            Configuración de Usuarios
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{ route('usuarios.index') }}" class="nav-link">
                              <i class="far fa-dot-circle nav-icon text-info"></i>
                              <p>Gestión de usuarios</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('perfiles.index') }}" class="nav-link">
                              <i class="far fa-dot-circle nav-icon text-info"></i>
                              <p>Perfiles y permisos</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="far fa-dot-circle nav-icon text-info"></i>
                              <p>Registro de Actividades</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                        <i class="far fa-circle nav-icon text-primary"></i>
                        <p>Copias de Seguridad</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">

                <form id="formLogout" action="{{ route('logout') }}" method="post">
                    @csrf
                        <a id="btnLogout" href="#" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p class="text-danger font-weight-bold">
                                Cerrar sesión
                            </p>
                        </a>
                </form>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

      <script>
        document.getElementById('btnLogout').addEventListener('click' , function(e){
            document.getElementById('formLogout').submit();
        });
      </script>
