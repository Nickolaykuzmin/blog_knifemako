<?php
/**
 * The template for displaying front-page of blog posts.
 * @link 		http://welcustom.net/
 * @author		Mamekko
 * @copyright	Copyright (c) 2015 welcustom.net
 */
get_header();?>
<section class="flexslider-section">
	
</section>
<div class="opacitys">
	<div class="left_block">
		<p>Узнайте прямо сейчас 2 базовых техники ножевого боя 1 психотехника для ускорения прогресса в подарок 2 уникальных бонуса</p>
	</div>
	<div class="center_text">
		<h2>Куда нам отправить Ваши уроки?</h2>
	</div>

	<div class="right_arrow">
		<img src="<?php bloginfo('template_directory')?>/arow.png" alt="">
	</div>

	<?php get_template_part('forma') ?>
</div>
<?php get_template_part('breadcrumbs');?>
<div class="row">
	<div id="main" class="columns large-9">

<?php if (have_posts()):while (have_posts()):the_post();?>
	<article <?php post_class('clearfix archive');?> itemscope itemtype="http://schema.org/Article">
		<?php setPostViews(get_the_ID()); ?>

		<a href="<?php the_permalink();?>">
<?php
preg_match('/wp-image-(\d+)/s', $post->post_content, $thumb);
preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $post->post_content, $thumb_link);
if (has_post_thumbnail()) {
	the_post_thumbnail('thumbnail');
} elseif ($thumb) {
	if (wp_get_attachment_image($thumb[1])) {
		echo wp_get_attachment_image($thumb[1], 'thumbnail');
	} else {
		echo '<img src="'.$thumb_link[1].'" alt="'.get_the_title().'" width="150" height="150" class="attachment-thumbnail">';
	}
} else {
	echo '<img src="'.get_template_directory_uri().'/img/no-image.jpg" alt="No Image" width="150" height="150" class="attachment-thumbnail">';
}
;?>
										</a>
<a href="<?php the_permalink();?>"><h1 itemprop="name" class="entry-title"><?php the_title();
?></h1></a>

					<ul class="inline-list inline-postmeta">
<li>
<span class="fa-stack text-red"><i class="fa fa-circle fa-stack-2x fa-red"></i><i class="fa fa-calendar fa-stack-1x fa-inverse"></i></span>
		<time datetime="<?php echo get_the_date('c');?>" itemprop="datePublished">
<?php echo get_the_date();?>
</time>
				</li>
				<li class="view">
							<i class="fa fa-eye"></i>
<?php if(function_exists('the_views')) { the_views(); } ?>
						</li>
<?php if (has_category()):?>
<li>
			<span class="fa-stack text-green"><i class="fa fa-circle fa-stack-2x fa-green"></i><i class="fa fa-folder fa-stack-1x fa-inverse"></i></span>
<?php the_category(',');?>
		</li>
		<li>
			<span class="fa-stack text-blue"><i class="fa fa-circle fa-stack-2x fa-blue"></i><i class="fa fa-comment fa-stack-1x fa-inverse"></i></span>
			<a href="<?php comments_link();?>"><?php comments_number();
?></a>
		</li>
<?php endif;?>
</ul>

<?php the_excerpt();?>
			<p class="medium-text-right more"><a href="<?php the_permalink();?>">Читать</a></p>
<div class="col lg-9">
					<div class="row">
						<?php get_template_part('likes'); ?>
					</div>
				</div>
		</article>
<?php endwhile;
endif;
?>

<?php
the_posts_pagination(array(
		'prev_text' => '&lt;',
		'next_text' => '&gt;',
		'type'      => 'list',
	));
?>
</div><s!-- columns -->

	<div id="sidebar" class="columns large-3">
<?php dynamic_sidebar('column-blog');?>
</div><!-- columns -->

</div><!-- row -->

<?php get_footer();?>
