<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= lang("AssignmentEditor.page_title")?></h1>
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
            <form method="post" action="<?= base_url("Assignments/create/".$id.""); ?>">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentEditor.details_box_title") ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="a_name"><?= lang("AssignmentEditor.name") ?></label>
                                    <input type="text" class="form-control" id="a_name" name="a_name" value="<?= set_value('a_name', $assignment["a_name"] ?? "") ?>">
                                </div>
                                <div class="form-group">
                                    <label><?= lang("AssignmentEditor.description") ?></label>
                                    <textarea class="form-control" rows="3" name="a_description"
                                              placeholder="(<?= lang("AssignmentEditor.optional") ?>)"><?= set_value('a_description', $assignment["a_description"] ?? "") ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label><?= lang("AssignmentEditor.programming_lang") ?></label>
                                    <select class="form-control select2" style="width: 100%;" name="a_code_lang">
                                        <option value="1" <?= set_select('a_code_lang', '1', isset($assignment["a_code_lang"]) && $assignment["a_code_lang"] == "1") ?>>Python</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?= lang("AssignmentEditor.language") ?></label>
                                    <select class="form-control select2" style="width: 100%;" name="a_lang">
                                        <option value="EN" <?= set_select('a_lang', 'EN', isset($assignment["a_lang"]) && $assignment["a_lang"] == "1") ?>>English</option>
                                        <option value="SK" <?= set_select('a_lang', 'SK', isset($assignment["a_lang"]) && $assignment["a_lang"] == "1") ?>>Slovak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?= lang("AssignmentEditor.deadline") ?></label>
                                    <div class="input-group date" id="a_deadline" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#a_deadline" name="a_deadline" value="<?= set_value('a_deadline', $assignment["a_deadline"] ?? "") ?>"/>
                                        <div class="input-group-append" data-target="#a_deadline" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentEditor.settings_box_title") ?></h3>
                            </div>
                            <div class="card-body">
                                <?= var_dump($assignment);?>
                                <!--<input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">-->
                                <div class="icheck-primary">
                                    <input type="checkbox" id="a_anonymous_sub" name="a_anonymous_sub" <?= set_checkbox("a_anonymous_sub", "",$assignment["a_anonymous_sub"]??true)?>>
                                    <label for="a_anonymous_sub">
                                        <?= lang("AssignmentEditor.allow_anonymous_sub") ?>:
                                    </label>
                                    <p><?= lang("AssignmentEditor.allow_anonymous_sub_description") ?></p>
                                </div>

                                <div class="icheck-primary">
                                    <input type="checkbox" id="a_unknown_users" name="a_unknown_users" <?= set_checkbox("a_unknown_users", "",isset($assignment["a_unknown_users"])?$assignment["a_unknown_users"]==1:true)?>>
                                    <label for="a_unknown_users">
                                        <?= lang("AssignmentEditor.allow_unknown_sub") ?>:
                                    </label>
                                    <p><?= lang("AssignmentEditor.allow_unknown_sub_description") ?></p>
                                </div>

                                <div class="icheck-primary">
                                    <input type="checkbox" id="a_public" name="a_public" <?= set_checkbox("a_public", "",$assignment["a_public"]??false)?>>
                                    <label for="a_public">
                                        <?= lang("AssignmentEditor.make_public") ?>:
                                    </label>
                                    <p><?= lang("AssignmentEditor.make_public_description") ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentEditor.gradebook_box_title") ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile"><?= lang("AssignmentEditor.upload_gradebook") ?></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label"
                                                   for="exampleInputFile"><?= lang("AssignmentEditor.select_file") ?></label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><?= lang("AssignmentEditor.upload") ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Gradebook table -->
                                <b><?= lang("AssignmentEditor.gradebook_history")?>:</b>
                                <div class="table-responsive">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th><?= lang("AssignmentEditor.timestamp") ?></th>
                                            <th><?= lang("AssignmentEditor.size") ?></th>
                                            <th><?= lang("AssignmentEditor.additional_details") ?></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>183</td>
                                            <td>11-7-2014</td>
                                            <td>26 kB</td>
                                            <td></td>
                                            <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-success"><i class="fas fa-check"></i> Active</a>
                                            </div></td>
                                        </tr>
                                        <tr>
                                            <td>100</td>
                                            <td>11-7-2014</td>
                                            <td>26 kB</td>
                                            <td></td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="#" class="btn btn-info"><i class="fas fa-arrow-alt-circle-up"></i> Make Active</a>
                                                </div></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><?= lang("AssignmentEditor.files_box_title") ?></h3>
                            </div>
                            <div class="card-body">
                                <div id="actions" class="row">
                                    <div class="col-lg-8">
                                        <div class="btn-group w-100">
                      <span class="btn btn-success col fileinput-button">
                        <i class="fas fa-plus"></i>
                        <span>Add files</span>
                      </span>
                                            <button type="submit" class="btn btn-primary col start">
                                                <i class="fas fa-upload"></i>
                                                <span>Start upload</span>
                                            </button>
                                            <button type="reset" class="btn btn-warning col cancel">
                                                <i class="fas fa-times-circle"></i>
                                                <span>Cancel upload</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex align-items-center">
                                        <div class="fileupload-process w-100">
                                            <div id="total-progress" class="progress progress-striped active"
                                                 role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                 aria-valuenow="0">
                                                <div class="progress-bar progress-bar-success" style="width:0%;"
                                                     data-dz-uploadprogress></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table table-striped files" id="previews">
                                    <div id="template" class="row mt-2">
                                        <div class="col-auto">
                                            <span class="preview"><img src="data:," alt="" data-dz-thumbnail/></span>
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <p class="mb-0">
                                                <span class="lead" data-dz-name></span>
                                                (<span data-dz-size></span>)
                                            </p>
                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                        </div>
                                        <div class="col-4 d-flex align-items-center">
                                            <div class="progress progress-striped active w-100" role="progressbar"
                                                 aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                <div class="progress-bar progress-bar-success" style="width:0%;"
                                                     data-dz-uploadprogress></div>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <div class="btn-group">
                                                <button class="btn btn-primary start">
                                                    <i class="fas fa-upload"></i>
                                                    <span>Start</span>
                                                </button>
                                                <button data-dz-remove class="btn btn-warning cancel">
                                                    <i class="fas fa-times-circle"></i>
                                                    <span>Cancel</span>
                                                </button>
                                                <button data-dz-remove class="btn btn-danger delete">
                                                    <i class="fas fa-trash"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- TODO table of all upladed files -->
                                <div class="table-responsive">
                                    <table class="table table-hover text-nowrap ">
                                        <thead>
                                        <tr>
                                            <th><?= lang("AssignmentEditor.filename") ?></th>
                                            <th><?= lang("AssignmentEditor.size") ?></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>requirements.txt</td>
                                            <td>10 kB</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td>notebook.ipynb</td>
                                            <td>52.5 kB</td>
                                            <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- I think knot needed at the moment <a href="#" class="btn btn-secondary">Cancel</a>-->
                        <input type="submit" value="<?= lang("AssignmentEditor.save")?>" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->