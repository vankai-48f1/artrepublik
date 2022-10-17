<?php
/*
Template Name: Home
*/
?>
<?php get_header() ?>

<?php if (have_posts()) : ?>
    <main class="hm-page">
        <?php while (have_posts()) : the_post(); ?>
            <?php $i = 0; ?>
            <?php if (have_rows('home_section')) : while (have_rows('home_section')) : the_row(); ?>
                    <?php
                    $i++;
                    $display_type = strtolower(get_sub_field('display_type'));
                    $ss_content = get_sub_field('section_type_' . $display_type);
                    $ss_data = array(
                        'data' => $ss_content
                    );
                    //var_dump($ss_content);
                    ?>
                    <!-- Section -->
                    <div class="hm-section <?php echo 'hm-section-' . $i; ?>">
                        <?php if ($ss_content['color_section']) : ?>
                            <style>
                                .hm-section-<?php echo $i; ?> {
                                    --ss-background-color: <?php echo $ss_content['color_section']['background_color'] ?>;
                                    --ss-title-color: <?php echo $ss_content['color_section']['title_color'] ?>;
                                    --ss-content-color: <?php echo $ss_content['color_section']['content_color'] ?>;
                                    --ss-meta-color: <?php echo $ss_content['color_section']['meta_color'] ?>;
                                }
                            </style>
                        <?php endif; ?>
                        <!-- < ?php var_dump($display_type, $ss_data); die; ?> -->
                        <?php get_template_part('template-parts/home/content', $display_type, $ss_data); ?>
                    </div>
            <?php
                endwhile;
            endif;
            ?>

        <?php endwhile; ?>
    </main>
<?php endif; ?>
<!-- /.container -->
<?php get_footer() ?>