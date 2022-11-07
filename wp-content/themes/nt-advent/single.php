
<?php
get_header();
get_template_part('index-header');

$nt_advent_single_disable_heading = ot_get_option( 'nt_advent_single_disable_heading' );
$nt_advent_postlayout = ot_get_option( 'nt_advent_postlayout' );
?>

<div class="main" id="main"><!-- Main Section-->
    <div class="template-cover template-cover-style-2 js-full-height-off section-class-scroll index-header" >
        <div class="template-overlay"></div>
        <div class="template-cover-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 center">
                        <div class="template-cover-intro">

                            <?php if ( ( $nt_advent_single_disable_heading  ) != 'off') : ?>
                                <h2 class="uppercase lead-heading"><?php echo the_title(); ?></h2>
                            <?php endif; ?>

                            <?php if ( ot_get_option( 'nt_advent_bread' ) != 'off' && function_exists('bcn_display') ) : ?>
                                <p class="breadcrubms"> <?php bcn_display();  ?></p>
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
                <div class="col-md-12-off has-margin-bottom-off">
                    <?php if( ( $nt_advent_postlayout ) == 'right-sidebar' || ( $nt_advent_postlayout ) == '') { ?>
                    <div class="col-lg-8 col-md-8 col-sm-12 index float-right posts">
                    <?php } elseif( ( $nt_advent_postlayout ) == 'left-sidebar') { ?>
                    <?php get_sidebar(); ?>
                    <div class="col-lg-8 col-md-8 col-sm-12 index float-left posts">
                    <?php } elseif( ( $nt_advent_postlayout ) == 'full-width') { ?>
                    <div class="col-xs-12 full-width-index v">
                    <?php } ?>

                        <?php
                        while ( have_posts() ) : the_post();
                            get_template_part( 'post-format/content', get_post_format() );
                            if ( comments_open() || '0' != get_comments_number() ) :
                                comments_template();
                            endif;
                        endwhile;

                        // post navigation
                        nt_advent_post_nav();
                        ?>

                    </div><!-- #end sidebar+ content -->

                    <?php if( ( $nt_advent_postlayout ) == 'right-sidebar' || ( $nt_advent_postlayout ) == '') { ?>
                        <?php get_sidebar(); ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
