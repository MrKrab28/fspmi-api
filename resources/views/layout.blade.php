<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('includes.styles')
    @stack('styles')
</head>

<body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->


            @auth('admin')
                @include('includes.admin.sidebar')
            @endauth

            <!-- Sidebar navigation-->
            <!-- Sidebar Start -->
            <!--  Sidebar End -->
            <!-- End Sidebar navigation -->
            @auth('user')
                @include('includes.user.sidebar')
            @endauth

            <!-- End Sidebar scroll-->
        </aside>



        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @auth('admin')
                @include('includes.admin.header')
            @endauth
            @auth('user')
                @include('includes.user.header')
            @endauth


            <!--  Header End -->


            {{-- content --}}
            <div class="container-fluid">

                @yield('content')
            </div>
        </div>

    </div>


    @include('includes.scripts')
    @stack('modals')
    @stack('scripts')
    @if (Session::has('login-success'))
        <script>
            Swal.fire({
                title: "{{ Session::get('login-success') }}",
                text: "Selamat Datang",
                icon: "success"
            });
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Berhasil",
                text: "{{ Session::get('success') }}",
                icon: "success"
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: "Gagal",
                text: "{{ Session::get('error') }}",
                icon: "error"
            });
        </script>
    @endif
</body>

</html>
