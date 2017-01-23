<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php wp_title(''); ?><?php if (wp_title('', false)) {
            echo ' | ';
        } ?><?php bloginfo('name'); ?></title>
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory'); ?>/lrtk.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.8.3.min.js"></script>
    <script src="//api.map.baidu.com/api?key=&amp;v=1.1&amp;services=true" type="text/javascript"></script>
</head>
<body>
<div class="head">
    <div style="float: left;"></div>
    <div style="float: right;"></div>
</div>
<div class="nav">
    <div class="logo"></div>
    <div class="nav-main">
        <?php
        if (function_exists('wp_nav_menu')) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id' => 'nav',
                'container' => 'ul',
            ));
        }
        ?>
    </div>
</div>