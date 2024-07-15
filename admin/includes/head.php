<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <title> Dashboard | GMSA - CKTUTAS </title>
    <meta property="og:title" content="Dashboard">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Responsive admin theme build on top of Bootstrap 4">
    <meta property="og:description" content="Responsive admin theme build on top of Bootstrap 4">
    <link rel="canonical" href="https://gmsacktutas.org">
    <meta property="og:url" content="https://gmsacktutas.org">
    <meta property="og:site_name" content="GMSA - CKTUTAS">
    <script type="application/ld+json">
        {
            "name": "Looper - Bootstrap 4 Admin Theme",
            "description": "Responsive admin theme build on top of Bootstrap 4",
            "author":
        {
            "@type": "Person",
            "name": "Beni Arisandi"
        },
            "@type": "WebSite",
            "url": "",
            "headline": "Dashboard",
            "@context": "http://schema.org"
        }
    </script><!-- End SEO tag -->
    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/favicon.ico">
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="<?= PROOT; ?>admin/dist/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= PROOT; ?>dist/css/all.min.css">
    <link rel="stylesheet" href="<?= PROOT; ?>admin/dist/css/flatpickr.min.css"><!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="<?= PROOT; ?>admin/dist/css/theme.min.css" data-skin="default">
    <link rel="stylesheet" href="<?= PROOT; ?>admin/dist/css/theme-dark.min.css" data-skin="dark">
    <link rel="stylesheet" href="<?= PROOT; ?>admin/dist/css/custom.css">
    <script>
        var skin = localStorage.getItem('skin') || 'default';
        var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
        // Disable unused skin immediately
        disabledSkinStylesheet.setAttribute('rel', '');
        disabledSkinStylesheet.setAttribute('disabled', true);
        // add loading class to html immediately
        document.querySelector('html').classList.add('loading');
    </script><!-- END THEME STYLES -->
  </head>
  <body>