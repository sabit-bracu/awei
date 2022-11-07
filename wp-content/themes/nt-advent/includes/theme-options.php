<?php
add_action( 'init', 'nt_advent_custom_theme_options' );
function nt_advent_custom_theme_options() {

    if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

    $nt_advent_saved_settings = get_option( ot_settings_id(), array() );
    $nt_advent_custom_settings = array(
        'contextual_help' => array(
            'sidebar' => ''
        ),
        'sections' => array(
            array(
                'id' => 'themecolor',
                'title' => esc_html__( 'Theme Color', 'nt-advent' )
            ),
            array(
                'id' => 'general',
                'title' => esc_html__( 'General', 'nt-advent' )
            ),
            array(
                'id' => 'logo',
                'title' => esc_html__( 'Logo', 'nt-advent' )
            ),
            array(
                'id' => 'pre',
                'title' => esc_html__( 'Preloader', 'nt-advent' )
            ),
            array(
                'id' => 'navigation',
                'title' => esc_html__( 'Navigation', 'nt-advent' )
            ),
            array(
                'id' => 'topbar',
                'title' => esc_html__( 'Header Topbar', 'nt-advent' )
            ),
            array(
                'id' => 'sidebars',
                'title' => esc_html__( 'Sidebars', 'nt-advent' )
            ),
            array(
                'id' => 'sidebars_settings',
                'title' => esc_html__( 'Sidebar Colors', 'nt-advent' )
            ),
            array(
                'id' => 'header',
                'title' => esc_html__( 'Blog', 'nt-advent' )
            ),
            array(
                'id' => 'header_color',
                'title' => esc_html__( 'Blog/Page Header Colors', 'nt-advent' )
            ),
            array(
                'id' => 'post_color',
                'title' => esc_html__( 'Blog Post Colors', 'nt-advent' )
            ),
            array(
                'id' => 'single_header',
                'title' => esc_html__( 'Single Page', 'nt-advent' )
            ),
            array(
                'id' => 'archive_page',
                'title' => esc_html__( 'Archive Page', 'nt-advent' )
            ),
            array(
                'id' => 'error_page',
                'title' => esc_html__( '404 Page', 'nt-advent' )
            ),
            array(
                'id' => 'search_page',
                'title' => esc_html__( 'Search Page', 'nt-advent' )
            ),
            array(
                'id' => 'breadcrubms',
                'title' => esc_html__( 'Breadcrubms', 'nt-advent' )
            ),
            array(
                'id' => 'footer',
                'title' => esc_html__( 'Footer', 'nt-advent' )
            )
        ), // sidebar end
        // options start
        'settings' => array(
            /*** GENERAL COLOR. **/
            array(
                'id' => 'nt_advent_theme_color_one',
                'label' => esc_html__( 'Theme general color 1', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'themecolor'
            ),
            array(
                'id' => 'nt_advent_theme_color_two',
                'label' => esc_html__( 'Theme general color 2', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'themecolor'
            ),
            /*** GENERAL SETTINGS. **/
            array(
                'id' => 'nt_advent_smooth',
                'label' => esc_html__( 'Smoothscroll', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Please select smoothscroll activity %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'general',
                'operator' => 'and'
            ),
            /**  LOGO OPTIONS  **/
            array(
                'id' => 'nt_advent_logo_type',
                'label' => esc_html__('Logo Type', 'nt-advent' ),
                'desc' => esc_html__('Choose logo type', 'nt-advent' ),
                'std' => 'text',
                'type' => 'select',
                'section' => 'logo',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'img',
                        'label' => esc_html__('Image Logo', 'nt-advent' ),
                    ),
                    array(
                        'value' => 'text',
                        'label' => esc_html__('Text Logo', 'nt-advent' ),
                    )
                )
            ),
            array(
                'id' => 'nt_advent_logo_img',
                'label' => esc_html__( 'Upload logo image', 'nt-advent' ),
                'desc' => esc_html__( 'Upload logo image', 'nt-advent' ),
                'type' => 'upload',
                'condition' => 'nt_advent_logo_type:is(img)',
                'section' => 'logo'
            ),
            array(
                'id' => 'nt_advent_sticky_img_logo',
                'label' => esc_html__( 'Upload sticky logo image', 'nt-advent' ),
                'desc' => esc_html__( 'Upload sticky logo image', 'nt-advent' ),
                'type' => 'upload',
                'condition' => 'nt_advent_logo_type:is(img)',
                'section' => 'logo'
            ),
            array(
                'id' => 'nt_advent_logo_dimension',
                'label' => esc_html__( 'Logo dimension', 'nt-advent' ),
                'desc' => esc_html__( 'Logo dimension', 'nt-advent' ),
                'type' => 'dimension',
                'condition' => 'nt_advent_logo_type:is(img)',
                'section' => 'logo',
            ),
            array(
                'id' => 'nt_advent_logo_text',
                'label' => esc_html__('Text logo', 'nt-advent' ),
                'desc' => esc_html__('Text logo', 'nt-advent' ),
                'std' => 'Advent',
                'type' => 'text',
                'condition' => 'nt_advent_logo_type:is(text)',
                'section' => 'logo'
            ),
            array(
                'id' => 'nt_advent_logo_clr',
                'label' => esc_html__( 'Text logo color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_logo_type:is(text)',
                'section' => 'logo'
            ),
            array(
                'id' => 'nt_advent_logo_after_clr',
                'label' => esc_html__( 'Text logo after scroll color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_logo_type:is(text)',
                'section' => 'logo'
            ),
            array(
                'id' => 'nt_advent_logo_text_font_s',
                'label' => esc_html__('Text logo font size', 'nt-advent' ),
                'desc' => esc_html__('You can set your text logo height', 'nt-advent' ),
                'std' => '21',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,1000',
                'condition' => 'nt_advent_logo_type:is(text)',
                'section' => 'logo',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_textlogo_fw',
                'label' => esc_html__('Font weight', 'nt-advent' ),
                'desc' => esc_html__('Font weight for text logo', 'nt-advent' ),
                'std' => '400',
                'type' => 'numeric-slider',
                'condition' => 'nt_advent_logo_type:is(text)',
                'min_max_step'=> '100,900,100',
                'section' => 'logo',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_textlogo_lettersp',
                'label' => esc_html__('Letter spacing', 'nt-advent' ),
                'desc' => esc_html__('Letter spacing for text logo', 'nt-advent' ),
                'std' => '0',
                'type' => 'numeric-slider',
                'condition' => 'nt_advent_logo_type:is(text)',
                'min_max_step'=> '0,10',
                'section' => 'logo',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_textlogo_fstyle',
                'label' => esc_html__('Font style', 'nt-advent' ),
                'desc' => esc_html__('Choose font style for text logo', 'nt-advent' ),
                'std' => 'normal',
                'type' => 'select',
                'section' => 'logo',
                'condition' => 'nt_advent_logo_type:is(text)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'normal',
                        'label' => esc_html__('Normal', 'nt-advent' ),
                    ),
                    array(
                        'value' => 'italic',
                        'label' => esc_html__('Italic', 'nt-advent' ),
                    )
                )
            ),
            array(
                'id' => 'nt_advent_padding_logo',
                'label' => esc_html__( 'Logo padding', 'nt-advent' ),
                'desc' => esc_html__( 'Logo padding', 'nt-advent' ),
                'type' => 'spacing',
                'section' => 'logo',
            ),
            array(
                'id' => 'nt_advent_margin_logo',
                'label' => esc_html__( 'Logo margin', 'nt-advent' ),
                'desc' => esc_html__( 'Logo margin', 'nt-advent' ),
                'type' => 'spacing',
                'section' => 'logo',
            ),
            //PRELOADER
            array(
                'id' => 'nt_advent_pre',
                'label' => esc_html__( 'Preloader', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Preloader visibility %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'pre',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_preloader',
                'label' => esc_html__( 'Preloader selection', 'nt-advent' ),
                'desc' => esc_html__( 'Select preloader type. Default or Custom preloader' , 'nt-advent' ),
                'std' => 'default',
                'type' => 'select',
                'section' => 'pre',
                'condition' => 'nt_advent_pre:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'default',
                        'label' => esc_html__( 'Default Preloader', 'nt-advent' )
                    ),
                    array(
                        'value' => 'custom',
                        'label' => esc_html__( 'Custom Preloader', 'nt-advent' )
                    )
                )
            ),
            //CUSTOM PRELOADER
            array(
                'id' => 'nt_advent_custom_preloader',
                'label' => esc_html__( 'Custom preloader html area', 'nt-advent' ),
                'desc' => esc_html__('Add your custom preloader html', 'nt-advent' ),
                'type' => 'textarea',
                'rows' => '15',
                'condition' => 'nt_advent_pre:is(on),nt_advent_preloader:is(custom)',
                'section' => 'pre',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_preloadercss',
                'label' => esc_html__( 'Custom preloader CSS', 'nt-advent' ),
                'desc' => esc_html__('You can add additional css for custom preloader', 'nt-advent' ),
                'type' => 'css',
                'condition' => 'nt_advent_pre:is(on),nt_advent_preloader:is(custom)',
                'section' => 'pre',
                'rows' => '20',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_custom_preloader_js',
                'label' => esc_html__( 'Use custom javascript ?', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'You can use custom javascript for your custom preloader class or ID name. %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'condition' => 'nt_advent_pre:is(on),nt_advent_preloader:is(custom)',
                'section' => 'pre',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_preloaderjs',
                'label' => esc_html__( 'Custom preloader JS', 'nt-advent' ),
                'desc' => esc_html__('You can add additional javascript function for your custom preloader', 'nt-advent' ),
                'type' => 'javascript',
                'condition' => 'nt_advent_pre:is(on),nt_advent_preloader:is(custom),nt_advent_custom_preloader_js:is(on)',
                'section' => 'pre',
                'rows' => '20',
                'operator' => 'and'
            ),
            /**  GOOGLE FONTS SETTINGS.  **/
            array(
                'id' => 'body_google_fonts',
                'label' => esc_html__( 'Google Fonts', 'nt-advent'  ),
                'desc' => 'Add Google Font and after the save settings follow these steps Dashbont_advent > Appearance > Theme Options > Typography',
                'type' => 'google-fonts',
                'section' => 'google_fonts',
                'operator' => 'and'
            ),
            /**  NAVIGATION SETTINGS.  **/
            array(
                'id' => 'header_topbar_template_type',
                'label' => esc_html__( 'Topbar Template Type', 'nt-advent' ),
                'std' => 'page',
                'type' => 'select',
                'section' => 'topbar',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'custom',
                        'label' => esc_html__( 'Shortcode or Custom HTML', 'nt-advent' )
                    ),
                    array(
                        'value' => 'page',
                        'label' => esc_html__( 'Page Content', 'nt-advent' )
                    ),
                )
            ),
            array(
                'id' => 'header_topbar_custom_template',
                'label' => esc_html__( 'Custom Page Content', 'nt-advent' ),
                'desc' => esc_html__( 'You can use your custom page instead of the default topbar template.', 'nt-advent' ),
                'type' => 'page-select',
                'section' => 'topbar',
                'condition' => 'header_topbar_template_type:is(page)',
                'operator' => 'and'
            ),
            array(
                'id' => 'header_topbar_custom_html',
                'label' => esc_html__( 'Custom HTML or Shortcode', 'nt-advent' ),
                'desc' => esc_html__( 'Copy paste your shortcode here.', 'nt-advent' ),
                'type' => 'textarea',
                'std' => '<div class="topbar">
    <div class="container container-custom">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="left-section">
                    <a href="#0" target="_blank"><i class="fa fa-phone"></i>  +123456789</a>
                    <a href="mailto:example@hotmail.com"><i class="fa fa-globe"></i> example@hotmail.com</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="socials">
                    <a href="#0" target="_blank" class="social-link"><i class="fa fa-facebook"></i></a>
                    <a href="#0" target="_blank" class="social-link"><i class="fa fa-twitter"></i></a>
                    <a href="#0" target="_blank" class="social-link"><i class="fa fa-vimeo"></i></a>
                    <a href="#0" target="_blank" class="social-link"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>',
                'section' => 'topbar',
                'condition' => 'header_topbar_template_type:is(custom)',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_nav_sticky',
                'label' => esc_html__( 'Sticky ( after scroll ) menu', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Please select sticky activity %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'navigation',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_nav_menu_ifs',
                'label' => esc_html__('Navigation item font size', 'nt-advent' ),
                'desc' => esc_html__('Navigation item font size', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section' => 'navigation',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_nav_bg',
                'label' => esc_html__( 'Theme navigation background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'navigation'
            ),
            array(
                'id' => 'nt_advent_nav_fixed_bg',
                'label' => esc_html__( 'Theme navigation after scroll background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'navigation'
            ),
            array(
                'id' => 'nt_advent_navitem',
                'label' => esc_html__( 'Theme navigation menu item color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'navigation'
            ),
            array(
                'id' => 'nt_advent_navitem_after_s',
                'label' => esc_html__( 'Theme navigation menu item after scroll color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'navigation'
            ),
            array(
                'id' => 'nt_advent_navitemhover',
                'label' => esc_html__( 'Theme navigation menu item hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'navigation'
            ),
            array(
                'id' => 'nt_advent_dropdown_bg',
                'label' => esc_html__( 'Theme navigation menu dropdown color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'navigation'
            ),
            array(
                'id' => 'nt_advent_dropdown_item',
                'label' => esc_html__( 'Theme navigation menu dropdown inner item color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'navigation'
            ),
            array(
                'id' => 'nt_advent_dropdown_itemhover',
                'label' => esc_html__( 'Theme navigation menu dropdown inner item hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'navigation'
            ),
            array(
                'id' => 'nt_advent_nav_sbg',
                'label' => esc_html__( 'Theme navigation sticky background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'navigation'
            ),
            array(
                'id' => 'nt_advent_nav_sbga',
                'label' => esc_html__( 'Theme navigation sticky item color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'navigation'
            ),
            array(
                'id' => 'nt_advent_nav_sbgah',
                'label' => esc_html__( 'Theme navigation sticky item hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'navigation'
            ),
            /**  SIDEBAR TYPE SETTINGS.  **/
            array(
                'id' => 'nt_advent_bloglayout',
                'label' => esc_html__( 'Blog Layout', 'nt-advent' ),
                'desc' => esc_html__( 'Choose blog page layout type', 'nt-advent' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_pagelayout',
                'label' => esc_html__( 'Default Page Layout', 'nt-advent' ),
                'desc' => esc_html__( 'Choose default page layout type', 'nt-advent' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_searchlayout',
                'label' => esc_html__( 'Search page Layout', 'nt-advent' ),
                'desc' => esc_html__( 'Choose search page layout type', 'nt-advent' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_postlayout',
                'label' => esc_html__( 'Blog single page layout', 'nt-advent' ),
                'desc' => esc_html__( 'Choose post page layout type', 'nt-advent' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_archivelayout',
                'label' => esc_html__( 'archive page layout', 'nt-advent' ),
                'desc' => esc_html__( 'Choose archive page layout type', 'nt-advent' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_404layout',
                'label' => esc_html__( '404 page layout', 'nt-advent' ),
                'desc' => esc_html__( 'Choose 404 page layout type', 'nt-advent' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'woosingle',
                'label' => esc_html__( 'Woocommerce single page layout', 'nt-advent' ),
                'desc' => esc_html__( 'Choose Woocommerce single page layout type', 'nt-advent' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'woopage',
                'label' => esc_html__( 'Woocommerce  page layout', 'nt-advent' ),
                'desc' => esc_html__( 'Choose 404 page layout type', 'nt-advent' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            /**  SIDEBAR SETTINGS.  **/
            array(
                'id' => 'nt_advent_sidebarwidgetareabgcolor',
                'label' => esc_html__('Theme Sidebar widget area background color', 'nt-advent' ),
                'desc' => esc_html__('Please select color', 'nt-advent' ),
                'type' => 'colorpicker-opacity',
                'section' => 'sidebars_settings',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_sidebarwidgetthemecolor',
                'label' => esc_html__( 'Theme Sidebar widget general color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'nt_advent_sidebarwidgettitlecolor',
                'label' => esc_html__( 'Theme Sidebar widget title color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'nt_advent_sidebarlinkcolor',
                'label' => esc_html__( 'Theme Sidebar link title color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'nt_advent_sidebarlinkhovercolor',
                'label' => esc_html__( 'Theme Sidebar link title hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'nt_advent_sidebarsearchsubmittextcolor',
                'label' => esc_html__( 'Theme Sidebar search submit text color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'nt_advent_sidebarsearchsubmitbgcolor',
                'label' => esc_html__( 'Theme Sidebar search submit background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),
            /**  POST SETTINGS.  **/
            array(
                'id' => 'nt_advent_blogposttitlecolor',
                'label' => esc_html__( 'Blog Post Title color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogposttitlhoverecolor',
                'label' => esc_html__( 'Blog Post Title hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogmetacolor',
                'label' => esc_html__( 'Blog Post Meta Title color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogmetalinktextcolor',
                'label' => esc_html__( 'Blog Post Meta Link Text color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogmetalinkhovercolor',
                'label' => esc_html__( 'Blog Post Meta Link Text hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogmetalinktextbgcolor',
                'label' => esc_html__( 'Blog Post Meta Link Text background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogmetalinktextbghovercolor',
                'label' => esc_html__( 'Blog Post Meta Link Text background hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogpostparagraphcolor',
                'label' => esc_html__( 'Blog Post Paragraph color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogpostbuttonbgcolor',
                'label' => esc_html__( 'Blog Post button background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogpostbuttonbghovercolor',
                'label' => esc_html__( 'Blog Post button background hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogpostbuttontitlecolor',
                'label' => esc_html__( 'Blog Post button title color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogpostbuttontitlehovercolor',
                'label' => esc_html__( 'Blog Post button title hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogsharebgcolor',
                'label' => esc_html__( 'Blog Post Share Icon background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogsharebghovercolor',
                'label' => esc_html__( 'Blog Post Share Icon background hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogsharecolor',
                'label' => esc_html__( 'Blog Post Share Icon color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogsharehovercolor',
                'label' => esc_html__( 'Blog Post Share Icon hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogcommentformsubmitcolor',
                'label' => esc_html__( 'Single post comment button title color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogcommentformsubmithovercolor',
                'label' => esc_html__( 'Single post comment button title hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogcommentformsubmitbgcolor',
                'label' => esc_html__( 'Single post comment button background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_blogcommentformsubmitbghovercolor',
                'label' => esc_html__( 'Single post comment button background hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_pagertitlecolor',
                'label' => esc_html__( 'Pager button title color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_pagertitlehovercolor',
                'label' => esc_html__( 'Pager button title hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_pagerbgcolor',
                'label' => esc_html__( 'Pager button background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            array(
                'id' => 'nt_advent_pagerbghovercolor',
                'label' => esc_html__( 'Pager button background hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'post_color'
            ),
            /**  BLOG/PAGE HEADER SETTINGS.  **/
            array(
                'id' => 'nt_advent_blog_mask_v',
                'label' => esc_html__( 'Blog header background overlay mask visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Blog header background overlay mask  %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'header',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_blog_mask_c',
                'label' => esc_html__( 'Blog header background overlay mask color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'nt_advent_blog_mask_v:is(on)',
                'section' => 'header'
            ),
            array(
                'id' => 'nt_advent_blog_h_bg',
                'label' =>  esc_html__( 'Blog pages header section background image', 'nt-advent' ),
                'desc' =>  esc_html__( 'You can upload your image for parallax header', 'nt-advent' ),
                'type' => 'upload',
                'section' => 'header',
            ),
            array(
                'id' => 'nt_advent_blog_h_h',
                'label' => esc_html__('Blog pages header height', 'nt-advent' ),
                'desc' => esc_html__('Blog pages header height', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'std' => '43',
                'section' => 'header',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_blog_h_p',
                'label' => esc_html__('Header padding top', 'nt-advent' ),
                'desc' => esc_html__('You can use this option for heading text vertical align', 'nt-advent' ),
                'type' => 'spacing',
                'section' => 'header',
                'operator' => 'and'
            ),
            /**  BLOG/PAGE HEADING COLOR SETTINGS.  **/
            array(
                'id' => 'nt_advent_blog_h_bg_c',
                'label' => esc_html__( 'Blog page header section background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker-opacity',
                'section' => 'header_color'
            ),
            array(
                'id' => 'nt_advent_blog_h_c',
                'label' => esc_html__( 'Blog Pages Heading color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'header_color'
            ),
            array(
                'id' => 'nt_advent_blog_sub_h_c',
                'label' => esc_html__( 'Blog Pages Subtitle color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'header_color'
            ),
            /**  SINGLE HEADER SETTINGS.  **/
            array(
                'id' => 'nt_advent_single_mask_v',
                'label' => esc_html__( 'Single header background overlay mask visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Single header background overlay mask  %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'single_header',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_single_mask_c',
                'label' => esc_html__( 'Single header background overlay mask color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'nt_advent_single_mask_v:is(on)',
                'section' => 'single_header'
            ),
            array(
                'id' => 'nt_advent_singlepageheadbg',
                'label' =>  esc_html__( 'Single Header Section background image', 'nt-advent' ),
                'desc' =>  esc_html__( 'You can upload your image for parallax header', 'nt-advent' ),
                'type' => 'upload',
                'section' => 'single_header',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_singleheaderbgcolor',
                'label' => esc_html__( 'Single Pages Header Section background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'single_header'
            ),
            array(
                'id' => 'nt_advent_singleheaderbgheight',
                'label' => esc_html__('Single Pages Header height', 'nt-advent' ),
                'desc' => esc_html__('Single Pages Header height', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section' => 'single_header',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_singleheaderpaddingtop',
                'label' => esc_html__('Header padding', 'nt-advent' ),
                'desc' => esc_html__('You can use this option for heading text vertical align', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,500',
                'section' => 'single_header',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_singleheaderpaddingbottom',
                'label' => esc_html__('Header padding bottom', 'nt-advent' ),
                'desc' => esc_html__('You can use this option for heading text vertical align', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,500',
                'section' => 'single_header',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_single_disable_heading',
                'label' => esc_html__( 'Single pages heading post title visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Please select single pages heading post title  visibility %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'single_header',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_singleheadingcolor',
                'label' => esc_html__( 'Single Pages Heading color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_single_disable_heading:is(on)',
                'section' => 'single_header'
            ),
            array(
                'id' => 'nt_advent_single_heading_fontsize',
                'label' => esc_html__('Single Heading font size', 'nt-advent' ),
                'desc' => esc_html__('Enter Single Heading font size', 'nt-advent' ),
                'type' => 'numeric-slider',
                'std' => '25',
                'min_max_step'=> '0,100',
                'condition' => 'nt_advent_single_disable_heading:is(on)',
                'section' => 'single_header',
                'operator' => 'and'
            ),
            /**  ARCHIVE HEADER SETTINGS.  **/
            array(
                'id' => 'nt_advent_archive_mask_v',
                'label' => esc_html__( 'Archive header background overlay mask visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Archive header background overlay mask  %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_archive_mask_c',
                'label' => esc_html__( 'Archive header background overlay mask color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'nt_advent_archive_mask_v:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'nt_advent_archivepageheadbg',
                'label' =>  esc_html__( 'Archive Header Section background image', 'nt-advent' ),
                'desc' =>  esc_html__( 'You can upload your image for parallax header', 'nt-advent' ),
                'type' => 'upload',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_archiveheaderbgcolor',
                'label' => esc_html__( 'Archive Pages Header Section background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'nt_advent_archiveheaderbgheight',
                'label' => esc_html__('Archive Pages Header height', 'nt-advent' ),
                'desc' => esc_html__('Archive Pages Header height', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_archiveheaderpaddingtop',
                'label' => esc_html__('Header padding top', 'nt-advent' ),
                'desc' => esc_html__('You can use this option for heading text vertical align', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,500',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_archiveheaderpaddingbottom',
                'label' => esc_html__('Header padding bottom', 'nt-advent' ),
                'desc' => esc_html__('You can use this option for heading text vertical align', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,500',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_archive_heading_visibility',
                'label' => esc_html__( 'Archive Heading visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Archive Heading visibility %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_archive_heading',
                'label' => esc_html__( 'Archive Heading', 'nt-advent' ),
                'desc' => esc_html__( 'Enter Archive Heading', 'nt-advent' ),
                'std' => 'Our Archive',
                'type' => 'text',
                'condition' => 'nt_advent_archive_heading_visibility:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'nt_advent_archive_heading_fontsize',
                'label' => esc_html__('Archive Heading font size', 'nt-advent' ),
                'desc' => esc_html__('Enter Archive Heading font size', 'nt-advent' ),
                'std' => '25',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'nt_advent_archive_heading_visibility:is(on)',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_archiveheadingcolor',
                'label' => esc_html__( 'Archive Pages Heading color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_archive_heading_visibility:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'nt_advent_archive_slogan_visibility',
                'label' => esc_html__( 'Archive Heading visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Archive slogan visibility %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_archive_slogan',
                'label' => esc_html__( 'Archive Slogan', 'nt-advent' ),
                'desc' => esc_html__( 'Enter Archive Slogan', 'nt-advent' ),
                'std' => 'Welcome to your Archive. This is your all post. Edit or delete them, then start writing!',
                'type' => 'text',
                'condition' => 'nt_advent_archive_slogan_visibility:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'nt_advent_archiveheaderparagraphcolor',
                'label' => esc_html__( 'Archive Pages paragraph/slogan color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_archive_slogan_visibility:is(on)',
                'section' => 'archive_page'
            ),
            /**  404 PAGE HEADER SETTINGS.  **/
            array(
                'id' => 'nt_advent_error_mask_v',
                'label' => esc_html__( '404 header background overlay mask visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( '404 header background overlay mask  %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_error_mask_c',
                'label' => esc_html__( '404 header background overlay mask color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'nt_advent_error_mask_v:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'nt_advent_errorpageheadbg',
                'label' =>  esc_html__( '404 Header Section background image', 'nt-advent' ),
                'desc' =>  esc_html__( 'You can upload your image for parallax header', 'nt-advent' ),
                'type' => 'upload',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_errorheaderbgcolor',
                'label' => esc_html__( '404 Pages Header Section background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'error_page'
            ),
            array(
                'id' => 'nt_advent_errorheaderbgheight',
                'label' => esc_html__('404 Pages Header height', 'nt-advent' ),
                'desc' => esc_html__('404 Pages Header height', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_errorheaderpaddingtop',
                'label' => esc_html__('Header padding top', 'nt-advent' ),
                'desc' => esc_html__('You can use this option for heading text vertical align', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,500',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_errorheaderpaddingbottom',
                'label' => esc_html__('Header padding bottom', 'nt-advent' ),
                'desc' => esc_html__('You can use this option for heading text vertical align', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,500',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_error_heading_visibility',
                'label' => esc_html__( '404 Page Heading visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'error Heading visibility %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_error_heading',
                'label' => esc_html__( '404 Page Heading', 'nt-advent' ),
                'desc' => esc_html__( 'Enter Error Heading', 'nt-advent' ),
                'std' => '404 Page',
                'type' => 'text',
                'condition' => 'nt_advent_error_heading_visibility:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'nt_advent_error_heading_fontsize',
                'label' => esc_html__('404 Page Heading font size', 'nt-advent' ),
                'desc' => esc_html__('Enter 404 Page Heading font size', 'nt-advent' ),
                'type' => 'numeric-slider',
                'std' => '25',
                'min_max_step'=> '0,100',
                'condition' => 'nt_advent_error_heading_visibility:is(on)',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_errorheadingcolor',
                'label' => esc_html__( '404 Pages Heading color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_error_heading_visibility:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'nt_advent_error_slogan_visibility',
                'label' => esc_html__( '404 Page slogan visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( '404 Page slogan visibility %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_error_slogan',
                'label' => esc_html__( '404 Page Slogan', 'nt-advent' ),
                'desc' => esc_html__( 'Enter 404 Page Slogan', 'nt-advent' ),
                'std' => 'Oops! That page can not be found.',
                'type' => 'text',
                'condition' => 'nt_advent_error_slogan_visibility:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'nt_advent_errorheaderparagraphcolor',
                'label' => esc_html__( '404 Pages paragraph/slogan color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_error_slogan_visibility:is(on)',
                'section' => 'error_page'
            ),
            /**  SEARCH PAGE HEADER SETTINGS.  **/
            array(
                'id' => 'nt_advent_search_mask_v',
                'label' => esc_html__( 'Search header background overlay mask visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Search header background overlay mask  %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_search_mask_c',
                'label' => esc_html__( 'Search header background overlay mask color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'nt_advent_search_mask_v:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'nt_advent_searchpageheadbg',
                'label' =>  esc_html__( 'Search Header Section background image', 'nt-advent' ),
                'desc' =>  esc_html__( 'You can upload your image for parallax header', 'nt-advent' ),
                'type' => 'upload',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_searchheaderbgcolor',
                'label' => esc_html__( 'Search Pages Header Section background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'search_page'
            ),
            array(
                'id' => 'nt_advent_searchheaderbgheight',
                'label' => esc_html__('Search Pages Header height', 'nt-advent' ),
                'desc' => esc_html__('Search Pages Header height', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_searchheaderpaddingtop',
                'label' => esc_html__('Header padding top', 'nt-advent' ),
                'desc' => esc_html__('You can use this option for heading text vertical align', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,500',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_searchheaderpaddingbottom',
                'label' => esc_html__('Header padding bottom', 'nt-advent' ),
                'desc' => esc_html__('You can use this option for heading text vertical align', 'nt-advent' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,500',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_search_heading_visibility',
                'label' => esc_html__( 'Search Page Heading visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'search Heading visibility %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_search_heading',
                'label' => esc_html__( 'Search Page Heading', 'nt-advent' ),
                'desc' => esc_html__( 'Enter Search Heading', 'nt-advent' ),
                'std' => 'Search Page',
                'type' => 'text',
                'condition' => 'nt_advent_search_heading_visibility:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'nt_advent_search_heading_fontsize',
                'label' => esc_html__('Search Page Heading font size', 'nt-advent' ),
                'desc' => esc_html__('Enter Search Page Heading font size', 'nt-advent' ),
                'type' => 'numeric-slider',
                'std' => '25',
                'min_max_step'=> '0,100',
                'condition' => 'nt_advent_search_heading_visibility:is(on)',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_searchheadingcolor',
                'label' => esc_html__( 'Search Pages Heading color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_search_heading_visibility:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'nt_advent_search_slogan_visibility',
                'label' => esc_html__( 'Search Page slogan visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Search Page slogan visibility %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_search_slogan',
                'label' => esc_html__( 'Search Page Slogan', 'nt-advent' ),
                'desc' => esc_html__( 'Enter Search Page Slogan', 'nt-advent' ),
                'std' => 'Search completed',
                'type' => 'text',
                'condition' => 'nt_advent_search_slogan_visibility:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'nt_advent_searchheaderparagraphcolor',
                'label' => esc_html__( 'Search Pages paragraph/slogan color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_search_slogan_visibility:is(on)',
                'section' => 'search_page'
            ),

            /**  BREADCRUBMS SETTINGS.  **/
            array(
                'id' => 'nt_advent_bread',
                'label' => esc_html__( 'Default and Fullwidth  Page breadcrubms visibility', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Breadcrubms visibility %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'breadcrubms',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_blogbreadcrubmscolor',
                'label' => esc_html__( 'Blog Pages Breadcrubms color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_bread:is(on)',
                'section' => 'breadcrubms'
            ),
            array(
                'id' => 'nt_advent_blogbreadcrubmshovercolor',
                'label' => esc_html__( 'Blog Pages Breadcrubms hover color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_bread:is(on)',
                'section' => 'breadcrubms'
            ),
            array(
                'id' => 'nt_advent_blogbreadcrubmscurrentcolor',
                'label' => esc_html__( 'Blog Pages Breadcrubms current page text color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'condition' => 'nt_advent_bread:is(on)',
                'section' => 'breadcrubms'
            ),
            array(
                'id' => 'nt_advent_bread_f_s',
                'label' => esc_html__('Breadcrubms font size', 'nt-advent' ),
                'desc' => esc_html__('Blog/Pages Header Breadcrubms font size', 'nt-advent' ),
                'type' => 'numeric-slider',
                'std' => '18',
                'min_max_step'=> '0,100',
                'condition' => 'nt_advent_bread:is(on)',
                'section' => 'breadcrubms',
                'operator' => 'and'
            ),
            /**  FOOTER SETTINGS.  **/
            array(
                'id' => 'nt_advent_footer_general',
                'label' => esc_html__( 'Footer General', 'nt-advent' ),
                'type' => 'tab',
                'section' => 'footer'
            ),
            array(
                'id' => 'nt_advent_footer_template_type',
                'label' => esc_html__( 'Footer Template Type', 'nt-advent' ),
                'std' => 'default',
                'type' => 'select',
                'section' => 'footer',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'default',
                        'label' => esc_html__( 'Default', 'nt-advent' )
                    ),
                    array(
                        'value' => 'page',
                        'label' => esc_html__( 'Page Content', 'nt-advent' )
                    ),
                    array(
                        'value' => 'custom',
                        'label' => esc_html__( 'Shortcode or Custom HTML', 'nt-advent' )
                    ),
                )
            ),
            array(
                'id' => 'nt_advent_footer_custom_template',
                'label' => esc_html__( 'Custom Page Content', 'nt-advent' ),
                'desc' => esc_html__( 'You can use your custom page instead of the default footer template.', 'nt-advent' ),
                'type' => 'page-select',
                'section' => 'footer',
                'condition' => 'nt_advent_footer_template_type:is(page)',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_footer_custom_html',
                'label' => esc_html__( 'Custom HTML or Shortcode', 'nt-advent' ),
                'desc' => esc_html__( 'Copy paste your shortcode here.', 'nt-advent' ),
                'type' => 'textarea',
                'section' => 'footer',
                'condition' => 'nt_advent_footer_template_type:is(custom)',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_widgetize',
                'label' => esc_html__( 'Footer top widgetize area section', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Choose footer widgetize section %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'footer',
                'condition' => 'nt_advent_footer_template_type:is(default)',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_footer_default_2',
                'label' => esc_html__( 'Footer default section', 'nt-advent' ),
                'desc' => sprintf( esc_html__( 'Choose footer powered section %s or %s.', 'nt-advent' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'footer',
                'condition' => 'nt_advent_footer_template_type:is(default)',
                'operator' => 'and'
            ),
            array(
                'id' => 'nt_advent_f_left',
                'label' => esc_html__( 'Footer default left column', 'nt-advent' ),
                'type' => 'textarea',
                'section' => 'footer',
                'condition' => 'nt_advent_footer_template_type:is(default)',
            ),
            array(
                'id' => 'nt_advent_f_right',
                'label' => esc_html__( 'Footer default right column', 'nt-advent' ),
                'type' => 'textarea',
                'section' => 'footer',
                'condition' => 'nt_advent_footer_template_type:is(default)',
            ),
            /**  FOOTER COLOR SETTINGS.  **/
            array(
                'id' => 'nt_advent_footer_color',
                'label' => esc_html__( 'Default Footer Color', 'nt-advent' ),
                'type' => 'tab',
                'section' => 'footer'
            ),
            array(
                'id' => 'nt_advent_footerbgcolor',
                'label' => esc_html__( 'Footer Background color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'footer',
                'condition' => 'nt_advent_footer_template_type:is(default)',
            ),
            array(
                'id' => 'nt_advent_footer_h_c',
                'label' => esc_html__( 'Footer widget heading color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'footer',
                'condition' => 'nt_advent_footer_template_type:is(default)',
            ),
            array(
                'id' => 'nt_advent_footer_t_c',
                'label' => esc_html__( 'Footer general text color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'footer',
                'condition' => 'nt_advent_footer_template_type:is(default)',
            ),
            array(
                'id' => 'nt_advent_footer_a_c',
                'label' => esc_html__( 'Footer general a(link/URL) color', 'nt-advent' ),
                'desc' => esc_html__( 'Please select color', 'nt-advent' ),
                'type' => 'colorpicker',
                'section' => 'footer',
                'condition' => 'nt_advent_footer_template_type:is(default)',
            ),
        ) // end array
    ); // end function

    /* allow settings to be filtered before saving */
    $nt_advent_custom_settings = apply_filters( ot_settings_id() . '_args', $nt_advent_custom_settings );

    /* settings are not the same update the DB */
    if ( $nt_advent_saved_settings !== $nt_advent_custom_settings ) {
        update_option( ot_settings_id(), $nt_advent_custom_settings );
    }

    /* Lets OptionTree know the UI Builder is being overridden */
    global $ot_has_custom_theme_options;
    $ot_has_custom_theme_options = true;

}
