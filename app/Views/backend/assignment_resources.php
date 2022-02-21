<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= lang("AssignmentResources.page_title")?></h1>
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
            <li class="page-item"><a class="page-link" href="<?=base_url("Assignments/settings/" . $id);?>">«</a></li>
            <li class="page-item">
                <a class="page-link" href="<?=base_url("Assignments/create/" . $id);?>">
                    <p class="page-month">Basic</p>
                    <p class="page-year">Information</p>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?=base_url("Assignments/settings/" . $id);?>">
                    <p class="page-month">Submission</p>
                    <p class="page-year">Options</p>
                </a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#">
                    <p class="page-month">Assignment</p>
                    <p class="page-year">Files</p>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?=base_url("Assignments/share/" . $id);?>">
                    <p class="page-month">Share</p>
                    <p class="page-year">Assingment</p>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?=base_url("Assignments/grading/" . $id);?>">
                    <p class="page-month">Submissions</p>
                    <p class="page-year">Dashboard</p>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="<?=base_url("Assignments/share/" . $id);?>">»</a></li>
        </ul>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <form method="post" action="<?= base_url("Assignments/create/".$id.""); ?>">
                <div class="row">



                    <div class="col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentResources.files_box_title") ?></h3>
                            </div>
                            <div class="card-body">
                                <!-- TODO table of all upladed files -->
                                <div class="table-responsive">
                                    <table class="table table-hover text-nowrap ">
                                        <thead>
                                        <tr>
                                            <th><?= lang("AssignmentResources.filename") ?></th>
                                            <th><?= lang("AssignmentResources.path") ?></th>
                                            <th><?= lang("AssignmentResources.size") ?></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($files as $file){ ?>
                                        <tr>
                                            <td><?= $file["f_filename_original"];?><?= ($file["private"]==0)?'<span class="float-right badge bg-primary">Students</span>':"";?></td>
                                            <td><?= str_replace("/home/jovyan","",$file["f_filepath"]);?></td>
                                            <td><?= round($file["f_filesize"]/1000,2);?> kB</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?= base_url("Student/view_submission/".$file["f_filename_internal"]);?>" target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    <a href="<?= base_url("Student/get_submission/".$file["f_filename_internal"]);?>" target="_blank" class="btn btn-info"><i class="fas fa-download"></i></a>
                                                    <!--<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>-->
                                                </div></td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary" href="<?= base_url("Assignments/download_zip/".$id."") ;?>">Download Student (Release) files (ZIP)</a>
                                <a class="btn btn-primary" href="<?= base_url("Assignments/download_teacher_zip/".$id."") ;?>">Download Teacher (Source) files (ZIP)</a>

                            </div>
                        </div>
                    </div>




                    <div class="col-md-4">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentResources.authoring_box_title") ?></h3>
                            </div>
                            <div class="card-body">
                                <p><?= lang("AssignmentResources.authoring_info") ?></p>
                                <br>
                                <a class="binder_secure" href="https://mybinder.org/v2/gh/jjur/nbpickup_authoring/HEAD?urlpath=%2Ftree%2FStartHere.ipynb"><img src="https://mybinder.org/badge_logo.svg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentResources.gradebook_box_title") ?></h3>
                            </div>
                            <div class="card-body">
                                <!--
                                <div class="form-group">
                                    <label for="exampleInputFile"><?= lang("AssignmentResources.upload_gradebook") ?></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label"
                                                   for="exampleInputFile"><?= lang("AssignmentResources.select_file") ?></label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><?= lang("AssignmentResources.upload") ?></span>
                                        </div>
                                    </div>
                                </div>-->
                                <!-- Gradebook table -->
                                <b><?= lang("AssignmentResources.gradebook_history")?>:</b>
                                <div class="table-responsive">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th><?= lang("AssignmentResources.timestamp") ?></th>
                                            <!--<th><?= lang("AssignmentResources.size") ?></th>-->
                                            <th><?= lang("AssignmentResources.additional_details") ?></th>
                                            <th><?= lang("AssignmentResources.size") ?></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $first = True;
                                        foreach ($gradebooks as $gradebook){ ?>
                                        <tr>
                                            <td><?= $gradebook["g_id"];?> <?= ($first)?'<span class="float-right badge bg-success">Active</span>':"";?></td>
                                            <td><?= $gradebook["g_created_at"];?></td>
                                            <!--<td> kB</td>-->
                                            <td>Assignments: <?= $gradebook["g_stats_assignments"];?>, Students: <?= ($gradebook["g_stats_students"]==-1)?"0":$gradebook["g_stats_students"];?></td>
                                            <td><?= round($gradebook["f_filesize"]/1000,2);?> kB</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?= base_url("Assignments/get_file/".$gradebook["f_filename_internal"]);?>" class="btn btn-info"><i class="fas fa-download"></i> Download</a>
                                                </div></td>
                                        </tr>
                                        <?php
                                        $first = False;
                                        }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--
                    <div class="col-md-4">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentResources.preview_box_title") ?></h3>
                            </div>
                            <div class="card-body">
                                <p><?= lang("AssignmentResources.preview_info") ?></p>
                                <br>
                                <a href="https://mybinder.org/v2/gh/jjur/nbpickup_authoring/HEAD?urlpath=%2Ftree%2FStartHere.ipynb"><img src="https://mybinder.org/badge_logo.svg"></a>
                            </div>
                        </div>
                    </div>
-->


                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="<?= base_url("Assignments/settings/".$id);?>" class="btn btn-secondary"><?= lang("AssignmentResources.back")?></a>
                        <input type="submit" value="<?= lang("AssignmentResources.save")?>" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->