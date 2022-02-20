<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="navbar-brand logo" href="#"></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Assignment Submitted Successfully!</p>
            <p>Timestamp: <?= date('Y-m-d H:i:s'); ;?></p>
            <p>Review your submissions at: <?=base_url("Student/view_submission/$url");?></p>

            <iframe src="<?=base_url("Student/view_submission/$url");?>"></iframe>

            <p class="mb-0">
                <a href="<?= base_url(); ?>" class="text-center">Back to main page</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->