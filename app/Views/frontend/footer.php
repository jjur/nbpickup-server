<footer class="page-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5><?= lang("Footer.get_started")?></h5>
                <ul>
                    <li><a href="<?=base_url();?>"><?= lang("Footer.home")?></a></li>
                    <!--<li><a href="<?= base_url("/home/register");?>">Register</a></li>-->
                    <li><a href="https://docs.nbpickup.org"><?= lang("Footer.docs")?></a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5><?= lang("Footer.contribute")?></h5>
                <ul>
                    <li><a href="https://github.com/jjur/nbpickup-server"><?= lang("Footer.github_server")?></a></li>
                    <li><a href="https://github.com/jjur/nbpickup-client-python"><?= lang("Footer.github_library")?></a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5 style="color:#00000000">...</h5>
                <ul>
                    <li><a href="https://github.com/jjur/nbpickup-server/issues/new"><?= lang("Footer.report")?></a></li>

                </ul>
            </div>
            <div class="col-sm-3">
                <h5><?= lang("Footer.legal")?></h5>
                <ul>
                    <li><a href="https://github.com/jjur/nbpickup-server/blob/main/LICENSE"><?= lang("Footer.licence")?></a></li>
                    <li><a href="<?=base_url("home/terms_of_use");?>"><?= lang("Footer.terms")?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© 2022 nbpickup</p>
    </div>
</footer>
<script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/vanilla-zoom.js"></script>
<script src="<?= base_url(); ?>/assets/js/theme.js"></script>
</body>

</html>