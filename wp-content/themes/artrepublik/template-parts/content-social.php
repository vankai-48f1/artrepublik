<!-- Social -->
<?php if (have_rows('list_social', 'option')) : ?>
    <ul class="social">
        <?php while (have_rows('list_social', 'option')) : the_row();
            $icon = get_sub_field('icon');
            $link_social = get_sub_field('link_social');
            //var_dump($icon);
        ?>
            <?php if ($icon) : ?>
                <li class="social__item">
                    <a href="<?php echo $link_social ? $link_social : "#"; ?>">
                        <i class="fa-<?php echo $icon['value'] ?>"></i><span class="social__item-name"><?php echo $icon['label']; ?></span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>