<?php
$data = $args['data'];
$featured_post = $data['post_featured'];
// var_dump($featured_post); die;
if ($featured_post && !is_single()) : ?>
    <?php
    $post_color = get_field('post_color', $featured_post->ID);
    $post = $featured_post;
    // var_dump($post);
    // var_dump("seprator");
    ?>
    <?php if ($post_color) : ?>
        <style>
            .featured-post-<?php echo $featured_post->ID; ?> {
                --ss-background-color: <?php echo $post_color['background_section_color'] ?>;
                --ss-background-header-color: <?php echo $post_color['background_header_color'] ?>;
                --ss-title-color: <?php echo $post_color['title_color'] ?>;
                --ss-content-color: <?php echo $post_color['content_color'] ?>;
                --ss-meta-color: <?php echo $post_color['meta_color'] ?>;
                --color-hyperlink-01: <?php echo $post_color['hyperlink_color'] ?>;
            }
        </style>
    <?php endif; ?>
    <section class="featured-post <?php echo 'featured-post-' . $featured_post->ID ?>">
        <div class="featured-post__main">
            <?php get_template_part('template-parts/content', 'single-featured', array('short_desc' => $data['short_description'], 'post_id' => $featured_post->ID)); ?>
        </div>
    </section>
    <?php
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>