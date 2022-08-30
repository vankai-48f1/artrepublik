<?php

/**
 * Template Name Sample: Service
 */
get_header();
?>
<?php if (have_posts()) : ?>
    <div class="page-service">
        <?php while (have_posts()) : the_post(); ?>
            <div class="container">
                <div class="breadcrumb">
                    <!-- Breadcrumb -->
                </div>

                <div class="service-intro mb-4">
                    <!-- Intro -->
                </div>

                <!-- Content -->
                <div class="service-body">
                    <div class="service-body__main">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php get_footer(); ?>