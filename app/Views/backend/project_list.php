

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assignments</h1>
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
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Your Assignments</h3>

                <div class="card-tools">
                    <a href="<?=base_url("Assignments/create");?>" class="btn btn-block btn-success btn-sm">Create Assignment</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 40%">
                            Assignment Name
                        </th>
                        <!--<th>
                            Received Submissions
                        </th>-->
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 30%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $counter = 0;
                    foreach ($Assignments as $assignment){
                        $counter ++;?>
                    <tr>
                        <td>
                            <?= $counter;?>
                        </td>
                        <td>
                            <a>
                                <?= $assignment["a_name"]; ?>
                            </a>
                            <br/>
                            <small>
                                Created <?=$assignment["a_created_at"];?>
                            </small>
                        </td>
                        <!--<td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                </div>
                            </div>
                            <small>
                                57% Complete
                            </small>
                        </td>-->
                        <td class="project-state">
                            <span class="badge badge-success"><?= $assignment["a_status"];?></span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="<?= base_url("/Assignments/resources/".$assignment["a_id"]);?>">
                                <i class="fas fa-folder">
                                </i>
                                Files
                            </a>
                            <a class="btn btn-primary btn-sm" href="<?= base_url("/Assignments/resources/".$assignment["a_id"]);?>">
                                <i class="fas fa-share">
                                </i>
                                Share
                            </a>
                            <a class="btn btn-info btn-sm" href="<?= base_url("/Assignments/grading/".$assignment["a_id"]);?>">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Grading
                            </a>
                            <!--<a class="btn btn-danger btn-sm" href="<?= base_url("/Assignments/delete/".$assignment["a_id"]);?>">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>-->
                        </td>
                    </tr><?php } ?>
                    <!--<tr>
                        <td>
                            #
                        </td>
                        <td>
                            <a>
                                Tutorial Assignment
                            </a>
                            <br/>
                            <small>
                                Created 28.10.2021
                            </small>
                        </td>
                        <!--<td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="47" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                </div>
                            </div>
                            <small>
                                0% Complete
                            </small>
                        </td>
                        <td class="project-state">
                            <span class="badge badge-danger">Draft</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>-->
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->