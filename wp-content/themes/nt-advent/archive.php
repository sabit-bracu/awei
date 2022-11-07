<?php
get_header();
get_template_part('index-header');

$nt_advent_archivelayout = ot_get_option( 'nt_advent_archivelayout' );

?>
<div class="main" id="main"><!-- Main Section-->

    <div class="template-cover template-cover-style-2 js-full-height-off section-class-scroll index-header">
        <div class="template-overlay"></div>
        <div class="template-cover-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 center">
                        <div class="template-cover-intro">

                            <?php if ( ot_get_option( 'nt_advent_archive_heading_visibility' )!= 'off') : ?>
                                <?php if ( ot_get_option( 'nt_advent_archive_heading' )!= '') : ?>
                                    <h2 class="uppercase lead-heading"><?php echo ( ot_get_option( 'nt_advent_archive_heading' )); ?></h2>
                                <?php else : ?>
                                    <h2 class="uppercase lead-heading"><?php echo esc_html_e('Our Archive','nt-advent');?></h2>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if ( ot_get_option( 'nt_advent_archive_slogan_visibility' )!= 'off') : ?>
                                <?php if ( ot_get_option( 'nt_advent_archive_slogan' )!= '') : ?>
                                    <h2 class="cover-text-sublead wow" data-wow-duration="1s" data-wow-delay=".8s"><?php echo ( ot_get_option( 'nt_advent_archive_slogan' )); ?></h2>
                                <?php else : ?>
                                    <h2 class="cover-text-sublead wow" data-wow-duration="1s" data-wow-delay=".8s"><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h2>
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
        <div class="container has-margin-bottom">
            <div class="row">

                <?php if( ( $nt_advent_archivelayout ) == 'right-sidebar' || ( $nt_advent_archivelayout ) == '' ) { ?>
                <div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
                <?php } elseif( ( $nt_advent_archivelayout ) == 'left-sidebar') { ?>
                <?php get_sidebar(); ?>
                <div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
                <?php } elseif( ( $nt_advent_archivelayout ) == 'full-width') { ?>
                <div class="col-xs-12 full-width-index v">
                <?php } ?>

                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            get_template_part( 'post-format/content', get_post_format() );
                        endwhile;
                        the_posts_pagination( array(
                            'prev_text'          => esc_html__( 'Previous page', 'nt-advent' ),
                            'next_text'          => esc_html__( 'Next page', 'nt-advent' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'nt-advent' ) . ' </span>',
                        ) );
                    else :
                        get_template_part( 'content', 'none' );
                    endif;
                    ?>

                </div><!-- #end sidebar+ content -->

                <?php if( ( $nt_advent_archivelayout ) == 'right-sidebar' || ( $nt_advent_archivelayout ) == '' ) { ?>
                    <?php get_sidebar(); ?>
                <?php } ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
