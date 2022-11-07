<?php
$nt_advent_logo_option = ( ot_get_option('nt_advent_logo_type') );
$nt_advent_img_logo = ( ot_get_option('nt_advent_logo_img') );
$nt_advent_sticky_img_logo = ( ot_get_option('nt_advent_sticky_img_logo') );
$nt_advent_text_logo = ( ot_get_option('nt_advent_logo_text') );
?>

<?php do_action( 'nt_advent_header_topbar_action' ); ?>

<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'nt-advent' ); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <?php if ( ( $nt_advent_logo_option ) == 'text' || ( $nt_advent_logo_option ) == '' ) : ?>
                    <?php if ( $nt_advent_text_logo ) : ?>

                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-logo navbar-brand nav-white page-scroll"><?php echo esc_html( $nt_advent_text_logo ); ?></a> <!-- Your Logo -->
                    <?php  else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-logo navbar-brand nav-white page-scroll "><?php esc_html_e( 'Advent', 'nt-advent' ); ?></a> <!-- Your Logo -->

                    <?php endif; ?>
                <?php endif; ?>

                <?php if (( $nt_advent_logo_option ) == 'img' ) : ?>
                    <?php if ( $nt_advent_img_logo  ) : ?>

                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="img-logo navbar-brand page-scroll <?php if ( $nt_advent_sticky_img_logo !=''  ) : ?> default-logo <?php endif; ?>">
                            <img class="responsive-img" src="<?php echo esc_url( $nt_advent_img_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a> <!-- Your Logo -->

                        <?php if ( $nt_advent_sticky_img_logo !=''  ) : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="img-logo navbar-brand page-scroll sticky-logo">
                                <img class="responsive-img" src="<?php echo esc_url( $nt_advent_sticky_img_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                            </a> <!-- Your Logo -->
                        <?php endif; ?>

                    <?php  else : ?>

                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-logo navbar-brand nav-white page-scroll"><?php esc_html_e( 'Advent', 'nt-advent' ); ?></a> <!-- Your Logo -->

                    <?php endif; ?>

                <?php endif; ?>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

                <?php
                wp_nav_menu( array(
                    'menu'            => '',
                    'theme_location'  => 'primary',
                    'depth'           => 2,
                    'container'       => '',
                    'container_class' => '',
                    'menu_class'      => 'primary-menu nav navbar-nav nav-white',
                    'menu_id'         => 'primary-menu',
                    'echo'            => true,
                    'fallback_cb'     => 'Nt_Advent_Wp_Bootstrap_Navwalker::fallback',
                    'walker'          => new Nt_Advent_Wp_Bootstrap_Navwalker()
                ));
                ?>
            </div>
        </div>
    </nav><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
