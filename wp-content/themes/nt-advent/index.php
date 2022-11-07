<?php
get_header();
get_template_part('index-header');
$current_blog_page_id = get_option('page_for_posts');

$nt_advent_headerbgcolor 		= rwmb_meta( 'nt_advent_headerbgcolor' );
$nt_advent_headertextcolor 		= rwmb_meta( 'nt_advent_pagetextcolor' );
$nt_advent_headerpaddingtop 	= rwmb_meta( 'nt_advent_headerptop' );
$nt_advent_headerpaddingbottom 	= rwmb_meta( 'nt_advent_headerpbottom' );
$nt_advent_pagelayout 			= rwmb_meta( 'nt_advent_pagelayout' );
$nt_advent_disable_title 		= rwmb_meta( 'nt_advent_disable_title' );
$nt_advent_page_title 			= rwmb_meta( 'nt_advent_alt_title' );
$nt_advent_page_disable_sub 	= rwmb_meta( 'nt_advent_page_disable_subtitle' );
$nt_advent_page_subtitle 		= rwmb_meta( 'nt_advent_page_subtitle' );

?>
<div id="main">
    <div class="template-cover template-cover-style-2 js-full-height-off section-class-scroll index-header">
        <div class="template-overlay"></div>
        <div class="template-cover-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 center">
                        <div class="template-cover-intro">

                            <h2 class="uppercase white"><?php echo bloginfo('name'); ?> </h2>
                            <h2 class="cover-text-sublead"><?php echo bloginfo('description'); ?></h2>

                            <?php if ( ot_get_option( 'nt_advent_bread' ) != 'off' && function_exists('bcn_display') ) : ?>
                                <p class="breadcrubms"><?php bcn_display();  ?></p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="blog">
        <div class="container has-margin-bottom">
            <div class="row">
                <?php if( ot_get_option( 'nt_advent_bloglayout' ) == 'right-sidebar' || ot_get_option( 'nt_advent_bloglayout' ) == '') { ?>
                <div class="col-lg-9  col-md-9 col-sm-12 index float-right posts">
                <?php } elseif( ot_get_option( 'nt_advent_bloglayout' ) == 'left-sidebar') { ?>
                <?php get_sidebar(); ?>
                <div class="col-lg-9  col-md-9 col-sm-12 index float-left posts">
                <?php } elseif( ot_get_option( 'nt_advent_bloglayout' ) == 'full-width') { ?>
                <div class="col-xs-12 full-width-index v">
                <?php } ?>

                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'post-format/content', get_post_format() ); ?>
                        <?php endwhile; ?>
                        <?php the_posts_pagination( array(
                            'prev_text'          => esc_html__( 'Previous page', 'nt-advent' ),
                            'next_text'          => esc_html__( 'Next page', 'nt-advent' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
                        ) ); ?>
                    <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                    <?php endif; ?>

                </div>

                <?php if( ot_get_option( 'nt_advent_bloglayout' ) == 'right-sidebar' || ot_get_option( 'nt_advent_bloglayout' ) == '') { ?>
                    <?php get_sidebar(); ?>
                <?php } ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
