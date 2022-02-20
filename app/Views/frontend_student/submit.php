<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="navbar-brand logo" href="#"></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Submission Page</p>

            <form action="<?= base_url(); ?>/student/submit" method="post" enctype='multipart/form-data'>
                <div class="form-group">
                    <label for="assignment_code">Assignment Code</label>
                    <input type="text" class="form-control" id="assignment_code" name="assignment_code"
                           placeholder="Code" value="<?= set_value('assignment_code', $assignment_code ?? "") ?>">
                </div>

                <div class="form-group">
                    <label for="student_email">Email address</label>
                    <input type="email" class="form-control" id="student_email" placeholder="Enter email"
                           name="student_email"
                           value="<?= set_value('student_email', $student_email ?? "") ?>">
                </div>
                <div class="form-group">
                    <label for="file">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="file">
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Email
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="mb-0">
                <a href="<?= base_url(); ?>" class="text-center">Back to main page</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->