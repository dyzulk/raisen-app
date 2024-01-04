

  <!-- jQuery -->
  <script src="<?=base_url('vendor/')?>template/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?=base_url('vendor/')?>template/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?=base_url('vendor/')?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?=base_url('vendor/')?>template/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?=base_url('vendor/')?>template/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?=base_url('vendor/')?>template/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?=base_url('vendor/')?>template/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?=base_url('vendor/')?>template/plugins/moment/moment.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?=base_url('vendor/')?>template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?=base_url('vendor/')?>template/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?=base_url('vendor/')?>template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url('vendor/')?>template/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="<?//base_url('vendor/')?>template/dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?=base_url('vendor/')?>template/dist/js/pages/dashboard.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?=base_url('vendor/')?>template/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/jszip/jszip.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?=base_url('vendor/')?>template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?=base_url('vendor/')?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="<?=base_url('vendor/')?>template/plugins/toastr/toastr.min.js"></script>
  <!-- Page specific script -->
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": true,
      "buttons": ["excel", "pdf"]
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    });
</script>
<script>
    function refreshPage() {
        location.reload(true); // Parameter true untuk melakukan reload dari server
    }
</script>