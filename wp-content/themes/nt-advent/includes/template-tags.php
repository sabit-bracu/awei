<?php
/**
* Custom template tags for this theme.
*
* Eventually, some of the functionality here could be replaced by core features.
*
* @package nt_advent
*/

if ( ! function_exists( 'nt_advent_paging_nav' ) ) {
    /**
    * Display navigation to next/previous set of posts when applicable.
    *
    * @return void
    */
    function nt_advent_paging_nav() {
        // Don't print empty markup if there's only one page.
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return;
        }
        ?>
        <nav class="navigation paging-navigation" role="navigation">
            <ul class="pager">

                <?php if ( get_next_posts_link() ) : ?>
                    <li class="previous"><?php next_posts_link( esc_html__( ' Older posts', 'nt-advent' ) ); ?></li>
                <?php endif; ?>

                <?php if ( get_previous_posts_link() ) : ?>
                    <li class="next"><span class="icon-facebook"></span><?php previous_posts_link( esc_html__( 'Newer posts ', 'nt-advent' ) ); ?></li>
                <?php endif; ?>

            </ul><!-- .nav-links -->
        </nav><!-- .navigation -->
        <?php
    }
}

if ( ! function_exists( 'nt_advent_post_nav' ) ) {
    /**
    * Display navigation to next/previous post when applicable.
    *
    * @return void
    */
    function nt_advent_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
        $next     = get_adjacent_post( false, '', false );

        if ( ! $next && ! $previous ) {
            return;
        }
        ?>
        <!-- Navigation -->
        <ul class="pager">
            <li class="previous"><?php previous_post_link( '%link', _x( '<i class="fa fa-angle-left"></i> %title ', 'Previous post link', 'nt-advent' ) ); ?></li>
            <li class="next"><?php next_post_link(     '%link', _x( '%title <i class="fa fa-angle-right"></i> ', 'Next post link',     'nt-advent' ) ); ?><li>
        </ul>
        <?php
    }
}

if ( ! function_exists( 'nt_advent_post_nav_old' ) ) {
    /**
    * Display navigation to next/previous post when applicable.
    *
    * @return void
    */
    function nt_advent_post_nav_old() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
        $next = get_adjacent_post( false, '', false );

        if ( ! $next && ! $previous ) {
            return;
        }
        $next_post = get_next_post();
        $prev_post = get_previous_post();
        $nexty = $nexty = '';
        if (!empty( $next_post ) ) {
            $nexty = $next_post->post_title;
            $newshort = strlen( $nexty ) > 15 ? substr( $nexty,0,25 ).'...' : $nexty;
        }

        if ( !empty( $prev_post ) ) {
            $previ = $prev_post->post_title;
            $newshortprev = strlen( $previ ) > 15 ? substr( $previ,0,25 ).'...' : $previ;
        }
        ?>
        <!-- Navigation -->
        <ul class="pager">
            <li class="previous"><?php if (!empty( $prev_post )): next_post_link('%link', $newshortprev ); endif; ?></li>
            <li class="next"><?php if (!empty( $next_post )): next_post_link('%link', $newshort ); endif; ?><li>
        </ul>
        <?php
    }
}

if ( ! function_exists( 'nt_advent_header_topbar' ) ) {
    add_action( 'nt_advent_header_topbar_action', 'nt_advent_header_topbar' );
    function nt_advent_header_topbar() {
        if ( 'page' == ot_get_option( 'header_topbar_template_type' ) && function_exists( 'nt_advent_vc_inject_shortcode_css' ) ) {
            if ( '' != ot_get_option( 'header_topbar_custom_template' ) ) {
                nt_advent_vc_inject_shortcode_css( ot_get_option( 'header_topbar_custom_template' ) );
                $content = get_post_field( 'post_content', ot_get_option( 'header_topbar_custom_template' ) );
                echo '<div class="header-topbar-template-'.ot_get_option( 'header_topbar_custom_template' ).'">'.do_shortcode( $content ).'</div>';
            }
        }
        if ( 'custom' == ot_get_option( 'header_topbar_template_type' ) && '' != ot_get_option( 'header_topbar_custom_html' ) ) {
            echo '<div class="header-topbar-template-custom">'.do_shortcode( ot_get_option( 'header_topbar_custom_html' ) ).'</div>';
        }
    }
}
