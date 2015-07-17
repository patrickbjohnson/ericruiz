<?php
/**
 * Template Name: Reading List
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
			'post_type' => array( 'reading_list' )
		);
		$query = new WP_Query( $args );

		if ($query->have_posts()): ?>
			<ul class="book-list">
				<? while ($query->have_posts()) : $query->the_post() ?>
				  <?php 
				  	$img 		= 	get_field('book_img');
					$author 	= 	get_field('book_author');
					$url 		= 	get_field('book_url');
				 ?>
				 <li class="book-list__item">
				 	<?php if(get_the_title() && $img) :?>

				 		<div class="book-list__media">
				 			<img src="<?php echo $img['url'];?>" alt="">	
				 		</div>
				 		
				 		<a class="book-list__meta" href="<?php echo $url;?>">
				 			<h1 class="book-list__title"><?php the_title();?></h1>
				 			<h2 class="book-list__author"><?php echo $author; ?></h2>
				 		</a>
				 		
				 	<?php endif;?>
				 </li>
				<?php endwhile; ?>
			</ul>
		<?php else: ?>
			<p>No books listed yet!</p>
		<?php  endif; ?>
	</div>
</article>



<?php get_footer(); ?>