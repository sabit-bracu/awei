<?php
/*
Template name: Fullwidth Template
*/
get_header();
get_template_part('index-header');

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

<div class="main" id="main"><!-- Main Section-->
    <div class="template-cover template-cover-style-2 js-full-height-off section-class-scroll index-header">
        <div class="template-overlay"></div>
        <div class="template-cover-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 center">
                        <div class="template-cover-intro">

                            <?php if( ( $nt_advent_disable_title ) != true ): ?>
                                <?php if( $nt_advent_page_title  ): ?>
                                    <h2 class="uppercase lead-heading"><?php echo esc_html( $nt_advent_page_title ) ; ?></h2>
                                <?php else : ?>
                                    <h2 class="uppercase lead-heading"><?php echo the_title(); ?></h2>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if( ( $nt_advent_page_disable_sub ) != true ): ?>
                                <?php if( $nt_advent_page_subtitle  ): ?>
                                    <h2 class="cover-text-sublead wow" data-wow-duration="1s" data-wow-delay=".8s"><?php echo esc_html( $nt_advent_page_subtitle ) ; ?></h2>
                                <?php else : ?>
                                    <h2 class="cover-text-sublead wow" data-wow-duration="1s" data-wow-delay=".8s"><?php echo ('Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.'); ?></h2>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if ( ot_get_option( 'nt_advent_bread' ) != 'off' && function_exists('bcn_display') ) : ?>
                                <p class="breadcrubms"><?php bcn_display(); ?></p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="blog">
        <div class="container-off has-margin-bottom">
            <div class="row-off">
                <div class="col-md-12-off has-margin-bottom">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
