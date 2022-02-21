<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Share with Students</h1>
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
            <li class="page-item ">
                <a class="page-link" href="<?=base_url("Assignments/resources/" . $id);?>">
                    <p class="page-month">Assignment</p>
                    <p class="page-year">Files</p>
                </a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#">
                    <p class="page-month">Share</p>
                    <p class="page-year">Assingment</p>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?=base_url("Assignments/grading/" . $id);?>">
                    <p class="page-month">Grading</p>
                    <p class="page-year">Dashboard</p>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="<?=base_url("Assignments/grading/" . $id);?>">»</a></li>
        </ul>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <?php //helper function to keep track about numbering
            $num =0;
            function get_num($step = 1){
                global $num;
                $num += $step;
                return $num;
            }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title"><?=get_num();?>. Setup Assignment at nbpickup dashboard</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            TODO: Insert instructions
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card <?= $card_step2?"card-success collapsed-card":"card-danger";?>">
                        <div class="card-header">
                            <h3 class="card-title"><?=get_num();?>. Create Assignment and upload content</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas  <?= $card_step2?"fa-plus":"fa-minus";?>"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            TODO: Insert instructions
                        </div>
                    </div>
                </div>

                <?php if($assignment["a_sub_api"]){?>
                <div class="col-md-12">
                    <div class="card card-warning  <?= $card_step3?"collapsed-card":"";?>">
                        <div class="card-header">
                            <h3 class="card-title"><?=get_num();?>. Include Submission cell inside of the notebook [MANUAL]</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            TODO: Insert instructions
                        </div>
                    </div>
                </div>
                <?php } ;?>

                <div class="col-md-12">
                    <div class="card <?= $card_step2?($card_step3?"card-success collapsed-card":"card-danger"):"card-secondary";?>">
                        <div class="card-header">
                            <h3 class="card-title"><?=get_num();?>. Generate Student´s version</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas  <?= $card_step3?"fa-plus":"fa-minus";?>"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            TODO: Insert instructions
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card <?= $card_step3?"card-warning":"card-secondary collapsed-card";?>">
                        <div class="card-header">
                            <h3 class="card-title"><?=get_num();?>A. Upload Student´s version to GitHub or Gist [MANUAL]</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas <?= $card_step3?"fa-minus":"fa-plus";?>"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            TODO: Insert instructions
                            <a class="btn btn-primary" href="<?= base_url("Assignments/download_zip/".$id."") ;?>">Download Student (Release) files (ZIP)</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card <?= $card_step3?"card-warning":"card-secondary collapsed-card";?>">
                        <div class="card-header">
                            <h3 class="card-title"><?=get_num(0);?>. Share notebook file directly with student´s [MANUAL]</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas <?= $card_step3?"fa-minus":"fa-plus";?>"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            TODO: Insert instructions
                            <a class="btn btn-primary" href="<?= base_url("Assignments/download_zip/".$id."") ;?>">Download Student (Release) files (ZIP)</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card <?= ($submissions)?($all_graded?"card-success collapsed-card":"card-warning"):"card-secondary collapsed-card";?>">
                        <div class="card-header">
                            <h3 class="card-title"><?=get_num();?>. Grade Submissions</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas  <?= !$submissions?"fa-plus":"fa-minus";?>"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= (!$submissions)?"<b>No Submissions Yet!</b>":"TODO: Insert instructions";?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->