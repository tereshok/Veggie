<?php
/**
 * WooCommerce Page. Shop / Product Category / Single Product view
 */
get_header(); ?>

<main class="main-content">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<!-- BEGIN of page content -->
			<div class="cell">
				<?php woocommerce_content(); ?>
			</div>
			<!-- END of page content -->
		</div>
	</div>
</main>

<?php get_footer(); ?>
