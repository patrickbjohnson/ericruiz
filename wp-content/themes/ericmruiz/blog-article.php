<?php if (is_page()): the_post() ?>
	<article id="page-<?php the_ID() ?>" class="page">
		<?php the_content(); ?>
	</article>
<?php else: ?>
	<?php if (have_posts()):
		while (have_posts()) : the_post() ?>
			<article id="article-<?php the_ID() ?>" class="single-article">
				<header class="article-header">
					<?php if ( has_post_thumbnail()): ?>
						<a class="featured-image" href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail() ?></a>
					<?php endif; ?>
					<h1 class="article-title"><?php the_title() ?></h1>
					<div class="article-date"><?php the_date('m-d-Y') ?></div>
				</header>
				<div class="article-content">
					<?php (is_single()) ? the_content() : the_excerpt() ?>

				</div>
				<span class="content-flag"></span>
				<hr>
				<div class="comment-content">
					<?php comments_template(); ?>	
				</div>
				
			</article>
		<?php endwhile; ?>
	<?php else: ?>
		<p>Nothing matches your query.</p>
	<?php  endif; ?>
<?php  endif; ?>
