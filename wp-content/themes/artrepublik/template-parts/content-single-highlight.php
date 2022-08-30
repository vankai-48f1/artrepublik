<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Post Content -->
    <div class="post-highlight">
        <div class="post-highlight__inner">
            <div class="max-x-03">
                <div class="post-header__meta article-meta ss-meta-color mb-2">
                    <div class="post-header__author">
                        <?php the_author_posts_link() ?>
                    </div>
                    <div class="post-header__created"><?php echo get_the_date('m.j.Y h:i A') ?></div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-3 col-12">
                        <div class="post-highlight__left">
                            <div class="post-highlight__content mb-4">
                                <h3 class="post-highlight__cate ss-meta-color font-secondary-bold-01 mb-2"><?php echo get_the_category()[0]->name ?></h3>
                                <!-- Title -->
                                <a <?php echo !is_single() ? 'href="' . get_the_permalink() . '"' : null; ?>>
                                    <h1 class="font-secondary-bold-09 ss-title-color mb-2"><?php echo get_the_title($post->ID) ?></h1>
                                    <div class="post-highlight__excerpt ss-meta-color font-primary-regular-02 mb-3"><?php echo get_the_excerpt() ?></div>
                                </a>
                            </div>
                            <?php is_single() ? get_sidebar() : null; ?>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-9 col-12">
                        <div class="post-body font-primary-regular-03">
                            <div class="post-highlight__thumb mb-5">
                                <?php the_post_thumbnail('full',  ['class' => '']) ?>
                            </div>
                            <?php if ($args['short_desc']) : ?>
                                <div class="post-body__short-desc"><?php echo $args['short_desc'] ?></div>
                                <div class="post-link pt-5">
                                    <a href="<?php echo get_the_permalink() ?>" class="read-more-01 font-secondary-bold-07 text-upper">Read more</a>
                                </div>
                            <?php else : ?>
                                <div class="post-body__content">
                                    <?php the_content() ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tags -->

</article>