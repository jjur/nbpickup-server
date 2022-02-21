<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Submissions</h1>
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

    <section>
        <ul class="pagination pagination-month justify-content-center">
            <li class="page-item"><a class="page-link" href="<?= base_url("Assignments/settings/" . $id); ?>">«</a></li>
            <li class="page-item">
                <a class="page-link" href="<?= base_url("Assignments/create/" . $id); ?>">
                    <p class="page-month">Basic</p>
                    <p class="page-year">Information</p>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= base_url("Assignments/settings/" . $id); ?>">
                    <p class="page-month">Submission</p>
                    <p class="page-year">Options</p>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= base_url("Assignments/resources/" . $id); ?>">
                    <p class="page-month">Assignment</p>
                    <p class="page-year">Files</p>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= base_url("Assignments/share/" . $id); ?>">
                    <p class="page-month">Share</p>
                    <p class="page-year">Assingment</p>
                </a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#">
                    <p class="page-month">Submissions</p>
                    <p class="page-year">Dashboard</p>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Last Submissions</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="submissions-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Timestamp</th>
                                    <th>Score</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                foreach ($submissions as $submission) {
                                    ?>
                                    <tr>
                                        <td><?= $submission["username"]; ?> </td>
                                        <td><?= $submission["f_updated_at"]; ?></td>
                                        <td><?= "Needs grading"; ?> </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?= base_url("Student/view_submission/" . $submission["f_filename_internal"]); ?>"
                                                   target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i>
                                                    Preview</a>
                                                <a href="<?= base_url("Student/get_submission/" . $submission["f_filename_internal"]); ?>"
                                                   target="_blank" class="btn btn-info"><i class="fas fa-download"></i>
                                                    Download</a>
                                                <!--<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>-->
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-3">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Launch nbgrader</h3>
                        </div>
                        <div class="card-body">
                            <p><?= lang("AssignmentResources.authoring_info") ?></p>
                            <center><a class="binder_secure"
                               href="https://mybinder.org/v2/gh/jjur/nbpickup_nbgrading/HEAD?urlpath=%2Ftree%2FStartHere.ipynb"><img
                                        src="https://mybinder.org/badge_logo.svg"></a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->