<!-- Place favicon.ico in the root directory -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('tshop/assets/images/favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ asset('thsop/assets/images/apple-touch-icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<!-- All css files are included here. -->
<!-- Bootstrap fremwork main css -->
<link rel="stylesheet" href="{{  asset('tshop/assets/css/bootstrap.min.css') }}">
<!-- Owl Carousel main css -->
<link rel="stylesheet" href="{{ asset('tshop/assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('tshop/assets/css/owl.theme.default.min.css') }}">
<!-- This core.css file contents all plugings css file. -->
<link rel="stylesheet" href="{{ asset('tshop/assets/css/core.css') }}">
<!-- Theme shortcodes/elements style -->
<link rel="stylesheet" href="{{ asset('tshop/assets/css/shortcode/shortcodes.css') }}">
<!-- Theme main style -->
<link rel="stylesheet" href="{{ asset('tshop/assets/style.css') }}">
<!-- Responsive css -->
<link rel="stylesheet" href="{{ asset('tshop/assets/css/responsive.css') }}">
<!-- User style -->
<link rel="stylesheet" href="{{ asset('tshop/assets/css/custom.css') }}">


<!-- Modernizr JS -->
<script src="{{ asset('tshop/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

{{-- CSRF TOKEN --}}
<meta name="csrf-token" content="{{ csrf_token() }}">