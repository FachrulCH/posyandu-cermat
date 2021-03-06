<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $WEB_TITLE; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="<?php echo $WEB_KEYWORD; ?>"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);
    function hideURLbar() {
        window.scrollTo(0, 1);
    } </script>
    <link href="<?php echo $BASE_URL .'ui/css/bootstrap.min.css'; ?>" rel='stylesheet' type='text/css'/>
    <link href="<?php echo $BASE_URL .'ui/css/font-awesome.css'; ?>" rel='stylesheet' type='text/css'/>
    <link href="<?php echo $BASE_URL .'ui/css/style.css'; ?>" rel='stylesheet' type='text/css'/>
    <?php foreach (($loadCSS?:array()) as $nama_css): ?>
        <link href="<?php echo $BASE_URL .'ui/css/'. $nama_css .'.css'; ?>" rel='stylesheet' type='text/css'/>
    <?php endforeach; ?>
    <script src="<?php echo $BASE_URL .'ui/js/jquery.min.js'; ?>"></script>
    <script src="<?php echo $BASE_URL .'ui/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo $BASE_URL .'ui/js/jquery.metisMenu.js'; ?>"></script>
    <script src="<?php echo $BASE_URL .'ui/js/jquery.slimscroll.min.js'; ?>"></script>
    <script src="<?php echo $BASE_URL .'ui/js/custom.js'; ?>"></script>
    <?php foreach (($headJS?:array()) as $url): ?>
        <script src="<?php echo $url; ?>" type="text/javascript"></script>
    <?php endforeach; ?>
    <style>
        .nav-second-level li {
            padding-left: 20px;
        }
    </style>
    <script>var BASE_URL = '<?php echo $BASE_URL; ?>';</script>
</head>