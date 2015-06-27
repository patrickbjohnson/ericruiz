<?php
/**
 * Template Name: Reading List
 *
 */

get_header();
?>
<article id="page-<?php the_ID() ?>" class="article">
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
					$title 	= 	get_field('book_title');
					$author 	= 	get_field('book_author');
					$url 		= 	get_field('book_url');
				 ?>
					<li class="book">
						<div class="book-details">
							<?php if ($url) : ?>
								<a href="<?php echo $url;?>">
									<?php if( $img ) : ?>
										<img class="book-img" src="<?php echo $img['url']?>" alt="">
									<?php endif;?>
								</a>
							<?php else : ?>
								<?php if( $img ) : ?>
									<img class="book-img" src="<?php echo $img['url']?>" alt="">
								<?php endif; ?>
							<?php endif;?>
							
							<?php if( $title ) : ?>
								<h1 class="book-title"><?php echo $title; ?></h1>	
							<?php endif; ?>
							<?php if( $author ) : ?>
								<h2 class="book-author"><?php echo $author; ?></h2>	
							<?php endif; ?>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php else: ?>
				<p>No books listed yet!</p>
			<?php  endif; ?>
	</div>
</article>

<?php get_footer(); ?>