<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= lang("Header.title")?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/vanilla-zoom.min.css">

    <!-- Falvicons -->
    <!-- TODO: https://catalin.red/svg-favicon-light-dark-theme/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>/assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url(); ?>/assets/icons/site.webmanifest">
    <link rel="mask-icon" href="<?= base_url(); ?>/assets/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?= base_url(); ?>/assets/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- End Falvicons -->

</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><a class="navbar-brand logo" href="<?=base_url();?>"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/"><?= lang("Header.home")?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?=base_url("#features");?>"><?= lang("Header.features")?></a></li>
                <li class="nav-item"><a class="nav-link" href="https://docs.nbpickup.org/"><?= lang("Header.docs")?></a></li>
                <li class="nav-item"></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url("/home/register");?>"><?= lang("Header.registration")?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url("auth/login"); ?>"><?= lang("Header.login")?></a></li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><?= lang("Header.lang")?>: <?= lang("Header.short")?></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url("/lang/en"); ?>">English</a>
                        <a class="dropdown-item" href="<?= base_url("/lang/sk"); ?>">Slovenčina</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
