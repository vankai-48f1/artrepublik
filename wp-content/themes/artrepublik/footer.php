<!-- Footer -->
<footer class="footer">
    <div class="max-x-03">
        <div class="row footer-row align-items-center">
            <div class="col-md-4 col-sm-12 mb-4">
                <?php
                /**
                 * Logo
                 */
                $site_logo = get_theme_mod('logo-light');
                $size_logo = get_theme_mod('logo-size');
                ?>
                <div class="footer-midle">
                    <div class="footer-midle__inner footer-logo">
                        <div class="site-info__logo-wrap">
                            <div class="site-info__logo">
                                <img src="<?php echo $site_logo; ?>" alt="Site logo" width="100%" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <!-- Navigation -->
                <div class="footer-social">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'footer-menu',
                            'depth'  => 3,
                            'container'  => 'nav',
                            'container_class'      => 'footer-nav footer-menu-wrap',
                            'menu_class'  => 'footer-nav__menu',
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 cl-white font-primary-regular-01"><?php echo get_field("copyright", "option") ?></div>
    </div>
    <!-- /.container -->
</footer>
<!-- Shadow backdrop -->
<div class="body-backdrop"></div>
<!-- Bootstrap core JavaScript -->
<script src="<?php echo get_template_directory_uri() ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendor/slick/slick.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/main.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/slider.js" type="module"></script>

<?php wp_footer() ?>
</body>

</html>