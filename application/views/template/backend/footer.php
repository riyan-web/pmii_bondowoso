</div>
<script src="<?= base_url(); ?>assets/backend/coba/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function() {
        $('#tgl_indo').datepicker({
            //merubah format tanggal datepicker ke dd-mm-yyyy
            format: "dd-mm-yyyy",
            //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
            //format: "dd-mm-yyyy",
            autoclose: true
        });
    });

    function harusHuruf(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32)
            return false;
        return true;
    }

    function harusAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>



<!-- <script src="<?= base_url(); ?>assets/backend/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/js/dashboard.js"></script>
    <script src="<?= base_url(); ?>assets/backend/js/widgets.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script> -->
<!-- <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script> -->
<!-- <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/js/init-scripts/data-table/datatables-init.js"></script> -->
<!-- <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script> -->


</body>

</html>