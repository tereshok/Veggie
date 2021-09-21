<?php
/**
 * Index
 *
 * Standard loop for the front-page
 */
get_header(); ?>
	<main class="main-content">
		<div class="grid-container">
			<div class="grid-x grid-margin-x posts-list">
				<!-- BEGIN of main content -->
				<div class="large-8 medium-8 small-12 cell">
					
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'parts/loop', 'post' ); // Post item ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<!-- BEGIN of pagination -->
					<?php foundation_pagination(); ?>
					<!-- END of pagination -->
				
				</div>
				<!-- END of main content -->
				
				<!-- BEGIN of sidebar -->
				<div class="large-4 medium-4 small-12 cell sidebar">
					<?php get_sidebar( 'right' ); ?>
				</div>
				<!-- END of sidebar -->
			</div>
		</div>
	</main>

<?php get_footer(); ?>