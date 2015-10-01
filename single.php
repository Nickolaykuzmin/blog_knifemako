<?php
/**
 * The template for displaying single posts.
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

	<div class="formas">
		<form action="">
			<table border="0">
				<tr>
					<td>
						<input class="name" type="text" placeholder="Имя" required = 'required'>
					</td>

					<td>
						<input class="email" type="email"  placeholder="Email" required = 'required'>
					</td>
					<td cellspacing='2'><input class="buttonn" type="submit" value="Получить уроки"></td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php get_template_part('breadcrumbs');?>

<div class="row">
	<div id="main" class="columns large-9">

		<?php if (have_posts()): while (have_posts()): the_post();?>
				<article <?php post_class();?> itemscope itemtype="http://schema.org/Article">
					<?php setPostViews(get_the_ID());?>
					<h1 itemprop="name" class="entry-title"><?php the_title();?></h1>

					<ul class="inline-list inline-postmeta">
						<li>
							<span class="fa-stack text-red"><i class="fa fa-circle fa-stack-2x fa-red"></i><i class="fa fa-calendar fa-stack-1x fa-inverse"></i></span>
							<time datetime="<?php echo get_the_date('c');?>" itemprop="datePublished">
								<?php echo get_the_date();?>
							</time>
						</li>

						<?php if (has_category()): ?>
						<li>
							<span class="fa-stack text-green"><i class="fa fa-circle fa-stack-2x fa-green"></i><i class="fa fa-folder fa-stack-1x fa-inverse"></i></span>
							<?php the_category(',');?>
						</li>
						<li>
							<span class="fa-stack text-blue"><i class="fa fa-circle fa-stack-2x fa-blue"></i><i class="fa fa-comment fa-stack-1x fa-inverse"></i></span>
							<a href="<?php comments_link();?>"><?php comments_number();?></a>
						</li>
						<li class="view">
							<i class="fa fa-eye"></i>
<?php if(function_exists('the_views')) { the_views(); } ?>
						</li>
						<?php endif;?>
				</ul>

				<span itemprop="articleBody">
				<?php the_content();?>

				<?php wp_link_pages('before=<div id="page-links" class="text-center">&after=</div>&pagelink=<span>%</span>');?>
				</span>
				<div class="share_buttons">
					<h2>ПОДЕЛИТЕСЬ ЗАПИСЬЮ:</h2>
					<div class="vk">
						<!-- Put this script tag to the <head> of your page -->
						<script type="text/javascript" src="http://vk.com/js/api/share.js?92" charset="windows-1251"></script>

						<!-- Put this script tag to the place, where the Share button will be -->
						<script type="text/javascript"><!--
						document.write(VK.Share.button(false,{type: "round", text: "Поделится"}));
						--></script>
					</div>
					<div class="facebook_share">
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.4&appId=466710330175630";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-share-button" data-href="http://blog.knifemako.com/" data-layout="button_count"></div>
					</div>
					<div class="google_share">
						<!-- Поместите этот тег туда, где должна отображаться кнопка "Поделиться". -->
					<div class="g-plus" data-action="share" data-href="http://blog.knifemako.com"></div>

					<!-- Поместите этот тег за последним тегом виджета Поделиться. -->
					<script type="text/javascript">
					  window.___gcfg = {lang: 'ru'};

					  (function() {
					    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					    po.src = 'https://apis.google.com/js/platform.js';
					    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
					</div>
				</div>

				<!-- Put this script tag to the <head> of your page -->
				<!-- Put this script tag to the <head> of your page -->
				<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

				<script type="text/javascript">
				  VK.init({apiId: 5031132, onlyWidgets: true});
				</script>

				<!-- Put this div tag to the place, where the Comments block will be -->
				<div id="vk_comments"></div>
				<script type="text/javascript">
				VK.Widgets.Comments("vk_comments", {limit: 10, width: "870", attach: "*"});
				</script>
					<div id="interesting_articles">

					<h3>Интересное на блоге:</h3>
					 <?php
					$categories = get_the_category($post->ID);
						if ($categories) {
						 $category_ids = array();
						 foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
						 $args=array(
						 'tag__in' => $tag_ids,  //сортировка по тегам (меткам)
						 'post__not_in' => array($post->ID),
						 'showposts'=>4,  //количество выводимых ячеек
						 'orderby'=>rand, // в случайном порядке
						 'caller_get_posts'=>1); //исключаем одинаковые записи
						 $my_query = new wp_query($args);
						 if( $my_query->have_posts() ) {
						 echo '<ul>';
						 while ($my_query->have_posts()) {
						 $my_query->the_post();
						?>
					<li><div id="cell"><a onclick="return !window.open(this.href)" href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a><br>
					<span><a onclick="return !window.open(this.href)" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></span></div></li>
					<?php
					}
						echo '</ul>';
					}
						wp_reset_query();
					}
					?>
					</div>
				<?php the_tags('<p class="text-gray"><i class="fa fa-tag"></i> ', ',', '</p>');?>
				<div class="navlink clearfix">
					<span class="navlink-prev left">
					<?php previous_post_link('<span class="navlink-meta">&laquo; ' . __('Предыдущий пост', 'blanc') . '</span> %link', '%title', true);?>
					</span>
					<span class="navlink-next right text-right">
					<?php next_post_link('<span class="navlink-meta">' . __('Следующий пост', 'blanc') . ' &raquo;</span> %link', '%title', true);?>
					</span>
				</div>
			</article>
			<?php endwhile;endif;?>


	</div><!-- columns -->

	<div id="sidebar" class="columns large-3">
		<?php dynamic_sidebar('column-blog');?>
	</div><!-- columns -->

</div><!-- row -->

<?php get_footer();?>
