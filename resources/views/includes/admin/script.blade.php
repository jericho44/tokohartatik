<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ url('assets/plugins/daterangpicker/moment.min.js') }}"></script>
<script src="{{ url('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('assets/backend/js/stisla.js') }}"></script>

<!-- Template JS File -->
<script src="{{ url('assets/backend/js/scripts.js') }}"></script>
<script src="{{ url('assets/backend/js/custom.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ url('assets/backend/js/page/index.js') }}"></script>
<script>
    $('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
    });

   $('.delete-confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete?`,
              text: "",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
</script>