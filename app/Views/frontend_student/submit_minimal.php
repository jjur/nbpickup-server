<body class="hold-transition login-page">
<div class="login-box" style="width: 90%">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center" >
            <form action="<?= base_url();?>/student/submit_minimal/<?= $assignment_code;?>/<?= urlencode($student_email);?>" method="post">
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group" style="text-align: left; margin-bottom: 0px">
                        <label for="file">Please select your file:</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="file">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <input class="input-group-text btn-primary" style="color: #fff;background-color: #007bff;border-color: #007bff;"  type="submit">

                            </div>
                        </div>
                    </div>
                    <small>Submitting as <?=$student_email??"anonymous";?> for <?= $assignment_code??"Err";?>.</small>
                </div>
                <div class="col-sm-4">
                    <img src="<?=base_url("/assets/img/logo_no_margin.svg");?>" style="width: 100%;max-height: 70px;margin-top:15px">
                </div>
            </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->