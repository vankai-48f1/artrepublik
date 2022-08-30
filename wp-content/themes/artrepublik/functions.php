<?php

// Thêm ảnh đại diện
add_theme_support('post-thumbnails');

// Ảnh này sẽ hiện ở ngoài blog
add_image_size('blog-thumbnail', 700, 350, true);

// Ảnh này sẽ hiện ở trong post
add_image_size('post-large', 900, 600, true);

add_image_size('post-small', 250, 200, true);


// Khai báo menu
function register_my_menu()
{
    register_nav_menu('primary-menu', __('Primary Menu'));
    register_nav_menu('secondary-menu', __('Secondary Menu'));
    register_nav_menu('footer-menu', __('Footer Menu'));
}
add_action('init', 'register_my_menu');

// Khai báo sidebar
function mtem_blog_widgets_init()
{
    register_sidebar(array(
        'name'            => __('Sidebar', 'sidebar'),
        'id'             => 'sidebar',
        'description'     => __('Sidebar'),
        'before_widget'        => '<div class="mb-4">',
        'after_widget'        => '</div>',
    ));
}
add_action('widgets_init', 'mtem_blog_widgets_init');


// Tạo related posts 
function custom_blog_related_post($title = 'Bài viết liên quan', $count = 5)
{
    global $post;
    $tag_ids = array();
    $current_cat = get_the_category($post->ID);
    $current_cat = $current_cat[0]->cat_ID;
    $this_cat = '';
    $tags = get_the_tags($post->ID);
    if ($tags) {
        foreach ($tags as $tag) {
            $tag_ids[] = $tag->term_id;
        }
    } else {
        $this_cat = $current_cat;
    }

    $args = array(
        'post_type'   => get_post_type(),
        'numberposts' => $count,
        'orderby'     => 'rand',
        'tag__in'     => $tag_ids,
        'cat'         => $this_cat,
        'exclude'     => $post->ID
    );
    $related_posts = get_posts($args);

    if (empty($related_posts)) {
        $args['tag__in'] = '';
        $args['cat'] = $current_cat;
        $related_posts = get_posts($args);
    }
    if (empty($related_posts)) {
        return;
    }
    $post_list = '';
    foreach ($related_posts as $related) {
        $post_list .= '<div class="col-md-6 col-12">';
        $post_list .= '<article class="article-item">';
        $post_list .= '<div class="article-item__wrapper">';
        $post_list .= '<a href="' . get_the_permalink($related->ID) . '" class="article-item__thumb">';
        $post_list .= get_the_post_thumbnail($related->ID, 'blog-thumbnail',  ['class' => 'img-absolute-option']);
        $post_list .= '</a>';
        $post_list .= '<div class="article-item__meta">';
        $post_list .= '<div class="article-latest__top mb-2">';
        $post_list .= '<a href="' . get_category_link(get_the_category($related->ID)[0]->term_id) . '" class="font-secondary-medium-01 color-dark-01 text-upper">' . get_the_category($related->ID)[0]->name . '</a>';
        $post_list .= '</div>';
        $post_list .= '</div>';
        $post_list .= '<a href="' . get_the_permalink($related->ID) . '" class="article-item__content">';
        $post_list .= '<h2 class="article-latest__title font-secondary-medium-06 color-dark-01 mb-3">' . get_the_title($related->ID) . '</h2>';
        $post_list .= '</a>';
        $post_list .= '</div>';
        $post_list .= '</article>';
        $post_list .= '</div>';
        //$post_list .= get_template_directory_uri() . 'template-parts/article-part.php';
    }


    return sprintf('
			<div class="post-related my-4">
				<h3 class="font-secondary-medium-07 mb-4">%s</h3>
				<div class="row">%s</div>
			</div>
		', $title, $post_list);
}


if (!function_exists('mtem_pagination')) {
    function mtem_pagination()
    {
        if (paginate_links() != '') { ?>
            <div class="pagination-post">
                <?php
                global $wp_query;
                $big = 999999999;
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'prev_text'    => __('<i class="far fa-chevron-double-left"></i>'),
                    'next_text'    => __('<i class="far fa-chevron-double-right"></i>'),
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages
                ));
                ?>
            </div>
        <?php }
    }
}

// Pagination
if (!function_exists('post_pagination')) {
    function post_pagination($paged = '', $max_page = '')
    {
        global $wp_query;

        if (!$paged) {
            $paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
        }

        if (!$max_page) {
            global $wp_query;
            $max_page = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
        }

        $big  = 999999999; // need an unlikely integer

        $html = paginate_links(array(
            'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'     => '?paged=%#%',
            'current'    => max(1, $paged),
            'total'      => $max_page,
            'mid_size'   => 1,
            'prev_text'    => __('<i class="fas fa-chevron-left"></i>'),
            'next_text'    => __('<i class="fas fa-chevron-right"></i>'),
        ));

        $html = "<div class='pagination-post'>" . $html . "</div>";

        echo $html;
    }
}


// Bài viết mới nhất
function custom_get_latest_post($title = "Latest post", $quantity = 5)
{
    global $post;

    $latest = array(
        'post_status' => 'publish',
        'post_type' => 'post',
        'showposts' => $quantity,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $queryLatest = new WP_Query($latest);
    $post_list = '';
    if ($queryLatest->have_posts()) :
        ?>
        <?php while ($queryLatest->have_posts()) : $queryLatest->the_post(); ?>
            <?php $post_list .= load_template_part('template-parts/article', 'latest') ?>
        <?php endwhile; ?>
    <?php
        wp_reset_postdata();
    endif;
    return sprintf('
                    <div class="latest-post mb-4">
                        <h3 class="latest-post__title font-secondary-bold-05 mb-4">%s</h3>
                        <div class="latest-post__row">%s</div>
                    </div>', $title, $post_list);
}

function load_template_part($template_name, $part_name = null)
{
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}
// tags
function mtem_get_tags_post($quantity = 0)
{
    $args_tags = array(
        'type'      => 'post',
        'orderby'   => 'date',
        'order'     => 'DESC',
        'number'    => $quantity ? $quantity : null,
        'child_of'  => 0,
        'taxonomy'  => 'post_tag',
        'hide_empty' => 0
    );
    $tags_list = get_categories($args_tags);

    echo '<ul class="tags-post">';
    foreach ($tags_list as $tags) : ?>
        <li>
            <a class="hover-red" href="<?php echo $tags->slug; ?>">
                <?php echo $tags->name; ?>
            </a>
        </li>
    <?php endforeach;
    echo '</ul>';
}


// Bài viết liên quan
function mtem_get_related_post($count = 6)
{
    global $post;
    $postcat = get_the_category($post->ID);
    $cateIds = array();

    if (!empty($postcat)) {
        foreach ($postcat  as $cate) {
            array_push($cateIds, $cate->cat_ID);
        }
    }

    $args = array(
        'post_status' => 'publish',
        'post_type' => 'post',
        'showposts' => $count,
        'orderby' => 'date',
        'order' => 'DESC',
        'cat'         => $cateIds,
        'exclude'     => $post->ID
    );

    $queryRelatedPost = new WP_Query($args);

    if ($queryRelatedPost->have_posts()) : ?>
        <div class="related-post row category__row">
            <?php while ($queryRelatedPost->have_posts()) : $queryRelatedPost->the_post(); ?>
                <div class="col-sm-6 col-lg-4 col-12">
                    <?php get_template_part('template-parts/article', 'related'); ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata();
}

// Random bài viết liên quan
function mtem_get_related_random_post($count = 6)
{
    global $post;
    $postcat = get_the_category($post->ID);
    $cateIds = array();

    if (!empty($postcat)) {
        foreach ($postcat  as $cate) {
            array_push($cateIds, $cate->cat_ID);
        }
    }

    $args = array(
        'post_type'   => get_post_type(),
        'showposts' => $count,
        'orderby'     => 'rand',
        'cat'         => $cateIds,
        'exclude'     => $post->ID
    );

    $queryRelatedPost = new WP_Query($args);

    if ($queryRelatedPost->have_posts()) : ?>
        <div class="related-post row category__row">
            <?php while ($queryRelatedPost->have_posts()) : $queryRelatedPost->the_post(); ?>
                <div class="col-sm-6 col-lg-4 col-12">
                    <?php get_template_part('template-parts/article', 'related'); ?>
                </div>
            <?php endwhile; ?>
        </div>
<?php endif;
    wp_reset_postdata();
}


function mtem_customize_options($wp_customize)
{
    $wp_customize->add_section(
        'site-logo',
        array(
            'title' => 'Site Logo',
            'description' => 'Fields information for site logo',
            'priority' => 25
        )
    );

    // Logo Header
    $wp_customize->add_setting('logo', array('default' => ''));
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'logo', array(
            'label' => 'Logo Dark',
            'section' => 'site-logo',
            'settings' => 'logo'
        ))
    );

    // Logo footer
    $wp_customize->add_setting('logo-light', array('default' => ''));
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'logo-light', array(
            'label' => 'Logo Light',
            'section' => 'site-logo',
            'settings' => 'logo-light'
        ))
    );

    $wp_customize->add_setting('logo-size', array('default' => ''));
    $wp_customize->add_control('logo-size', array(
        'label' => 'Logo Size',
        'section' => 'site-logo',
        'type' => 'number',
        'settings' => 'logo-size',
        'description' => 'Default 155(px)',
    ));
}
add_action('customize_register', 'mtem_customize_options');

if (function_exists('acf_add_options_page')) {
    /**
     * Add Option ACF
     */
    acf_add_options_page(
        array(
            'page_title'    => __('Theme Options'),
            'icon_url'      => 'dashicons-admin-generic',
        )
    );
}
