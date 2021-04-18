<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= lang("Header.title")?></title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="/assets/css/vanilla-zoom.min.css">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><a class="navbar-brand logo" href="#"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/index.html"><?= lang("Header.home")?></a></li>
                <li class="nav-item"><a class="nav-link" href="/features.html"><?= lang("Header.features")?></a></li>
                <li class="nav-item"><a class="nav-link" href="/pricing.html"><?= lang("Header.pricing")?></a></li>
                <li class="nav-item"></li>
                <li class="nav-item"><a class="nav-link" href="/contact-us.html"><?= lang("Header.docs")?></a></li>
                <li class="nav-item"><a class="nav-link" href="/login.html"><?= lang("Header.login")?></a></li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><?= lang("Header.lang")?>: <?= lang("Header.short")?></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/lang/en">English</a>
                        <a class="dropdown-item" href="lang/sk">Slovenčina</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
