<?php
/**
 * Template Name: Articles
 *
 */

get_header();


?>
<?php 
$args = array(
			'post_type' => array( 'articles' )
		);
		$query = new WP_Query( $args );?>

		

<article>
	<?php if ($query->have_posts()): ?>
			<? while ($query->have_posts()) : $query->the_post() ?>
			  <?php 
				$title 		= get_field('article_title');
				// $link 		= get_field('article_link');
			 ?>
			 <?php if ($title) : ?>
			 		<h1><?php echo $title;?></h1>
			 <?php endif; ?>
				<h1></h1>
			<?php endwhile; ?>
		</ul>
		<?php else: ?>
			<p>No books listed yet!</p>
		<?php  endif; ?>
</article>

<?php get_footer(); ?>