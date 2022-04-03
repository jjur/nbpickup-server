<main class="page landing-page" style="scroll-behavior: smooth"">
    <section class="clean-block clean-hero"
             style="color: rgba(49,114,240,0.79);background: url(&quot;/assets/img/class.jpg&quot;) center no-repeat;">
        <div class="text">
            <h2><?= lang("Home.title")?></h2>
            <p><?= lang("Home.subtitle")?></p>
            <a href="#features"> <button class="btn btn-outline-light btn-lg" type="button"><?= lang("Home.learn_more")?></button></a>
            <div id="features"></div>
        </div>
    </section>
    <section class="clean-block clean-info dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info" ><?= lang("Home.features")?></h2>
                <p><?= lang("Home.features_subtitle")?></p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-3"><h4>nbgrader</h4></div>
                        <div class="col-md-9 feature-box" style="padding: 0px"><h4><?= lang("Home.nbgrader_title")?></h4>
                            <p><?= lang("Home.nbgrader_description")?> <br>
                                <a href="https://nbgrader.readthedocs.io/en/stable/index.html" target="_blank"><?= lang("Home.learn_more")?></a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-3"><img src="https://mybinder.org/static/logo.svg" style="width:100%">
                        </div>
                        <div class="col-md-9 feature-box" style="padding: 0px"><h4><?= lang("Home.binder_title")?></h4>
                            <p><?= lang("Home.binder_description")?><br>
                                <a href="https://mybinder.org/" target="_blank"><?= lang("Home.learn_more")?></a></p></div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-3"><h1 style="text-align: right; color: #0d6efd; padding-right: 5px"><i class="icon-cloud-upload icon"></i></h1></div>
                        <div class="col-md-9 feature-box" style="padding: 0px">
                            <h4><?= lang("Home.feature_1_title")?></h4>
                            <p><?= lang("Home.feature_1_description")?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-3"><h1 style="text-align: right; color: #0d6efd; padding-right: 5px"><i class="icon-folder icon"></i></h1></div>
                        <div class="col-md-9 feature-box" style="padding: 0px"><h4><?= lang("Home.feature_2_title")?></h4>
                            <p><?= lang("Home.feature_2_description")?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block clean-info">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info"><?= lang("Home.mission")?></h2>
                <p><?= lang("Home.mission_text")?></p>
            </div>
        </div>
    </section>
    <section class="clean-block clean-info dark">
        <div class="container">
            <br><br>
            <div class="row align-items-center">
                <div class="col-md-6"><iframe  style="border: 5px solid #FFFFFF;" width="560" height="315" src="https://www.youtube-nocookie.com/embed/CvIiwRC-7CM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                <div class="col-md-6">
                    <h3><?= lang("Home.video_title")?></h3>
                    <div class="getting-started-info">
                        <?= lang("Home.video_text")?>      </div>
                    <a href="<?= base_url("/home/register");?>"><button class="btn btn-outline-primary btn-lg" type="button"><?= lang("Home.video_action")?></button></a>
                </div>
            </div>
        </div>
    </section>
</main>
