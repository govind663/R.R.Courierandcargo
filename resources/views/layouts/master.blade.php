<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none">
<head>
    <!-- Head Start -->
    <x-head />

    @stack('styles')
</head>

<body>
    <!-- Main Wrapper Start -->
    <div class="main-wrapper">

        <!-- Header Start -->
        <x-header />
        <!-- Header End -->

        <!-- Sidebar Start -->
        <x-sidebar />
        <!-- Sidebar End -->

        <!-- Page Wrapper Start -->
        @yield('content')
        <!-- Page Wrapper End -->

        <!-- Start Main JS  -->
        <x-main-js />
        <!-- End Main JS  -->

        {{-- Custom Js --}}
        @stack('scripts')

    </div>
    <!-- Main Wrapper End -->
</body>

</html>
