<?php
/**
* The template for displaying posts in the Video post format.
*
* @package WordPress
* @subpackage nt_advent_
* @since nt_advent_ 1.0
*/
$nt_advent_embed = rwmb_meta( 'nt_advent_video_embed' );
$nt_advent_m4v = rwmb_meta( 'nt_advent_video_m4v' );
$nt_advent_ogv = rwmb_meta( 'nt_advent_video_ogv' );
$nt_advent_webm = rwmb_meta( 'nt_advent_video_webm' );
$nt_advent_image_id = get_post_thumbnail_id();
$nt_advent_image_url = wp_get_attachment_image_src($nt_advent_image_id, true);
$nt_advent_wp_video = '[video poster="'.$nt_advent_image_url[0].'" mp4="'.$nt_advent_m4v.'"  webm="'.$nt_advent_webm.'"]';
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="hentry-box">
        <?php if( $nt_advent_embed!='' ) : ?>
            <div class="post-thumb blog-bg">
                <div class="media-element video-responsive"><?php echo wp_kses( $nt_advent_embed,nt_advent_allowed_html() ); ?></div>
            </div>
        <?php else : ?>
            <div class="post-thumb"><?php echo do_shortcode ($nt_advent_wp_video); ?></div>
        <?php endif; ?>

        <div class="post-container">
            <div class="content-container">
                <div class="entry-header">
                    <?php
                    if ( ! is_single() ) {
                        the_title( sprintf( '<h2 class="entry-title all-caps"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                    }
                    ?>
                </div><!-- .entry-header -->
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
