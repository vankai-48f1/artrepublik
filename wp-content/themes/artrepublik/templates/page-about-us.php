<?php

/**
 * Template Name: About Us
 */
get_header();
?>
<?php if (have_posts()) : ?>
    <div class="page-about">
        <?php while (have_posts()) : the_post(); ?>
            <!-- Header -->
            <div class="mtext-center">
                <?php echo get_template_part('template-parts/header/header', 'page'); ?>
            </div>
            <!-- Content -->
            <div class="about-body">
                <!-- Our Service -->
                <div class="about-service">
                    <div class="max-x-03">
                        <!-- Partner -->
                        <div class="about-ss__hd mtext-center mb-4">
                            <h2 class="about-ss__title font-primary-regular-08 color-dark-01 mb-2 text-upper"><?php echo get_field('our_service')['title'] ?></h2>
                            <h3 class="about-ss__subtitle text-upper font-primary-bold-02 color-light-03 mb-3"><?php echo get_field('our_service')['subtitle'] ?></h3>
                        </div>
                        <?php
                        if (have_rows('our_service')) : while (have_rows('our_service')) : the_row();
                                if (have_rows('list_service')) : ?>
                                    <div class="about-service__list row">
                                        <?php while (have_rows('list_service')) : the_row(); ?>
                                            <div class="col-lg-4 col-12 mb-4">
                                                <div class="about-service__item">
                                                    <div class="about-service__item-inner">
                                                        <div class="about-service__icon">
                                                            <?php if (get_sub_field('icon')) : ?>
                                                                <img src="<?php echo get_sub_field('icon') ?>" alt="">
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="about-service__name mb-3"><?php echo get_sub_field('name') ?></div>
                                                        <div class="about-service__desc"><?php echo get_sub_field('description') ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                        <?php endif;
                            endwhile;
                        endif; ?>
                    </div>
                </div>

                <!-- About content -->
                <div class="about-content">
                    <div class="max-x-03">
                        <?php $about_content = get_field('about_content'); ?>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="about-content__image mb-4">
                                    <?php if ($about_content['image']) : ?>
                                        <img src="<?php echo $about_content['image'] ?>" alt="">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <div class="about-content__content">
                                    <div class="post-body about-content__main">
                                        <?php echo $about_content['content'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Client and Partner -->
                <div class="about-partner">
                    <div class="max-x-03">
                        <?php $client_partner = get_field('client_partner'); ?>
                        <div class="about-ss__h mtext-center mb-4">
                            <h2 class="about-ss__title font-primary-regular-08 color-dark-01 mb-2 text-upper"><?php echo $client_partner['title'] ?></h2>
                            <h3 class="about-ss__subtitle font-primary-bold-02 text-upper color-light-03 mb-3"><?php echo $client_partner['subtitle'] ?></h3>
                        </div>
                        <!-- Partner -->
                        <?php
                        if (have_rows('client_partner')) : while (have_rows('client_partner')) : the_row();
                                if (have_rows('partner')) : ?>
                                    <div class="about-partner__list">
                                        <?php while (have_rows('partner')) : the_row(); ?>
                                            <div class="about-partner__item">
                                                <div class="about-partner__item-inner">
                                                    <a href="<?php echo get_sub_field('link') ? get_sub_field('link') : '#'; ?>" class="about-partner__link">
                                                        <div class="about-partner__logo">
                                                            <?php echo get_sub_field('logo') ? '<img src="' . get_sub_field('logo') . '" />' : ''; ?>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                        <?php endif;
                            endwhile;
                        endif; ?>
                    </div>
                </div>

                <!-- Teams -->
                <div class="about-team">
                    <div class="max-x-03">
                        <?php $teams_header = get_field('teams_header'); ?>
                        <div class="about-ss__h mtext-center mb-4">
                            <h2 class="about-ss__title font-primary-regular-08 color-dark-01 mb-2 text-upper"><?php echo $teams_header['title'] ?></h2>
                            <h3 class="about-ss__subtitle font-primary-bold-02 text-upper color-light-03 mb-3"><?php echo $teams_header['subtitle'] ?></h3>
                        </div>

                        <?php
                        if (have_rows('teams')) : ?>
                            <div class="about-team__list">
                                <?php while (have_rows('teams')) : the_row(); ?>
                                    <?php
                                    $name = get_sub_field('name');
                                    $position = get_sub_field('position');
                                    $avatar = get_sub_field('avatar');
                                    ?>
                                    <div class="about-team__item">
                                        <div class="about-team__item-inner">
                                            <div class="about-team__avatar-wrap mb-3">
                                                <div class="about-team__avatar">
                                                    <?php if ($avatar) : ?>
                                                        <img src="<?php echo $avatar ?>" class="img-absolute-option" alt="">
                                                    <?php endif; ?>
                                                </div>
                                                <!-- Social -->
                                                <div class="about-team__social">
                                                    <?php get_template_part('template-parts/content', 'social') ?>
                                                </div>
                                            </div>

                                            <div class="about-team__info">
                                                <div class="about-team__name font-secondary-medium-03 color-dark-01 mb-1"><?php echo $name ?></div>
                                                <div class="about-team__position font-primary-light-04 color-light-03"><?php echo $position ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php get_footer(); ?>