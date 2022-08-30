<?php get_header() ?>
<!-- Page Content -->
<div class="page">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
            <div class="page-header">
                <div class="max-x-01">
                    <!-- Title -->
                    <h1 class="mt-4"><?php the_title() ?></h1>
                </div>
            </div>
            <div class="max-x-05">
                <div class="post-body">
                    <?php the_content() ?>
                </div>
            </div>
        <?php endwhile; ?>

    <?php endif; ?>
    <!-- /.row -->
</div>
<!-- /.container -->
<?php get_footer() ?>