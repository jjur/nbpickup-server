<body class="hold-transition login-page">
<div class="login-box" style="width: 90%">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center" >
            <div class="container">
                <h4>File submitted successfully!</h4>
                <p>Timestamp: <?= date('Y-m-d H:i:s'); ;?><br>
                Review your submissions at: <a href="<?= base_url("Student/view_submission/$url"); ?>"><?=base_url("Student/view_submission/$url");?></a></>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->