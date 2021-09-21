<?php
/**
 * Category
 *
 * Standard loop for the category page
 */
get_header(); ?>
<main class="main-content">
	<div class="grid-container">
		<div class="grid-x grid-margin-x posts-list">
			<div class="cell small-12">
				<h2 class="page-title page-title--category"><?php echo get_the_archive_title(); ?></h2>
			</div>
			<!-- BEGIN Category Content -->
			<div class="large-8 medium-8 small-12 cell">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?><!-- BEGIN of Post -->
						<?php get_template_part( 'parts/loop', 'post' ); // Post item ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<!-- BEGIN of pagination -->
				<?php foundation_pagination(); ?>
				<!-- END of pagination -->
			</div>
			<!-- END Category Content -->
			<!-- BEGIN of Sidebar -->
			<div class="large-4 medium-4 small-12 cell sidebar">
				<?php get_sidebar( 'right' ); ?>
			</div>
			<!-- END of Sidebar -->
		</div>
	</div>
</main>
<?php get_footer(); ?>
