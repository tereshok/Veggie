<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>
	
	<!--HOME PAGE SLIDER-->
<?php home_slider_template(); ?>
	<!--END of HOME PAGE SLIDER-->
	
	<!-- BEGIN of main content -->


<?php $image = get_field('info_bg_image'); ?>
<section class="info__section" <?php bg($image); ?>>
    <div class="grid-container">
        <div class="grid-x grid-margin-x info__block">
            <?php if( have_rows('info_content_block') ): ?>
                <?php while( have_rows('info_content_block') ) : the_row(); ?>
                    <div class="cell large-4 info__content">
                        <?php
                        $image_info = get_sub_field('info_image');
                        if( !empty( $image_info ) ): ?>
                            <img src="<?php echo esc_url($image_info['url']); ?>" alt="<?php echo esc_attr($image_info['alt']); ?>" />
                        <?php endif; ?>

                        <h6><?php the_sub_field('info_title'); ?></h6>
                        <p><?php the_sub_field('info_text'); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<section id="specials" class="month-specials__section">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell month-specials__title">
                <?php if(get_field('month_specials_title')) : ?>
                    <h2><?php the_field('month_specials_title') ?></h2>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/veggie/decoration.png">
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-x month-specials__content">
            <?php $dish_posts = get_field('month_specials_dishes'); ?>
                <?php if( $dish_posts ): ?>
                <?php $i = 1; ?>
                    <?php foreach( $dish_posts as $post ): ?>
                        <?php setup_postdata($post); ?>
                        <div class="cell small-12 medium-6 large-6 xlarge-4 month-specials__item <?php if($i > 3) echo 'month-specials__item-left'; ?>">
                                <div class="dish-image">
                                    <?php if(get_the_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full'); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="dish-content">
                                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                    <div class="month-specials__item-text"><?php the_content(); ?></div>
                                    <span class="month-specials__item-price"><?php the_field('dish_price'); ?></span>
                                </div>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<section id="about" class="about-us__section">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell large-5 medium-12 about-us__content">
                <h2><?php the_field('about_us_title')?></h2>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/veggie/decoration.png">
                <p class="about-us__content-text"><?php the_field('about_us_content')?></p>
                <?php
                $image_autograph = get_field('about_us_autograph');
                if( !empty( $image_autograph ) ): ?>
                    <img src="<?php echo esc_url($image_autograph['url']); ?>" alt="<?php echo esc_attr($image_autograph['alt']); ?>" class="about-us__content-autograph"/>
                <?php endif; ?>
            </div>
            <div class="cell large-7">
                <?php
                $image_promo = get_field('about_us_image');
                if( !empty( $image_promo ) ): ?>
                    <img src="<?php echo esc_url($image_promo['url']); ?>" alt="<?php echo esc_attr($image_promo['alt']); ?>" class="about-us__main-img"/>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section id="menu" class="menu__section">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell">
                <?php if(get_field('menu_title')) : ?>
                    <h2><?php the_field('menu_title') ?></h2>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/veggie/decoration.png">
                <?php endif; ?>
            </div>
            <div class="cell">
                <?php
                $terms = get_terms( [
                    'taxonomy' => 'menu_position',
                    'orderby' => 'id',
                    'hide_empty' => false,
                ] ); ?>
                <?php $u = 0; ?>
                <div class="tabs-triggers">
                    <?php foreach ($terms as $item => $term) : ?>
                        <a class="js-tab-trigger tab-trigge <?php if($u == 0) echo 'active'; ?>" data-tab="<?php echo $term->slug ?>"><?php echo $term->name ?></a>
                    <?php $u++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container">
                <?php $i = 0; ?>
                <?php foreach ($terms as $item => $term) : ?>
                    <?php $arg = [
                        'post_type'	=> 'dishes',
                        'tax_query' => [
                            [
                                'taxonomy' => 'menu_position',
                                'field' => 'slug',
                                'terms' => $term->slug,
                            ],
                        ],
                        'posts_per_page'    => 14
                    ];
                    ;
                    $query = new WP_Query( $arg ); ?>
                    <div class="js-tab-content tab-conten grid-x grid-margin-x <?php if($i == 0) echo 'active'; ?>" data-tab="<?php echo $term->slug ?>">
                        <?php $iter = 0; ?>
                        <?php while($query->have_posts()) : $query->the_post() ?>
                            <div class="menu__block cell medium-12 large-12 xlarge-5 <?php if($iter % 2 != 0) echo 'xlarge-offset-2'?>">
                                <div class="menu__content">
                                    <div class="menu__content-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if(get_field('dish_full_name')) : ?>
                                                <?php the_field('dish_full_name')?>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="menu__content-border"></div>
                                    <div class="menu__content-price">
                                        <?php if(get_field('dish_price')) : ?>
                                            <?php the_field('dish_price')?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="menu__subcontent">
                                <span>
                                    <?php if(get_field('dish_ingredient')) : ?>
                                        <?php the_field('dish_ingredient')?>
                                    <?php endif; ?>
                                </span>
                                </div>
                            </div>
                        <?php $iter++; ?>
                        <?php endwhile; ?>
                    </div>
                <?php $i++; ?>
                <?php endforeach; ?>
            </div>
    </div>
</section>
<?php $image = get_field('footer_background_image', 'option'); ?>
<section id="contact" class="contact__section" <?php bg($image); ?>>
    <div class="grid-container contact__overlay">
        <div class="grid-x grid-margin-x">
            <div class="cell large-offset-7 large-5 contact__block">
                <?php if(get_field('contact_section_title', 'option')) : ?>
                    <h2><?php the_field('contact_section_title', 'option')?></h2>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/veggie/decoration.png">
                <?php endif; ?>
                <div class="grid-x contact__part">
                    <div class="cell medium-6 large-6 xlarge-5 contact__part-address">
                        <?php if(get_field('contact_address _title', 'option')) : ?>
                            <h6><?php the_field('contact_address _title', 'option')?></h6>
                        <?php endif; ?>
                        <?php if(get_field('address', 'option')) : ?>
                            <p><?php the_field('address', 'option')?></p>
                        <?php endif; ?>
                    </div>
                    <div class="cell medium-6 large-6 xlarge-5  xlarge-offset-2 contact__part-contacts">
                        <?php if(get_field('contact_title', 'option')) : ?>
                            <h6><?php the_field('contact_title', 'option')?></h6>
                        <?php endif; ?>
                        <?php if(get_field('email', 'option')) : ?>
                            <a href="mailto:<?php the_field('email', 'option')?>"><?php the_field('email', 'option')?></a>
                        <?php endif; ?>
                        <?php if(get_field('phone', 'option')) : ?>
                            <a href="tel:<?php the_field('phone', 'option')?>"><?php the_field('phone', 'option')?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ( class_exists('GFAPI') && ( $contact_form = get_field( 'contact_form', 'option' ) ) && is_array( $contact_form ) ): ?>
                    <div class="contact__form">
                        <?php echo do_shortcode( "[gravityform id='{$contact_form['id']}' title='true' description='false' ajax='true']" ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
	<!-- END of main content -->

<?php get_footer(); ?>