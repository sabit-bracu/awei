<?php

/*-----------------------------------------------------------------------------------*/
/*	Shortcode Filter
/*-----------------------------------------------------------------------------------*/

vc_set_as_theme( $disable_updater = false );
vc_is_updater_disabled();

/*-----------------------------------------------------------------------------------*/
/*	HERO 1 PRODUCT advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_heroproduct_integrateWithVC' );
function NT_Advent_heroproduct_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Hero 1 Product", "nt-advent" ),
            "base" => "nt_advent_section_heroproduct",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Hero product image", "nt-advent"),
                    "param_name" => "heroleftimg",
                    "description" => esc_html__("Add your product left image", "nt-advent"),
                    'group' => esc_html__('Left Image', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation image', 'nt-advent' ),
                    'param_name' => 'imganimation',
                    'group' => esc_html__('Left Image', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),

                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'section_desc',
                    'description' => esc_html__("Add description for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent' ),
                    'param_name' => 'headingcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Description color', 'nt-advent' ),
                    'param_name' => 'desccolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button (Link)', 'nt-advent' ),
                    'param_name' => 'herobtnlink',
                    'description' => esc_html__('Add custom link.', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button style', 'nt-advent' ),
                    'param_name' => 'herobtn_type',
                    'description' => esc_html__('You can select button style', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Rectangle', 'nt-advent' ) => 'rectangle',
                        esc_html__('Rounded', 'nt-advent' ) => 'rounded',
                    ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation button', 'nt-advent' ),
                    'param_name' => 'btnanimation',
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Background image", "nt-advent"),
                    "param_name" => "bgimg",
                    "description" => esc_html__("Add your BG image", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Background color', 'nt-advent' ),
                    'param_name' => 'bgcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select parallax bg hide or show', 'nt-advent' ),
                    'param_name' => 'parallax',
                    'description' => esc_html__('You can select parallax bg hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select parallax effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select particles effect hide or show', 'nt-advent' ),
                    'param_name' => 'particle',
                    'description' => esc_html__('You can select particles effect hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select particles effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select overlay color hide or show', 'nt-advent' ),
                    'param_name' => 'overlay_display',
                    'description' => esc_html__('You can select overlay mask color hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select a style', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Overlay color', 'nt-advent' ),
                    'param_name' => 'overlaycolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'overlay_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Padding bottom ( without px or unit )', 'nt-advent' ),
                    'param_name' => 'paddingbot',
                    'description' => esc_html__("Add padding bottom(without px or unit. example : 100)", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_heroproduct extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HERO 2 BG-IMAGE advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_herobgimg_integrateWithVC' );
function NT_Advent_herobgimg_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Hero 2 BG-Image", "nt-advent" ),
            "base" => "nt_advent_section_herobgimg",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),

                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'section_desc',
                    'description' => esc_html__("Add description for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent' ),
                    'param_name' => 'headingcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Description color', 'nt-advent' ),
                    'param_name' => 'desccolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button (Link)', 'nt-advent' ),
                    'param_name' => 'herobtnlink',
                    'description' => esc_html__('Add custom link.', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button style', 'nt-advent' ),
                    'param_name' => 'herobtn_type',
                    'description' => esc_html__('You can select button style', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Rectangle', 'nt-advent' ) => 'rectangle',
                        esc_html__('Rounded', 'nt-advent' ) => 'rounded',
                    ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation button', 'nt-advent' ),
                    'param_name' => 'btnanimation',
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Background image", "nt-advent"),
                    "param_name" => "bgimg",
                    "description" => esc_html__("Add your BG image", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Background color', 'nt-advent' ),
                    'param_name' => 'bgcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select parallax bg hide or show', 'nt-advent' ),
                    'param_name' => 'parallax',
                    'description' => esc_html__('You can select parallax bg hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select parallax effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select particles effect hide or show', 'nt-advent' ),
                    'param_name' => 'particle',
                    'description' => esc_html__('You can select particles effect hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select particles effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select overlay color hide or show', 'nt-advent' ),
                    'param_name' => 'overlay_display',
                    'description' => esc_html__('You can select overlay mask color hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select a style', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Overlay color', 'nt-advent' ),
                    'param_name' => 'overlaycolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'overlay_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Padding bottom ( without px or unit )', 'nt-advent' ),
                    'param_name' => 'paddingbot',
                    'description' => esc_html__("Add padding bottom(without px or unit. example : 100)", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_herobgimg extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HERO 3 FORM advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_heroform_integrateWithVC' );
function NT_Advent_heroform_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Hero 3 Form", "nt-advent" ),
            "base" => "nt_advent_section_heroform",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),

                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent' ),
                    'param_name' => 'headingcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Description color', 'nt-advent' ),
                    'param_name' => 'desccolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'section_desc',
                    'description' => esc_html__("Add description for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button (Link)', 'nt-advent' ),
                    'param_name' => 'herobtnlink',
                    'description' => esc_html__('Add custom link.', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button style', 'nt-advent' ),
                    'param_name' => 'herobtn_type',
                    'description' => esc_html__('You can select button style', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Rectangle', 'nt-advent' ) => 'rectangle',
                        esc_html__('Rounded', 'nt-advent' ) => 'rounded',
                    ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation button', 'nt-advent' ),
                    'param_name' => 'btnanimation',
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Hero Contact Form heading', 'nt-advent' ),
                    'param_name' => 'form_heading',
                    'description' => esc_html__("Add contact form 7 heading/title", "nt-advent"),
                    'group' => esc_html__('Hero Form', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation form', 'nt-advent' ),
                    'param_name' => 'formanimation',
                    'group' => esc_html__('Hero Form', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__('Hero Contact Form', 'nt-advent' ),
                    'param_name' => 'content',
                    'description' => esc_html__("Add contact form 7 shortcode here", "nt-advent"),
                    'group' => esc_html__('Hero Form', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Background image", "nt-advent"),
                    "param_name" => "bgimg",
                    "description" => esc_html__("Add your BG image", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Background color', 'nt-advent' ),
                    'param_name' => 'bgcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select parallax bg hide or show', 'nt-advent' ),
                    'param_name' => 'parallax',
                    'description' => esc_html__('You can select parallax bg hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select parallax effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select particles effect hide or show', 'nt-advent' ),
                    'param_name' => 'particle',
                    'description' => esc_html__('You can select particles effect hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select particles effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select overlay color hide or show', 'nt-advent' ),
                    'param_name' => 'overlay_display',
                    'description' => esc_html__('You can select overlay mask color hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select a style', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Overlay color', 'nt-advent' ),
                    'param_name' => 'overlaycolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'overlay_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Padding bottom ( without px or unit )', 'nt-advent' ),
                    'param_name' => 'paddingbot',
                    'description' => esc_html__("Add padding bottom(without px or unit. example : 100)", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_heroform extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HERO 4 SUBSCRIBE advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_herosubscribe_integrateWithVC' );
function NT_Advent_herosubscribe_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Hero 4 Subscribe", "nt-advent" ),
            "base" => "nt_advent_section_herosubscribe",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Hero product image", "nt-advent"),
                    "param_name" => "heroleftimg",
                    "description" => esc_html__("Add your product left image", "nt-advent"),
                    'group' => esc_html__('Left Image', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation image', 'nt-advent' ),
                    'param_name' => 'imganimation',
                    'group' => esc_html__('Left Image', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'section_desc',
                    'description' => esc_html__("Add description for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent' ),
                    'param_name' => 'headingcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Description color', 'nt-advent' ),
                    'param_name' => 'desccolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation form', 'nt-advent' ),
                    'param_name' => 'formanimation',
                    'group' => esc_html__('Hero Form', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__('Hero Subscribe Form', 'nt-advent' ),
                    'param_name' => 'content',
                    'description' => esc_html__("Add contact form 7 shortcode here", "nt-advent"),
                    'group' => esc_html__('Hero Form', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Background image", "nt-advent"),
                    "param_name" => "bgimg",
                    "description" => esc_html__("Add your BG image", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Background color', 'nt-advent' ),
                    'param_name' => 'bgcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select parallax bg hide or show', 'nt-advent' ),
                    'param_name' => 'parallax',
                    'description' => esc_html__('You can select parallax bg hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select parallax effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select particles effect hide or show', 'nt-advent' ),
                    'param_name' => 'particle',
                    'description' => esc_html__('You can select particles effect hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select particles effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select overlay color hide or show', 'nt-advent' ),
                    'param_name' => 'overlay_display',
                    'description' => esc_html__('You can select overlay mask color hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select a style', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Overlay color', 'nt-advent' ),
                    'param_name' => 'overlaycolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'overlay_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Padding bottom ( without px or unit )', 'nt-advent' ),
                    'param_name' => 'paddingbot',
                    'description' => esc_html__("Add padding bottom(without px or unit. example : 100)", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_herosubscribe extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HERO 5 SOFTWARE advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_herosoftware_integrateWithVC' );
function NT_Advent_herosoftware_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Hero 5 Software", "nt-advent" ),
            "base" => "nt_advent_section_herosoftware",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'section_desc',
                    'description' => esc_html__("Add description for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent' ),
                    'param_name' => 'headingcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Description color', 'nt-advent' ),
                    'param_name' => 'desccolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button (Link)', 'nt-advent' ),
                    'param_name' => 'herobtnlink1',
                    'description' => esc_html__('Add custom link.', 'nt-advent' ),
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button style', 'nt-advent' ),
                    'param_name' => 'herobtn_type',
                    'description' => esc_html__('You can select button style', 'nt-advent' ),
                    'group' => esc_html__('Button', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Rectangle', 'nt-advent' ) => 'rectangle',
                        esc_html__('Rounded', 'nt-advent' ) => 'rounded',
                    ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation button', 'nt-advent' ),
                    'param_name' => 'btnanimation',
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Hero bottom image", "nt-advent"),
                    "param_name" => "herobottomimg",
                    "description" => esc_html__("Add your bottom image", "nt-advent"),
                    'group' => esc_html__('Bottom Image', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation image', 'nt-advent' ),
                    'param_name' => 'imganimation',
                    'group' => esc_html__('Bottom Image', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Background image", "nt-advent"),
                    "param_name" => "bgimg",
                    "description" => esc_html__("Add your BG image", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Background color', 'nt-advent' ),
                    'param_name' => 'bgcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select parallax bg hide or show', 'nt-advent' ),
                    'param_name' => 'parallax',
                    'description' => esc_html__('You can select parallax bg hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select parallax effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select particles effect hide or show', 'nt-advent' ),
                    'param_name' => 'particle',
                    'description' => esc_html__('You can select particles effect hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select particles effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select overlay color hide or show', 'nt-advent' ),
                    'param_name' => 'overlay_display',
                    'description' => esc_html__('You can select overlay mask color hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select a style', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Overlay color', 'nt-advent' ),
                    'param_name' => 'overlaycolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'overlay_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Padding bottom ( without px or unit )', 'nt-advent' ),
                    'param_name' => 'paddingbot',
                    'description' => esc_html__("Add padding bottom(without px or unit. example : 100)", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_herosoftware extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HERO 6 APP advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_heroapp_integrateWithVC' );
function NT_Advent_heroapp_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Hero 6 App", "nt-advent" ),
            "base" => "nt_advent_section_heroapp",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Hero top logo image", "nt-advent"),
                    "param_name" => "herologoimg",
                    "description" => esc_html__("Add your top logo image", "nt-advent"),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation logo image', 'nt-advent' ),
                    'param_name' => 'logoanimation',
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'section_desc',
                    'description' => esc_html__("Add description for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Star count', 'nt-advent' ),
                    'param_name' => 'starcount',
                    'description' => esc_html__("Add nubber for product rating", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent' ),
                    'param_name' => 'headingcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Description color', 'nt-advent' ),
                    'param_name' => 'desccolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Hero bottom image", "nt-advent"),
                    "param_name" => "herobottomimg",
                    "description" => esc_html__("Add your bottom image", "nt-advent"),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation bottom image', 'nt-advent' ),
                    'param_name' => 'imganimation',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button 1(Link)', 'nt-advent' ),
                    'param_name' => 'herobtnlink1',
                    'description' => esc_html__('Add custom link.', 'nt-advent' ),
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Appstore image", "nt-advent"),
                    "param_name" => "appstoreimg",
                    "description" => esc_html__("Add your custom button image", "nt-advent"),
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button 2(Link)', 'nt-advent' ),
                    'param_name' => 'herobtnlink2',
                    'description' => esc_html__('Add custom link.', 'nt-advent' ),
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Playstore image", "nt-advent"),
                    "param_name" => "playstoreimg",
                    "description" => esc_html__("Add your custom button image", "nt-advent"),
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation button', 'nt-advent' ),
                    'param_name' => 'btnanimation',
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Background image", "nt-advent"),
                    "param_name" => "bgimg",
                    "description" => esc_html__("Add your BG image", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Background color', 'nt-advent' ),
                    'param_name' => 'bgcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select parallax bg hide or show', 'nt-advent' ),
                    'param_name' => 'parallax',
                    'description' => esc_html__('You can select parallax bg hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select parallax effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select particles effect hide or show', 'nt-advent' ),
                    'param_name' => 'particle',
                    'description' => esc_html__('You can select particles effect hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select particles effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select overlay color hide or show', 'nt-advent' ),
                    'param_name' => 'overlay_display',
                    'description' => esc_html__('You can select overlay mask color hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select a style', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Overlay color', 'nt-advent' ),
                    'param_name' => 'overlaycolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'overlay_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Padding bottom ( without px or unit )', 'nt-advent' ),
                    'param_name' => 'paddingbot',
                    'description' => esc_html__("Add padding bottom(without px or unit. example : 100)", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_heroapp extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HERO 7 COMINGSOON advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_herocomingsoon_integrateWithVC' );
function NT_Advent_herocomingsoon_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Hero 7 Comingsoon", "nt-advent" ),
            "base" => "nt_advent_section_herocomingsoon",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation left section', 'nt-advent' ),
                    'param_name' => 'imganimation',
                    'group' => esc_html__('Left BG Image', 'nt-advent' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Left Background Image', 'nt-advent' ),
                    'param_name' => 'sectionbgcss',
                    'group' => esc_html__('Left BG Image', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Hero top logo image", "nt-advent"),
                    "param_name" => "herologoimg",
                    "description" => esc_html__("Add your top logo image", "nt-advent"),
                    'group' => esc_html__('Right Section', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation logo image', 'nt-advent' ),
                    'group' => esc_html__('Right Section', 'nt-advent' ),
                    'param_name' => 'logoanimation',
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                    'group' => esc_html__('Right Section', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'section_desc',
                    'description' => esc_html__("Add description for this section", "nt-advent"),
                    'group' => esc_html__('Right Section', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Star count', 'nt-advent' ),
                    'param_name' => 'starcount',
                    'description' => esc_html__("Add nubber for product rating", "nt-advent"),
                    'group' => esc_html__('Right Section', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                    'group' => esc_html__('Right Section', 'nt-advent' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button 1(Link)', 'nt-advent' ),
                    'param_name' => 'herobtnlink1',
                    'description' => esc_html__('Add custom link.', 'nt-advent' ),
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Appstore image", "nt-advent"),
                    "param_name" => "appstoreimg",
                    "description" => esc_html__("Add your custom button image", "nt-advent"),
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button 2(Link)', 'nt-advent' ),
                    'param_name' => 'herobtnlink2',
                    'description' => esc_html__('Add custom link.', 'nt-advent' ),
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Playstore image", "nt-advent"),
                    "param_name" => "playstoreimg",
                    "description" => esc_html__("Add your custom button image", "nt-advent"),
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation button', 'nt-advent' ),
                    'param_name' => 'btnanimation',
                    'group' => esc_html__('Button', 'nt-advent' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Right BG CSS', 'nt-advent' ),
                    'param_name' => 'right_sectionbg',
                    'group' => esc_html__('Right BG CSS', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_herocomingsoon extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	CLIENTS advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_clients_integrateWithVC' );
function NT_Advent_clients_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Clients Section", "nt-advent" ),
            "base" => "nt_advent_section_clients",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                //clients loop
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Client items', 'nt-advent' ),
                    'param_name' => 'clientloop',
                    'group' => esc_html__('Clients', 'nt-advent' ),
                    'params' => array(
                        array(
                            "type" => "attach_image",
                            "heading" => esc_html__("Client image", "nt-advent"),
                            "param_name" => "item_img",
                            "description" => esc_html__("Add your client image", "nt-advent"),
                        ),
                    )
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'nt-advent' ),
                    'param_name' => 'sectionbgcss',
                    'group' => esc_html__('Background options', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_clients extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	ABOUTONE  advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_aboutone_integrateWithVC' );
function NT_Advent_aboutone_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "About Section", "nt-advent" ),
            "base" => "nt_advent_section_aboutone",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Heading display ( hide or show )', 'nt-advent' ),
                    'param_name' => 'heading_display',
                    'description' => esc_html__('You can select hide or show section heading all text', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'heading_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'section_desc',
                    'description' => esc_html__("Add description for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'heading_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                    'dependency' => array(
                        'element' => 'heading_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Item column size', 'nt-advent' ),
                    'param_name' => 'item_column',
                    'description' => esc_html__('You can select detail item column size', 'nt-advent' ),
                    'group' => esc_html__('About Detail', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select column for all item', 'nt-advent' ) => '',
                        esc_html__('1 Column', 'nt-advent' ) => 'col-md-12',
                        esc_html__('2 Column', 'nt-advent' ) => 'col-md-6',
                        esc_html__('3 Column', 'nt-advent' ) => 'col-md-4',
                        esc_html__('4 Column', 'nt-advent' ) => 'col-md-3',
                        esc_html__('6 Column', 'nt-advent' ) => 'col-md-2',
                        esc_html__('Custom Column', 'nt-advent' ) => 'custom',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Desktop column', 'nt-advent' ),
                    'param_name' => 'desk_column',
                    'description' => esc_html__('You can select desktop column size', 'nt-advent' ),
                    'group' => esc_html__('About Detail', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select desktop column for all item', 'nt-advent' ) => '',
                        esc_html__('col-md-1', 'nt-advent' ) => 'col-md-1',
                        esc_html__('col-md-2', 'nt-advent' ) => 'col-md-2',
                        esc_html__('col-md-3', 'nt-advent' ) => 'col-md-3',
                        esc_html__('col-md-4', 'nt-advent' ) => 'col-md-4',
                        esc_html__('col-md-5', 'nt-advent' ) => 'col-md-5',
                        esc_html__('col-md-6', 'nt-advent' ) => 'col-md-6',
                        esc_html__('col-md-7', 'nt-advent' ) => 'col-md-7',
                        esc_html__('col-md-8', 'nt-advent' ) => 'col-md-8',
                        esc_html__('col-md-9', 'nt-advent' ) => 'col-md-9',
                        esc_html__('col-md-10', 'nt-advent' ) => 'col-md-10',
                        esc_html__('col-md-11', 'nt-advent' ) => 'col-md-11',
                        esc_html__('col-md-12', 'nt-advent' ) => 'col-md-12',
                    ),
                    'dependency' => array(
                        'element' => 'item_column',
                        'value' => 'custom'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Desktop column offset', 'nt-advent' ),
                    'param_name' => 'desk_column_offset',
                    'description' => esc_html__('You can select desktop column offset size', 'nt-advent' ),
                    'group' => esc_html__('About Detail', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select desktop column offset for all item', 'nt-advent' ) => '',
                        esc_html__('col-md-offset-1', 'nt-advent' ) => 'col-md-offset-1',
                        esc_html__('col-md-offset-2', 'nt-advent' ) => 'col-md-offset-2',
                        esc_html__('col-md-offset-3', 'nt-advent' ) => 'col-md-offset-3',
                        esc_html__('col-md-offset-4', 'nt-advent' ) => 'col-md-offset-4',
                        esc_html__('col-md-offset-5', 'nt-advent' ) => 'col-md-offset-5',
                        esc_html__('col-md-offset-6', 'nt-advent' ) => 'col-md-offset-6',
                        esc_html__('col-md-offset-7', 'nt-advent' ) => 'col-md-offset-7',
                        esc_html__('col-md-offset-8', 'nt-advent' ) => 'col-md-offset-8',
                        esc_html__('col-md-offset-9', 'nt-advent' ) => 'col-md-offset-9',
                        esc_html__('col-md-offset-10', 'nt-advent' ) => 'col-md-offset-10',
                        esc_html__('col-md-offset-11', 'nt-advent' ) => 'col-md-offset-11',
                        esc_html__('col-md-offset-12', 'nt-advent' ) => 'col-md-offset-12',
                    ),
                    'dependency' => array(
                        'element' => 'item_column',
                        'value' => 'custom'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Mobile column', 'nt-advent' ),
                    'param_name' => 'mob_column',
                    'description' => esc_html__('You can select mobile device column size', 'nt-advent' ),
                    'group' => esc_html__('About Detail', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select mobile column for all item', 'nt-advent' ) => '',
                        esc_html__('col-sm-1', 'nt-advent' ) => 'col-sm-1',
                        esc_html__('col-sm-2', 'nt-advent' ) => 'col-sm-2',
                        esc_html__('col-sm-3', 'nt-advent' ) => 'col-sm-3',
                        esc_html__('col-sm-4', 'nt-advent' ) => 'col-sm-4',
                        esc_html__('col-sm-5', 'nt-advent' ) => 'col-sm-5',
                        esc_html__('col-sm-6', 'nt-advent' ) => 'col-sm-6',
                        esc_html__('col-sm-7', 'nt-advent' ) => 'col-sm-7',
                        esc_html__('col-sm-8', 'nt-advent' ) => 'col-sm-8',
                        esc_html__('col-sm-9', 'nt-advent' ) => 'col-sm-9',
                        esc_html__('col-sm-10', 'nt-advent' ) => 'col-sm-10',
                        esc_html__('col-sm-11', 'nt-advent' ) => 'col-sm-11',
                        esc_html__('col-sm-12', 'nt-advent' ) => 'col-sm-12',
                    ),
                    'dependency' => array(
                        'element' => 'item_column',
                        'value' => 'custom'
                    )
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation item', 'nt-advent' ),
                    'group' => esc_html__('About Detail', 'nt-advent' ),
                    'param_name' => 'itemanimation',
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Detail item', 'nt-advent' ),
                    'param_name' => 'aboutloop',
                    'group' => esc_html__('About Detail', 'nt-advent' ),
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Icon type', 'nt-advent' ),
                            'param_name' => 'istype',
                            'description' => esc_html__('You can select icon type', 'nt-advent' ),
                            'value' => array(
                                esc_html__('Select type', 'nt-advent' ) => 'nul',
                                esc_html__('Icon List', 'nt-advent' ) => 'iconlist',
                                esc_html__('Icon Custom', 'nt-advent' ) => 'iconcustom',
                            ),
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Icon name", "nt-advent"),
                            "param_name" => "icon_name",
                            "description" => sprintf('%s <a href="%s" target="_blank">Get Ionicon</a>',
                            esc_html__("Add icon name(fonticon class name). example : ion-android-notifications", "nt-advent"),
                            esc_url("https://ionicons.com/v2/cheatsheet.html") ),
                            'dependency' => array(
                                'element' => 'istype',
                                'value' => array('iconcustom','nul'),
                            )
                        ),
                        array(
                            'type' => 'iconpicker',
                            'heading' => esc_html__('Font icon', 'nt-advent'),
                            'param_name' => 'icon_two',
                            'description' => esc_html__('Please select font icon', 'nt-advent'),
                            'dependency' => array(
                                'element' => 'istype',
                                'value' => 'iconlist'
                            )
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Title", "nt-advent"),
                            "param_name" => "item_title",
                            "description" => esc_html__("Add title for item.", "nt-advent"),
                        ),
                        array(
                            "type" => "textarea",
                            "heading" => esc_html__("Detail", "nt-advent"),
                            "param_name" => "item_desc",
                            "description" => esc_html__("Add detail for item.", "nt-advent"),
                        ),
                    )
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'nt-advent' ),
                    'param_name' => 'sectionbgcss',
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Heading font-size', 'nt-advent'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change heading fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Heading line-height', 'nt-advent'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change heading line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change heading color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //desc
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Description font-size', 'nt-advent'),
                    'param_name' => 'dsize',
                    'description' => esc_html__('Change description fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Description line-height', 'nt-advent'),
                    'param_name' => 'dlineh',
                    'description' => esc_html__('Change description line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Description color', 'nt-advent'),
                    'param_name' => 'dcolor',
                    'description' => esc_html__('Change description color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //desc
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon font-size', 'nt-advent'),
                    'param_name' => 'isize',
                    'description' => esc_html__('Change icon fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon background color', 'nt-advent'),
                    'param_name' => 'ibg',
                    'description' => esc_html__('Change icon background color number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon color', 'nt-advent'),
                    'param_name' => 'icolor',
                    'description' => esc_html__('Change icon color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon Heading font-size', 'nt-advent'),
                    'param_name' => 'itsize',
                    'description' => esc_html__('Change icon heading fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon Heading line-height', 'nt-advent'),
                    'param_name' => 'itlineh',
                    'description' => esc_html__('Change icon heading line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon Heading color', 'nt-advent'),
                    'param_name' => 'itcolor',
                    'description' => esc_html__('Change icon heading color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //desc
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon Description font-size', 'nt-advent'),
                    'param_name' => 'idsize',
                    'description' => esc_html__('Change icon description fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon Description line-height', 'nt-advent'),
                    'param_name' => 'idlineh',
                    'description' => esc_html__('Change icon description line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon Description color', 'nt-advent'),
                    'param_name' => 'idcolor',
                    'description' => esc_html__('Change icon description color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_aboutone extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	FEATURES  advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_features_integrateWithVC' );
function NT_Advent_features_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Features Section", "nt-advent" ),
            "base" => "nt_advent_section_features",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                //Section heading
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Heading display ( hide or show )', 'nt-advent' ),
                    'param_name' => 'heading_display',
                    'description' => esc_html__('You can select hide or show section heading all text', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'heading_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'section_desc',
                    'description' => esc_html__("Add description for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'heading_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'heading_display',
                        'value' => 'show'
                    )
                ),

                //features left column
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation left item', 'nt-advent' ),
                    'param_name' => 'l_itemanimation',
                    'group' => esc_html__('Features Left', 'nt-advent' ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Features left item', 'nt-advent' ),
                    'param_name' => 'featuresleftloop',
                    'group' => esc_html__('Features Left', 'nt-advent' ),
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Icon type', 'nt-advent' ),
                            'param_name' => 'istype',
                            'description' => esc_html__('You can select icon type', 'nt-advent' ),
                            'value' => array(
                                esc_html__('Select type', 'nt-advent' ) => 'nul',
                                esc_html__('Icon List', 'nt-advent' ) => 'iconlist',
                                esc_html__('Icon Custom', 'nt-advent' ) => 'iconcustom',
                                esc_html__('Image', 'nt-advent' ) => 'iconimg',
                            ),
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Icon name", "nt-advent"),
                            "param_name" => "l_icon_name",
                            "description" => sprintf('%s <a href="%s" target="_blank">Get Ionicon</a>',
                            esc_html__("Add icon name(fonticon class name). example : ion-android-notifications", "nt-advent"),
                            esc_url("https://ionicons.com/v2/cheatsheet.html") ),
                            'dependency' => array(
                                'element' => 'istype',
                                'value' => array('iconcustom','nul'),
                            )
                        ),
                        array(
                            'type' => 'iconpicker',
                            'heading' => esc_html__('Font icon', 'nt-advent'),
                            'param_name' => 'icon_two',
                            'description' => esc_html__('Please select font icon', 'nt-advent'),
                            'dependency' => array(
                                'element' => 'istype',
                                'value' => 'iconlist'
                            )
                        ),
                        array(
                            "type" => "attach_image",
                            "heading" => esc_html__("Center image", "nt-advent"),
                            "param_name" => "l_icon_image",
                            "description" => esc_html__("Add your center image", "nt-advent"),
                            'dependency' => array(
                                'element' => 'istype',
                                'value' => 'iconimg'
                            )
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Title", "nt-advent"),
                            "param_name" => "l_item_title",
                            "description" => esc_html__("Add title for item.", "nt-advent"),
                        ),
                        array(
                            "type" => "textarea",
                            "heading" => esc_html__("Detail", "nt-advent"),
                            "param_name" => "l_item_desc",
                            "description" => esc_html__("Add detail for item.", "nt-advent"),
                        ),
                    )
                ), // param_group
                //Center image
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Center image", "nt-advent"),
                    "param_name" => "device_image",
                    "description" => esc_html__("Add your center image", "nt-advent"),
                    'group' => esc_html__('Center Image', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation image', 'nt-advent' ),
                    'param_name' => 'imganimation',
                    'group' => esc_html__('Center Image', 'nt-advent' ),
                ),
                //features right column
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation right item', 'nt-advent' ),
                    'param_name' => 'r_itemanimation',
                    'group' => esc_html__('Features Right', 'nt-advent' ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Features right item', 'nt-advent' ),
                    'param_name' => 'featuresrightloop',
                    'group' => esc_html__('Features Right', 'nt-advent' ),
                    'params' => array(

                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Icon type', 'nt-advent' ),
                            'param_name' => 'r_istype',
                            'description' => esc_html__('You can select icon type', 'nt-advent' ),
                            'value' => array(
                                esc_html__('Select type', 'nt-advent' ) => 'nul',
                                esc_html__('Icon List', 'nt-advent' ) => 'iconlist',
                                esc_html__('Icon Custom', 'nt-advent' ) => 'iconcustom',
                                esc_html__('Image', 'nt-advent' ) => 'iconimg',
                            ),
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Icon name", "nt-advent"),
                            "param_name" => "r_icon_name",
                            "description" => sprintf('%s <a href="%s" target="_blank">Get Ionicon</a>',
                            esc_html__("Add icon name(fonticon class name). example : ion-android-notifications", "nt-advent"),
                            esc_url("https://ionicons.com/v2/cheatsheet.html") ),
                            'dependency' => array(
                                'element' => 'r_istype',
                                'value' => array('iconcustom','nul'),
                            )
                        ),
                        array(
                            'type' => 'iconpicker',
                            'heading' => esc_html__('Font icon', 'nt-advent'),
                            'param_name' => 'r_icon_two',
                            'description' => esc_html__('Please select font icon', 'nt-advent'),
                            'dependency' => array(
                                'element' => 'r_istype',
                                'value' => 'iconlist'
                            )
                        ),
                        array(
                            "type" => "attach_image",
                            "heading" => esc_html__("Center image", "nt-advent"),
                            "param_name" => "r_icon_image",
                            "description" => esc_html__("Add your center image", "nt-advent"),
                            'dependency' => array(
                                'element' => 'r_istype',
                                'value' => 'iconimg'
                            )
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Title", "nt-advent"),
                            "param_name" => "r_item_title",
                            "description" => esc_html__("Add title for item.", "nt-advent"),
                        ),
                        array(
                            "type" => "textarea",
                            "heading" => esc_html__("Detail", "nt-advent"),
                            "param_name" => "r_item_desc",
                            "description" => esc_html__("Add detail for item.", "nt-advent"),
                        ),
                    )
                ),
                //Background CSS
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'nt-advent' ),
                    'param_name' => 'sectionbgcss',
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Heading font-size', 'nt-advent'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change heading fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Heading line-height', 'nt-advent'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change heading line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change heading color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //desc
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Description font-size', 'nt-advent'),
                    'param_name' => 'dsize',
                    'description' => esc_html__('Change description fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Description line-height', 'nt-advent'),
                    'param_name' => 'dlineh',
                    'description' => esc_html__('Change description line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Description color', 'nt-advent'),
                    'param_name' => 'dcolor',
                    'description' => esc_html__('Change description color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //desc
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon font-size', 'nt-advent'),
                    'param_name' => 'isize',
                    'description' => esc_html__('Change icon fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon background color', 'nt-advent'),
                    'param_name' => 'ibg',
                    'description' => esc_html__('Change icon background color number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon color', 'nt-advent'),
                    'param_name' => 'icolor',
                    'description' => esc_html__('Change icon color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon Heading font-size', 'nt-advent'),
                    'param_name' => 'itsize',
                    'description' => esc_html__('Change icon heading fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon Heading line-height', 'nt-advent'),
                    'param_name' => 'itlineh',
                    'description' => esc_html__('Change icon heading line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon Heading color', 'nt-advent'),
                    'param_name' => 'itcolor',
                    'description' => esc_html__('Change icon heading color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //desc
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon Description font-size', 'nt-advent'),
                    'param_name' => 'idsize',
                    'description' => esc_html__('Change icon description fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon Description line-height', 'nt-advent'),
                    'param_name' => 'idlineh',
                    'description' => esc_html__('Change icon description line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon Description color', 'nt-advent'),
                    'param_name' => 'idcolor',
                    'description' => esc_html__('Change icon description color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_features extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	FEATURES TWO advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_featurestwo_integrateWithVC' );
function NT_Advent_featurestwo_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Features List Section", "nt-advent" ),
            "base" => "nt_advent_section_featurestwo",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Column style', 'nt-advent' ),
                    'param_name' => 'listsection',
                    'description' => esc_html__('You can select column style', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Split Column', 'nt-advent' ) => 'split',
                        esc_html__('Normal Column', 'nt-advent' ) => 'normal',
                    ),
                ),
                //Left image
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Left image", "nt-advent"),
                    "param_name" => "leftimage",
                    "description" => esc_html__("Add your left image", "nt-advent"),
                    'group' => esc_html__('Left image', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation image', 'nt-advent' ),
                    'param_name' => 'imganimation',
                    'group' => esc_html__('Left image', 'nt-advent' ),
                ),
                //Features heading
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                    'group' => esc_html__('Features Right', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'section_desc',
                    'description' => esc_html__("Add description for this section", "nt-advent"),
                    'group' => esc_html__('Features Right', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                    'group' => esc_html__('Features Right', 'nt-advent' ),
                ),
                //Features loop
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Features left list item', 'nt-advent' ),
                    'param_name' => 'featurestwoloop',
                    'group' => esc_html__('Features Right', 'nt-advent' ),
                    'params' => array(
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Features", "nt-advent"),
                            "param_name" => "features",
                            "description" => esc_html__("Add detail text for features.", "nt-advent"),
                        )
                    )
                ),
                //Background CSS
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'nt-advent' ),
                    'param_name' => 'sectionbgcss',
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Heading font-size', 'nt-advent'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change heading fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Heading line-height', 'nt-advent'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change heading line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change heading color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //desc
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Description font-size', 'nt-advent'),
                    'param_name' => 'dsize',
                    'description' => esc_html__('Change description fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Description line-height', 'nt-advent'),
                    'param_name' => 'dlineh',
                    'description' => esc_html__('Change description line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Description color', 'nt-advent'),
                    'param_name' => 'dcolor',
                    'description' => esc_html__('Change description color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('List item font-size', 'nt-advent'),
                    'param_name' => 'itsize',
                    'description' => esc_html__('Change List item fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('List item line-height', 'nt-advent'),
                    'param_name' => 'itlineh',
                    'description' => esc_html__('Change List item line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('List item color', 'nt-advent'),
                    'param_name' => 'itcolor',
                    'description' => esc_html__('Change List item color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_featurestwo extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	FEATURES ICON advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_featuresicon_integrateWithVC' );
function NT_Advent_featuresicon_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Features Icon Section", "nt-advent" ),
            "base" => "nt_advent_section_featuresicon",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                //heading
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'section_desc',
                    'description' => esc_html__("Add description for this section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                //Features column
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Item column size', 'nt-advent' ),
                    'param_name' => 'item_column',
                    'description' => esc_html__('You can select detail item column size', 'nt-advent' ),
                    'group' => esc_html__('Features', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select column size for all item', 'nt-advent' ) => '',
                        esc_html__('1 Column', 'nt-advent' ) => 'col-md-12',
                        esc_html__('2 Column', 'nt-advent' ) => 'col-md-6',
                        esc_html__('3 Column', 'nt-advent' ) => 'col-md-4',
                        esc_html__('4 Column', 'nt-advent' ) => 'col-md-3',
                        esc_html__('6 Column', 'nt-advent' ) => 'col-md-2',
                        esc_html__('Custom Column', 'nt-advent' ) => 'custom',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Desktop column', 'nt-advent' ),
                    'param_name' => 'desk_column',
                    'description' => esc_html__('You can select desktop column size', 'nt-advent' ),
                    'group' => esc_html__('Features', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select desktop column size for all item', 'nt-advent' ) => '',
                        esc_html__('col-md-1', 'nt-advent' ) => 'col-md-1',
                        esc_html__('col-md-2', 'nt-advent' ) => 'col-md-2',
                        esc_html__('col-md-3', 'nt-advent' ) => 'col-md-3',
                        esc_html__('col-md-4', 'nt-advent' ) => 'col-md-4',
                        esc_html__('col-md-5', 'nt-advent' ) => 'col-md-5',
                        esc_html__('col-md-6', 'nt-advent' ) => 'col-md-6',
                        esc_html__('col-md-7', 'nt-advent' ) => 'col-md-7',
                        esc_html__('col-md-8', 'nt-advent' ) => 'col-md-8',
                        esc_html__('col-md-9', 'nt-advent' ) => 'col-md-9',
                        esc_html__('col-md-10', 'nt-advent' ) => 'col-md-10',
                        esc_html__('col-md-11', 'nt-advent' ) => 'col-md-11',
                        esc_html__('col-md-12', 'nt-advent' ) => 'col-md-12',
                    ),
                    'dependency' => array(
                        'element' => 'item_column',
                        'value' => 'custom'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Desktop column offset', 'nt-advent' ),
                    'param_name' => 'desk_column_offset',
                    'description' => esc_html__('You can select desktop column offset size', 'nt-advent' ),
                    'group' => esc_html__('Features', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select desktop column offset for all item', 'nt-advent' ) => '',
                        esc_html__('col-md-offset-1', 'nt-advent' ) => 'col-md-offset-1',
                        esc_html__('col-md-offset-2', 'nt-advent' ) => 'col-md-offset-2',
                        esc_html__('col-md-offset-3', 'nt-advent' ) => 'col-md-offset-3',
                        esc_html__('col-md-offset-4', 'nt-advent' ) => 'col-md-offset-4',
                        esc_html__('col-md-offset-5', 'nt-advent' ) => 'col-md-offset-5',
                        esc_html__('col-md-offset-6', 'nt-advent' ) => 'col-md-offset-6',
                        esc_html__('col-md-offset-7', 'nt-advent' ) => 'col-md-offset-7',
                        esc_html__('col-md-offset-8', 'nt-advent' ) => 'col-md-offset-8',
                        esc_html__('col-md-offset-9', 'nt-advent' ) => 'col-md-offset-9',
                        esc_html__('col-md-offset-10', 'nt-advent' ) => 'col-md-offset-10',
                        esc_html__('col-md-offset-11', 'nt-advent' ) => 'col-md-offset-11',
                        esc_html__('col-md-offset-12', 'nt-advent' ) => 'col-md-offset-12',
                    ),
                    'dependency' => array(
                        'element' => 'item_column',
                        'value' => 'custom'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Mobile column', 'nt-advent' ),
                    'param_name' => 'mob_column',
                    'description' => esc_html__('You can select mobile device column size', 'nt-advent' ),
                    'group' => esc_html__('Features', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select mobile column for all item', 'nt-advent' ) => '',
                        esc_html__('col-sm-1', 'nt-advent' ) => 'col-sm-1',
                        esc_html__('col-sm-2', 'nt-advent' ) => 'col-sm-2',
                        esc_html__('col-sm-3', 'nt-advent' ) => 'col-sm-3',
                        esc_html__('col-sm-4', 'nt-advent' ) => 'col-sm-4',
                        esc_html__('col-sm-5', 'nt-advent' ) => 'col-sm-5',
                        esc_html__('col-sm-6', 'nt-advent' ) => 'col-sm-6',
                        esc_html__('col-sm-7', 'nt-advent' ) => 'col-sm-7',
                        esc_html__('col-sm-8', 'nt-advent' ) => 'col-sm-8',
                        esc_html__('col-sm-9', 'nt-advent' ) => 'col-sm-9',
                        esc_html__('col-sm-10', 'nt-advent' ) => 'col-sm-10',
                        esc_html__('col-sm-11', 'nt-advent' ) => 'col-sm-11',
                        esc_html__('col-sm-12', 'nt-advent' ) => 'col-sm-12',
                    ),
                    'dependency' => array(
                        'element' => 'item_column',
                        'value' => 'custom'
                    )
                ),
                //Features loop
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation item', 'nt-advent' ),
                    'param_name' => 'itemanimation',
                    'group' => esc_html__('Features', 'nt-advent' ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Features item', 'nt-advent' ),
                    'param_name' => 'featuresiconloop',
                    'group' => esc_html__('Features', 'nt-advent' ),
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Icon type', 'nt-advent' ),
                            'param_name' => 'icon_type',
                            'std'         => 'customicon',
                            'description' => esc_html__('You can select icon class type', 'nt-advent' ),
                            'value' => array(
                                esc_html__('Select icon type', 'nt-advent' ) => 'd',
                                esc_html__('Custom icon', 'nt-advent' ) => 'customicons',
                                esc_html__('Icon list', 'nt-advent' ) => 'iconlist',
                            ),
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Icon name", "nt-advent"),
                            "param_name" => "icon_name",
                            'dependency' => array(
                                'element' => 'icon_type',
                                'value' => array('customicons','d'),
                            ),
                            "description" => sprintf('%s <a href="%s" target="_blank">Get Ionicon</a>',
                            esc_html__("Add icon name(fonticon class name). example : ion-android-notifications", "nt-advent"),
                            esc_url("https://ionicons.com/v2/cheatsheet.html") ),
                        ),
                        array(
                            "type" => "iconpicker",
                            "heading" => esc_html__("Icon", "nt-advent"),
                            "param_name" => "icon_names",
                            'dependency' => array(
                                'element' => 'icon_type',
                                'value' => 'iconlist'
                            ),
                            "description" => esc_html__("Please select icon.", "nt-advent"),
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Title", "nt-advent"),
                            "param_name" => "item_title",
                            "description" => esc_html__("Add title for item.", "nt-advent"),
                        ),
                        array(
                            "type" => "textarea",
                            "heading" => esc_html__("Detail", "nt-advent"),
                            "param_name" => "item_desc",
                            "description" => esc_html__("Add detail for item.", "nt-advent"),
                        ),
                    )
                ),
                //Background CSS
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'nt-advent' ),
                    'param_name' => 'sectionbgcss',
                    'group' => esc_html__('Background options', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_featuresicon extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	COUNTNUMBER advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_countnumber_integrateWithVC' );
function NT_Advent_countnumber_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Countnumber Section", "nt-advent" ),
            "base" => "nt_advent_section_countnumber",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                //Features column
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Item column size', 'nt-advent' ),
                    'param_name' => 'item_column',
                    'description' => esc_html__('You can select detail item column size', 'nt-advent' ),
                    'group' => esc_html__('Count', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select column size for all item', 'nt-advent' ) => '',
                        esc_html__('1 Column', 'nt-advent' ) => 'col-md-12',
                        esc_html__('2 Column', 'nt-advent' ) => 'col-md-6',
                        esc_html__('3 Column', 'nt-advent' ) => 'col-md-4',
                        esc_html__('4 Column', 'nt-advent' ) => 'col-md-3',
                        esc_html__('6 Column', 'nt-advent' ) => 'col-md-2',
                        esc_html__('Custom Column', 'nt-advent' ) => 'custom',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Desktop column', 'nt-advent' ),
                    'param_name' => 'desk_column',
                    'description' => esc_html__('You can select desktop column size', 'nt-advent' ),
                    'group' => esc_html__('Count', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select desktop column size for all item', 'nt-advent' ) => '',
                        esc_html__('col-md-1', 'nt-advent' ) => 'col-md-1',
                        esc_html__('col-md-2', 'nt-advent' ) => 'col-md-2',
                        esc_html__('col-md-3', 'nt-advent' ) => 'col-md-3',
                        esc_html__('col-md-4', 'nt-advent' ) => 'col-md-4',
                        esc_html__('col-md-5', 'nt-advent' ) => 'col-md-5',
                        esc_html__('col-md-6', 'nt-advent' ) => 'col-md-6',
                        esc_html__('col-md-7', 'nt-advent' ) => 'col-md-7',
                        esc_html__('col-md-8', 'nt-advent' ) => 'col-md-8',
                        esc_html__('col-md-9', 'nt-advent' ) => 'col-md-9',
                        esc_html__('col-md-10', 'nt-advent' ) => 'col-md-10',
                        esc_html__('col-md-11', 'nt-advent' ) => 'col-md-11',
                        esc_html__('col-md-12', 'nt-advent' ) => 'col-md-12',
                    ),
                    'dependency' => array(
                        'element' => 'item_column',
                        'value' => 'custom'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Desktop column offset', 'nt-advent' ),
                    'param_name' => 'desk_column_offset',
                    'description' => esc_html__('You can select desktop column offset size', 'nt-advent' ),
                    'group' => esc_html__('Count', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select desktop column offset for all item', 'nt-advent' ) => '',
                        esc_html__('col-md-offset-1', 'nt-advent' ) => 'col-md-offset-1',
                        esc_html__('col-md-offset-2', 'nt-advent' ) => 'col-md-offset-2',
                        esc_html__('col-md-offset-3', 'nt-advent' ) => 'col-md-offset-3',
                        esc_html__('col-md-offset-4', 'nt-advent' ) => 'col-md-offset-4',
                        esc_html__('col-md-offset-5', 'nt-advent' ) => 'col-md-offset-5',
                        esc_html__('col-md-offset-6', 'nt-advent' ) => 'col-md-offset-6',
                        esc_html__('col-md-offset-7', 'nt-advent' ) => 'col-md-offset-7',
                        esc_html__('col-md-offset-8', 'nt-advent' ) => 'col-md-offset-8',
                        esc_html__('col-md-offset-9', 'nt-advent' ) => 'col-md-offset-9',
                        esc_html__('col-md-offset-10', 'nt-advent' ) => 'col-md-offset-10',
                        esc_html__('col-md-offset-11', 'nt-advent' ) => 'col-md-offset-11',
                        esc_html__('col-md-offset-12', 'nt-advent' ) => 'col-md-offset-12',
                    ),
                    'dependency' => array(
                        'element' => 'item_column',
                        'value' => 'custom'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Mobile column', 'nt-advent' ),
                    'param_name' => 'mob_column',
                    'description' => esc_html__('You can select mobile device column size', 'nt-advent' ),
                    'group' => esc_html__('Count', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select mobile column for all item', 'nt-advent' ) => '',
                        esc_html__('col-sm-1', 'nt-advent' ) => 'col-sm-1',
                        esc_html__('col-sm-2', 'nt-advent' ) => 'col-sm-2',
                        esc_html__('col-sm-3', 'nt-advent' ) => 'col-sm-3',
                        esc_html__('col-sm-4', 'nt-advent' ) => 'col-sm-4',
                        esc_html__('col-sm-5', 'nt-advent' ) => 'col-sm-5',
                        esc_html__('col-sm-6', 'nt-advent' ) => 'col-sm-6',
                        esc_html__('col-sm-7', 'nt-advent' ) => 'col-sm-7',
                        esc_html__('col-sm-8', 'nt-advent' ) => 'col-sm-8',
                        esc_html__('col-sm-9', 'nt-advent' ) => 'col-sm-9',
                        esc_html__('col-sm-10', 'nt-advent' ) => 'col-sm-10',
                        esc_html__('col-sm-11', 'nt-advent' ) => 'col-sm-11',
                        esc_html__('col-sm-12', 'nt-advent' ) => 'col-sm-12',
                    ),
                    'dependency' => array(
                        'element' => 'item_column',
                        'value' => 'custom'
                    )
                ),
                //Features loop
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation item', 'nt-advent' ),
                    'param_name' => 'itemanimation',
                    'group' => esc_html__('Count', 'nt-advent' ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Count item', 'nt-advent' ),
                    'param_name' => 'countnumberloop',
                    'group' => esc_html__('Count', 'nt-advent' ),
                    'params' => array(
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Icon name", "nt-advent"),
                            "param_name" => "icon_name",
                            "description" => sprintf('%s <a href="%s" target="_blank">Get Ionicon</a>',
                            esc_html__("Add icon name(fonticon class name). example : ion-android-notifications", "nt-advent"),
                            esc_url("https://ionicons.com/v2/cheatsheet.html") ),
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Number", "nt-advent"),
                            "param_name" => "item_number",
                            "description" => esc_html__("Add number for count.", "nt-advent"),
                        ),
                        array(
                            "type" => "textarea",
                            "heading" => esc_html__("Title", "nt-advent"),
                            "param_name" => "item_title",
                            "description" => esc_html__("Add title for item.", "nt-advent"),
                        ),
                    )
                ),
                //Background CSS
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'nt-advent' ),
                    'param_name' => 'sectionbgcss',
                    'group' => esc_html__('Background options', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_countnumber extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	SUBFEATURES  advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_subfeatures_integrateWithVC' );
function NT_Advent_subfeatures_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Subfeatures Section", "nt-advent" ),
            "base" => "nt_advent_section_subfeatures",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'section_heading',
                    'description' => esc_html__("Add heading for this section", "nt-advent"),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent' ),
                    'param_name' => 'headingcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button (Link)', 'nt-advent' ),
                    'param_name' => 'downloadlink',
                    'description' => esc_html__('Add custom link.', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button style', 'nt-advent' ),
                    'param_name' => 'btn_type',
                    'description' => esc_html__('You can select button style', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Rectangle', 'nt-advent' ) => 'rectangle',
                        esc_html__('Rounded', 'nt-advent' ) => 'rounded',
                    ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation button', 'nt-advent' ),
                    'param_name' => 'btnanimation',
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Background image", "nt-advent"),
                    "param_name" => "bgimg",
                    "description" => esc_html__("Add your BG image", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Background color', 'nt-advent' ),
                    'param_name' => 'bgcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select parallax bg hide or show', 'nt-advent' ),
                    'param_name' => 'parallax',
                    'description' => esc_html__('You can select parallax bg hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select parallax effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select overlay color hide or show', 'nt-advent' ),
                    'param_name' => 'overlay_display',
                    'description' => esc_html__('You can select overlay mask color hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select a style', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Overlay color', 'nt-advent' ),
                    'param_name' => 'overlaycolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'overlay_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select gradient color hide or show', 'nt-advent' ),
                    'param_name' => 'gradient_display',
                    'description' => esc_html__('You can select gradient color hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select a style', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
            ),
        )
    );
}
class NT_Advent_section_subfeatures extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIAL advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_testimonial_integrateWithVC' );
function NT_Advent_testimonial_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Testimonial Section", "nt-advent" ),
            "base" => "nt_advent_section_testimonial",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                //Testimonial loop
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation item', 'nt-advent' ),
                    'param_name' => 'testianimation',
                    'group' => esc_html__('Testimonial', 'nt-advent' ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Testimonial items', 'nt-advent' ),
                    'param_name' => 'testiloop',
                    'group' => esc_html__('Testimonial', 'nt-advent' ),
                    'params' => array(
                        array(
                            "type" => "attach_image",
                            "heading" => esc_html__("Testimonial image", "nt-advent"),
                            "param_name" => "testi_img",
                            "description" => esc_html__("Add your client image", "nt-advent"),
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Testimonial name", "nt-advent"),
                            "param_name" => "testi_name",
                            "description" => esc_html__("Add your testimonial name", "nt-advent"),
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Testimonial job", "nt-advent"),
                            "param_name" => "testi_job",
                            "description" => esc_html__("Add your testimonial job or detail", "nt-advent"),
                        ),
                        array(
                            "type" => "textarea",
                            "heading" => esc_html__("Testimonial quote", "nt-advent"),
                            "param_name" => "testi_quote",
                            "description" => esc_html__("Add your testimonial quote text", "nt-advent"),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Rating star', 'nt-advent' ),
                            'param_name' => 'stars',
                            'description' => esc_html__('You can select star count', 'nt-advent' ),
                            'value' => array(
                                esc_html__('1 Star', 'nt-advent' ) => '1',
                                esc_html__('2 Star', 'nt-advent' ) => '2',
                                esc_html__('3 Star', 'nt-advent' ) => '3',
                                esc_html__('4 Star', 'nt-advent' ) => '4',
                                esc_html__('5 Star', 'nt-advent' ) => '5',

                            )
                        )
                    )
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'nt-advent' ),
                    'param_name' => 'sectionbgcss',
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                //quote
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Quote font-size', 'nt-advent'),
                    'param_name' => 'qsize',
                    'description' => esc_html__('Change quote fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Quote line-height', 'nt-advent'),
                    'param_name' => 'qlineh',
                    'description' => esc_html__('Change quote line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Quote color', 'nt-advent'),
                    'param_name' => 'qcolor',
                    'description' => esc_html__('Change quote color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //name
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Name font-size', 'nt-advent'),
                    'param_name' => 'nsize',
                    'description' => esc_html__('Change name fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Name line-height', 'nt-advent'),
                    'param_name' => 'nlineh',
                    'description' => esc_html__('Change name line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Name color', 'nt-advent'),
                    'param_name' => 'ncolor',
                    'description' => esc_html__('Change name color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //job
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Job font-size', 'nt-advent'),
                    'param_name' => 'jsize',
                    'description' => esc_html__('Change job fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Job line-height', 'nt-advent'),
                    'param_name' => 'jlineh',
                    'description' => esc_html__('Change job line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Job color', 'nt-advent'),
                    'param_name' => 'jcolor',
                    'description' => esc_html__('Change job color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
            ),
        )
    );
}
class NT_Advent_section_testimonial extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	PRICING advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_section_pricing_integrateWithVC' );
function NT_Advent_section_pricing_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__("Pricing ( Plugin )", "nt-advent"),
            "base" => "nt_advent_section_pricing",
            "icon" => "icon-wpb-row",
            "category" => esc_html__("NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent'),
                    'param_name' => 'section_id',
                    'description' => esc_html__('Add your Section ID', 'nt-advent'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Heading display ( hide or show )', 'nt-advent' ),
                    'param_name' => 'heading_display',
                    'description' => esc_html__('You can select hide or show section heading all text', 'nt-advent' ),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),

                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'secheading',
                    'description' => esc_html__("Add heading for pricing section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'heading_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Section description', 'nt-advent' ),
                    'param_name' => 'secdescription',
                    'description' => esc_html__("Add description for pricing section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'heading_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                    'group' => esc_html__('Heading', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'heading_display',
                        'value' => 'show'
                    )
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Price Button URL', 'nt-advent'),
                    'param_name' => 'pricelink',
                    'description' => esc_html__('Add link for price button.', 'nt-advent'),
                    'group' => esc_html__('Post Options', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button style', 'nt-advent' ),
                    'param_name' => 'price_btntype',
                    'description' => esc_html__('You can select button style', 'nt-advent' ),
                    'group' => esc_html__('Post Options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Rectangle', 'nt-advent' ) => 'rectangle',
                        esc_html__('Rounded', 'nt-advent' ) => 'rounded',
                    ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation pricing item', 'nt-advent' ),
                    'param_name' => 'priceanimation',
                    'group' => esc_html__('Post Options', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price Table Count', 'nt-advent' ),
                    'param_name' => 'post_number',
                    'group' => esc_html__('Post Options', 'nt-advent'),
                    'description' => esc_html__('You can control with number your price tables.Please enter a number', 'nt-advent'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Category', 'nt-advent' ),
                    'param_name' => 'price_category',
                    'group' => esc_html__('Post Options', 'nt-advent'),
                    'description' => esc_html__('Enter Price table category or write all', 'nt-advent'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Order', 'nt-advent' ),
                    'param_name' => 'order',
                    'group' => esc_html__('Post Options', 'nt-advent'),
                    'description' => esc_html__('Enter Price table order. DESC or ASC', 'nt-advent'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Orderby', 'nt-advent' ),
                    'param_name' => 'orderby',
                    'group' => esc_html__('Post Options', 'nt-advent'),
                    'description' => esc_html__('Enter Price table orderby. Default is : date', 'nt-advent'),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'nt-advent'),
                    'param_name' => 'sectionbgcss',
                    'group' => esc_html__('Background options', 'nt-advent'),
                ),
                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Heading font-size', 'nt-advent'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change heading fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Heading line-height', 'nt-advent'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change heading line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change heading color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //desc
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Description font-size', 'nt-advent'),
                    'param_name' => 'dsize',
                    'description' => esc_html__('Change description fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Description line-height', 'nt-advent'),
                    'param_name' => 'dlineh',
                    'description' => esc_html__('Change description line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Description color', 'nt-advent'),
                    'param_name' => 'dcolor',
                    'description' => esc_html__('Change description color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //price icon
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price icon font-size', 'nt-advent'),
                    'param_name' => 'isize',
                    'description' => esc_html__('Change Price icon fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price icon line-height', 'nt-advent'),
                    'param_name' => 'ilineh',
                    'description' => esc_html__('Change Price icon line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Price icon color', 'nt-advent'),
                    'param_name' => 'icolor',
                    'description' => esc_html__('Change Price icon color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //price title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price title font-size', 'nt-advent'),
                    'param_name' => 'ptsize',
                    'description' => esc_html__('Change Price title fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price title line-height', 'nt-advent'),
                    'param_name' => 'ptlineh',
                    'description' => esc_html__('Change Price title line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Price title color', 'nt-advent'),
                    'param_name' => 'ptcolor',
                    'description' => esc_html__('Change Price title color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //price amount
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price amount font-size', 'nt-advent'),
                    'param_name' => 'pasize',
                    'description' => esc_html__('Change Price amount fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price amount line-height', 'nt-advent'),
                    'param_name' => 'palineh',
                    'description' => esc_html__('Change Price amount line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Price amount color', 'nt-advent'),
                    'param_name' => 'pacolor',
                    'description' => esc_html__('Change Price amount color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //price desc
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price description font-size', 'nt-advent'),
                    'param_name' => 'pdsize',
                    'description' => esc_html__('Change Price description fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price description line-height', 'nt-advent'),
                    'param_name' => 'pdlineh',
                    'description' => esc_html__('Change Price description line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Price description color', 'nt-advent'),
                    'param_name' => 'pdcolor',
                    'description' => esc_html__('Change Price description color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                //List item
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('List item font-size', 'nt-advent'),
                    'param_name' => 'itsize',
                    'description' => esc_html__('Change List item fontsize.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('List item line-height', 'nt-advent'),
                    'param_name' => 'itlineh',
                    'description' => esc_html__('Change List item line-height.use number in ( px or unit )', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('List item color', 'nt-advent'),
                    'param_name' => 'itcolor',
                    'description' => esc_html__('Change List item color.', 'nt-advent'),
                    'group' => esc_html__('Custom style', 'nt-advent' ),
                )
            )
        )
    );
}
class NT_Advent_section_pricing extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	SUBSCRIBE  advent
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Advent_subscribe_integrateWithVC' );
function NT_Advent_subscribe_integrateWithVC() {
    vc_map(
        array(
            "name" => esc_html__( "Subscribe Section", "nt-advent" ),
            "base" => "nt_advent_section_subscribe",
            "category" => esc_html__( "NT Advent", "nt-advent"),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Section ID', 'nt-advent' ),
                    'param_name' => 'section_id',
                    'description' => esc_html__("Add Your Section ID for scroll", "nt-advent"),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Heading', 'nt-advent' ),
                    'param_name' => 'secheading',
                    'description' => esc_html__("Add heading for subscribe section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nt-advent' ),
                    'param_name' => 'secdescription',
                    'description' => esc_html__("Add description for subscribe section", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Heading color', 'nt-advent' ),
                    'param_name' => 'headingcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Description color', 'nt-advent' ),
                    'param_name' => 'desccolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation heading and description', 'nt-advent' ),
                    'param_name' => 'headinganimation',
                    'group' => esc_html__('Heading', 'nt-advent' ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation subscribe form', 'nt-advent' ),
                    'param_name' => 'formanimation',
                    'group' => esc_html__('Subscribe Form', 'nt-advent' ),
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__('Subscribe Form shortcode', 'nt-advent' ),
                    'param_name' => 'content',
                    'description' => esc_html__("Add contact form 7 shortcode here", "nt-advent"),
                    'group' => esc_html__('Subscribe Form', 'nt-advent' ),
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__("Background image", "nt-advent"),
                    "param_name" => "bgimg",
                    "description" => esc_html__("Add your BG image", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Background color', 'nt-advent' ),
                    'param_name' => 'bgcolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select parallax bg hide or show', 'nt-advent' ),
                    'param_name' => 'parallax',
                    'description' => esc_html__('You can select parallax bg hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select parallax effect', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select overlay color hide or show', 'nt-advent' ),
                    'param_name' => 'overlay_display',
                    'description' => esc_html__('You can select overlay mask color hide or show', 'nt-advent' ),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'value' => array(
                        esc_html__('Select a style', 'nt-advent' ) => '',
                        esc_html__('Show', 'nt-advent' ) => 'show',
                        esc_html__('Hide', 'nt-advent' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Overlay color', 'nt-advent' ),
                    'param_name' => 'overlaycolor',
                    "description" => esc_html__("Add/select an color", "nt-advent"),
                    'group' => esc_html__('Background options', 'nt-advent' ),
                    'dependency' => array(
                        'element' => 'overlay_display',
                        'value' => 'show'
                    )
                )
            )
        )
    );
}
class NT_Advent_section_subscribe extends WPBakeryShortCode {
}

// Filter to replace default css class names for vc_row shortcode and vc_column
add_filter( 'vc_shortcodes_css_class', 'nt_advent_custom_css_classes_for_vc_row_and_vc_column', 10, 2 );
function nt_advent_custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
    if (  $tag == 'vc_row_inner' ) {
        $class_string = str_replace( 'vc_row-fluid', 'container bootstrap', $class_string ); // This will replace "vc_row-fluid" with "my_row-fluid"
    }
    return $class_string; // Important: you should always return modified or original $class_string
}
