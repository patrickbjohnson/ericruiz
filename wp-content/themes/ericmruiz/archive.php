<<<<<<< HEAD
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
=======
<?php get_header(); ?>
<div id="page-content">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php if (is_category()): ?>
			<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
		<?php elseif(is_tag()): ?>
			<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
		<?php elseif (is_day()): ?>
			<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
		<?php elseif (is_month()): ?>
			<h2>Archive for <?php the_time('F, Y'); ?></h2>
		<?php elseif (is_year()): ?>
			<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
		<?php elseif (is_author()): ?>
			<h2 class="pagetitle">Author Archive</h2>
		<?php elseif (isset($_GET['paged']) and !empty($_GET['paged'])): ?>
			<h2 class="pagetitle">Blog Archives</h2>
		<?php endif; ?>
		<?php get_template_part('loop', 'archive'); ?>
	<?php else : ?>
		<h1>Nothing found</h1>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
>>>>>>> ba935a77e8cb3b50364ca36f1ceddc6345666780
