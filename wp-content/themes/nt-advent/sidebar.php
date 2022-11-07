<?php
/**
* The sidebar containing the main widget area
*
* @package WordPress
* @subpackage nt_advent
* @since nt_advent 1.0
*/

if (  is_active_sidebar( 'sidebar-1' )  ) : ?>
    <div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-12">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
<?php endif; ?>
