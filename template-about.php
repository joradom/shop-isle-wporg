<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: About us page
 *
 */
get_header(); ?>
    <!-- Wrapper start -->
    <div class="main">

    <!-- Header section start -->

    <?php
    $shop_isle_header_image = get_header_image();
    if( !empty($shop_isle_header_image) ) {
        echo '<section class="page-header-module module bg-dark" data-background="'.esc_url( $shop_isle_header_image ).'">';
    } else {
        echo '<section class="page-header-module module bg-dark">';
    }
    ?>
    <div class="container">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1">

                <h1 class="module-title font-alt"><?php the_title(); ?></h1>

                <?php
                /* Header description */
                $shop_isle_shop_id = get_the_ID();
                if( !empty($shop_isle_shop_id) ) {
                    $shop_isle_page_description = get_post_meta($shop_isle_shop_id, 'shop_isle_page_description');
                    if( !empty($shop_isle_page_description[0]) ) {
                        echo '<div class="module-subtitle font-serif mb-0">'.$shop_isle_page_description[0].'</div>';
                    }
                }
                ?>

            </div>

        </div><!-- .row -->

    </div><!-- .container -->
    </section><!-- .page-header-module -->
    <!-- Header section end -->

    <!-- About start -->
    <?php

    if ( have_posts() ) {
        while ( have_posts() ) {

            the_post();

            $shop_isle_content_aboutus = get_the_content();

        }
    }

    if( trim($shop_isle_content_aboutus) != "" ) {

        echo '<section class="module">';

        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-sm-12">';
        the_content();
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '</section>';

    }
    ?>

    <!-- About end -->

    <?php
        do_action('shop-isle-about-page-after-content');
    ?>

<?php get_footer(); ?>