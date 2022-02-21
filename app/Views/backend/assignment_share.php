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
            <li class="page-item"><a class="page-link" href="<?= base_url("Assignments/resources/" . $id); ?>">«</a></li>
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
            <li class="page-item ">
                <a class="page-link" href="<?= base_url("Assignments/resources/" . $id); ?>">
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
                <a class="page-link" href="<?= base_url("Assignments/grading/" . $id); ?>">
                    <p class="page-month">Grading</p>
                    <p class="page-year">Dashboard</p>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="<?= base_url("Assignments/grading/" . $id); ?>">»</a></li>
        </ul>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <?php //helper function to keep track about numbering
            $num = 0;
            function get_num($step = 1)
            {
                global $num;
                $num += $step;
                return $num;
            }

            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title"><?= get_num(); ?>. Setup Assignment at nbpickup dashboard</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            Please fill out information in "Basic Information" tab.
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card <?= $card_step2 ? "card-success collapsed-card" : "card-danger"; ?>">
                        <div class="card-header">
                            <h3 class="card-title"><?= get_num(); ?>. Create Assignment and upload content</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas  <?= $card_step2 ? "fa-plus" : "fa-minus"; ?>"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            Use online Binder environemnt to upload existing files or create your assignment from scratch.
                            <p><?= lang("AssignmentResources.authoring_info") ?></p>
                            <center>
                            <a class="binder_secure" href="https://mybinder.org/v2/gh/jjur/nbpickup_authoring/HEAD?urlpath=%2Ftree%2FStartHere.ipynb"><img src="https://mybinder.org/badge_logo.svg"></a>
                            </center>
                        </div>
                    </div>
                </div>

                <?php if ($assignment["a_sub_api"]) { ?>
                    <div class="col-md-12">
                        <div class="card card-warning  <?= $card_step3 ? "collapsed-card" : ""; ?>">
                            <div class="card-header">
                                <h3 class="card-title"><?= get_num(); ?>. Include Submission cell inside of the notebook
                                    [MANUAL]</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <p><?= lang("AssignmentSettings.card_submit_jupyter_instructions") ?></p>

                                <textarea id="codeMirrorDemo" style="height: auto;" class="">
# !pip install nbpickup  # Uncomment when used outside of binder
import nbpickup.submissions as nbpickup
email = "<?= lang("AssignmentSettings.insert_email_caps") ?>"
if nbpickup.set_email(email):
    nbpickup.submit_ipynb("<?= $assignment["a_alias"]; ?>")
              </textarea>
                            </div>
                        </div>
                    </div>
                <?php }; ?>

                <div class="col-md-12">
                    <div class="card <?= $card_step2 ? ($card_step3 ? "card-success collapsed-card" : "card-danger") : "card-secondary"; ?>">
                        <div class="card-header">
                            <h3 class="card-title"><?= get_num(); ?>. Generate Student´s version</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas  <?= $card_step3 ? "fa-plus" : "fa-minus"; ?>"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            For exact steps, follow <a target="_blank"
                                                       href="https://nbgrader.readthedocs.io/en/stable/user_guide/creating_and_grading_assignments.html#generate-and-release-an-assignment">nbgrader
                                documentation</a>.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card <?= $card_step3 ? ($assignment["a_repo_url"]?"card-primary":"card-warning") : "card-secondary collapsed-card"; ?> <?= $submissions?"collapsed-card":"";?>">
                        <div class="card-header">
                            <h3 class="card-title"><?= get_num(); ?>A. Upload Student´s version to GitHub or Gist
                                [MANUAL]</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas <?= $card_step3 ? ($submissions?"fa-plus":"fa-minus"): "fa-plus"; ?>"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            Hosting your assignment files on GitHub/Gist is necessary for creating a sharable link for
                            Binder environment. Students do not require any special software, everything will be
                            provided in browser. After uploading files and pasting link to your file, you will receive
                            link for Binder.
                            <ol>
                                <li>Visit <a href="https://github.com/" target="_blank">GitHub</a></li>
                                <li>Create new <a href="https://github.com/new" target="_blank">repository</a> or <a
                                            href="https://gist.github.com/" target="_blank">gist</a></li>
                                <li>Download Student files: <a class="btn btn-primary btn-sm"
                                                               href="<?= base_url("Assignments/download_zip/" . $id . ""); ?>">Download
                                        Student (Release) files (ZIP)</a></li>
                                <li>Un-ZIP files and upload them to your repository / gist.</li>
                                <li>Paste repository or gist URL to obtain Binder link:</li>
                            </ol>
                            <form method="post" action="<?= base_url("Assignments/set_repo/" . $id . ""); ?>">
                                <div class="form-group">
                                    <label for="repo_url">Repository/Gist URL</label>
                                    <input type="text" class="form-control" id="repo_url" name="repo_url"
                                           value="<?= set_value('repo_url', $assignment["a_repo_url"] ?? "") ?>">
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="<?= $assignment["a_repo_url"]?"Update Link":"Save and get Link";?>"
                                               class="btn btn-success float-right">
                                    </div>
                                </div>
                            </form>
                            <?php if($assignment["a_repo_url"]){
                                $needle = strpos($assignment["a_repo_url"], "github.com");
                                $repo = trim(substr($assignment["a_repo_url"],  $needle+ 10)," /");
                                if (!$needle){
                                    echo "Unable to parse Github link, please check the link and try again.";
                                }else{
                                    if (strpos($assignment["a_repo_url"],"gist")){
                                        // Init Gist Link Type
                                        $link = "https://mybinder.org/v2/gist/$repo/HEAD?urlpath=tree";
                                        // Alternative using git repo option https://discourse.jupyter.org/t/secret-gist-not-enabled/10040/5
                                    }else{
                                        $link = "https://mybinder.org/v2/gh/$repo/HEAD?urlpath=tree";
                                    }
                                }
                                ?>
                            <b>Shareable link for Students:</b>
                            <a href="<?=$link;?>" target="_blank"><?=$link;?></a>
                                <center><a href="<?=$link;?>" target="_blank"><img src="https://mybinder.org/badge_logo.svg"></a></center>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card <?= $card_step3 ? ($assignment["a_repo_url"]?"card-secondary collapsed-card":(($submissions)?"card-success collapsed-card":"card-warning")): "card-secondary collapsed-card"; ?>">
                        <div class="card-header">
                            <h3 class="card-title"><?= get_num(0); ?>B. Share notebook file directly with student´s
                                [MANUAL]</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas <?= $card_step3 ? "fa-plus" : "fa-plus"; ?>"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            If you prefer students working on their own devices and coding environemnt, you can share with them Assignment files released by nbgrader. Use following button to download files: <br>
                            <br><center><a class="btn btn-primary btn-sm"
                               href="<?= base_url("Assignments/download_zip/" . $id . ""); ?>">Download
                                Student (Release) files (ZIP)</a></center>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card <?= ($submissions) ? ($all_graded ? "card-success collapsed-card" : "card-danger") : "card-secondary collapsed-card"; ?>">
                        <div class="card-header">
                            <h3 class="card-title"><?= get_num(); ?>. Grade Submissions</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas  <?= !$submissions ? "fa-plus" : "fa-minus"; ?>"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= (!$submissions) ? "<b>No Submissions Yet!</b>" : "<b>$submissions_to_be_graded Submissions needs to be graded.</b><br>Please visit tab \"Grading Dashboard\"."; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->