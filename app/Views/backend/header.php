<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= lang("Header.title")?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets_admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets_admin/css/adminlte.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets_admin/plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets_admin/plugins/codemirror/theme/monokai.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets_admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets_admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets_admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
    <link rel="stylesheet" href="<?= base_url(); ?>/assets_admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="<?= base_url(); ?>/dashboard/" class="navbar-brand">
                <img src="<?= base_url(); ?>/assets/img/logo_no_margin.svg" alt="nbpickup logo" class="brand-image" style="opacity: .8">
                <span class="brand-text font-weight-light"></span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= base_url("/Dashboard");?>" class="nav-link">Assignments</a>
                    </li>
                    <!--<li class="nav-item">
                        <a href="#" class="nav-link">Students</a>
                    </li>-->
                    <li class="nav-item">
                        <a href="https://docs.nbpickup.org/" class="nav-link">Docs</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>