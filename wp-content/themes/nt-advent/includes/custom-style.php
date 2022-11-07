<?php

if ( class_exists( 'OT_Loader' )){

    function nt_advent_custom_preloader_script() {

        if ( ot_get_option( 'nt_advent_custom_preloader_js' ) != 'off' && ot_get_option( 'nt_advent_preloaderjs' ) != '' ) :

            $custom_preloader_js = ot_get_option( 'nt_advent_preloaderjs' );

            wp_enqueue_script( 'nt-advent-custom-preloder', get_template_directory_uri() .'/js/custom-preloder.js', array(), '1.0', true );

            wp_add_inline_script( 'nt-advent-custom-preloder',''.$custom_preloader_js.'' );

        endif;

        if ( ot_get_option( 'nt_advent_custom_preloader_js' ) == 'off' && ot_get_option( 'nt_advent_custom_preloader' ) != '' ) :

            wp_enqueue_script( 'nt-advent-custom-preloder', get_template_directory_uri() .'/js/custom-preloder.js', array(), '1.0', true );

            wp_add_inline_script( 'nt-advent-custom-preloder', 'jQuery(document).ready(function(){jQuery(window).load(function() {jQuery(".nt-advent-custom-preloader").fadeOut("slow");});});' );

        endif;

    }
    add_action( 'wp_enqueue_scripts', 'nt_advent_custom_preloader_script' );
}

function nt_advent_css_options() {

    /* CSS to output */
    $theCSS = '';

    // admin bar
    if( is_admin_bar_showing() && ! is_customize_preview() ) {
        $theCSS .= '
        .template-nav-style-1, .template-nav-style-2 {
            margin-top: 72px;
        }
        .navbar { top:32px;}
        @media only screen and (max-width: 767px) {
            .navbar {
                padding-top: 5px;
                height: 60px;
            }

            .navbar-default {
                border: 0px;
                background-color: transparent;
                top: 46px;
            }
        }
        @media only screen and (max-width: 600px) {
            body:not(.scroll-start) .header-topbar-template-custom + .container .navbar {
                top: 68px;
            }
            .scroll-start .navbar {
                top: 0px!important;
            }
        }
        @media only screen and (max-width: 480px) {
            .navbar.past-main {
                top: 0;
            }
        }
        ';
    }

    // color options
    $one_color = esc_attr( ot_get_option( 'nt_advent_theme_color_one' ) );
    $two_color = esc_attr( ot_get_option( 'nt_advent_theme_color_two' ) );

    if ( ot_get_option( 'nt_advent_theme_color_one' ) !='' ) {
        $theCSS .= '::-moz-selection,
        ::selection,
        .btn-action,
        .form .subscribe-form .submit-button,
        .form .btn-action,.signup-form,
        .signup .btn-action.btn-round,
        .signup .btn-action,
        .app .btn-action,
        .pitch-icon,
        .feature-sub .sub-inner .btn-action,
        .btn,
        .comment-form .submit,
        #widget-area #searchform input#searchsubmit,
        body.search article .searchform input[type="submit"],
        .pager li > a,
        .pager li > span, .brand .circle,
        .post-button,
        .error404 .index .searchform input[type="submit"],
        .pager li > span,
        .pager li > a,
        .section-title:after,
        .widget-title:after,
        #widget-area #searchform #searchsubmit,
        .header-topbar-template-custom {
            background-color:' . $one_color . ';
        }';

        $theCSS .= '.btn-action:hover, .btn-action:focus,.btn-action:active, .btn-action:active:focus,.form .btn-action:hover,.signup .btn-action.btn-round:hover,.signup .btn-action.btn-round:focus,.signup .btn-action:hover,.app .btn-action:hover,.feature-sub .sub-inner .btn-action:hover,.app-features .icon i,.counter-icon i,.contact i,.contact h1,.footer-text p,.contact a,a, a:hover, a:focus, .breadcrumb-current, .widget ul li a, .widget a, .entry-title a:hover, .entry-meta a:hover, #share-buttons i:hover,.nav .open > a, .nav .menu-item-has-children.open > a:hover, .nav .menu-item-has-children.open > a:focus,.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover,.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover{color:' . $one_color . ';}';
        $theCSS .= '.btn-action,.btn-action:hover,.btn-action:focus,.btn-action:active,.btn-action:active:focus,.form .subscribe-form .submit-button:hover,.form .btn-action,.form .btn-action:hover,.signup .btn-action.btn-round,.signup .btn-action.btn-round:hover,.signup .btn-action.btn-round:focus,.signup .btn-action,.signup .btn-action:hover,.app .btn-action,.app .btn-action:hover,.feature-sub .sub-inner .btn-action,.feature-sub .sub-inner .btn-action:hover,.btn,.comment-form .submit,.pager li > a, .pager li > span { border-color:  ' . $one_color . '!important; }';
        $theCSS .= '.pricing .package.active, .btn_black:hover { -webkit-box-shadow: inset 0 0 0 1px ' . $one_color . '; box-shadow: inset 0 0 0 1px ' . $one_color . '; }';
    }

    if ( ot_get_option( 'nt_advent_theme_color_two' ) !='' ) {
        $theCSS .= '.product .btn-action,.product .feature-sub .sub-inner .btn-action:hover,.btn:hover, .btn:focus, .btn.focus{color: ' . $two_color . '; opacity:0.9; }';
        $theCSS .= '.product .btn-action:hover, .product  .btn-action:focus,.product .feature-sub .sub-inner .btn-action,.product .feature-sub .sub-inner .btn-action:hover,.product .btn-action,.btn:hover, .btn:focus, .btn.focus{border-color: ' . $two_color . '; opacity:0.9; }';
        $theCSS .= '.product .feature-sub .sub-inner .btn-action,.owl-pagination .owl-page.active{background-color: ' . $two_color . '; }';
        $theCSS .= '#share-buttons i{color: ' . $two_color . '; }';
        $theCSS .= '.widget ul li a:hover, .flex-direction-nav a { color: ' . $two_color . ' !important; }';
    }


    // NAV
    $nav_sticky = esc_attr( ot_get_option( 'nt_advent_nav_sticky' ) );
    $nav_bg = esc_attr( ot_get_option( 'nt_advent_nav_bg' ) );
    $nav_sbg = esc_attr( ot_get_option( 'nt_advent_nav_sbg' ) );
    $nav_sbga = esc_attr( ot_get_option( 'nt_advent_nav_sbga' ) );
    $nav_sbgah = esc_attr( ot_get_option( 'nt_advent_nav_sbgah' ) );
    $nav_fixed_bg = esc_attr( ot_get_option( 'nt_advent_nav_fixed_bg' ) );
    $navitem_a_s = esc_attr( ot_get_option( 'nt_advent_navitem_after_s' ) );
    $navitem = esc_attr( ot_get_option( 'nt_advent_navitem' ) );
    $navitemhover = esc_attr( ot_get_option( 'nt_advent_navitemhover' ) );
    $dropdown_bg = esc_attr( ot_get_option( 'nt_advent_dropdown_bg' ) );
    $dropdown_item = esc_attr( ot_get_option( 'nt_advent_dropdown_item' ) );
    $dropdown_i_h = esc_attr( ot_get_option( 'nt_advent_dropdown_itemhover' ) );

    if ( $nav_sticky =='off' ) { $theCSS .= '.navbar.past-main{ display:none !important;}'; }
    if ( $nav_bg !='' ) { $theCSS .= '.navbar{background-color:' . $nav_bg . '!important;}'; }
    if ( $nav_fixed_bg !='' ) { $theCSS .= '.navbar.past-main{background-color:' . $nav_fixed_bg . '!important;}'; }
    if ( $navitem !='' ) { $theCSS .= '.navbar-default .navbar-nav>li>a{color:' . $navitem . '!important;}'; }
    if ( $navitem_a_s !='' ) { $theCSS .= '.navbar-default.past-main .navbar-nav > li > a{color:' . $navitem_a_s . ';}'; }
    if ( $navitemhover !='' ) { $theCSS .= '.navbar-default .navbar-nav>li>a:hover{color:' . $navitemhover . ' !important;}'; }
    if ( $dropdown_bg !='' ) { $theCSS .= '.navbar-default .navbar-nav>li .dropdown-menu{background-color:' . $dropdown_bg . '!important;}'; }
    if ( $dropdown_item !='' ) { $theCSS .= '.navbar-default .navbar-nav>li .dropdown-menu > li > a{color:' . $dropdown_item . '!important;}'; }
    if ( $dropdown_i_h !='' ) { $theCSS .= '.navbar-default .navbar-nav>li .dropdown-menu> li > a:hover{color:' . $dropdown_i_h . ' !important;}'; }

    if ( $nav_sbg !='' ) { $theCSS .= '.navbar.past-main{background-color:' . $nav_sbg . '!important;}'; }
    if ( $nav_sbga !='' ) { $theCSS .= '.navbar.past-main .navbar-nav>li>a{color:' . $nav_sbga . '!important;}'; }
    if ( $nav_sbgah !='' ) 	{ $theCSS .= '.navbar.past-main .navbar-nav>li>a:hover{color:' . $nav_sbgah . ' !important;}'; }

    // LOGO DIMENSION
    $logo = ( ot_get_option( 'nt_advent_logo_dimension', array() ) );
    $logo_m = ( ot_get_option( 'nt_advent_margin_logo', array() ) );
    $logo_p = ( ot_get_option( 'nt_advent_padding_logo', array() ) );
    $logo_f = ( ot_get_option( 'nt_advent_logo_text_font_s' ) );
    $logo_c = ( ot_get_option( 'nt_advent_logo_clr' ) );
    $logo_a_c = ( ot_get_option( 'nt_advent_logo_after_clr' ) );


    // LOGO
    if(isset($logo['width']))    { $theCSS .= '.img-logo img{ width:' .  $logo['width'] .''. $logo['unit'] . ' !important; }'; }
    if(isset($logo['height']))   { $theCSS .= '.img-logo img{ height:' . $logo['height'] .''. $logo['unit'] . ' !important; }'; }

    if(isset($logo_m['top']))    { $theCSS .= '.img-logo img{ margin-top:' .  $logo_m['top'] .''. $logo_m['unit'] . ' !important; }'; }
    if(isset($logo_m['bottom'])) { $theCSS .= '.img-logo img{ margin-bottom:' . $logo_m['bottom'] .''. $logo_m['unit'] . ' !important; }'; }
    if(isset($logo_m['right']))  { $theCSS .= '.img-logo img{ margin-right:' . $logo_m['right'] .''. $logo_m['unit'] . ' !important; }'; }
    if(isset($logo_m['left']))   { $theCSS .= '.img-logo img{ margin-left:' . $logo_m['left'] .''. $logo_m['unit'] . ' !important; }'; }

    if(isset($logo_p['top']))    { $theCSS .= '.img-logo img{ padding-top:' .  $logo_p['top'] .''. $logo_p['unit'] . ' !important; }'; }
    if(isset($logo_p['bottom'])) { $theCSS .= '.img-logo img{ padding-bottom:' . $logo_p['bottom'] .''. $logo_p['unit'] . ' !important; }'; }
    if(isset($logo_p['right']))  { $theCSS .= '.img-logo img{ padding-right:' . $logo_p['right'] .''. $logo_p['unit'] . ' !important; }'; }
    if(isset($logo_p['left']))   { $theCSS .= '.img-logo img{ padding-left:' . $logo_p['left'] .''. $logo_p['unit'] . ' !important; }'; }


    if ( $logo_f !='' ) { $theCSS .= '.navbar-default a.navbar-brand.text-logo{font-size:' . $logo_f . 'px !important;}'; }
    if ( $logo_c !='' ) { $theCSS .= '.navbar-default a.navbar-brand.text-logo{color:' . $logo_c . ' !important;}'; }
    if ( $logo_a_c !='' ) { $theCSS .= '.navbar-default.past-main a.navbar-brand.text-logo{color:' . $logo_a_c . '! important;}'; }


    //variable for text logo custom style
    $nav_menu_ifs = ot_get_option( 'nt_advent_nav_menu_ifs' );
    $textlogo_fw = ot_get_option( 'nt_advent_textlogo_fw' );
    $textlogo_fstyle = ot_get_option( 'nt_advent_textlogo_fstyle' );
    $textlogo_ltsp = ot_get_option( 'nt_advent_textlogo_lettersp' );
    //static menu text logo
    $theCSS .= '.navbar-default a.navbar-brand.text-logo { ';
    if ( $textlogo_fw != '' ) { $theCSS .= 'font-weight:'.$textlogo_fw.';'; }
    if ( $textlogo_ltsp != '' ) { $theCSS .= 'letter-spacing:'.$textlogo_ltsp.'px;';}
    if ( $textlogo_fstyle != '' ) { $theCSS .= 'font-style:'.$textlogo_fstyle.';';}
    $theCSS .= '}';

    //sticky menu text logo
    $theCSS .= '.navbar-default.past-main a.navbar-brand.text-logo { ';
    if ( $textlogo_fw != '' ) { $theCSS .= 'font-weight:'.$textlogo_fw.';'; }
    if ( $textlogo_ltsp != '' ) { $theCSS .= 'letter-spacing:'.$textlogo_ltsp.'px;';}
    if ( $textlogo_fstyle != '' ) { $theCSS .= 'font-style:'.$textlogo_fstyle.';';}
    $theCSS .= '}';

    if ( $nav_menu_ifs !=0 ) {
        $theCSS .= '.navbar-default.past-main .navbar-nav > li > a{font-size:' . $nav_menu_ifs . 'px!important;}';
    }

    // SIDEBAR
    $sb_bg = esc_attr( ot_get_option( 'nt_advent_sidebarwidgetareabgcolor' ) );
    $sb_t_c = esc_attr( ot_get_option( 'nt_advent_sidebarwidgettitlecolor' ) );
    $sb_c = esc_attr( ot_get_option( 'nt_advent_sidebarwidgetthemecolor' ) );
    $sb_l_c = esc_attr( ot_get_option( 'nt_advent_sidebarlinkcolor' ) );
    $sb_l_c_h = esc_attr( ot_get_option( 'nt_advent_sidebarlinkhovercolor' ) );
    $sb_s_t = esc_attr( ot_get_option( 'nt_advent_sidebarsearchsubmittextcolor' ) );
    $sb_s_bg = esc_attr( ot_get_option( 'nt_advent_sidebarsearchsubmitbgcolor' ) );

    if ( $sb_bg !='' ) { $theCSS .= '#widget-area{background-color:' . $sb_bg . '!important;}'; }
    if ( $sb_t_c !='' ) { $theCSS .= '.widget-title{color:' . $sb_t_c . '!important;}'; }
    if ( $sb_c !='' ) { $theCSS .= '.widget ul{color:' . $sb_c . '!important;}'; }
    if ( $sb_l_c !='' ) { $theCSS .= '.widget ul li a{color:' . $sb_l_c . '!important;}'; }
    if ( $sb_l_c_h !='' ) { $theCSS .= '.widget ul li a:hover{color:' . $sb_l_c_h . '!important;}'; }
    if ( $sb_s_t !='' ) { $theCSS .= '#widget-area #searchform input#searchsubmit{color:' . $sb_s_t . '!important;}'; }
    if ( $sb_s_bg !='' ) { $theCSS .= '#widget-area #searchform input#searchsubmit{background-color:' . $sb_s_bg . '!important;}'; }

    // ALL PAGE OVERLAY MASK COLOR
    $blog_mask_v = esc_attr( ot_get_option( 'nt_advent_blog_mask_v' ) );
    $blog_mask_c = esc_attr( ot_get_option( 'nt_advent_blog_mask_c' ) );
    $single_mask_v = esc_attr( ot_get_option( 'nt_advent_single_mask_v' ) );
    $single_mask_c = esc_attr( ot_get_option( 'nt_advent_single_mask_c' ) );
    $archive_mask_v = esc_attr( ot_get_option( 'nt_advent_archive_mask_v' ) );
    $archive_mask_c = esc_attr( ot_get_option( 'nt_advent_archive_mask_c' ) );
    $error_mask_v = esc_attr( ot_get_option( 'nt_advent_error_mask_v' ) );
    $error_mask_c = esc_attr( ot_get_option( 'nt_advent_error_mask_c' ) );
    $search_mask_v = esc_attr( ot_get_option( 'nt_advent_search_mask_v' ) );
    $search_mask_c = esc_attr( ot_get_option( 'nt_advent_search_mask_c' ) );


    // BLOG HEADER
    $blog_h_bg = esc_attr( ot_get_option( 'nt_advent_blog_h_bg' ) );
    $blog_bg_c = esc_attr( ot_get_option( 'nt_advent_blog_h_bg_c' ) );
    $blog_h_h = esc_attr( ot_get_option( 'nt_advent_blog_h_h' ) );
    $blog_h_c = esc_attr( ot_get_option( 'nt_advent_blog_h_c' ) );
    $blog_sub_h_c = esc_attr( ot_get_option( 'nt_advent_blog_sub_h_c' ) );
    $blog_h_p = ( ot_get_option( 'nt_advent_blog_h_p', array() ) );

    if ( $blog_bg_c =='' ) {
        if ( $blog_h_bg !='' ) {
            $theCSS .= '.index-header {background: transparent url( ' . $blog_h_bg .')no-repeat fixed center top / cover!important; }';
        } else {
            $theCSS .= '.index-header{ background-image: url('. get_template_directory_uri() . '/images/full_1.jpg'.');}';
        }
    }
    if ( $blog_mask_v =='off' ) {
        $theCSS .= '.blog .index-header .template-overlay{display: none !important; }';
    }
    if (( $blog_mask_c !='' ) && ( $blog_mask_v !='off' )) {
        $theCSS .= '.blog .index-header .template-overlay{background: '.$blog_mask_c.';!important; }';
    }
    if ( $blog_bg_c !='' ) { $theCSS .= '.blog .index-header {background-color: ' . $blog_bg_c .'!important; }';  }
    if ( $blog_h_h !='' ) { $theCSS .= '.blog .index-header {height: ' . $blog_h_h .'vh !important;     min-height: 100%; }';  }
    if ( $blog_h_c !='' ) { $theCSS .= '.blog .index-header .template-cover-text .uppercase{color: ' . $blog_h_c .' !important; }';  }
    if ( $blog_sub_h_c !='' ) { $theCSS .= '.blog .index-header .template-cover-text .cover-text-sublead{color: ' . $blog_sub_h_c .' !important; }';  }

    if(isset($blog_h_p['top'])) { $theCSS .= '.blog .index-header { padding-top:' .  $blog_h_p['top'] .''. $blog_h_p['unit'] . ' !important; }'; }
    if(isset($blog_h_p['bottom'])) { $theCSS .= '.blog .index-header { padding-bottom:' . $blog_h_p['bottom'] .''. $blog_h_p['unit'] . ' !important; }'; }
    if(isset($blog_h_p['right'])) { $theCSS .= '.blog .index-header { padding-right:' . $blog_h_p['right'] .''. $blog_h_p['unit'] . ' !important; }'; }
    if(isset($blog_h_p['left'])) { $theCSS .= '.blog .index-header { padding-left:' . $blog_h_p['left'] .''. $blog_h_p['unit'] . ' !important; }'; }


    // PAGE.PHP AND FULLWIDTH-PAGE.PHP HEADER - CUSTOM PAGE METABOX OPTIONS
    $page_thumbnail = is_page() && has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(),'full' ) : '';
    $nt_advent_page_bg = wp_get_attachment_url( get_post_meta(get_the_ID(), 'nt_advent_page_bg_image', true ),'full' );
    $nt_advent_page_bg = $page_thumbnail ? $page_thumbnail : $nt_advent_page_bg;
    $nt_advent_page_bg_color = esc_attr( get_post_meta(get_the_ID(), 'nt_advent_page_bg_color', true ) );
    $nt_advent_page_text_color = esc_attr( get_post_meta(get_the_ID(), 'nt_advent_page_text_color', true ) );
    $nt_advent_header_p_top = esc_attr( get_post_meta(get_the_ID(), 'nt_advent_header_p_top', true ) );
    $nt_advent_header_p_bottom = esc_attr( get_post_meta(get_the_ID(), 'nt_advent_header_p_bottom', true ) );

    if ( $nt_advent_page_bg !='' ) {
        $theCSS .= '.page-id-' . get_the_ID().' .index-header {
            background-image: url(' . esc_url( $nt_advent_page_bg ) .') !important;
        }';
    }
    if ( $nt_advent_page_bg_color !='' && $nt_advent_page_bg =='' ) {
        $theCSS .= '.page-id-' . get_the_ID().' .index-header {
            background-image: none !important;
        }';
    }
    if ( $nt_advent_page_bg_color !='' ) {
        $theCSS .= '.page-id-' . get_the_ID().' .index-header {
            background-color: ' . $nt_advent_page_bg_color .' !important;
        }';
    }
    if ( $nt_advent_page_text_color !='' ) {
        $theCSS .= '.page-id-' . get_the_ID().' .index-header h2,
        .page-' . get_the_ID().' .index-header p {
            color: ' . $nt_advent_page_text_color .' !important;
        }';
    }
    if ( $nt_advent_header_p_top !='' ) {
        $theCSS .= '.page-id-' . get_the_ID().' .index-header {
            padding-bottom : ' . $nt_advent_header_p_top .'px !important;
        }';
    }
    if ( $nt_advent_header_p_bottom !='' ) {
        $theCSS .= '.page-id-' . get_the_ID().' .index-header {
            padding-top : ' . $nt_advent_header_p_bottom .'px !important;
        }';
    }


    // FOOTER OPTIONS
    $nt_advent_f_bg = esc_attr( ot_get_option( 'nt_advent_footerbgcolor' ) );
    $nt_advent_f_h_c = esc_attr( ot_get_option( 'nt_advent_footer_h_c' ) );
    $nt_advent_f_t_c = esc_attr( ot_get_option( 'nt_advent_footer_t_c' ) );
    $nt_advent_f_a_c = esc_attr( ot_get_option( 'nt_advent_footer_a_c' ) );

    if ( $nt_advent_f_bg  !='' ) { $theCSS .= '.footer{ background-color: '.  $nt_advent_f_bg .'; }'; }
    if ( $nt_advent_f_h_c !='' ) { $theCSS .= '.footer h3{ color: '.  $nt_advent_f_h_c .'; }'; }
    if ( $nt_advent_f_t_c !='' ) { $theCSS .= '.footer p{ color: '.  $nt_advent_f_t_c .'; }'; }
    if ( $nt_advent_f_a_c !='' ) { $theCSS .= '.footer a{ color: '.  $nt_advent_f_a_c .'; }'; }

    // SINGLE POST
    if  ( ot_get_option( 'nt_advent_singlepageheadbg' ) !='' ) {
        $theCSS .= '.single .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_advent_singlepageheadbg' ) ) .')no-repeat fixed center top / cover!important; }';
    }
    if ( $single_mask_v =='off' ) {
        $theCSS .= '.single .index-header .template-overlay{display: none !important; }';
    }
    if (( $single_mask_c !='' ) && ( $single_mask_v !='off' )) {
        $theCSS .= '.single .index-header .template-overlay{background: '.$single_mask_c.';!important; }';
    }
    if  ( ot_get_option( 'nt_advent_singleheaderbgcolor' ) !='' ) {
        $theCSS .= '.single .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_advent_singleheaderbgcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_singleheadingcolor' ) !='' ) {
        $theCSS .= '.single .index-header  h2{color: '.  esc_attr( ot_get_option( 'nt_advent_singleheadingcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_single_heading_fontsize' ) !='' ) {
        $theCSS .= '.single .index-header  h2{font-size: '.  esc_attr( ot_get_option( 'nt_advent_single_heading_fontsize' ) ) .'px; }';
    }
    if  ( ot_get_option( 'nt_advent_singleheaderbgheight' ) !='' ) {
        $theCSS .= '.single .index-header {height: '.  esc_attr( ot_get_option( 'nt_advent_singleheaderbgheight' ) ) .'vh !important; }';
    }
    if  (( ot_get_option( 'nt_advent_singleheaderpaddingtop' ) !='' ) || ( ot_get_option( 'nt_advent_singleheaderpaddingbottom' ) !='' )) {
        $theCSS .= '@media (min-width: 768px){
            .single .index-header  {
                padding-top: '.  esc_attr( ot_get_option( 'nt_advent_singleheaderpaddingtop' ) ) .'px !important;
                padding-bottom: '.  esc_attr( ot_get_option( 'nt_advent_singleheaderpaddingbottom' ) ) .'px !important;
            }
        }';
    }

    // ARCHIVE PAGES
    if  ( ot_get_option( 'nt_advent_archivepageheadbg' ) !='' ) {
        $theCSS .= '.archive .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_advent_archivepageheadbg' ) ) .')no-repeat fixed center top / cover!important; }';
    }
    if ( $archive_mask_v =='off' ) {
        $theCSS .= '.archive .index-header .template-overlay{display: none !important; }';
    }
    if (( $archive_mask_c !='' ) && ( $archive_mask_v !='off' )) {
        $theCSS .= '.archive .index-header .template-overlay{background: '.$archive_mask_c.';!important; }';
    }
    if  ( ot_get_option( 'nt_advent_archiveheaderbgcolor' ) !='' ) {
        $theCSS .= '.archive .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_advent_archiveheaderbgcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_archiveheadingcolor' ) !='' ) {
        $theCSS .= '.archive .index-header  h2{color: '.  esc_attr( ot_get_option( 'nt_advent_archiveheadingcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_archive_heading_fontsize' ) !='' ) {
        $theCSS .= '.archive .index-header  h2{font-size: '.  esc_attr( ot_get_option( 'nt_advent_archive_heading_fontsize' ) ) .'px; }';
    }
    if  ( ot_get_option( 'nt_advent_archiveheaderparagraphcolor' ) !='' ) {
        $theCSS .= '.archive .index-header  p{color: '.  esc_attr( ot_get_option( 'nt_advent_archiveheaderparagraphcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_archiveheaderbgheight' ) !='' ) {
        $theCSS .= '.archive .index-header {height: '.  esc_attr( ot_get_option( 'nt_advent_archiveheaderbgheight' ) ) .'vh !important; }';
    }
    if  (( ot_get_option( 'nt_advent_archiveheaderpaddingtop' ) !='' ) || ( ot_get_option( 'nt_advent_archiveheaderpaddingbottom' ) !='' )) {
        $theCSS .= '@media (min-width: 768px){
            .archive .index-header  {
                padding-top: '.  esc_attr( ot_get_option( 'nt_advent_archiveheaderpaddingtop' ) ) .'px !important;
                padding-bottom: '.  esc_attr( ot_get_option( 'nt_advent_archiveheaderpaddingbottom' ) ) .'px !important;
            }
        }';
    }

    // 404
    if  ( ot_get_option( 'nt_advent_errorpageheadbg' ) !='' ) {
        $theCSS .= '.error404 .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_advent_errorpageheadbg' ) ) .')no-repeat fixed center top / cover!important; }';
    }
    if ( $error_mask_v =='off' ) {
        $theCSS .= '.error404 .index-header .template-overlay{display: none !important; }';
    }
    if (( $error_mask_c !='' ) && ( $error_mask_v !='off' )) {
        $theCSS .= '.error404 .index-header .template-overlay{background: '.$error_mask_c.';!important; }';
    }
    if  ( ot_get_option( 'nt_advent_errorheaderbgcolor' ) !='' ) {
        $theCSS .= '.error404 .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_advent_errorheaderbgcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_errorheadingcolor' ) !='' ) {
        $theCSS .= '.error404 .index-header  h2{color: '.  esc_attr( ot_get_option( 'nt_advent_errorheadingcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_error_heading_fontsize' ) !='' ) {
        $theCSS .= '.error404 .index-header  h2{font-size: '.  esc_attr( ot_get_option( 'nt_advent_error_heading_fontsize' ) ) .'px; }';
    }
    if  ( ot_get_option( 'nt_advent_errorheaderparagraphcolor' ) !='' ) {
        $theCSS .= '.error404 .index-header  p{color: '.  esc_attr( ot_get_option( 'nt_advent_errorheaderparagraphcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_errorheaderbgheight' ) !='' ) {
        $theCSS .= '.error404 .index-header {height: '.  esc_attr( ot_get_option( 'nt_advent_errorheaderbgheight' ) ) .'vh !important; }';
    }
    if  (( ot_get_option( 'nt_advent_errorheaderpaddingtop' ) !='' ) || ( ot_get_option( 'nt_advent_errorheaderpaddingbottom' ) !='' )) {
        $theCSS .= '@media (min-width: 768px){
            .error404 .index-header  {
                padding-top: '.  esc_attr( ot_get_option( 'nt_advent_errorheaderpaddingtop' ) ) .'px !important;
                padding-bottom: '.  esc_attr( ot_get_option( 'nt_advent_errorheaderpaddingbottom' ) ) .'px !important;
            }
        }';
    }

    // SEARCH PAGE
    if  ( ot_get_option( 'nt_advent_searchpageheadbg' ) !='' ) {
        $theCSS .= '.search .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_advent_searchpageheadbg' ) ) .')no-repeat scroll center top / cover!important; }';
    }
    if ( $search_mask_v =='off' ) {
        $theCSS .= '.search .index-header .template-overlay{display: none !important; }';
    }
    if (( $search_mask_c !='' ) && ( $search_mask_v !='off' )) {
        $theCSS .= '.search .index-header .template-overlay{background: '.$search_mask_c.';!important; }';
    }
    if  ( ot_get_option( 'nt_advent_searchheaderbgcolor' ) !='' ) {
        $theCSS .= '.search .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_advent_searchheaderbgcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_searchheadingcolor' ) !='' ) {
        $theCSS .= '.search .index-header  h2{color: '.  esc_attr( ot_get_option( 'nt_advent_searchheadingcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_search_heading_fontsize' ) !='' ) {
        $theCSS .= '.search .index-header  h2{font-size: '.  esc_attr( ot_get_option( 'nt_advent_search_heading_fontsize' ) ) .'px; }';
    }
    if  ( ot_get_option( 'nt_advent_searchheaderparagraphcolor' ) !='' ) {
        $theCSS .= '.search .index-header  p{color: '.  esc_attr( ot_get_option( 'nt_advent_searchheaderparagraphcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_searchheaderbgheight' ) !='' ) {
        $theCSS .= '.search .index-header {height: '.  esc_attr( ot_get_option( 'nt_advent_searchheaderbgheight' ) ) .'vh !important; }';
    }
    if  (( ot_get_option( 'nt_advent_searchheaderpaddingtop' ) !='' ) || ( ot_get_option( 'nt_advent_searchheaderpaddingbottom' ) !='' )) {
        $theCSS .= '@media (min-width: 768px){
            .search .index-header  {
                padding-top: '.  esc_attr( ot_get_option( 'nt_advent_searchheaderpaddingtop' ) ) .'px !important;
                padding-bottom: '.  esc_attr( ot_get_option( 'nt_advent_searchheaderpaddingbottom' ) ) .'px !important;
            }
        }';
    }

    // BREADCRUBMS
    if  ( ot_get_option( 'nt_advent_blogbreadcrubmscolor' ) !='' ) {
        $theCSS .= '.breadcrubms, .breadcrubms span a span{ color: '.  esc_attr( ot_get_option( 'nt_advent_blogbreadcrubmscolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogbreadcrubmshovercolor' ) !='' ) {
        $theCSS .= '.breadcrubms span a span:hover{ color: '.  esc_attr( ot_get_option( 'nt_advent_blogbreadcrubmshovercolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogbreadcrubmscurrentcolor' ) !='' ) {
        $theCSS .= '.breadcrubms span {color: '.  esc_attr( ot_get_option( 'nt_advent_blogbreadcrubmscurrentcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_bread_f_s' ) !='' ) {
        $theCSS .= '.breadcrubms{ font-size: '.  esc_attr( ot_get_option( 'nt_advent_bread_f_s' ) ) .'px; }';
    }

    // POSTS
    if  ( ot_get_option( 'nt_advent_blogposttitlecolor' ) !='' ) {
        $theCSS .= '.entry-title a{color: '.  esc_attr( ot_get_option( 'nt_advent_blogposttitlecolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogposttitlhoverecolor' ) !='' ) {
        $theCSS .= '.entry-title a:hover{color: '.  esc_attr( ot_get_option( 'nt_advent_blogposttitlhoverecolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetacolor' ) !='' ) {
        $theCSS .= '.entry-meta li{color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetacolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetalinktextcolor' ) !='' ) {
        $theCSS .= '.entry-meta li a{color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinktextcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetalinkhovercolor' ) !='' ) {
        $theCSS .= '.entry-meta li a:hover{color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinkhovercolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetalinktextbgcolor' ) !='' ) {
        $theCSS .= '.entry-meta li a{background-color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinktextbgcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetalinktextbghovercolor' ) !='' ) {
        $theCSS .= '.entry-meta li a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinktextbghovercolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogpostparagraphcolor' ) !='' ) {
        $theCSS .= '.entry-content p{color: '.  esc_attr( ot_get_option( 'nt_advent_blogpostparagraphcolor' ) ) .'; }';
        $theCSS .= '.entry-content p{color:#000;}';
    }
    if  ( ot_get_option( 'nt_advent_blogpostbuttonbgcolor' ) !='' ) {
        $theCSS .= 'a.margin_30{background-color:'.  esc_attr( ot_get_option( 'nt_advent_blogpostbuttonbgcolor' ) ) .';}';
    }
    if  ( ot_get_option( 'nt_advent_blogpostbuttonbghovercolor' ) !='' ) {
        $theCSS .= 'a.margin_30:hover{background-color:'.  esc_attr( ot_get_option( 'nt_advent_blogpostbuttonbghovercolor' ) ) .';}';
    }
    if  ( ot_get_option( 'nt_advent_blogpostbuttontitlecolor' ) !='' ) {
        $theCSS .= 'a.margin_30{color:'.  esc_attr( ot_get_option( 'nt_advent_blogpostbuttontitlecolor' ) ) .';}';
    }
    if  ( ot_get_option( 'nt_advent_blogpostbuttontitlehovercolor' ) !='' ) {
        $theCSS .= 'a.margin_30:hover{color:'.  esc_attr( ot_get_option( 'nt_advent_blogpostbuttontitlehovercolor' ) ) .';}';
    }

    // share buttons
    if  ( ot_get_option( 'nt_advent_blogsharebgcolor' ) !='' ) {
        $theCSS .= '#share-buttons i{ background-color: '.  esc_attr( ot_get_option( 'nt_advent_blogsharebgcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogsharebghovercolor' ) !='' ) {
        $theCSS .= ' #share-buttons i:hover{ background-color: '.  esc_attr( ot_get_option( 'nt_advent_blogsharebghovercolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogsharecolor' ) !='' ) {
        $theCSS .= '#share-buttons i{ color: '.  esc_attr( ot_get_option( 'nt_advent_blogsharecolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogsharehovercolor' ) !='' ) {
        $theCSS .= '#share-buttons i:hover{ color: '.  esc_attr( ot_get_option( 'nt_advent_blogsharehovercolor' ) ) .'; }';
    }

    // comments
    if  ( ot_get_option( 'nt_advent_blogmetalinktextcolor' ) !='' ) {
        $theCSS .= 'p.logged-in-as a{color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinktextcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetalinkhovercolor' ) !='' ) {
        $theCSS .= 'p.logged-in-as a:hover{color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinkhovercolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetalinktextbgcolor' ) !='' ) {
        $theCSS .= 'p.logged-in-as a{background-color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinktextbgcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetalinktextbghovercolor' ) !='' ) {
        $theCSS .= 'p.logged-in-as a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinktextbghovercolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetalinktextcolor' ) !='' ) {
        $theCSS .= 'a.comment-edit-link,a.comment-reply-link{color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinktextcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetalinkhovercolor' ) !='' ) {
        $theCSS .= 'a.comment-edit-link:hover,a.comment-reply-link:hover{color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinkhovercolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetalinktextbgcolor' ) !='' ) {
        $theCSS .= 'a.comment-edit-link,a.comment-reply-link{background-color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinktextbgcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogmetalinktextbghovercolor' ) !='' ) {
        $theCSS .= 'a.comment-edit-link:hover,a.comment-reply-link:hover{background-color: '.  esc_attr( ot_get_option( 'nt_advent_blogmetalinktextbghovercolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogcommentformsubmitcolor' ) !='' ) {
        $theCSS .= '.comment-form .submit{color: '.  esc_attr( ot_get_option( 'nt_advent_blogcommentformsubmitcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogcommentformsubmithovercolor' ) !='' ) {
        $theCSS .= '.comment-form .submit:hover{color: '.  esc_attr( ot_get_option( 'nt_advent_blogcommentformsubmithovercolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogcommentformsubmitbgcolor' ) !='' ) {
        $theCSS .= '.comment-form .submit{background-color: '.  esc_attr( ot_get_option( 'nt_advent_blogcommentformsubmitbgcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_blogcommentformsubmitbghovercolor' ) !='' ) {
        $theCSS .= '.comment-form .submit:hover{background-color: '.  esc_attr( ot_get_option( 'nt_advent_blogcommentformsubmitbghovercolor' ) ) .'; }';
    }

    // pager
    if  ( ot_get_option( 'nt_advent_pagertitlecolor' ) !='' ) {
        $theCSS .= '.pager li a{color: '.  esc_attr( ot_get_option( 'nt_advent_pagertitlecolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_pagertitlehovercolor' ) !='' ) {
        $theCSS .= '.pager li a:hover{color: '.  esc_attr( ot_get_option( 'nt_advent_pagertitlehovercolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_pagerbgcolor' ) !='' ) {
        $theCSS .= '.pager li a{background-color: '.  esc_attr( ot_get_option( 'nt_advent_pagerbgcolor' ) ) .'; }';
    }
    if  ( ot_get_option( 'nt_advent_pagerbghovercolor' ) !='' ) {
        $theCSS .= '.pager li a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_advent_pagerbghovercolor' ) ) .'; }';
    }

    // CUSTOM PRELOADER CSS
    if  ( ot_get_option('nt_advent_preloadercss')  !='' ) {
        $theCSS .= ''.ot_get_option( 'nt_advent_preloadercss' ).'';
    }
    /* Add CSS to style.css */
    wp_add_inline_style( 'nt-advent-custom-style', $theCSS );
}

add_action( 'wp_enqueue_scripts', 'nt_advent_css_options' );
