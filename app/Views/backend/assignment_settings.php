<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= lang("AssignmentSettings.page_title") ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Assignments</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <form method="post" action="<?= base_url("Assignments/settings/" . $id . "/next"); ?>">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentSettings.card_submit_jupyter") ?></h3>
                                <div class="card-tools">
                                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <p><?= lang("AssignmentSettings.card_submit_jupyter_instructions")?></p>

                                <textarea id="codeMirrorDemo" style="height: auto;" class="">
import nbpickup
email = "<?= lang("AssignmentSettings.insert_email_caps")?>"
nbpickup.submit_ipynb("ASSIGNMENTID",email)
              </textarea>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentSettings.card_submit_web") ?></h3>
                                <div class="card-tools">
                                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7"><p><?= lang("AssignmentSettings.card_submit_web_instructions")?></p></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="a_name"><?= lang("AssignmentSettings.submission_url") ?></label>
                                            <input type="text" class="form-control" id="a_name" name="a_name" value="https://nbpick.org/submission/...">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentSettings.card_submit_email") ?></h3>
                                <div class="card-tools">
                                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4"><p><?= lang("AssignmentSettings.card_submit_email_instructions")?></p></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="a_name"><?= lang("AssignmentSettings.subject_field") ?></label>
                                            <input type="text" class="form-control" id="a_name" name="a_name" value="...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="a_name"><?= lang("AssignmentSettings.email_address") ?></label>
                                            <input type="text" class="form-control" id="a_name" name="a_name" value="...@nbpick.org">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- I think knot needed at the moment <a href="#" class="btn btn-secondary">Cancel</a>-->
                        <input type="submit" value="<?= lang("AssignmentSettings.save") ?>"
                               class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->