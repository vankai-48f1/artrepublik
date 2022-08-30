<article class="article-part">
    <a href="<?php the_permalink() ?>" class="article-part__wrapper">
        <div class="article-part__meta article-meta">
            <div class="article-part__cate">
                <?php echo get_the_author() ?>
            </div>
            <div class="article-part__created"><?php echo get_the_date('m.j.Y h:i A') ?></div>
        </div>
        <div class="article-part__body">
            <div class="article-part__thumb">
                <!-- img-absolute-option -->
                <?php the_post_thumbnail('blog-thumbnail',  ['class' => '']) ?>
            </div>

            <div class="article-part__content">
                <h2 class="article-part__title text-upper mb-2"><?php the_title() ?></h2>
                <div class="article-part__author-name article-author">
                    <?php echo get_the_category()[0]->name ?>
                </div>
            </div>
        </div>
    </a>
</article>