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
                        <div class="card card-primary card-outline direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentSettings.card_submit_jupyter") ?></h3>
                                <div class="card-tools">
                                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <p><?= lang("AssignmentSettings.card_submit_jupyter_instructions")?></p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-primary card-outline direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentSettings.card_submit_jupyter") ?></h3>
                                <div class="card-tools">
                                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <p><?= lang("AssignmentSettings.card_submit_jupyter_instructions")?></p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-primary card-outline direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentSettings.card_submit_jupyter") ?></h3>
                                <div class="card-tools">
                                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <p><?= lang("AssignmentSettings.card_submit_jupyter_instructions")?></p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- I think knot needed at the moment <a href="#" class="btn btn-secondary">Cancel</a>-->
                        <input type="submit" value="<?= lang("AssignmentEditor.save") ?>"
                               class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->