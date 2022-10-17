<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?php if (is_front_page()) : ?>
            <?php bloginfo('name') ?>
        <?php elseif (is_single()) : ?>
            <?php echo wp_title('', true, ''); ?>
        <?php else : ?>
            <?php echo wp_title('', true, ''); ?>
        <?php endif ?>
    </title>


    <link href="<?php echo get_template_directory_uri() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/common.css" rel="stylesheet"> <!-- My custom CSS -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/vendor/fontawesome-5.15.3/css/all.min.css" rel="stylesheet"> <!-- font-awesome 5 -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/style.css" rel="stylesheet"> <!-- Style CSS -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/responsive.css" rel="stylesheet"> <!-- Responsive CSS -->

    <!-- slick -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendor/slick/slick.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendor/slick/slick-theme.css">
    
    <?php
    // Dynamic font family
    $font_url = get_field('link_font_style', 'option');
    $css_rules_font = get_field('css_rules_font', 'option');
    if ($font_url && $css_rules_font) :
    ?>
        <style>
            @import url(<?php echo $font_url; ?>);
            :root {
                --font-secondary-regular-name: <?php echo $css_rules_font; ?>;
            }
        </style>
    <?php endif; ?>
    <?php wp_head() ?>
</head>

<body>
    <header>
        <div class="header-main">
            <div class="header-wrapper">
                <div class="header-container max-x-01">
                    <div class="header-inner">
                        <div class="header-row">
                            <?php
                            /**
                             * Logo
                             */
                            $site_logo = get_theme_mod('logo');
                            $logo_size = get_theme_mod('logo-size');

                            ?>
                            <div class="header-left header-left--size-logo site-info" style="max-width:<?php echo $logo_size ? $logo_size . 'px' : '150px'; ?>">
                                <div class="header-left__inner header-logo">
                                    <?php if ($site_logo) : ?>
                                        <a href="<?php echo home_url() ?>" class="header-logo__link">
                                            <div class="site-info__logo-wrap">
                                                <div class="site-info__logo">
                                                    <img src="<?php echo $site_logo; ?>" alt="Site logo" width="100%" />
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="header-right">
                                <div class="header-right__inner">
                                    <button class="hd-hamburger-btn hd-hamburger-btn--style">
                                        <span class="hamburger-btn-icon"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header fixed right partial-->
        <?php get_template_part("template-parts/panel", "bar") ?>
    </header>