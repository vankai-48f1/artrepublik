<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    global $post;
    // var_dump($post->ID);
    $thumb_full_width = get_field('full_width_featured_image', $post->ID);
    ?>
    <!-- Post header -->
    <div class="post-header ss-background-color <?php echo !$thumb_full_width ? 'image-not-full' : ''; ?>">
        <div class="post-header__inner">
            <div class="post-header__container">
                <div class="post-header__thumb-wrap <?php echo !$thumb_full_width ? 'max-x-03' : ''; ?>">
                    <div class="post-header__thumb">
                        <a <?php echo !is_single() ? 'href="' . get_the_permalink() . '"' : null; ?>>
                            <?php the_post_thumbnail('full',  ['class' => '']) ?>
                        </a>
                    </div>
                </div>
                <div class="post-header__main">
                    <div class="max-x-03">
                        <div class="post-header__main-inner">
                            <div class="post-header__meta article-meta ss-meta-color">
                                <div class="post-header__author">
                                    <?php the_author_posts_link() ?>
                                </div>
                                <div class="post-header__created"><?php echo get_the_date('m.j.Y h:i A') ?></div>
                            </div>
                            <a <?php echo !is_single() ? 'href="' . get_the_permalink() . '"' : null; ?>>
                                <div class="post-header__content">
                                    <h3 class="post-header__cate ss-meta-color font-secondary-bold-01 mb-2"><?php echo get_the_category()[0]->name ?></h3>
                                    <!-- Title -->
                                    <h1 class="font-secondary-bold-06 ss-title-color mb-2"><?php echo get_the_title($post->ID) ?></h1>
                                    <div class="post-header__excerpt ss-title-color mb-3"><?php echo get_the_excerpt() ?></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Post Content -->
    <div class="post-content font-primary-regular-03">
        <div class="max-x-03">
            <div class="row">
                <div class="post-content__sidebar col-xl-4 col-lg-3 col-12">
                    <?php is_single() ? get_sidebar() : null; ?>
                </div>
                <div class="post-content__main col-xl-8 col-lg-9 col-12">
                    <?php if ($args['short_desc'] && !is_single()) : ?>
                        <div class="post-body">
                            <div class="post-body__short-desc"><?php echo $args['short_desc'] ?></div>
                            <div class="post-link pt-5">
                                <a href="<?php echo get_the_permalink() ?>" class="read-more-01 font-secondary-bold-07 text-upper">Read more</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="post-body">
                            <?php the_content() ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Tags -->

</article>