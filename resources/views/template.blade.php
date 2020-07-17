<!DOCTYPE html>

<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>CoreUI Free Bootstrap Admin Template</title>
  <link rel="manifest" href="assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Main styles for this application-->
  <link href="{{ asset('assets/dist') }}/css/coreui.min.css" rel="stylesheet">
  <!-- Global site tag (gtag.js) - Google Analytics-->
  <script src="{{asset('sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('sweetalert2/dist/sweetalert2.min.css')}}">
    <script>
        const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
    </script>
    @yield('css')
</head>

<body class="c-app">

  {{-- Sidebar --}}

  @include('sidebar')


  <div class="c-wrapper c-fixed-components">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
      <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
        data-class="c-sidebar-show">
        <span class="material-icons">
          menu
        </span>
      </button><a class="c-header-brand d-lg-none" href="#">
        <svg width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg></a>
      <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
        data-class="c-sidebar-lg-show" responsive="true">
        <span class="material-icons">
          menu
        </span>
      </button>
      <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#"
            role="button" aria-haspopup="true" aria-expanded="false">
        <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('/storage/images/' . auth()->user()->foto) }}" alt="user@email.com"></div>
          </a>
          <div class="dropdown-menu dropdown-menu-right pt-0">
            <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
            <a class="dropdown-item" href="#">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Logout</a>
          </div>
        </li>
      </ul>
      <div class="c-subheader px-3">
        <!-- Breadcrumb-->
        @php
            $url = explode('/',Request::path());
        @endphp
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">Home</li>
          @foreach ($url as $u)
            <li class="breadcrumb-item">{{ ucfirst($u) }}</li>
          @endforeach
          <!-- Breadcrumb Menu-->
        </ol>
      </div>
    </header>
    <div class="c-body">
      <main class="c-main">
        <div class="container-fluid">
          <div class="fade-in">
              @yield('content')
          </div>
        </div>
      </main>
      <footer class="c-footer">
        <div><p class="text-center">Copyright © 2020 All rights reserved | This template is made with <span class="material-icons" style="font-size: inherit">
            favorite
            </span></i> by <a href="">Teguh Kurnia</a></p></div>
      </footer>
    </div>
  </div>
  <!-- CoreUI and necessary plugins-->
  <script src="{{ asset('assets/dist') }}/js/coreui.bundle.min.js"></script>
</body>

</html>
