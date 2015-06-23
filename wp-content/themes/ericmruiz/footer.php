			</div>
		</div>
		<footer id="page-footer" class="footer">
			<div class="container">
				<?php if ( ! dynamic_sidebar('eric-footer') ) : ?>
					<li>{static sidebar item 1}</li>
					<li>{static sidebar item 2}</li>
				<?php endif; ?>
			</div>
		</footer>
		<!-- wp - footer -->
		<?php wp_footer(); ?>
	</body>
</html>