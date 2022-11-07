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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="article-img">
            <?php the_post_thumbnail( 'full' );  ?>
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
            </div><!-- .entry-header -->

            <ul class="entry-meta">
                <li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time('F j, Y'); ?></a></li>
                <li><?php esc_html_e('in', 'nt-advent'); ?>  <?php the_category(', '); ?></li>
                <li><?php the_author(); ?></li>
                <?php the_tags( ' <li>', ' , ', '</li> '); ?>
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
            wp_link_pages(
                array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nt-advent' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'nt-advent' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                )
            );
            ?>
        </div><!-- .entry-content -->

        <?php if ( ! is_single() ) : ?>
            <a class="margin_30 btn" href="<?php echo esc_url( get_permalink() ); ?>" role="button"><?php esc_html_e( 'Read More', 'nt-advent' ); ?></a>
        <?php endif; // is_single() ?>

        <?php do_action('nt_advent_after_single_post_content' ); ?>

    </div>
</article>
