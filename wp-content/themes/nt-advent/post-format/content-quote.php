<?php
/**
* The template for displaying posts in the Quote post format.
*
* @package WordPress
* @subpackage nt_advent_
* @since nt_advent_ 1.0
*/
$nt_advent_quote_text = rwmb_meta( 'nt_advent_quote_text' );
$nt_advent_quote_author = rwmb_meta( 'nt_advent_quote_author' );
$nt_advent_image_id = get_post_thumbnail_id();
$nt_advent_image_url = wp_get_attachment_image_src($nt_advent_image_id, true);
$nt_advent_color = rwmb_meta( 'nt_advent_quote_bg' );
$nt_advent_opacity = rwmb_meta( 'nt_advent_quote_bg_opacity' );
$nt_advent_opacity = $nt_advent_opacity / 100;
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="hentry-box">
        <div class="post-thumb">
            <div class="content-quote-format-wrapper">
                <?php if(has_post_thumbnail()) : ?>
                <div class="entry-media" style="background-image: url(<?php echo esc_url( $nt_advent_image_url[0] ); ?>); ">
                <?php else : ?>
                <div class="entry-media">
                <?php endif; ?>
                    <div class="content-quote-format-overlay" style="background-color: <?php echo esc_attr( $nt_advent_color ); ?>; opacity: <?php echo esc_attr( $nt_advent_opacity ); ?>;"></div>
                    <div class="content-quote-format-textwrap">
                        <h3><a href="<?php esc_url( the_permalink() ); ?>"><?php echo esc_attr( $nt_advent_quote_text ); ?></a></h3>
                        <p><a href="#0" target="_blank" style="color: #ffffff;"><?php echo esc_attr( $nt_advent_quote_author ); ?></a></p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="post-container">
            <div class="content-container">
                <div class="entry-header">
                    <?php
                    if ( ! is_single() ) {
                        the_title( sprintf( '<h2 class="entry-title all-caps"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                    }
                    ?>
                </div>

                <ul class="entry-meta">
                    <li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time('F j, Y'); ?></a></li>
                    <li><?php esc_html_e('in', 'nt-advent'); ?>  <?php the_category(', '); ?></li>
                    <li><?php the_author(); ?></li>
                    <?php the_tags( '<li>', ',', '</li> '); ?>
                </ul>
            </div>
            <div class="entry-content">
                <?php
                if ( is_single() ) {
                    /* translators: %s: Name of current post */
                    the_content( sprintf(
                        esc_html__( 'Continue reading %s', 'nt-advent' ),
                        the_title( '<span class="screen-reader-text">', '</span>', false )
                    ) );
                } else {
                    the_excerpt();
                }
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nt-advent' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'nt-advent' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
                ?>
            </div>
            <?php if ( ! is_single() ) : ?>
                <a class="margin_30 btn" href="<?php echo esc_url( get_permalink() ); ?>" role="button"><?php esc_html_e( 'Read More', 'nt-advent' ); ?></a>
            <?php endif; ?>
            <?php do_action('nt_advent_after_single_post_content' ); ?>
        </div>
    </div>
</article>
