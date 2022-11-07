<?php
/**
* The template for displaying the footer
*
*
* @package WordPress
* @subpackage nt_advent
* @since nt_advent 1.0
*/
if ( 'page' == ot_get_option( 'nt_advent_footer_template_type' ) && function_exists( 'nt_advent_vc_inject_shortcode_css' ) ) {

    if ( '' != ot_get_option( 'nt_advent_footer_custom_template' ) ) {

        nt_advent_vc_inject_shortcode_css( ot_get_option( 'nt_advent_footer_custom_template' ) );

        $content = get_post_field( 'post_content', ot_get_option( 'nt_advent_footer_custom_template' ) );

        echo '<footer class="footer-template-'.ot_get_option( 'nt_advent_footer_custom_template' ).'">'.do_shortcode( $content ).'</footer>';
    }

} elseif ( 'custom' == ot_get_option( 'nt_advent_footer_template_type' ) ) {

    if ( '' != ot_get_option( 'nt_advent_footer_custom_html' ) ) {

        echo do_shortcode( ot_get_option( 'nt_advent_footer_custom_html' ) );

    }

} else {
    ?>

    <?php if ( ot_get_option('nt_advent_widgetize') == 'on') : ?>
        <!-- footer custom widgetize -->
        <div class="footer footer-widgetize">
            <div class="container">
                <?php if ( ! dynamic_sidebar( 'nt-advent-footer-widgetize' ) ) : ?>
                    <?php echo dynamic_sidebar( 'nt-advent-footer-widgetize' ); ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ( ot_get_option('nt_advent_footer_default_2') != 'off' ) : ?>
        <!-- footer default -->
        <div class="footer">
            <div class="container">
                <div class="col-md-6">
                    <?php
                    if ( ot_get_option('nt_advent_f_left') != '' ) {
                        echo do_shortcode( ot_get_option('nt_advent_f_left') );
                    } else {
                        if ( ot_get_option('nt_advent_f_left') == false ) {
                            ?>
                            <div class="footer-text"><p><?php esc_html_e('Made by Ahmed Bin Sabit | Copyright ©Awei Inc. All Rights Reserved.', 'nt-advent' ); ?></p></div>
                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="col-md-6">
                    <?php
                    if ( ot_get_option('nt_advent_f_right') != '' ) {
                        echo do_shortcode( ot_get_option('nt_advent_f_right') );
                    } else {
                        if ( ot_get_option('nt_advent_f_right') == false ) {
                            ?>
                            <div class="contact text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('support@domain.com', 'nt-advent' ); ?></a></div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php } ?>

<!-- Scroll To Top -->
<a id="back-top" class="back-to-top page-scroll" href="#main">
    <i class="ion-ios-arrow-thin-up"></i>
</a>
<!-- Scroll To Top Ends-->
</div>
</div>
<?php wp_footer(); ?>

</body>
</html>
