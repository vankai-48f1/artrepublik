<?php
$data = $args['data'];
$select_post_featured = $data['select_post_featured'];
$cate_selected = $data['category'];
$featured_posts = $data['list_post_featured'];
// var_dump($data);die;
?>
<div class="section-grid">
    <div class="section-grid__inner">
        <div class="max-x-02">
            <!-- If select post -->
            <?php if ($select_post_featured && !empty($select_post_featured)) : ?>
                <?php
                if ($featured_posts) : $i = 0; ?>
                    <div class="article-grid-list">
                        <div class="article-grid-title text-center">
                            <h2 class="font-secondary-bold-06 cl-black text-upper"><?php echo $data['title_ss'] ?></h2>
                        </div>
                        <!-- Fist -->
                        <div class="article-grid-first">
                            <?php foreach ($featured_posts as $post) : $i++;
                                // Setup this post for WP functions (variable must be named $post).
                                setup_postdata($post); ?>
                                <?php if ($i === 1) : ?>
                                    <?php get_template_part('template-parts/article', 'grid'); ?>
                                    <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <!-- Rest -->
                        <div class="article-grid-rest">
                            <?php foreach ($featured_posts as $post) : $i++;
                                // Setup this post for WP functions (variable must be named $post).
                                setup_postdata($post); ?>
                                <?php if ($i != 2) : ?>
                                    <?php get_template_part('template-parts/article', 'grid'); ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>

            <?php else : ?>
                <!-- If select category -->
                <?php
                if ($cate_selected) :
                    $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'showposts' => 4,
                        'cat' => $cate_selected,
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) : ?>
                        <div class="article-grid-list">
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <?php get_template_part('template-parts/article', 'grid'); ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                <?php // Reset Post Data
                    wp_reset_postdata();
                endif;
                ?>
            <?php endif; ?>
        </div>
    </div>
</div>