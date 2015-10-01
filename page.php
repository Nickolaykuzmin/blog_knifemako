<?php
/**
 * The template for displaying pages.
 * @link		http://welcustom.net/
 * @author		Mamekko
 * @copyright	Copyright (c) 2015 welcustom.net
 */
get_header();
?>
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

<?php if (have_posts()): while (have_posts()): the_post();?>
				<article <?php post_class();?> itemscope itemtype="http://schema.org/Article">
							<h1 itemprop="name" class="entry-title"><?php the_title();?></h1>
									<span itemprop="articleBody">
				<?php the_content();?>
				<?php wp_link_pages('before=<div id="page-links">&after=</div>&pagelink=<span>%</span>');?>
				</span>

					</article>
				<?php endwhile;
endif;
?>

<?php comments_template();?>
</div><!-- columns <--></-->

	<div id="sidebar" class="columns large-3">
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

<!-- VK Widget -->
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 0, width: "220", height: "350", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 28774226);
</script>
<?php dynamic_sidebar('column-page');?>
<a class="twitter-timeline"  href="https://twitter.com/owner369" data-widget-id="628485816210296832">Твиты от @owner369</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>
</div><!-- columns -->

</div><!-- row -->

<?php get_footer();?>
