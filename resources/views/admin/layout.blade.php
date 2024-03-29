<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BackEnd</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    {{-- Data Table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/67b6ece322.js" crossorigin="anonymous"></script>

    <!-- CKeditor -->
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    @include('sweetalert::alert')

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <div class="ml-3"><b>@yield('title')</b></div>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i> {{ Auth::user()->username }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="text-center">
                            <i class="fa fa-user"></i> <br>
                            {{ Auth::user()->username }} <br>
                            {{ Auth::user()->role }}
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('index') }}" class="dropdown-item"><i class="fa-solid fa-house"></i> Home</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('setting.index') }}" class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button style="border: 0; background-color: white;" type="submit" class="dropdown-item"
                                aria-current="page"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                        </form>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info" style="color: white;">
                        <b>Back</b>End
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}" class="nav-link @yield('dashboard')">
                                <i class="fa-solid fa-gauge-high"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        @if (Auth::user()->role != 'user')

                        @if (Auth::user()->role != 'operator')
                        <li class="nav-header">
                            Admin
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pagetitle.index') }}" class="nav-link @yield('pagetitle')">
                                <i class="fa-solid fa-a"></i>
                                <p>Page Title</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('banner.index') }}" class="nav-link @yield('banner')">
                                <i class="fa-solid fa-image"></i>
                                <p>Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('alur.index') }}" class="nav-link @yield('alur')">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Alur</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('testimonial.index') }}" class="nav-link @yield('testimonial')">
                                <i class="fa-solid fa-comments"></i>
                                <p>Testimonial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('partner.index') }}" class="nav-link @yield('partner')">
                                <i class="fa-solid fa-handshake"></i>
                                <p>Partner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('counter.index') }}" class="nav-link @yield('counter')">
                                <i class="fa-solid fa-bell-concierge"></i>
                                <p>Counter</p>
                            </a>
                        </li>
                        @endif

                        <li class="nav-header">
                            Operator
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('resto.index') }}" class="nav-link @yield('product')">
                                <i class="fa-solid fa-bowl-food"></i>
                                <p>Resto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog.index') }}" class="nav-link @yield('blog')">
                                <i class="fa-solid fa-newspaper"></i>
                                <p>Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link @yield('category')">
                                <i class="fa-solid fa-building"></i>
                                <p>Kecamatan</p>
                            </a>
                        </li>
                        
                        @if (Auth::user()->role == 'superadmin')
                        <li class="nav-header">
                            Settings
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact.index') }}" class="nav-link @yield('contact')">
                                <i class="fa-solid fa-phone"></i>
                                <p>Contact</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link @yield('user')">
                                <i class="fa-solid fa-user"></i>
                                <p>User Management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('config.index') }}" class="nav-link @yield('config')">
                                <i class="fa-solid fa-cog"></i>
                                <p>Config</p>
                            </a>
                        </li>
                        @endif

                        @endif

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div id="content">
                <br>
                <div class="container">

                    <section class="content">
                        @yield('content')
                    </section>

                </div>
            </div>

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Crafted with <i style="color: red;" class="nav-icon fas fa-heart"></i> by <a target="_blank"
                        href="https://wanteknologi.com"> WAN Teknologi Internasional</a></b>
            </div>
            <strong>2022 &copy; BackEnd.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });

    </script>

    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    </script>

    <script>
        $(function () {
            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    </script>

    <script>
        document.addEventListener('trix-file-accept', function (e) {
            e.preventDefault();
        })

    </script>

    {{-- <script>
    $(function(e) {
      $("#chkCheckAll").click(function() {
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
      });

      $("#deleteAllSelectedTip").click(function(e) {
        e.preventDefault();
        var allids = [];

        $("input:checkbox[name=ids]:checked").each(function() {
          allids.push($(this).val());
        });

        $.ajax({
          url: "{{ route('tip.deleteSelected') }}",
    type: "DELETE",
    data: {
    _token: $("input[name=_token]").val(),
    ids: allids
    },
    success: function(response) {
    $.each(allids, function(key, val) {
    $("#sid" + val).remove();
    })
    }
    });
    })
    });
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <!-- JAVASCRIPT -->
    <script src="../../assets/home/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>

</body>

</html>
