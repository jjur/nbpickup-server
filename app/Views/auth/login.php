<?php echo view("frontend/header"); ?>
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info"><?php echo lang('Auth.login_heading');?></h2>
                <p><?php echo lang('Auth.login_subheading');?></p>
                <div id="infoMessage"><?php echo $message;?></div>
            </div>
            <?php echo form_open('auth/login');?>
                <div class="mb-3"><label class="form-label" for="identity"><?= lang('Auth.login_identity_label')?></label><input class="form-control item" name="identity" type="email" id="identity"></div>
                <div class="mb-3"><label class="form-label" for="password"><?= lang('Auth.login_password_label')?></label><input class="form-control" type="password" name="password" id="password"></div>
                <div class="mb-3">
                    <div class="form-check"><input class="form-check-input" name="remember" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox"><?= lang('Auth.login_remember_label')?></label></div>
                </div><button class="btn btn-primary" type="submit"><?= lang('Auth.login_submit_btn')?></button>
            <br><br>
            <p class="small"><a href="forgot_password"><?php echo lang('Auth.login_forgot_password');?></a></p>
            <?php echo form_close();?>

        </div>
    </section>
</main>











<?php echo view('frontend/footer');?>
