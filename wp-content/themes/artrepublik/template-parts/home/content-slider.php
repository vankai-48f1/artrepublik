<?php
$data = $args['data'];
$list_post = $data['list_post'];
?>

<section class="section-slider">
    <div class="section-slider__container">
        <?php
        if ($list_post) : ?>
            <div class="section-slider__main">
                <div class="section-slider__header text-center">
                    <h2 class="section-slider__title font-secondary-bold-08 ss-title-color"><?php echo $data['title_ss'] ?></h2>
                </div>
                <!-- Slider -->
                <div class="slider-primary-container">
                    <div class="slider-primary">
                        <?php foreach ($list_post as $post) :
                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post); ?>
                            <article class="slider-primary__item">
                                <a href="<?php the_permalink() ?>" class="slider-primary__item-wrapper ss-content-color">

                                    <div class="slider-primary__item-body">
                                        <div class="slider-primary__item-thumb-wrap">
                                            <div class="slider-primary__item-thumb">
                                                <?php the_post_thumbnail('blog-thumbnail',  ['class' => 'img-absolute-option']) ?>
                                            </div>
                                        </div>

                                        <div class="slider-primary__item-content">
                                            <h2 class="slider-primary__item-title mb-3"><?php the_title() ?></h2>
                                            <div class="slider-primary__item-author-name article-author">
                                                <?php echo get_the_author() ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-primary__item-meta article-meta">
                                        <div class="slider-primary__item-cate">
                                            <?php echo get_the_category()[0]->name ?>
                                        </div>
                                        <div class="slider-primary__item-created"><?php echo get_the_date('m.j.Y h:i A') ?></div>
                                    </div>
                                </a>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    <div class="slider-primary__custom-arrows"></div>
                </div>
            </div>
            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>