<!-- jQuery -->
<script src="<?= base_url(); ?>/assets_admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/assets_admin/js/adminlte.min.js"></script>

<script src="<?= base_url(); ?>/assets_admin/js/demo.js"></script>
<script type="application/javascript">
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
</body>
</html>
<!-- REQUIRED SCRIPTS -->