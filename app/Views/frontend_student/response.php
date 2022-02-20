<body class="hold-transition login-page">
<div class="row">
    <div class="col-md-12">
        <div class="login-box" style="width: 100%">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a class="navbar-brand logo" href="#"></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Assignment Submitted Successfully!</p>
                    <p>Timestamp: <?= date('Y-m-d H:i:s');; ?><br>
                    Review your submissions at: <a href="<?= base_url("Student/view_submission/$url"); ?>"><?= base_url("Student/view_submission/$url"); ?></a></p>

                    <iframe src="<?= base_url("Student/view_submission/$url"); ?>" style="width: 100%"
                            height="375px"></iframe>

                    <p class="mb-0">
                        <a href="<?= base_url(); ?>" class="text-center">Back to main page</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    </div>
</div>
