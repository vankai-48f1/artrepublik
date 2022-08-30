<?php

/**
 * Template Name: Contacts
 */
get_header();
?>
<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
        <div class="page-contact">
            <!-- Header -->
            <div class="mtext-center">
                <?php get_template_part('template-parts/header/header', 'page'); ?>
            </div>

            <!-- Map -->
            <div class="contact-map">
                <?php
                $contact_info = get_field('information');
                $form_contact = get_field('form_contact');
                ?>
                <div class="max-x-03">
                    <div class="contact__information-map">
                        <iframe src="https://maps.google.com/maps?q=<?php echo $contact_info['map_coordinates'] ?>&output=embed" width="900" height="710" frameborder="0" style="border:0"></iframe>
                    </div>

                    <div class="contact-map__inner row">
                        <div class="contact-map__left col-lg-6 col-12">
                            <h3 class="font-secondary-medium-02 color-dark-01 mb-4">Contact Information</h3>
                            <!-- Offices -->
                            <div class="contact-office">
                                <div class="contact-office__list">
                                    <div class="contact-office__item">
                                        <div class="contact-office__item-inner">
                                            <div class="contact-office__info mb-4">
                                                <div class="contact-office__name font-primary-light-04 mb-3">
                                                    <a href="<?php echo $contact_info['phone_number'] ? 'tel:' . $contact_info['phone_number'] : '#'; ?>">
                                                        <span n class="contact-office__info-icon"><i class="fas fa-phone-alt"></i></span>&nbsp;<?php echo $contact_info['phone_number']; ?>
                                                    </a>
                                                </div>
                                                <div class="contact-office__name font-primary-light-04 mb-3">
                                                    <a href="<?php echo $contact_info['email'] ? 'mailto:' . $contact_info['email'] : '#'; ?>">
                                                        <span class="contact-office__info-icon"><i class="fas fa-envelope"></i></span>&nbsp;<?php echo $contact_info['email']; ?>
                                                    </a>
                                                </div>
                                                <div class="contact-office__location font-primary-light-04">
                                                    <span class="contact-office__info-icon contact-office__info-icon--add"><i class="fas fa-map-marker-alt"></i></span>&nbsp;<?php echo $contact_info['address']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Social -->
                            <h3 class="font-secondary-medium-02 color-dark-01 mb-4">Follow us</h3>
                            <div class="contact-social mb-4">
                                <?php get_template_part('template-parts/content', 'social') ?>
                            </div>
                        </div>
                        <div class="contact-map__right col-lg-6 col-12">
                            <div class="contact-map__right-inner">
                                <!-- <h3 class="font-secondary-medium-01 color-dark-01 mb-1">< ?php echo $form_contact['subtitle'] ?></h3> -->

                                <!-- Form -->
                                <h3 class="font-secondary-medium-02 color-dark-01 mb-4"><?php echo $form_contact['title'] ?></h3>
                                <div class="contact-map__form">
                                    <?php echo do_shortcode($form_contact['form']) ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>

<?php endif; ?>
<?php get_footer(); ?>