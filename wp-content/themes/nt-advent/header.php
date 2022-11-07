<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <!-- Meta UTF8 charset -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<!-- BODY START=========== -->
<body <?php body_class(); ?>>
    <?php
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }
    ?>
    <!-- PRELOADER START=========== -->
    <?php if ( ot_get_option('nt_advent_pre') != 'off' ) : ?>
        <?php // CUSTOM PRELOADER ?>
        <?php if ( ot_get_option( 'nt_advent_preloader' ) == 'custom' ) : ?>

            <?php if ( ot_get_option( 'nt_advent_custom_preloader_js' ) == 'off' && ot_get_option( 'nt_advent_custom_preloader' ) !='' ) : ?>
                <div class="nt-advent-custom-preloader">
            <?php endif; ?>

                <?php echo do_shortcode( ot_get_option( 'nt_advent_custom_preloader' ) ); ?>

            <?php if ( ot_get_option( 'nt_advent_custom_preloader_js' ) == 'off' && ot_get_option( 'nt_advent_custom_preloader' ) !='' ) : ?>
                </div>
            <?php endif; ?>

            <?php // END CUSTOM PRELOADER ?>

        <?php else : ?>

            <?php // DEFAULT PRELOADER ?>
            <div id="preloader-default">
                <div class="wrapper">
                    <div class="cssload-loader"></div>
                </div>
            </div>

        <?php endif; ?>

    <?php endif; ?>

    <!-- START CONTAINER -->
    <div class="wrapper">
