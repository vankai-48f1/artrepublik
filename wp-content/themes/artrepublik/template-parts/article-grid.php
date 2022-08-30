<article class="article-grid">
    <a href="<?php the_permalink() ?>" class="article-grid__wrapper">

        <div class="article-grid__body">
            <div class="article-grid__thumb">
                <!-- img-absolute-option -->
                <?php the_post_thumbnail('blog-thumbnail',  ['class' => '']) ?>
            </div>

            <div class="article-grid__content">
                <h2 class="article-grid__title text-upper"><?php the_title() ?></h2>
                <div class="article-grid__author-name article-author">
                    <?php echo get_the_author() ?>
                </div>
                <div class="article-grid__excerpt mb-3">
                    <?php echo get_the_excerpt() ?>
                </div>
            </div>
        </div>
        <div class="article-grid__meta article-meta">
            <div class="article-grid__cate">
                <?php echo get_the_category()[0]->name ?>
            </div>
            <div class="article-grid__created"><?php echo get_the_date('m.j.Y h:i A') ?></div>
        </div>
    </a>
</article>