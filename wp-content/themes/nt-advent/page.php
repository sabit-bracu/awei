
<?php
get_header();
get_template_part('index-header');

$nt_advent_headerbgcolor = rwmb_meta( 'nt_advent_headerbgcolor' );
$nt_advent_headertextcolor = rwmb_meta( 'nt_advent_pagetextcolor' );
$nt_advent_headerpaddingtop = rwmb_meta( 'nt_advent_headerptop' );
$nt_advent_headerpaddingbottom = rwmb_meta( 'nt_advent_headerpbottom' );
$nt_advent_pagelayout = rwmb_meta( 'nt_advent_pagelayout' );
$nt_advent_disable_title = rwmb_meta( 'nt_advent_disable_title' );
$nt_advent_page_title = rwmb_meta( 'nt_advent_alt_title' );
$nt_advent_page_disable_sub = rwmb_meta( 'nt_advent_page_disable_subtitle' );
$nt_advent_page_subtitle = rwmb_meta( 'nt_advent_page_subtitle' );

?>

<div class="main" id="main"><!-- Main Section-->
    <div class="template-cover template-cover-style-2 js-full-height-off section-class-scroll index-header">
        <div class="template-overlay"></div>
        <div class="template-cover-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 center">
                        <div class="template-cover-intro">

                            <?php  if( ( $nt_advent_disable_title ) != true ): ?>
                                <?php  if( $nt_advent_page_title  ): ?>
                                    <h2 class="uppercase lead-heading"><?php echo esc_html( $nt_advent_page_title ) ; ?></h2>
                                <?php else : ?>
                                    <h2 class="uppercase lead-heading"><?php echo the_title(); ?></h2>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php  if( ( $nt_advent_page_disable_sub ) != true ): ?>
                                <?php  if( $nt_advent_page_subtitle  ): ?>
                                    <h2 class="cover-text-sublead"><?php echo esc_html( $nt_advent_page_subtitle ) ; ?></h2>
                                <?php endif; ?>
                            <?php endif; ?>

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
                <div class="col-md-12-off  has-margin-bottom-off">

                    <?php if( ( $nt_advent_pagelayout ) =='right-sidebar' || ($nt_advent_pagelayout ) =='' ){ ?>
                    <div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
                    <?php } elseif(( $nt_advent_pagelayout ) == 'left-sidebar') { ?>
                    <?php get_sidebar(); ?>
                    <div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
                    <?php } elseif(( $nt_advent_pagelayout ) == 'full-width') { ?>
                    <div class="col-xs-12 full-width-index v">
                    <?php } ?>
                        <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post();

                            // Include the page content template.
                            get_template_part( 'content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        // End the loop.
                        endwhile;
                        ?>
                    </div>

                    <?php if( ( $nt_advent_pagelayout ) =='right-sidebar' || ($nt_advent_pagelayout ) =='' ){ ?>
                        <?php get_sidebar(); ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
