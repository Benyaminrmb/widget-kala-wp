<?php
if ( post_password_required() ){
	return;
}
?>
<div id="comments" class="comments comments-area">

	<div class="container-fluid comment-form-container">
		<div class="d-flex align-items-center">
			<div class="comments-title col">
				<h4 class="heading-has-bullet"><?php _e('Leave your comments', 'widgetize'); ?></h4>
			</div>
<!--			<div class="comments-rating col">-->
<!--				--><?php //$rating = function_exists('the_ratings') ?
//					the_ratings('span', 0, false) : '';
//				echo sprintf(
//					'<div class="col"><strong class="key">%1$s </strong>%2$s</div>',
//					__('Rate us', 'widgetize'), $rating
//				);
//				?>
<!--			</div>-->
		</div>
		<?php
		$consent = empty($commenter[ 'comment_author_email' ]) ? 'yes' :
			'no';
		comment_form(
			[
				'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title">',
				'title_reply_after'    => '</h4>',
				'comment_notes_after'  => '',
				'comment_notes_before' => '',
				'fields'               => apply_filters(
					'comment_form_default_fields', [
						'author'  => '<div class="form-col">' .
						             '<div class="comment-form-author form-group col-md-6 col-sm-12">' .
						             '<input id="author" name="author" type="text"
								            value="' . esc_attr($commenter[ 'comment_author' ]) . '" 
								            class="form-control" 
								            placeholder="' . esc_attr__('Fullname', 'widgetize') .
						             '" />' .
						             '</div>',
						'email'   => '<div class="comment-form-email form-group col-md-6 col-sm-12">' .
						             '<input id="email" name="email" type="email"
                                            value="' .
						             esc_attr($commenter[ 'comment_author_email' ]) . '"
                                            class="form-control" 
                                            placeholder="' . esc_attr__('Email Address', 'widgetize') .
						             '" />' .
						             '</div>',
						'url'     => '',
                        'cookies' => '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="hidden" value="' .
                            $consent . '"/>',
                        'phone'=>'<div class="comment-form-phone form-group col-md-6 col-sm-12">' .
                            '<input id="phone" name="phone" type="text" class="form-control" placeholder="' . esc_attr__('Phone', 'widgetize') .
                            '" />' .
                            '</div>'.
                            '</div>',
					]
				),
				'comment_field'        => '<div class="form-col row">' .
				                          '<div class="form-group col-md-12">' .
				                          '<textarea id="comment" name="comment" cols="45" rows="7" aria-required="true" class="form-control"  placeholder="' .
				                          esc_attr__('Comment', 'widgetize') . '"></textarea>' .
				                          '</div>' .
				                          '</div>',
				'submit_field'         => '<div class="form-submit form-group col-md-12 d-flex justify-content-center justify-content-md-end">%1$s %2$s</div>',
				'label_submit'         => __('Send Comment', 'widgetize'),
				'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="btn btn-it-blue btn-submit px-4 %3$s" >%4$s</button>',
				'cancel_reply_link'    => '&times',
				'format'               => 'html5',
			]
		);
		?>
	</div>

	<?php if ( have_comments() ) :
		$comments_by_type = separate_comments($comments);
		$jelly_comments_count = count($comments_by_type[ 'comment' ]);
		$jelly_pings_count = count($comments_by_type[ 'pings' ]);
		?>
		<div class="container-fluid commentlist-container">
			
			<?php if ( $jelly_pings_count ){ ?>
				<ul class="commentlist">
					<?php wp_list_comments(
						[
							'callback' => 'mt_comment',
							'style'    => 'ul',
							'type'     => 'pings',
						]
					); ?>
				</ul>
			<?php }
			if ( $jelly_comments_count ){ ?>
				<ul class="commentlist">
					<?php wp_list_comments(
						[
							'callback' => 'mt_comment',
							'style'    => 'ol',
							'type'     => 'comment',
						]
					); ?>
				</ul>
			<?php }
			if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
				<nav id="comment-nav-below" class="navigation" role="navigation">
					<div class="nav-previous">
						<?php previous_comments_link(
							esc_html__(
								'« Older Comments',
								'widgetize'
							)
						); ?>
					</div>
					<div class="nav-next">
						<?php next_comments_link(esc_html__('Newer Comments »', 'widgetize')); ?>
					</div>
				</nav>
			<?php endif; ?>
		</div>
	<?php endif; // have_comments() ?>
</div>
