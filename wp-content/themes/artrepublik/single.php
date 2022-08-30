<?php get_header() ?>
<!-- Page Content -->
<div class="post-sg post-sg--featured">
    <?php if (have_posts()) : ?>
        <?php
        global $post;
        $post_color = get_field('post_color', $post->ID);

        ?>
        <?php if ($post_color) : ?>
            <style>
                #post-<?php echo $post->ID; ?> {
                    --ss-background-color: <?php echo $post_color['background_section_color'] ?>;
                    --ss-background-header-color: <?php echo $post_color['background_header_color'] ?>;
                    --ss-title-color: <?php echo $post_color['title_color'] ?>;
                    --ss-content-color: <?php echo $post_color['content_color'] ?>;
                    --ss-meta-color: <?php echo $post_color['meta_color'] ?>;
                    --color-hyperlink-01: <?php echo $post_color['hyperlink_color'] ?>;
                }
            </style>
        <?php endif; ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'single-featured'); ?>
        <?php endwhile; ?>

    <?php endif; ?>
</div>
<!-- /.container -->
<?php get_footer() ?>