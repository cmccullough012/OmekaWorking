<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo option('site_title'); echo isset($title) ? ' | ' . strip_formatting($title) : ''; ?></title>
    <meta name="viewport" content="width=device-width">
    <head profile="http://www.w3.org/2005/10/profile">
    <link rel="icon" 
          type="image/png" 
          href="<?php echo image_url('favicon', 'favicon'); ?>">

    <?php echo auto_discovery_link_tags(); ?>

   <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Style Sheets -->
    <?php
        queue_css_file('jquery.snippet.min');
        echo head_css(); ?>

    <!-- JavaScripts -->
    <?php 
        queue_js_file('bootstrap');
        queue_js_file('bootstrap.min');
        queue_js_file('jquery.easyPaginate');
        queue_js_file('jquery.snippet.min');
        queue_js_file('scripts');
        echo head_js(); ?>
     <script type="text/javascript" src="../javascripts/script.js"></script>
        
    <script type="text/javascript">
        jQuery.('#easyPaginate').easyPaginate({
            paginateElement: 'img',
            elementsPerPage: 3,
            effect: 'climb'
        });
    </script>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <header role="banner">

        <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
        <div id = "head_wrap">
            <!-- a div to hold the logo and title -->
            <div id = "head_identifiers">
                <div id = "logo_wrap">
                    <?php echo insert_logo(); ?>
                </div>
                <?php echo hide_title(); ?>
            </div>
        </div>

        <nav id="top-nav">
            <a href = "#" id ="nav_icon"><img src = "https://i.imgur.com/GH9aF56.png"/></a>
            <?php echo public_nav_main(); ?>
        </nav>

    </header>

    <div role="main">

        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>

