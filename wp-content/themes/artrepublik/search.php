<?php get_header() ?>
<!-- Page Content -->
<div class="page-search">


    <!-- Blog Entries Column -->
    <div class="max-x-05">

        <div class="category__header-wrap">
            <div class="category__header">
                <h1 class="category__title-main font-secondary-bold-11 text-upper">
                    Tìm kiếm:
                    <small><?php the_search_query(); ?></small>
                </h1>
            </div>
        </div>
        <?php if (have_posts()) : ?>
            <div class="list-post">
                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('template-parts/article', 'part'); ?>

                <?php endwhile; ?>
            </div>
        <?php else : ?>

            <p>
                Không có bài viết nào phù hợp với từ khóa: <strong><?php the_search_query(); ?></strong>
            </p>

            <form action="<?php bloginfo('url'); ?>/">
                <div class="input-group">
                    <input type="text" class="form-control" value="<?php the_search_query(); ?>" name="s" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                </div>
            </form>

        <?php endif; ?>

        <!-- Pagination -->
        <?php post_pagination() ?>

    </div>

    <!-- /.row -->

</div>
<!-- /.container -->
<?php get_footer() ?>