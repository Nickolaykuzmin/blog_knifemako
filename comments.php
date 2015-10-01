<?php
/**
 * The template for displaying Comments.
 * @link		http://welcustom.net/
 * @author		Mamekko
 * @copyright	Copyright (c) 2015 welcustom.net
 */

if( !post_password_required() ): ?>


<?php if( have_comments() ): ?>
<section>
	<div id="comments">
		<h3><?php _e('Коментарии','blanc'); ?></h3>
		<ul class="no-bullet">
			<?php wp_list_comments( array(
				'format' => 'html5'
				)
			); ?>
		</ul>
	</div>
	<div class="comments_pagination">
		<?php paginate_comments_links(); ?>
	</div>
</section>
<?php endif; ?>

<?php endif; ?>

<?php if( comments_open() ): ?>
<section>
	<?php comment_form( array(
		'title_reply' => __('Оставить коментарий','blanc'),
		'label_submit' => __('Отправить','blanc'),
		'class_submit' => 'submit button small alert',
		'format' => 'html5'
		)
	); ?>
</section>
<?php endif; ?>
