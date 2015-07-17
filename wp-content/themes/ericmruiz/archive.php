<?php
/*
Template Name: Archives
*/
get_header(); ?>

<div class="archive content">
	<article class="article">
		<?php the_post(); ?>
		<header class="article-header">
			<h1><?php the_title(); ?></h1>	
		</header>
		
		
		<?php get_search_form(); ?>
		
		<div class="archive-group">
			<h2 class="archive-title">Archives by Month</h2>
			<ul class="archive__list">
				<!-- <?php wp_get_archives('type=monthly'); ?> -->
				<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
			</ul>
		</div>
		<div class="archive-group">
			<h2 class="archive-title">Archives by Subject</h2>
			<ul class="archive__list">
				 <?php wp_list_categories(); ?>
			</ul>
		</div>
		
		
		
	</article>
</div>




<?php get_sidebar(); ?>
<?php get_footer(); ?>