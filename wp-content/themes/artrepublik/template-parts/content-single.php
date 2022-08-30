<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <!-- Post Content -->
    <div class="post-body">
        <?php the_content() ?>
    </div>
    <!-- Tags -->
    <div class="post-tags">
        <?php the_tags('', '') ?>
    </div>

    <!-- navigation prev, next -->
    <div class="post-nav">
        <div class="post-nav__item post-nav__item--previous">
            <?php if (get_next_post_link('%link', 'Previous', true)) : ?>
                <div class="mg-bt-1">
                    <?php next_post_link('%link', '<span class="prev-icon">Previous</span>', true); ?>
                </div>
                <div class="post-nav__title mg-bt-1">
                    <a href="<?php echo get_next_post()->guid ?>" class="font-secondary-medium-04 color-dark-01">
                        <?php echo get_next_post()->post_title ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="post-nav__item post-nav__item--next">
            <?php if (get_previous_post_link('%link', 'Next', true)) : ?>
                <div class="mg-bt-1">
                    <?php previous_post_link('%link', '<span class="next-icon">Next</span>', true); ?>
                </div>
                <div class="post-nav__title mg-bt-1">
                    <a href="<?php echo get_previous_post()->guid ?>" class="font-secondary-medium-04 color-dark-01">
                        <?php echo get_previous_post()->post_title ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Commnets -->
    <div class="post-sg__comment">
        <?php
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>
    </div>

    <!-- Related Post -->
    <?php echo custom_blog_related_post('You May Also Like', 2) ?>

</article>