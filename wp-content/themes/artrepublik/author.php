<?php get_header() ?>
<!-- Page Content -->
<div class="category" id="category-<?php echo $category->term_id ?>">
    <div class="max-x-05">
        <!-- Header -->
        <div class="category__header-wrap">
            <div class="category__header">
                <h1 class="category__title-main font-secondary-bold-11 text-upper">Tác giả: <?php the_author() ?>&nbsp;</h1>
            </div>
        </div>
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