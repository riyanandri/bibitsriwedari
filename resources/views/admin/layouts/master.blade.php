<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header')
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('admin.layouts.navbar')
            <!-- partial -->

            @yield('content')

            <!-- partial:partials/_footer.html -->
            @include('admin.layouts.footer')
            <!-- partial -->

        </div>
    </div>

    @include('admin.layouts.scripts')

</body>

</html>
