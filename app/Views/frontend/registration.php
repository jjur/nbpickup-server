    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="block-heading">
                            <h2 class="text-info"><?php echo lang('Auth.register_heading');?></h2>
                            <p><?php echo lang('Auth.register_subheading');?></p>
                        </div>
                        <form>
                            <div class="mb-3"><label class="form-label" for="name"><?= lang('Auth.register_name')?></label><input class="form-control item" type="text" id="name"></div>
                            <div class="mb-3"><label class="form-label" for="password"><?= lang('Auth.register_identity_label')?></label><input class="form-control item" type="password" id="password"></div>
                            <div class="mb-3"><label class="form-label" for="email"><?= lang('Auth.register_password_label')?></label><input class="form-control item" type="email" id="email"></div>
                            <button class="btn btn-primary" type="submit"><?= lang('Auth.register_submit_btn')?></button>
                            <!-- TODO: Login link-->
                        </form>
                    </div>
                    <div class="col d-lg-flex justify-content-lg-center align-items-lg-end">
                        <div class="row justify-content-center">
                            <div class="col-md-5 col-lg-10 feature-box"><i class="icon-people icon"></i>
                                <h4><?=lang('Auth.register_feature_1_title');?></h4>
                                <p><?=lang('Auth.register_feature_1_description');?></p>
                            </div>
                            <div class="col-md-5 col-lg-10 feature-box"><i class="icon-link icon"></i>
                                <h4><?=lang('Auth.register_feature_2_title');?></h4>
                                <p><?=lang('Auth.register_feature_2_description');?></p>
                            </div>
                            <div class="col-md-5 col-lg-10 feature-box"><i class="icon-layers icon"></i>
                                <h4><?=lang('Auth.register_feature_3_title');?></h4>
                                <p><?=lang('Auth.register_feature_3_description');?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>