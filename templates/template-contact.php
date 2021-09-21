<?php
/**
 * Template Name: Contact Page
 */

get_header(); ?>

<main class="main-content">
	<section class="contact">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
				<article id="<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="grid-container">
						<div class="grid-x grid-margin-x">
							<div class="cell medium-6">
								<h1 class="page-title"><?php the_title(); ?></h1>
								<div class="contact__content">
									<?php the_content(); ?>
								</div>
								<div class="contact__links">
									<?php if ( $address = get_field( 'address', 'option' ) ): ?>
										<address class="contact-link contact-link--address">
											<?php echo $address; ?>
										</address>
									<?php endif; ?>
									<?php if ( $email = get_field( 'email', 'options' ) ): ?>
										<p class="contact-link contact-link--email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
									<?php endif; ?>
									<?php if ( $phone = get_field( 'phone', 'options' ) ): ?>
										<p class="contact-link contact-link--phone"><a href="tel:<?php echo sanitize_number( $phone ); ?>"><?php echo $phone; ?></a></p>
									<?php endif; ?>
								</div>
							</div>
								<div class="cell medium-6">
								<?php if ( class_exists('GFAPI') && ( $contact_form = get_field( 'contact_form' ) ) && is_array( $contact_form ) ): ?>
									<div class="contact__form">
										<?php echo do_shortcode( "[gravityform id='{$contact_form['id']}' title='false' description='false' ajax='true']" ); ?>
									</div>
							<?php endif; ?>
							</div>
							<?php if ( $location = get_field( 'location', 'options' ) ): ?>
								<div class="cell contact__map-wrap">
									<div class="acf-map contact__map">
										<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"
										     data-marker-icon="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map-marker.png"><?php echo '<p>' . $location['address'] . '</p>'; ?></div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
