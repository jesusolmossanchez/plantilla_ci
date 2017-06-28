<!doctype html>
<html class="no-js" lang="<?php print_r($lang); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php print_r($metas->titulo); ?></title>
        <meta name="description" content="<?php print_r(substr ($metas->desc , 0 , 170 )); ?>">
        <meta name="keywords" content="<?php print_r($metas->keywords); ?>">        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- OpenGraph Meta Data -->

         <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="<?php print_r($metas->titulo); ?>">
        <meta itemprop="description" content="<?php print_r($metas->og_desc); ?>">
        <meta itemprop="image" content="<?php echo base_url().$metas->og_imagen; ?>">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary_large_image">
        <!-- <meta name="twitter:site" content="@publisher_handle"> -->
        <meta name="twitter:title" content="<?php print_r($metas->titulo); ?>">
        <meta name="twitter:description" content="<?php print_r($metas->og_desc); ?>">
        <!-- <meta name="twitter:creator" content="@author_handle"> -->
        <!-- Twitter summary card with large image must be at least 280x150px -->
        <meta name="twitter:image:src" content="<?php echo base_url().$metas->og_imagen; ?>">

        <!-- Open Graph data -->
        <meta property="og:title" content="<?php print_r($metas->og_titulo); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?php print_r(base_url().$metas->slug); ?>" />
        <meta property="og:image" content="<?php echo base_url().$metas->og_imagen; ?>" />
        <meta property="og:description" content="<?php print_r($metas->og_desc); ?>" />
        <meta property="og:site_name" content="<?php print_r($metas->titulo); ?>" />
        <!-- <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> -->
        <!-- <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" /> -->
        <!-- <meta property="article:section" content="Article Section" /> -->
        <!-- <meta property="article:tag" content="Article Tag" /> -->
        <!-- <meta property="fb:admins" content="Facebook numberic ID" />  -->

        <meta name="format-detection" content="telephone=no">


        <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/app/img/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url() ?>assets/app/img/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="256x256"  href="<?php echo base_url() ?>assets/app/img/favicons/android-icon-256x256.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>assets/app/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/app/img/favicons/favicon-16x16.png">
        <meta name="msapplication-TileImage" content="<?php echo base_url() ?>assets/app/img/favicons/mstile-150x150.png">
        <link rel="manifest" href="manifest.json">
        <meta name="theme-color" content="#ffffff">
        <meta name="msapplication-TileColor" content="#ffffff">

        <?php
            $favicon = "assets/app/img/favicons/favicon64.png";
            if(isset($metas->favicon) && !empty($metas->favicon)){
                $favicon = $metas->favicon;
            }
        ?>
        <link id="favicon" rel="icon" type="image/png" sizes="64x64" href="<?php echo base_url().$favicon; ?>">

        <?php if (ENVIRONMENT == 'local') { ?>
            <link rel="stylesheet" href="<?php get_asset_versioned('assets/app/css/styles.css') ?>">
        <?php 
        } else { 

            echo '<style>';
            $css_en_linea = get_asset_string('assets/app/css/styles.css', $this->config->item('assets_base_url'));
            print_r($css_en_linea); 
            echo '</style>';
           
        } ?>


        <?php if (ENVIRONMENT == 'production') { ?>

        <!-- Google Analytics -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-XXXXXXXXX', 'auto');
            ga('send', 'pageview');
        </script>

        <?php } ?>

    </head>
    <body class="<?php print_r($pagina); ?> <?php print_r($lang); ?>">
