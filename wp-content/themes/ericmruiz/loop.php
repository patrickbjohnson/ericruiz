<?php if (is_page()): the_post() ?>
	<article id="page-<?php the_ID() ?>" class="article">
		<header class="article-header">
			<?php if ( has_post_thumbnail()): ?>
				<?php the_post_thumbnail() ?>
			<?php endif; ?>
			<h1 ><?php if(!is_singular()): ?><a class="article-title" href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php endif; the_title() ?><?php if(!is_singular()): ?></a><?php endif; ?></h1>
		</header>
		<div class="article-content">
			<?php the_content(); ?>	
		</div>
	</article>
<?php else: ?>
	<?php if (have_posts()):
		while (have_posts()) : the_post() ?>
			<article id="article-<?php the_ID() ?>" class="article">
				<header class="article-header">
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
						<?php if ( has_post_thumbnail()): ?>
							<?php the_post_thumbnail() ?>
						<?php endif; ?>
						<span class="article-date"><?php the_date('m-d-Y') ?></span>
						<h1 class="article-title"><?php the_title(); ?></h1>
					</a>
				</header>
				<div class="article-content ">
					<?php (is_single()) ? the_content() : the_excerpt() ?>
				</div>
				<span class="content-flag"></span>
				<hr>
			</article>
		<?php endwhile; ?>
	<?php else: ?>
		<p>Nothing matches your query.</p>
	<?php  endif; ?>
<?php  endif; ?>


<?php if (show_posts_nav()) : ?>
	<ul class="page-controls">
		<li class="page-nav nav-prev"><?php next_posts_link( 'Older posts' ); ?></li>
		<li class="page-nav nav-next"><?php previous_posts_link( 'Newer posts' ); ?></li>
	</ul>
<?php endif; ?>
