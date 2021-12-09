<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Assignment</h1>
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
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12"><a href="<?= base_url("Assignments/create/blank"); ?>"
                                                            class="">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4>Create new from Scratch</h4>
                                <br><br>
                            </div>
                            <div class="icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                    </a></div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <form id="form_duplicate" method="post" action="<?= base_url("Assignment/create/copy"); ?>">
                                <h4>Duplicate Existing</h4>

                                <div class="form-group">
                                    <label>Select Assignment to Duplicate</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <?php foreach($Assignments as $assignmnet){?>
                                        <option value="<?=$assignmnet["a_id"];?>"><?=$assignmnet["a_name"];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="icon">
                            <i class="fas fa-copy"></i>
                        </div>
                        <!-- TODO: make form and add dropdown  -->
                        <a href="" class="small-box-footer">
                            Duplicate <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="<?= base_url("Dashboard/Gallery"); ?>" class="">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h4>Browse Assignment Gallery</h4>
                                <br><br>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <br><br>
            <h2>Top Assignments in Assigmnets Gallery</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="">
                        <img class="card-img-top" src="https://placekitten.com/402/300" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://placekitten.com/401/300" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://placekitten.com/400/300" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->