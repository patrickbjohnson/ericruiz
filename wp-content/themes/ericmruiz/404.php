<?php get_header(); ?>
	<article id="page-<?php the_ID() ?>" class="article">
		<header class="article-header">
			<img src="http://i.giphy.com/fyevWXLoTRKlG.gif">
			<h1 >No page found, damnit!</h1>
		</header>
		<div class="article-content">
			<p>Seriously though, I'm too busy writing stuff to make sure you don't wander off somehwere you don't belong.</p>
			<p>Make my life easy and go back <a class="error-link" href="<?php echo site_url(); ?>">home</a>.</p>
		</div>
	</article>
<?php get_footer(); ?>
