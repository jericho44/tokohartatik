<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('pages.tshop.includes.style')
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        @include('pages.tshop.includes.header')
        <!-- End Header Style -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            @include('pages.tshop.includes.search')
            <!-- End Search Popap -->
            <!-- Start Offset MEnu -->
            @include('pages.tshop.includes.sidebar')
            <!-- End Offset MEnu -->
            <!-- Start Cart Panel -->
            @include('pages.tshop.includes.shoppingcart')
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        @include('sweetalert::alert')
        @yield('content')
        <!-- Start Footer Area -->
        @include('pages.tshop.includes.footer')
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    @include('pages.tshop.includes.modalbox')
    <!-- Placed js at the end of the document so the pages load faster -->

    @include('pages.tshop.includes.script')

</body>

</html>