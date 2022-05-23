<!-- jquery latest version -->
<script src="{{ asset('tshop/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
<!-- Bootstrap framework js -->
<script src="{{ asset('tshop/assets/js/bootstrap.min.js') }}"></script>
<!-- All js plugins included in this file. -->
<script src="{{ asset('tshop/assets/js/plugins.js') }}"></script>
<script src="{{ asset('tshop/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('tshop/assets/js/owl.carousel.min.js') }}"></script>
<!-- Waypoints.min.js. -->
<script src="{{ asset('tshop/assets/js/waypoints.min.js') }}"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="{{ asset('tshop/assets/js/main.js') }}"></script>
<script>
    $(".delete").on("click", function(){
        return confirm("Apakah anda yakin ingin menghapus produk ini?");
    });
</script>