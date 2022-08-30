<?php if (have_comments()) : ?>
    <div class="comment-content">
        <h5 class="comment-content__header">
            <?php
            $num_cmt =  (int)get_comments_number();
            echo $num_cmt < 10 ? 0 . $num_cmt  . '&ensp;Bình luận' : $num_cmt  . '&ensp;Bình luận';
            ?>
        </h5>
        <ul class="comment-content__list">
            <?php
            $args_cmt = array (
                'type'    	  => 'comment',
				'walker'      => new Caudat_Custom_Walker_Comment,
				'max_depth'   => 2
            );
            
            wp_list_comments($args_cmt) ?>
        </ul>
    </div>
<?php endif; ?>

<div class="comment-form-ctn contact-map__form">
    <?php
    $comments_arg = array(
        'form'    => array(
            'class' => 'form-horizontal'
        ),
        'comment_field'            => '<div class="form-group field-comment mb-3">' .
            '<textarea id="comment" class="" name="comment" rows="3" aria-required="true" placeholder="Your comment *"></textarea>' .
            '</div>',

        'fields' => apply_filters(
            'comment_form_default_fields',
            array(
                'author' => '<div class="form-group field-author mb-3">' .
                    '<input id="author" name="author" class="" type="text"  size="30" placeholder="Your Name *" />
								</div>',

                'email' => '<div class="form-group field-email mb-3">' .
                    '<input type="email" id="email" name="email" class="" type="text" size="30" placeholder="Your E-mail *" />
								</div>',
                'cookies'               => '',
            )
        ),
        'comment_notes_after'     => '',
        'title_reply'            => 'Leave a comment',
        'title_reply_to'        => 'Reply %s',
        'cancel_reply_link'        => '( Cancel )',
        'comment_notes_before'    => '',


        'label_submit'            => 'Leave a comment'
    );

    comment_form($comments_arg);
    ?>

</div>