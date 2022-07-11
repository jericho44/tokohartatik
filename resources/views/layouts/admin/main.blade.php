<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        @yield('title')
    </title>

    @stack('before-style')
    @include('includes.admin.style')
    @stack('after-style')

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('includes.admin.navbar')
            @include('includes.admin.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @include('sweetalert::alert')
                @yield('content')
            </div>

            @include('includes.admin.footer')
        </div>
    </div>

    @stack('before-script')
    @include('includes.admin.script')
    @stack('after-script')
</body>

</html>