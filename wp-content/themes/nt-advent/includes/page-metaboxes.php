<?php

add_filter( 'rwmb_meta_boxes', 'nt_advent_register_meta_boxes' );
function nt_advent_register_meta_boxes( $meta_boxes ) {
    $prefix = 'nt_advent_';

    /* ----------------------------------------------------- */
    // PRICE PLUGINS SETTINGS
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'id' => 'eventssettings',
        'title' => esc_html__('Price table', 'nt-advent'),
        'pages' => array( 'price' ),
        'context' => 'normal',
        'priority' => 'low',
        // List of meta fields
        'fields' => array(
            array(
                'name' => esc_html__('Select pack style', 'nt-advent'),
                'id' => $prefix . "packstyle",
                'type' => 'select',
                'options' => array(
                    'table-center' => esc_html__( 'Best Pack', 'nt-advent' ),
                    'normal' => esc_html__( 'Normal Pack', 'nt-advent' )
                ),
                'multiple' => false,
                'std' => 'normal'
            ),
            array(
                'name' => esc_html__('Select pricing icon type', 'nt-advent'),
                'id' => $prefix . "icon_type",
                'type' => 'select',
                'options' => array(
                    'iconimg' => esc_html__( 'Image icon', 'nt-advent' ),
                    'iconfont' => esc_html__( 'Font icon', 'nt-advent' )
                ),
                'multiple' => false,
                'std' => 'normal'
            ),
            array(
                'name' => esc_html__('Image icon', 'nt-advent'),
                'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'nt-advent'),
                'id' => $prefix . 'iconimg',
                'type' => 'image_advanced',
            ),
            array(
                'name' => esc_html__('Font icon', 'nt-advent'),
                'id' => $prefix . "iconfont",
                'desc' => esc_html__('Add your font icon class name here', 'nt-advent'),
                'clone' => false,
                'type' => 'text',
                'std' => 'Basic'
            ),
            array(
                'name' => esc_html__('Price pack name', 'nt-advent'),
                'id' => $prefix . "packname",
                'clone' => false,
                'type' => 'text',
                'std' => 'Basic'
            ),
            array(
                'name' => esc_html__('Price amount', 'nt-advent'),
                'id' => $prefix . "priceamount",
                'clone' => false,
                'type' => 'text',
                'std' => '$250'
            ),
            array(
                'name' => esc_html__('Price description', 'nt-advent'),
                'id' => $prefix . "pricedesc",
                'clone' => false,
                'type' => 'text',
                'std' => 'per month'
            ),
            array(
                'name' => esc_html__('Table Features List', 'nt-advent'),
                'desc' => esc_html__( 'Format: 140GB or any text', 'nt-advent' ),
                'id' => $prefix . 'features_list',
                'type' => 'text',
                'std' => '25 theme included',
                'class' => 'custom-class',
                'clone' => true,
                'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
            ),
            // responsive opt
            array(
                'type' => 'divider',
                'id' => 'fake_divider_7', // Not used, but needed
            ),
            array(
                'name' => esc_html__( 'Mobile column size', 'nt-advent' ),
                'id' => $prefix . "column_mobile",
                'type' => 'select',
                'multiple' => false,
                'std' => 'col-sm-6',
                'options' => array(
                    '' => esc_html__( 'Use Custom Column', 'nt-advent' ),
                    'col-sm-1' => esc_html__( 'col-sm-1', 'nt-advent' ),
                    'col-sm-2' => esc_html__( 'col-sm-2', 'nt-advent' ),
                    'col-sm-3' => esc_html__( 'col-sm-3', 'nt-advent' ),
                    'col-sm-4' => esc_html__( 'col-sm-4', 'nt-advent' ),
                    'col-sm-5' => esc_html__( 'col-sm-5', 'nt-advent' ),
                    'col-sm-6' => esc_html__( 'col-sm-6', 'nt-advent' ),
                    'col-sm-7' => esc_html__( 'col-sm-7', 'nt-advent' ),
                    'col-sm-8' => esc_html__( 'col-sm-8', 'nt-advent' ),
                    'col-sm-9' => esc_html__( 'col-sm-9', 'nt-advent' ),
                    'col-sm-10' => esc_html__( 'col-sm-10', 'nt-advent' ),
                    'col-sm-11' => esc_html__( 'col-sm-11', 'nt-advent' ),
                    'col-sm-12' => esc_html__( 'col-sm-12', 'nt-advent' ),
                )
            ),
            array(
                'name' => esc_html__( 'Desktop column size', 'nt-advent' ),
                'id' => $prefix . "column_desk",
                'type' => 'select',
                'multiple' => false,
                'std' => 'col-md-3',
                'options' => array(
                    '' => esc_html__( 'Use Custom Column', 'nt-advent' ),
                    'col-md-1' => esc_html__( 'col-md-1', 'nt-advent' ),
                    'col-md-2' => esc_html__( 'col-md-2', 'nt-advent' ),
                    'col-md-3' => esc_html__( 'col-md-3', 'nt-advent' ),
                    'col-md-4' => esc_html__( 'col-md-4', 'nt-advent' ),
                    'col-md-5' => esc_html__( 'col-md-5', 'nt-advent' ),
                    'col-md-6' => esc_html__( 'col-md-6', 'nt-advent' ),
                    'col-md-7' => esc_html__( 'col-md-7', 'nt-advent' ),
                    'col-md-8' => esc_html__( 'col-md-8', 'nt-advent' ),
                    'col-md-9' => esc_html__( 'col-md-9', 'nt-advent' ),
                    'col-md-10' => esc_html__( 'col-md-10', 'nt-advent' ),
                    'col-md-11' => esc_html__( 'col-md-11', 'nt-advent' ),
                    'col-md-12' => esc_html__( 'col-md-12', 'nt-advent' ),
                )
            ),
            array(
                'name' => esc_html__( 'Column offset size for desktop', 'nt-advent' ),
                'id' => $prefix . "column_offset",
                'type' => 'select',
                'multiple' => false,
                'std' => 'col-md-offset-0',
                'options' => array(
                    'col-md-offset-0' => esc_html__( 'offset-0', 'nt-advent' ),
                    'col-md-offset-1' => esc_html__( 'offset-1', 'nt-advent' ),
                    'col-md-offset-2' => esc_html__( 'offset-2', 'nt-advent' ),
                    'col-md-offset-3' => esc_html__( 'offset-3', 'nt-advent' ),
                    'col-md-offset-4' => esc_html__( 'offset-4', 'nt-advent' ),
                    'col-md-offset-5' => esc_html__( 'offset-5', 'nt-advent' ),
                    'col-md-offset-6' => esc_html__( 'offset-6', 'nt-advent' ),
                    'col-md-offset-7' => esc_html__( 'offset-7', 'nt-advent' ),
                    'col-md-offset-8' => esc_html__( 'offset-8', 'nt-advent' ),
                    'col-md-offset-9' => esc_html__( 'offset-9', 'nt-advent' ),
                    'col-md-offset-10' => esc_html__( 'offset-10', 'nt-advent' ),
                    'col-md-offset-11' => esc_html__( 'offset-11', 'nt-advent' ),
                    'col-md-offset-12' => esc_html__( 'offset-12', 'nt-advent' ),
                )
            ),
        )
    );

    /* ----------------------------------------------------- */
    // Frontpage Settings
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'id' => 'pagesettings',
        'title' => 'Page Settings',
        'pages' => array( 'page' ),
        'context' => 'normal',
        'priority' => 'default',
        'fields' => array(
            array(
                'type' => 'heading',
                'id' => 'page_design_section',
                'name' => 'Page Title Options',
            ),
            array(
                'name' => 'Disable Page Title',
                'id' => $prefix . "disable_title",
                'type' => 'checkbox',
                'std'  => 0,
            ),
            array(
                'name' => 'Alternate Page Title',
                'id' => $prefix . "alt_title",
                'clone' => false,
                'type' => 'text',
                'std' => ''
            ),
            array(
                'type' => 'divider',
                'id' => 'fake_divider_id',
            ),
            array(
                'type' => 'heading',
                'id' => 'page_design_section',
                'name' => 'Subtitle Options',
            ),
            array(
                'name' => 'Disable Page Subtitle',
                'id' => $prefix . "disable_subtitle",
                'type' => 'checkbox',
                'std'  => 0,
            ),
            array(
                'name' => esc_html__( 'Page Subtitle / Rich Text Editor', 'nt-advent' ),
                'id' => $prefix . "subtitle",
                'type' => 'wysiwyg',
                'raw'  => false,
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny' => true,
                    'media_buttons' => false,
                ),
            ),
            array(
                'type' => 'divider',
                'id' => 'fake_divider_id',
            ),
            array(
                'type' => 'heading',
                'id' => 'page_design_section',
                'name' => 'Design Options',
            ),
            // COLOR
            array(
                'name' => esc_html__( 'Page breadcrumb background color', 'nt-advent' ),
                'id' => $prefix . "pagebgcolor",
                'type' => 'color',
            ),
            array(
                'name' => esc_html__( 'Page breadcrumb text color', 'nt-advent' ),
                'id' => $prefix . "pagetextcolor",
                'type' => 'color',
            ),
            array(
                'name' => esc_html__( 'Page header padding top', 'nt-advent' ),
                'id' => $prefix . "headerptop",
                'type' => 'number',
                'min'  => 0,
                'step' => 1,
            ),
            array(
                'name' => esc_html__( 'Page header padding bottom', 'nt-advent' ),
                'id' => $prefix . "headerpbottom",
                'type' => 'number',
                'min'  => 0,
                'step' => 1,
            ),
            // SELECT BOX
            array(
                'name' => esc_html__( 'Page sidebar', 'nt-advent' ),
                'id' => $prefix . "pagelayout",
                'type' => 'select',
                'options'  => array(
                    'left-sidebar' => esc_html__( 'left', 'nt-advent' ),
                    'right-sidebar' => esc_html__( 'right', 'nt-advent' ),
                    'full-width' => esc_html__( 'full', 'nt-advent' ),
                ),
                'multiple' => false,
                'std' => 'right-sidebar',
                'placeholder' => esc_html__( 'Select an Item', 'nt-advent' ),
            ),
        )
    );

    $meta_boxes[] = array(
        'title' => esc_html__( 'Metabox menu', 'nt-advent' ),
        'pages' => array( 'page' ),
        'clone-group' => 'onepage-clone-group','clone-group' => 'onepage-clone-group',
        'id' => 'page_menu',
        'context' => 'side',
        'priority' => 'low',
        'fields' => array(
            array(
                'name' => esc_html__('Header menu type', 'nt-advent'),
                'desc' => esc_html__('Select header menu type', 'nt-advent'),
                'id' => $prefix . 'menutype',
                'type' => 'select',
                'options'  => array(
                    'm' => esc_html__( 'Metabox menu', 'nt-advent' ),
                    'p' => esc_html__( 'Default Primary menu', 'nt-advent' ),
                ),
                'std' => 'p'
            ),
            array(
                'name' => 'Menu item name',
                'desc' => 'Format: Any text',
                'id' => $prefix . 'section_name',
                'type' => 'text',
                'std' => 'Menu item name',
                'class' => 'custom-class',
                'clone' => true,
                'sort_clone' => true,
                'clone-group' => 'onepage-clone-group','clone-group' => 'onepage-clone-group',
            ),
            array(
                'name' => 'Menu item Url',
                'desc' => 'Format: #sectionname or http://yoururl.com',
                'id' => $prefix . 'section_url',
                'type' => 'text',
                'std' => '#sectionname',
                'class' => 'custom-class',
                'clone' => true,
                'sort_clone' => true,
                'clone-group' => 'onepage-clone-group',
            ),
        ),
    );

    $meta_boxes[] = array(
        'title' => esc_html__( 'Member Social Box', 'nt-advent' ),
        'pages' => array( 'team' ),
        'clone-group' => 'my-clone-group',
        'clone-group' => 'my-clone-group',
        'id' => 'mm_review',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => 'Team Job',
                'id' => $prefix . "team_job",
                'clone' => false,
                'type' => 'text',
                'std' => 'Developer'
            ),
            array(
                'name' => 'Select social icon font family',
                'id' => $prefix . "font_family",
                'type' => 'select',
                'multiple' => false,
                'std' => 'etline',
                'options' => array(
                    'select' => 'Select font-family',
                    'fontawesome' => 'Fontawesome',
                    'socicon' => 'Socicon',
                    'etline' => 'Et-line',
                )
            ),
            array(
                'name' => 'Select target type',
                'id' => $prefix . "social_target",
                'type' => 'select',
                'multiple' => false,
                'std' => '_blank',
                'options' => array(
                    '_blank' => '_blank',
                    '_self' => '_self',
                    '_parent' => '_parent',
                    '_top' => '_top',
                )
            ),
            array(
                'name'  => 'Social Icon Name',
                'desc'  => 'Format: facebook. Enter social icon name here',
                'id' => $prefix . 'social_icon',
                'type'  => 'text',
                'std' => 'facebook',
                'class' => 'custom-class',
                'clone' => true,
                'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
            ),
            array(
                'name'  => 'Social Url',
                'desc'  => 'Format: http://facebook.com',
                'id' => $prefix . 'social_url',
                'type'  => 'text',
                'std' => '#',
                'class' => 'custom-class',
                'clone' => true,
                'clone-group' => 'my-clone-group',
            ),
        ),
    );

    /*-----------------------------------------------------------------------------------*/
    /*  Metaboxes for blog posts
    /*-----------------------------------------------------------------------------------*/

    /* Gallery Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Gallery Settings', 'nt-advent'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('Select Images', 'nt-advent'),
                'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'nt-advent'),
                'id' => $prefix . 'gallery_image',
                'type' => 'image_advanced',
            )
        )
    );
    /* Quote Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Quote Settings', 'nt-advent'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('The Quote', 'nt-advent'),
                'desc' => esc_html__('Write your quote in this field.', 'nt-advent'),
                'id' => $prefix . 'quote_text',
                'type' => 'textarea',
                'rows' => 5
            ),
            array(
                'name' => esc_html__('The Author', 'nt-advent'),
                'desc' => esc_html__('Enter the name of the author of this quote.', 'nt-advent'),
                'id' => $prefix . 'quote_author',
                'type' => 'text'
            ),
            array(
                'name' => esc_html__('Background Color', 'nt-advent'),
                'desc' => esc_html__('Choose the background color for this quote.', 'nt-advent'),
                'id' => $prefix . 'quote_bg',
                'type' => 'color'
            ),
            array(
                'name' => esc_html__('Background Opacity', 'nt-advent'),
                'desc' => esc_html__('Choose the opacity of the background color.', 'nt-advent'),
                'id' => $prefix . 'quote_bg_opacity',
                'type' => 'text',
                'std' => 80
            )
        )
    );
    /* Audio Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Audio Settings', 'nt-advent'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'nt-advent' ),
                'id' => 'audio_head'
            ),
            array(
                'name' => esc_html__('MP3 File URL', 'nt-advent'),
                'desc' => esc_html__('The URL to the .mp3 audio file.', 'nt-advent'),
                'id' => $prefix . 'audio_mp3',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGA File URL', 'nt-advent'),
                'desc' => esc_html__('The URL to the .oga, .ogg audio file.', 'nt-advent'),
                'id' => $prefix . 'audio_ogg',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Divider', 'nt-advent'),
                'desc' => esc_html__('divider.', 'nt-advent'),
                'id' => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('SoundCloud', 'nt-advent'),
                'desc' => esc_html__('Enter the url of the soundcloud audio.', 'nt-advent'),
                'id' => $prefix . 'audio_sc',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Color', 'nt-advent'),
                'desc' => esc_html__('Choose the color.', 'nt-advent'),
                'id' => $prefix . 'audio_sc_color',
                'type' => 'color',
                'std'  => '#ff7700'
            )
        )
    );
    /* Video Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Video Settings', 'nt-advent'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'nt-advent' ),
                'id' => 'video_head'
            ),
            array(
                'name' => esc_html__('M4V File URL', 'nt-advent'),
                'desc' => esc_html__('The URL to the .m4v video file.', 'nt-advent'),
                'id' => $prefix . 'video_m4v',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGV File URL', 'nt-advent'),
                'desc' => esc_html__('The URL to the .ogv video file.', 'nt-advent'),
                'id' => $prefix . 'video_ogv',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('WEBM File URL', 'nt-advent'),
                'desc' => esc_html__('The URL to the .webm video file.', 'nt-advent'),
                'id' => $prefix . 'video_webm',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Embeded Code', 'nt-advent'),
                'desc' => esc_html__('Select the preview image for this video.', 'nt-advent'),
                'id' => $prefix . 'video_embed',
                'type' => 'textarea',
                'rows' => 8
            )
        )
    );

    /*-----------------------------------------------------------------------------------*/
    /*  Metaboxes for portfolio
    /*-----------------------------------------------------------------------------------*/

    /* Gallery Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Gallery Settings', 'nt-advent'),
        'pages' => array('portfolio'),
        'fields' => array(
            array(
                'name' => esc_html__('Select Images', 'nt-advent'),
                'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'nt-advent'),
                'id' => $prefix . 'gallery_image',
                'type' => 'image_advanced',
            )
        )
    );
    /* Audio Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Audio Settings', 'nt-advent'),
        'pages' => array('portfolio'),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'nt-advent' ),
                'id' => 'audio_head'
            ),
            array(
                'name' => esc_html__('MP3 File URL', 'nt-advent'),
                'desc' => esc_html__('The URL to the .mp3 audio file.', 'nt-advent'),
                'id' => $prefix . 'audio_mp3',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGA File URL', 'nt-advent'),
                'desc' => esc_html__('The URL to the .oga, .ogg audio file.', 'nt-advent'),
                'id' => $prefix . 'audio_ogg',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Divider', 'nt-advent'),
                'desc' => esc_html__('divider.', 'nt-advent'),
                'id' => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('SoundCloud', 'nt-advent'),
                'desc' => esc_html__('Enter the url of the soundcloud audio.', 'nt-advent'),
                'id' => $prefix . 'audio_sc',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Color', 'nt-advent'),
                'desc' => esc_html__('Choose the color.', 'nt-advent'),
                'id' => $prefix . 'audio_sc_color',
                'type' => 'color',
                'std'  => '#ff7700'
            )
        )
    );
    /* Video Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Video Settings', 'nt-advent'),
        'pages' => array('portfolio'),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'nt-advent' ),
                'id' => 'video_head'
            ),
            array(
                'name' => esc_html__('M4V File URL', 'nt-advent'),
                'desc' => esc_html__('The URL to the .m4v video file.', 'nt-advent'),
                'id' => $prefix . 'video_m4v',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGV File URL', 'nt-advent'),
                'desc' => esc_html__('The URL to the .ogv video file.', 'nt-advent'),
                'id' => $prefix . 'video_ogv',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('WEBM File URL', 'nt-advent'),
                'desc' => esc_html__('The URL to the .webm video file.', 'nt-advent'),
                'id' => $prefix . 'video_webm',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Embeded Code', 'nt-advent'),
                'desc' => esc_html__('Select the preview image for this video.', 'nt-advent'),
                'id' => $prefix . 'video_embed',
                'type' => 'textarea',
                'rows' => 8
            )
        )
    );
    //end
    return $meta_boxes;
}

?>
