<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Laravue</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <script defer src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
  <script defer src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <script defer src=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></script>
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/v4-shims.js"></script> 
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/fontawesome.js"> </script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
                   

                    <!-- Right Side Of Navbar -->
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <ul class="navbar-nav xl-auto">
                        <!-- Authentication Links -->
                       
                            <li class="nav-item dropdown show">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Perfil
                                </a>

                               
                                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right" aria-labelledby="navbarDropdown" style="left: inherit; right: 0px;">
                                   <a href="#" class="dropdown-item">
         
         Ud. ha ingresado como: @if(@Auth::user()->hasRole('admin'))
            <h4>Administrador</h4>
        @endif
        @if(@Auth::user()->hasRole('users'))
            <h4>Usuario</h4>
        @endif
        <div class="dropdown-divider"></div>
            Nombre:  {{ Auth::user()->name }}
             <div class="dropdown-divider"></div>
             E-mail:  {{ Auth::user()->email }}
             <div class="dropdown-divider"></div>
             Cedula:  {{ Auth::user()->cedula }}
             <div class="dropdown-divider"></div>
            
           
          </a>
                                   
                                   <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <b> {{ __('Cerrar Sesion') }}</b>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        
                    </ul>
                    </nav>
                    </div>
                </div>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" align="center">
      
      <span class="brand-text font-weight-light" >Bienvenido: {{ Auth::user()->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" >
        
        <div class="info" >
          <a href="#" class="d-block">Nenu Principal</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>
          
          @if(@Auth::user()->hasRole('admin'))
            <li class="nav-item">
            <router-link to="/user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Usuarios
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/useremail" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Views E-mails
              </p>
            </router-link>
          </li>
          @endif
           @if(@Auth::user()->hasRole('users'))
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Email
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
          
            <router-link :to="{name: '/email', 
            params: {id_user: '{{Auth::user()->id}}' }}"  class="nav-link">
             <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Send
              </p>
            </router-link>
          </li>
               <li class="nav-item">
          
            <router-link  :to="{name: '/emailviews', 
            params: {id_user: '{{Auth::user()->id}}' }}"  class="nav-link">
             <i class="nav-icon fas fa-eye"></i>
              <p>
                View
              </p>
            </router-link>
          </li>
            </ul>
          </li>
            
            
            
            
           @endif
          <li class="nav-item">
            
            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <i class="nav-icon fas fa-power-off"></i> <b> {{ __('Cerrar Sesion') }}</b>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <router-view></router-view> 
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>