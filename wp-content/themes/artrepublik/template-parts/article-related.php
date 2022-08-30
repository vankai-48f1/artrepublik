<article class="article-item">
    <div class="article-item__wrapper">
        <a href="<?php the_permalink() ?>" class="article-item__thumb">
            <?php the_post_thumbnail('blog-thumbnail',  ['class' => 'img-absolute-option']) ?>
        </a>
        <div class="article-item__meta">
            <div class="article-latest__top mb-2">
                <!-- Categories  -->
                <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>" class="article-latest__category font-secondary-medium-01 color-dark-01"><?php echo get_the_category()[0]->name ?></a>
            </div>
        </div>
        <a href="<?php the_permalink() ?>" class="article-item__content">
            <h2 class="article-latest__title font-secondary-medium-06 color-dark-01 mb-3"><?php the_title() ?></h2>
        </a>
    </div>
</article>