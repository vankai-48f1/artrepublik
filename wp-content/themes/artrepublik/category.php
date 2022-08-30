<?php get_header() ?>
<?php
$category = get_queried_object();
$color_section = get_field('color_section', $category);
?>
<!-- Page Content -->
<div class="category" id="category-<?php echo $category->term_id ?>">
    <!-- Header -->
    <?php if ($color_section) : ?>
        <style>
            #category-<?php echo $category->term_id; ?> {
                --ss-background-color: <?php echo $color_section['background_color'] ?>;
                --ss-title-color: <?php echo $color_section['title_color'] ?>;
                --ss-content-color: <?php echo $color_section['content_color'] ?>;
                --ss-meta-color: <?php echo $color_section['meta_color'] ?>;
            }
        </style>
    <?php endif; ?>
    <div class="category__header-wrap">
        <div class="category__header category__header--animate">
            <h1 class="category__title category__title-main font-secondary-bold-11 text-upper"><?php single_cat_title() ?>&nbsp;</h1>
            <?php for ($i = 0; $i < 7; $i++) {
                echo '<span class="category__title font-secondary-bold-11 text-upper">' . $category->name . '&nbsp;</span>';
            } ?>
        </div>
    </div>
    <div class="max-x-05">
        <?php if (have_posts()) : ?>
            <div class="list-post">
                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('template-parts/article', 'part'); ?>

                <?php endwhile; ?>
            </div>
            <!-- /.row -->
        <?php endif; ?>

        <!-- Pagination -->
        <?php post_pagination() ?>
    </div>
</div>
<!-- /.container -->
<?php get_footer() ?>