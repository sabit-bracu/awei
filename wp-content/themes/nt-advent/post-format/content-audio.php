<?php
/**
* The default template for displaying content
*
* Used for both single and index/archive/search.
*
* @package WordPress
* @subpackage nt_advent
* @since nt_advent 1.0
*/
$nt_advent_mp3 = rwmb_meta( 'nt_advent_audio_mp3' );
$nt_advent_oga = rwmb_meta( 'nt_advent_audio_ogg' );
$nt_advent_sc_url = rwmb_meta( 'nt_advent_audio_sc' );
$nt_advent_sc_color = rwmb_meta( 'nt_advent_audio_sc_color' );
$nt_advent_wp_audio = '[audio mp3="'.$nt_advent_mp3.'"  ogg="'.$nt_advent_oga.'"]';
$nt_advent_soundcloud_audio = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.urlencode( $nt_advent_sc_url ).'&amp;show_comments=true&amp;auto_play=false&amp;color='.$nt_advent_sc_color.'"></iframe>';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( $nt_advent_sc_url !='' ) : ?>
        <div class="post-thumb blog-bg"><?php echo wp_kses( $nt_advent_soundcloud_audio,nt_advent_allowed_html() ); ?></div>
    <?php else : ?>
        <div class="post-thumb blog-bg">
            <?php if ( has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
            <?php echo do_shortcode ( $nt_advent_wp_audio ); ?>
        </div>
    <?php endif; ?>
    <div class="post-container">
        <div class="content-container">
            <div class="entry-header">
                <?php
                if ( ! is_single() ) :
                    the_title( sprintf( '<h2 class="entry-title all-caps"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                endif;
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
</article>
