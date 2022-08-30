<?php
$data = $args['data'];
$post_highlight = $data['post_highlight'];
// var_dump($post_highlight); die;
if ($post_highlight && !is_single()) : ?>
    <?php
    $post_color = get_field('post_color', $post_highlight->ID);
    $post = $post_highlight;

    ?>
    <?php if ($post_color) : ?>
        <style>
            .highlight-post-<?php echo $post_highlight->ID; ?> {
                --ss-background-color: <?php echo $post_color['background_section_color'] ?>;
                --ss-background-header-color: <?php echo $post_color['background_header_color'] ?>;
                --ss-title-color: <?php echo $post_color['title_color'] ?>;
                --ss-content-color: <?php echo $post_color['content_color'] ?>;
                --ss-meta-color: <?php echo $post_color['meta_color'] ?>;
                --color-hyperlink-01: <?php echo $post_color['hyperlink_color'] ?>;
            }
        </style>
    <?php endif; ?>
    <section class="highlight-post <?php echo 'highlight-post-' . $post_highlight->ID ?>">
        <div class="highlight-post__main">
            <?php get_template_part('template-parts/content', 'single-highlight', array('short_desc' => $data['short_description'], 'post_id' => $post_highlight->ID)); ?>
        </div>
    </section>
    <?php
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>