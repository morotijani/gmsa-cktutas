<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Dashboard | GMSA - CKTUTAS </title>

    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="<?= PROOT; ?>assets/media/logo/logo.png">
    <link rel="shortcut icon" href="<?= PROOT; ?>assets/media/logo/logo.png">
    <meta name="theme-color" content="#3063A0">
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
    </script>
</head>
<body>