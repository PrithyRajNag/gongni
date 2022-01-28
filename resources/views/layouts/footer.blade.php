<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">

</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
{{--<script src="{{ asset('/js/jquery.min.js')}}"></script>--}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{--<script src="{{ asset('/js/jquery-ui.min.js')}}"></script>--}}
<!-- Bootstrap -->
<script src="{{ asset('/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/adminlte.min.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('/js/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('/js/raphael.min.js')}}"></script>
<script src="{{ asset('/js/jquery.mapael.min.js')}}"></script>
<script src="{{ asset('/js/usa_states.min.js')}}"></script>

<!-- ChartJS -->
<script src="{{ asset('/js/Chart.min.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/js/jszip.min.js')}}"></script>
<script src="{{ asset('/js/pdfmake.min.js')}}"></script>
<script src="{{ asset('/js/vfs_fonts.js')}}"></script>
<script src="{{ asset('/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('/js/buttons.colVis.min.js')}}"></script>

<!-- jquery-validation -->
<script src="{{ asset('/js/jsjquery.validate.min.js')}}"></script>
<script src="{{ asset('/js/jsadditional-methods.min.js')}}"></script>

<!-- Select2 -->
<script src="{{ asset('/js/select2.full.min.js')}}"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('/js/sweetalert2.min.js')}}"></script>

<!-- Toastr -->
<script src="{{ asset('/js/toastr.min.js')}}"></script>

<!-- Day Night Toggle -->
<script src="{{asset('/js/dayNightToggle.min.js')}}"></script>

<!-- Custom Error Page -->
{{--<script src="{{ asset('/js/customError.min.js')}}"></script>--}}

<!-- bs-custom-file-input -->
<script src="{{ asset('/js/bs-custom-file-input.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/js/demo.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/js/dashboard.js')}}"></script>

<!-- Google Map -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnyJJ2gorvX0rsuhBJLNUsfyioWSSep2Q&callback=initMap"></script>--}}




<script>
    $(function () {
        $("#indexTable").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#indexTable_wrapper .col-md-6:eq(0)');

        // // For Sweet Alert or Swal
        // var Toast = Swal.mixin({
        //     toast: true,
        //     position: 'top-end',
        //     showConfirmButton: false,
        //     timer: 3000
        // });
        {{--    var sessionData = '{{ session('success') }}';--}}
        {{--    if(sessionData)--}}
        {{--    Toast.fire({--}}
        {{--        icon: 'success',--}}
        {{--        title: sessionData,--}}
        {{--    })--}}


        //For Toastr
        var successData = '{{ session('success') }}';
        if (successData)
            toastr.success(successData)

        var errorData = '{{ session('error') }}';
        if (errorData)
            toastr.error(errorData)


        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        // Employee ward field toggle depends on role
        $("#user_role").on('change', function () {
            // console.log(this.value);
            if (this.value != 'commissioner') {
                $("#user_ward_id").hide()
            } else {
                $("#user_ward_id").show()
            }
        });

        // Employee Spouse field toggle depends on role
        $('input[name="marital_status"]').on('change', function () {
            if (this.value != 'married') {
                $("#spouse_names").hide()
                $("#spouse_names_bn").hide()
            } else {
                $("#spouse_names").show()
                $("#spouse_names_bn").show()
            }
        });





        // $('input[name="marital_status"]').on('change', function() {
        //     // console.log(this.value);
        //     $('.spouse_names')
        //         // .toggle(+this.value == "married" && this.checked);
        // }).change();

        //For File Input
        bsCustomFileInput.init();


        // Validation For Restrict Taking Date
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var prepareDate = year + '-' + month + '-' + day;

        // Validation For Restrict Taking Past Date Only Take Future Date
        $('.take_future_date').attr('min', prepareDate);
        // Validation For Restrict Taking Past Date Only Take Future Date Ends

        // Validation For Restrict Taking Future Date Only Take Past Date
        $('.take_past_date').attr('max', prepareDate);
        // Validation For Restrict Taking Future Date Only Take Past Date Ends
    });




    // $(function () {
    //     var dtToday = new Date();
    //
    //     var month = dtToday.getMonth() + 1;
    //     var day = dtToday.getDate();
    //     var year = dtToday.getFullYear();
    //     if (month < 10)
    //         month = '0' + month.toString();
    //     if (day < 10)
    //         day = '0' + day.toString();
    //
    //     var maxDate = year + '-' + month + '-' + day;
    //     // alert(maxDate);
    //     $('.take_past_date').attr('min', maxDate);
    // });


    // Sidebar active and open in js

</script>
@stack('customScripts')

</body>
</html>


