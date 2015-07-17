<?php
/**
 * Template Name: Articles List
 *
 */

get_header();

?>

<article class="article" id="page-<?php the_ID() ?>">
	<header class="article-header">
		<h1 ><?php  the_title() ?></h1>
	</header>
	<div class="article-content">
		<?php 
		$args = array(
			'post_type' => array( 'articles' )
		);

		$query = new WP_Query( $args );

		if ($query->have_posts()): ?>
			<ul class="articles-list">
				<? while ($query->have_posts()) : $query->the_post() ?>
				  <?php 
				  	$url = get_field('article_link');
				  	$publication = get_field('article_publication');
				 ?>
				 <li class="book-list__item">
			 		<a class="book-list__meta" href="<?php echo $url;?>">
			 			<h1 class="book-list__title"><?php the_title();?></h1>
			 			<h2 class="book-list__author"><?php echo $publication; ?></h2>
			 		</a>
				 </li>
				<?php endwhile; ?>
			</ul>
		<?php else: ?>
			<p>No books listed yet!</p>
		<?php  endif; ?>
	</div>
</article>