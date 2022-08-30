<div class="panel-bar" id="panel-bar">
    <div class="panel-bar__inner">
        <!-- Input Search -->
        <div class="panel-bar__header">
            <?php
            /**
             * Logo
             */
            $site_logo = get_theme_mod('logo');
            $size_logo = get_theme_mod('logo-size');
            ?>
            <div class="panel-bar__logo site-info" <?php echo $size_logo ? 'style="max-width:' . $size_logo . 'px"' : ""; ?>>
                <?php if ($site_logo) : ?>
                    <a href="<?php echo home_url() ?>" class="panel-bar__link">
                        <div class="site-info__logo-wrap">
                            <div class="site-info__logo">
                                <img src="<?php echo $site_logo; ?>" alt="Site logo" width="100%" />
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
            <div class="panel-bar__buttons mdp-flex">
                <div class="paner-bar__search">
                    <div class="panel-bar__search-btn">
                        <span class="paner-bar__search-icon"><i class="far fa-search"></i></span>
                    </div>
                </div>
                <div class="paner-bar__close">
                    <div class="panel-bar__close-btn">
                        <span class="paner-bar__close-icon"><i class="fal fa-times"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Search -->
        <form action="<?php bloginfo('url'); ?>/" class="panel-bar__search-form">
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="panel-bar__search-form-submit" type="submit"><i class="far fa-search"></i></button>
                </span>
                <input type="text" class="form-control" value="<?php the_search_query(); ?>" name="s" placeholder="Search for...">
                <button class="panel-bar__search-form-close" type="button"><i class="fal fa-times"></i></button>
            </div>
        </form>

        <!-- Menu primary -->
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'primary-menu',
                'depth'  => 3,
                'container'  => 'nav',
                'container_class'      => 'panel-bar-menu-wrap',
                'menu_class'  => 'header-nav__menu panel-bar__menu',
            )
        );
        ?>
        <!-- Menu secondary -->
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'secondary-menu',
                'depth'  => 1,
                'container'  => 'nav',
                'container_class'      => 'panel-bar-secondary-menu',
                'menu_class'  => 'secondary-menu panel-bar-2nd',
            )
        );
        ?>
        <!-- Btn Close -->
        <div class="panel-bar__contact">
            <!-- Social -->
            <div class="panel-bar__social">
                <?php get_template_part('template-parts/content', 'social') ?>
            </div>
            <!-- Copyright -->
            <div class="font-primary-regular-01"><?php echo get_field("copyright", "option") ?></div>
        </div>
    </div>
</div>