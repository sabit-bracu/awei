<?php

/*
Plugin Name: NT Advent Shortcodes
Plugin URI: http://themeforest.net/user/Ninetheme
Description: Shortcodes for Ninetheme WordPress Themes - nt-advent Version
Version: 1.1.9
Author: Ninetheme
Author URI: http://themeforest.net/user/Ninetheme
*/

// image resizer
require_once plugin_dir_path(__FILE__) . 'aq_resizer.php';



add_action('nt_advent_after_single_post_content', 'nt_advent_post_share', 10 );
// post share icon
if ( ! function_exists( 'nt_advent_post_share' ) ) {
    /**
    * Display post share icon
    *
    * @return void
    */
    function nt_advent_post_share() {

        if ( is_single() ) { ?>

            <div id="share-buttons">
                <a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="http://twitter.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                <a href="http://www.digg.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-digg"></i></a>
                <a href="http://reddit.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-reddit"></i></a>
                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest"></i></a>
                <a href="http://www.stumbleupon.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-stumbleupon"></i></a>
            </div>
            <?php
        }
    }
}


/*************************************************
## Word Limiter
*************************************************/
function nt_advent_limit_words($string, $limit) {
    $words = explode(' ', $string);
    return implode(' ', array_slice($words, 0, $limit));
}

if ( ! function_exists( 'advent_sanitize_data' ) ) {
    function advent_sanitize_data( $adventdata ) {

        $adventdata = wp_kses( $adventdata, array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br'  => array(),
            'em'  => array(),
            'strong' => array(),
        ) );

        return $adventdata;
    }
}

/*-----------------------------------------------------------------------------------*/
/*	HERO 1 PRODUCT advent
/*-----------------------------------------------------------------------------------*/

function theme_nt_advent_section_heroproduct( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "imganimation" => '',
        "heroleftimg" => '',
        "headinganimation" => '',
        "section_heading" => '',
        "headingcolor" => '',
        "desccolor" => '',
        "section_desc" => '',
        "btnanimation" => '',
        "herobtnlink" => '',
        "herobtn_type" => '',
        "bgimg" => '',
        "bgcolor" => '',
        "parallax" => '',
        "particle" => '',
        "overlay_display" => '',
        "overlaycolor" => '',
        "paddingbot" => ''
    ), $atts) );

    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

    $herobtnlink = ( $herobtnlink == '||' ) ? '' : $herobtnlink;
    $herobtnlink = vc_build_link( $herobtnlink );
    $herobtn_href = $herobtnlink['url'];
    $herobtn_title = $herobtnlink['title'];
    $herobtn_target = $herobtnlink['target'];
    $herobtntype = $herobtn_type ? $herobtn_type : 'rectangle';

    $heading_animation = $headinganimation ? $headinganimation : '';
    $btn_animation = $btnanimation ? $btnanimation : '';
    $img_animation = $imganimation ? $imganimation : '';

    if ( $headingcolor != '' ) { $heading_color = ' style="color:'.$headingcolor.'"'; } else{ $heading_color = ''; }
    if ( $desccolor != '' ) { $desc_color = ' style="color:'.$desccolor.'"'; } else{ $desc_color = ''; }
    if ( $particle == 'show' ) {
        wp_enqueue_script( 'particleground' );
        wp_enqueue_script( 'nt-advent-particle-set' );
        $particle_class = ' particle-ground';
    } else{
        $particle_class = '';
    }

    if ( $bgimg !='' ) {
        if ( $parallax == 'show' ) {
            wp_enqueue_script( 'device' );
            wp_enqueue_script( 'stellar' );
            wp_enqueue_script( 'nt-advent-parallax-set' );
            $bg_class = ' parallax image-bg';
            if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
            $bg_img = wp_get_attachment_url( $bgimg,'full' );
            $parallaxbg = ' data-stellar-background-ratio="0.5" data-stellar-vertical-offset="50" data-stellar-offset-parent="true" style="background-image: url('.esc_url( $bg_img ).'); background-size: cover;background-attachment: fixed; background-position: 50% 50%; background-repeat: no-repeat;'.$padding_bot.'"';
        } else {
            if ( $bgimg !='' ) {
                if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
                $bg_img = wp_get_attachment_url( $bgimg,'full' );
                $parallaxbg = ' style="background-image: url('.esc_url( $bg_img ).');background-size: cover; background-repeat: no-repeat;'.$padding_bot.'"';
                $bg_class = ' image-bg';
            }
        }
    } else {
        $bg_class = '';
        $bg_color = $bgcolor ? $bgcolor : '#ffffff';
        if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
        $parallaxbg = ' style="background-color: '.$bg_color.';'.$padding_bot.'"';
    }

    $out = '';

    $out .= '<div '.$id.' class="hero-section product'.esc_attr( $particle_class ).''.esc_attr( $bg_class ).'"'.$parallaxbg.'>';
        if ( $overlay_display == 'show' ) {
        $out .= '<div class="overlay" style="background-color:'.$overlaycolor.'"></div>';
        }
        $out .= '<div class="container nopadding">';
            $out .= '<div class="col-md-6">';
                if ( $heroleftimg !='' ) {
                    $hero_leftimg = wp_get_attachment_url( $heroleftimg,'full' );
                    $out .= '<img class="img-responsive wow '.$img_animation.'" src="'.esc_url( $hero_leftimg ).'" alt="Hero Image" />';
                }
            $out .= '</div>';

            $out .= '<div class="col-md-6">';
                $out .= '<div class="hero-content">';
                    if ( $section_heading !='' ) { $out .= '<h1 class="wow '.$heading_animation.'" data-wow-delay="0s"'.$heading_color.'>'.advent_sanitize_data( $section_heading ).'</h1>'; }
                    if ( $section_desc !='' ) { $out .= '<p class="wow '.$heading_animation.'" data-wow-delay="0.2s"'.$desc_color.'>'.advent_sanitize_data( $section_desc ).'</p>'; }
                    if ( $herobtn_title !='' ) {
                        $out .= '<a href="'.esc_attr( $herobtn_href ).'" '; if ( $herobtn_target != '' ) { $out .= ' target="'.$herobtn_target.'"';}$out .= 'class="btn btn-primary btn-action popup wow '.$btn_animation.' '.$herobtntype.'" data-wow-delay="0.2s">'.esc_html( $herobtn_title ).'</a>';
                    }

                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';

    return $out;
}
add_shortcode('nt_advent_section_heroproduct', 'theme_nt_advent_section_heroproduct');

/*-----------------------------------------------------------------------------------*/
/*	HERO 2 BG-IMAGE advent
/*-----------------------------------------------------------------------------------*/

function theme_nt_advent_section_herobgimg( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "headinganimation" => '',
        "section_heading" => '',
        "section_desc" => '',
        "btnanimation" => '',
        "herobtnlink" => '',
        "herobtn_type" => '',
        "headingcolor" => '',
        "desccolor" => '',
        "bgimg" => '',
        "bgcolor" => '',
        "parallax" => '',
        "particle" => '',
        "overlay_display" => '',
        "overlaycolor" => '',
        "paddingbot" => ''
    ), $atts) );

    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

    $herobtnlink = ( $herobtnlink == '||' ) ? '' : $herobtnlink;
    $herobtnlink = vc_build_link( $herobtnlink );
    $herobtn_href = $herobtnlink['url'];
    $herobtn_title = $herobtnlink['title'];
    $herobtn_target = $herobtnlink['target'];
    $herobtntype = $herobtn_type ? $herobtn_type : 'rectangle';
    $heading_animation = $headinganimation ? $headinganimation : '';
    $btn_animation = $btnanimation ? $btnanimation : '';

    if ( $headingcolor != '' ) { $heading_color = ' style="color:'.$headingcolor.'"'; } else{ $heading_color = ''; }
    if ( $desccolor != '' ) { $desc_color = ' style="color:'.$desccolor.'"'; } else{ $desc_color = ''; }
    if ( $particle == 'show' ) {
        wp_enqueue_script( 'particleground' );
        wp_enqueue_script( 'nt-advent-particle-set' );
        $particle_class = ' particle-ground';
    } else{
        $particle_class = '';
    }

    if ( $bgimg !='' ) {
        if ( $parallax == 'show' ) {
            wp_enqueue_script( 'device' );
            wp_enqueue_script( 'stellar' );
            wp_enqueue_script( 'nt-advent-parallax-set' );
            $bg_class = ' parallax image-bg';
            if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
            $bg_img = wp_get_attachment_url( $bgimg,'full' );
            $parallaxbg = ' data-stellar-background-ratio="0.5" data-stellar-vertical-offset="50" data-stellar-offset-parent="true" style="background-image: url('.esc_url( $bg_img ).'); background-size: cover;background-attachment: fixed; background-position: 50% 50%; background-repeat: no-repeat;'.$padding_bot.'"';
        } else {
            if ( $bgimg !='' ) {
                if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
                $bg_img = wp_get_attachment_url( $bgimg,'full' );
                $parallaxbg = ' style="background-image: url('.esc_url( $bg_img ).');background-size: cover; background-repeat: no-repeat;'.$padding_bot.'"';
                $bg_class = ' image-bg';
            }
        }
    } else {
        $bg_class = '';
        $bg_color = $bgcolor ? $bgcolor : '#ffffff';
        if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
        $parallaxbg = ' style="background-color: '.$bg_color.';'.$padding_bot.'"';
    }

    $out = '';

    $out .= '<div '.$id.' class="hero-section image-bg'.esc_attr( $particle_class ).''.esc_attr( $bg_class ).'"'.$parallaxbg.'>';
        if ( $overlay_display == 'show' ) {
        $out .= '<div class="overlay" style="background-color:'.$overlaycolor.'"></div>';
        }
        $out .= '<div class="container nopadding">';
            $out .= '<div class="col-md-12">';
                $out .= '<div class="hero-content">';

                    if ( $section_heading !='' ) { $out .= '<h1 class="wow '.$heading_animation.'" data-wow-delay="0s"'.$heading_color.'>'.advent_sanitize_data( $section_heading ).'</h1>'; }
                    if ( $section_desc !='' ) { $out .= '<p class="wow '.$heading_animation.'" data-wow-delay="0.2s"'.$desc_color.'>'.advent_sanitize_data( $section_desc ).'</p>'; }

                    if ( $herobtn_title !='' ) {
                    $out .= '<a href="'.esc_attr( $herobtn_href ).'" '; if ( $herobtn_target != '' ) { $out .= ' target="'.$herobtn_target.'"';}$out .= 'class="btn btn-primary btn-action popup wow '.$btn_animation.' '.$herobtntype.'" data-wow-delay="0.2s">'.esc_html( $herobtn_title ).'</a>';
                    }

                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';

    return $out;
}
add_shortcode('nt_advent_section_herobgimg', 'theme_nt_advent_section_herobgimg');

/*-----------------------------------------------------------------------------------*/
/*	HERO 3 FORM advent
/*-----------------------------------------------------------------------------------*/

function theme_nt_advent_section_heroform( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "section_heading" => '',
        "section_desc" => '',
        "btnanimation" => '',
        "herobtnlink" => '',
        "herobtn_type" => '',
        "formanimation" => '',
        "form_heading" => '',
        "headingcolor" => '',
        "desccolor" => '',
        "bgimg" => '',
        "bgcolor" => '',
        "parallax" => '',
        "particle" => '',
        "overlay_display" => '',
        "overlaycolor" => '',
        "paddingbot" => ''
    ), $atts) );

    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

    $herobtnlink = ( $herobtnlink == '||' ) ? '' : $herobtnlink;
    $herobtnlink = vc_build_link( $herobtnlink );
    $herobtn_href = $herobtnlink['url'];
    $herobtn_title = $herobtnlink['title'];
    $herobtn_target = $herobtnlink['target'];
    $herobtntype = $herobtn_type ? $herobtn_type : 'rectangle';
    $btn_animation = $btnanimation ? $btnanimation : '';
    $form_animation = $formanimation ? $formanimation : '';

    if ( $headingcolor != '' ) { $heading_color = ' style="color:'.$headingcolor.'"'; } else{ $heading_color = ''; }
    if ( $desccolor != '' ) { $desc_color = ' style="color:'.$desccolor.'"'; } else{ $desc_color = ''; }
    if ( $particle == 'show' ) {
        wp_enqueue_script( 'particleground' );
        wp_enqueue_script( 'nt-advent-particle-set' );
        $particle_class = ' particle-ground';
    } else {
        $particle_class = '';
    }

    if ( $bgimg !='' ) {
        if ( $parallax == 'show' ) {
            wp_enqueue_script( 'device' );
            wp_enqueue_script( 'stellar' );
            wp_enqueue_script( 'nt-advent-parallax-set' );
            $bg_class = ' parallax image-bg';
            if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
            $bg_img = wp_get_attachment_url( $bgimg,'full' );
            $parallaxbg = ' data-stellar-background-ratio="0.5" data-stellar-vertical-offset="50" data-stellar-offset-parent="true" style="background-image: url('.esc_url( $bg_img ).'); background-size: cover;background-attachment: fixed; background-position: 50% 50%; background-repeat: no-repeat;'.$padding_bot.'"';
        }
        else{
            if ( $bgimg !='' ) {
                if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
                $bg_img = wp_get_attachment_url( $bgimg,'full' );
                $parallaxbg = ' style="background-image: url('.esc_url( $bg_img ).');background-size: cover; background-repeat: no-repeat;'.$padding_bot.'"';
                $bg_class = ' image-bg';
            }
        }
    } else {
        $bg_class = '';
        $bg_color = $bgcolor ? $bgcolor : '#ffffff';
        if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
        $parallaxbg = ' style="background-color: '.$bg_color.';'.$padding_bot.'"';
    }

    $out = '';
    $out .= '<div '.$id.' class="hero-section signup'.esc_attr( $particle_class ).''.esc_attr( $bg_class ).'"'.$parallaxbg.'>';
        if ( $overlay_display == 'show' ) {
        $out .= '<div class="overlay" style="background-color:'.$overlaycolor.'"></div>';
        }
        $out .= '<div class="container nopadding">';

            $out .= '<div class="col-md-7">';
                $out .= '<div class="hero-content">';

                    if ( $section_heading !='' ) { $out .= '<h1'.$heading_color.'>'.advent_sanitize_data( $section_heading ).'</h1>'; }
                    if ( $section_desc !='' ) { $out .= '<p'.$desc_color.'>'.advent_sanitize_data( $section_desc ).'</p>'; }
                    if ( $herobtn_title !='' ) {
                        $out .= '<a href="'.esc_attr( $herobtn_href ).'" '; if ( $herobtn_target != '' ) { $out .= ' target="'.$herobtn_target.'"';}$out .= 'class="btn btn-primary btn-action btn-round popup wow '.$btn_animation.' '.$herobtntype.'" data-wow-delay="0.2s">'.esc_html( $herobtn_title ).'</a>';
                    }

                $out .= '</div>';
            $out .= '</div>';

            $out .= '<div class="col-md-5">';
                $content_empty = do_shortcode( $content );
                if ( $content_empty !='' ) {
                    $out .= '<div class="signup-form wow '.$form_animation.'">';
                        $out .= '<h1>'.esc_html( $form_heading ).'</h1>';
                        $out .= do_shortcode( $content );
                    $out .= '</div>';
                }
            $out .= '</div>';

        $out .= '</div>';
    $out .= '</div>';

    return $out;
}
add_shortcode('nt_advent_section_heroform', 'theme_nt_advent_section_heroform');

/*-----------------------------------------------------------------------------------*/
/*	HERO 4 SUBSCRIBE advent
/*-----------------------------------------------------------------------------------*/
function theme_nt_advent_section_herosubscribe( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "imganimation" => '',
        "heroleftimg" => '',
        "headinganimation" => '',
        "section_heading" => '',
        "section_desc" => '',
        "formanimation" => '',
        "headingcolor" => '',
        "desccolor" => '',
        "bgimg" => '',
        "bgcolor" => '',
        "parallax" => '',
        "particle" => '',
        "overlay_display" => '',
        "overlaycolor" => '',
        "paddingbot" => ''
    ), $atts) );

    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

    $heading_animation = $headinganimation ? $headinganimation : '';
    $img_animation = $imganimation ? $imganimation : '';
    $form_animation = $formanimation ? $formanimation : '';

    if ( $headingcolor != '' ) { $heading_color = ' style="color:'.$headingcolor.'"'; } else{ $heading_color = ''; }
    if ( $desccolor != '' ) { $desc_color = ' style="color:'.$desccolor.'"'; } else{ $desc_color = ''; }
    if ( $particle == 'show' ) {
        wp_enqueue_script( 'particleground' );
        wp_enqueue_script( 'nt-advent-particle-set' );
        $particle_class = ' particle-ground';
    } else {
        $particle_class = '';
    }

    if ( $bgimg !='' ) {
        if ( $parallax == 'show' ) {
            wp_enqueue_script( 'device' );
            wp_enqueue_script( 'stellar' );
            wp_enqueue_script( 'nt-advent-parallax-set' );
            $bg_class = ' parallax image-bg';
            if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
            $bg_img = wp_get_attachment_url( $bgimg,'full' );
            $parallaxbg = ' data-stellar-background-ratio="0.5" data-stellar-vertical-offset="50" data-stellar-offset-parent="true" style="background-image: url('.esc_url( $bg_img ).'); background-size: cover;background-attachment: fixed; background-position: 50% 50%; background-repeat: no-repeat;'.$padding_bot.'"';
        }
        else{
            if ( $bgimg !='' ) {
                if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
                $bg_img = wp_get_attachment_url( $bgimg,'full' );
                $parallaxbg = ' style="background-image: url('.esc_url( $bg_img ).');background-size: cover; background-repeat: no-repeat;'.$padding_bot.'"';
                $bg_class = ' image-bg';
            }
        }
    } else{
        $bg_class = '';
        $bg_color = $bgcolor ? $bgcolor : '#ffffff';
        if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
        $parallaxbg = ' style="background-color: '.$bg_color.';'.$padding_bot.'"';
    }

    $out = '';

    $out .= '<div '.$id.' class="hero-section form'.esc_attr( $particle_class ).''.esc_attr( $bg_class ).'"'.$parallaxbg.'>';
        if ( $overlay_display == 'show' ) {
        $out .= '<div class="overlay" style="background-color:'.$overlaycolor.'"></div>';
        }
        $out .= '<div class="container nopadding">';

            if ( $heroleftimg !='' ) {
                $out .= '<div class="col-md-5">';
                    $hero_leftimg = wp_get_attachment_url( $heroleftimg,'full' );
                    $out .= '<img class="img-responsive wow '.$img_animation.'" data-wow-delay="0.1s" src="'.esc_url( $hero_leftimg ).'" alt="App" />';
                $out .= '</div>';
            }

            $out .= '<div class="col-md-7">';
                $out .= '<div class="hero-content">';
                    if ( $section_heading !='' ) { $out .= '<h1 class="wow '.$heading_animation.'" data-wow-delay="0.1s"'.$heading_color.'>'.advent_sanitize_data( $section_heading ).'</h1>';}
                    if ( $section_desc !='' ) { $out .= '<p class="wow '.$heading_animation.'" data-wow-delay="0.2s"'.$desc_color.'>'.advent_sanitize_data( $section_desc ).'</p>'; }
                    $content_empty = do_shortcode( $content );
                    if ( $content_empty !='' ) {
                        $out .= '<div class="sub-form wow '.$form_animation.'" data-wow-delay="0.3s">';
                            $out .= do_shortcode( $content );
                        $out .= '</div>';
                    }
                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';

    return $out;
}
add_shortcode('nt_advent_section_herosubscribe', 'theme_nt_advent_section_herosubscribe');

/*-----------------------------------------------------------------------------------*/
/*	HERO 5 SOFTWARE advent
/*-----------------------------------------------------------------------------------*/

function theme_nt_advent_section_herosoftware( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "imganimation" => '',
        "herobottomimg" => '',
        "headinganimation" => '',
        "section_heading" => '',
        "section_desc" => '',
        "btnanimation" => '',
        "herobtnlink1" => '',
        "herobtn_type" => '',
        "headingcolor" => '',
        "desccolor" => '',
        "bgimg" => '',
        "bgcolor" => '',
        "parallax" => '',
        "particle" => '',
        "overlay_display" => '',
        "overlaycolor" => '',
        "paddingbot" => ''
    ), $atts) );

    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

    $herobtnlink1 = ( $herobtnlink1 == '||' ) ? '' : $herobtnlink1;
    $herobtnlink1 = vc_build_link( $herobtnlink1 );
    $herobtn_href1 = $herobtnlink1['url'];
    $herobtn_title1 = $herobtnlink1['title'];
    $herobtn_target1 = $herobtnlink1['target'];
    $herobtntype = $herobtn_type ? $herobtn_type : 'rectangle';
    $heading_animation = $headinganimation ? $headinganimation : '';
    $btn_animation = $btnanimation ? $btnanimation : '';
    $img_animation = $imganimation ? $imganimation : '';

    if ( $headingcolor != '' ) { $heading_color = ' style="color:'.$headingcolor.'"'; } else{ $heading_color = ''; }
    if ( $desccolor != '' ) { $desc_color = ' style="color:'.$desccolor.'"'; } else{ $desc_color = ''; }
    if ( $particle == 'show' ) {
        wp_enqueue_script( 'particleground' );
        wp_enqueue_script( 'nt-advent-particle-set' );
        $particle_class = ' particle-ground';
    } else {
        $particle_class = '';
    }

    if ( $bgimg !='' ) {
        if ( $parallax == 'show' ) {
            wp_enqueue_script( 'device' );
            wp_enqueue_script( 'stellar' );
            wp_enqueue_script( 'nt-advent-parallax-set' );
            $bg_class = ' parallax image-bg';
            if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
            $bg_img = wp_get_attachment_url( $bgimg,'full' );
            $parallaxbg = ' data-stellar-background-ratio="0.5" data-stellar-vertical-offset="50" data-stellar-offset-parent="true" style="background-image: url('.esc_url( $bg_img ).'); background-size: cover;background-attachment: fixed; background-position: 50% 50%; background-repeat: no-repeat;'.$padding_bot.'"';
        } else {
            if ( $bgimg !='' ) {
                if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
                $bg_img = wp_get_attachment_url( $bgimg,'full' );
                $parallaxbg = ' style="background-image: url('.esc_url( $bg_img ).');background-size: cover; background-repeat: no-repeat;'.$padding_bot.'"';
                $bg_class = ' image-bg';
            }
        }

    } else {
        $bg_class = '';
        $bg_color = $bgcolor ? $bgcolor : '#ffffff';
        if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
        $parallaxbg = ' style="background-color: '.$bg_color.';'.$padding_bot.'"';
    }

    $out = '';

    $out .= '<div '.$id.' class="hero-section software'.esc_attr( $particle_class ).''.esc_attr( $bg_class ).'"'.$parallaxbg.'>';
        if ( $overlay_display == 'show' ) {
            $out .= '<div class="overlay" style="background-color:'.$overlaycolor.'"></div>';
        }
        $out .= '<div class="container nopadding">';
            $out .= '<div class="col-md-12">';
                $out .= '<div class="hero-content text-center">';
                    if ( $section_heading !='' ) { $out .= '<h1 class="wow '.$heading_animation.'" data-wow-delay="0.1s"'.$heading_color.'>'.advent_sanitize_data( $section_heading ).'</h1>';}
                    if ( $section_desc !='' ) { $out .= '<p class="wow '.$heading_animation.'" data-wow-delay="0.2s"'.$desc_color.'>'.advent_sanitize_data( $section_desc ).'</p>'; }
                    if ( $herobtn_title1 !='' ) {
                    $out .= '<a href="'.esc_attr( $herobtn_href1 ).'" '; if ( $herobtn_target1 != '' ) { $out .= ' target="'.$herobtn_target1.'"';}$out .= 'class="btn btn-primary btn-action popup wow '.$btn_animation.' '.$herobtntype.'" data-wow-delay="0.2s">'.esc_html( $herobtn_title1 ).'</a>';
                    }
                $out .= '</div>';
            $out .= '</div>';
            if ( $herobottomimg !='' ) {
            $out .= '<div class="col-md-12">';
                $hero_bottomimg = wp_get_attachment_url( $herobottomimg,'full' );
                $out .= '<img class="img-responsive wow '.$img_animation.'" data-wow-delay="0.2s" src="'.esc_url( $hero_bottomimg ).'" alt="Hero Image" />';
            $out .= '</div>';
            }
        $out .= '</div>';
    $out .= '</div>';

    return $out;
}
add_shortcode('nt_advent_section_herosoftware', 'theme_nt_advent_section_herosoftware');

/*-----------------------------------------------------------------------------------*/
/*	HERO 6 APP advent
/*-----------------------------------------------------------------------------------*/
function theme_nt_advent_section_heroapp( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "herologoimg" => '',
        "logoanimation" => '',
        "headinganimation" => '',
        "section_heading" => '',
        "section_desc" => '',
        "starcount" => '',
        "btnanimation" => '',
        "herobtnlink1" => '',
        "appstoreimg" => '',
        "herobtnlink2" => '',
        "playstoreimg" => '',
        "imganimation" => '',
        "herobottomimg" => '',
        "headingcolor" => '',
        "desccolor" => '',
        "bgimg" => '',
        "bgcolor" => '',
        "parallax" => '',
        "particle" => '',
        "overlay_display" => '',
        "overlaycolor" => '',
        "paddingbot" => ''
    ), $atts) );

    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

    $herobtnlink1 = ( $herobtnlink1 == '||' ) ? '' : $herobtnlink1;
    $herobtnlink1 = vc_build_link( $herobtnlink1 );
    $herobtn_href1 = $herobtnlink1['url'];
    $herobtn_title1 = $herobtnlink1['title'];
    $herobtn_target1 = $herobtnlink1['target'];

    $herobtnlink2 = ( $herobtnlink2 == '||' ) ? '' : $herobtnlink2;
    $herobtnlink2 = vc_build_link( $herobtnlink2 );
    $herobtn_href2 = $herobtnlink2['url'];
    $herobtn_title2 = $herobtnlink2['title'];
    $herobtn_target2 = $herobtnlink2['target'];

    $heading_animation = $headinganimation ? $headinganimation : '';
    $btn_animation = $btnanimation ? $btnanimation : '';
    $img_animation = $imganimation ? $imganimation : '';
    $logo_animation = $logoanimation ? $logoanimation : '';

    if ( $headingcolor != '' ) { $heading_color = ' style="color:'.$headingcolor.'"'; } else{ $heading_color = ''; }
    if ( $desccolor != '' ) { $desc_color = ' style="color:'.$desccolor.'"'; } else{ $desc_color = ''; }
    if ( $particle == 'show' ) {
        wp_enqueue_script( 'particleground' );
        wp_enqueue_script( 'nt-advent-particle-set' );
        $particle_class = ' particle-ground';
    } else{
        $particle_class = '';
    }

    if ( $bgimg !='' ) {
        if ( $parallax == 'show' ) {
            wp_enqueue_script( 'device' );
            wp_enqueue_script( 'stellar' );
            wp_enqueue_script( 'nt-advent-parallax-set' );
            $bg_class = ' parallax image-bg';
            if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
            $bg_img = wp_get_attachment_url( $bgimg,'full' );
            $parallaxbg = ' data-stellar-background-ratio="0.5" data-stellar-vertical-offset="50" data-stellar-offset-parent="true" style="background-image: url('.esc_url( $bg_img ).'); background-size: cover;background-attachment: fixed; background-position: 50% 50%; background-repeat: no-repeat;'.$padding_bot.'"';
        } else {
            if ( $bgimg !='' ) {
                if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
                $bg_img = wp_get_attachment_url( $bgimg,'full' );
                $parallaxbg = ' style="background-image: url('.esc_url( $bg_img ).');background-size: cover; background-repeat: no-repeat;'.$padding_bot.'"';
                $bg_class = ' image-bg';
            }
        }
    } else {
        $bg_class = '';
        $bg_color = $bgcolor ? $bgcolor : '#ffffff';
        if ( $paddingbot != '' ) { $padding_bot = 'padding-bottom:'.$paddingbot.'px'; }else{ $padding_bot = 'padding-bottom:100px;'; }
        $parallaxbg = ' style="background-color: '.$bg_color.';'.$padding_bot.'"';
    }

    $out = '';

    $out .= '<div '.$id.' class="hero-section app'.esc_attr( $particle_class ).''.esc_attr( $bg_class ).'"'.$parallaxbg.'>';
        if ( $overlay_display == 'show' ) {
            $out .= '<div class="overlay" style="background-color:'.$overlaycolor.'"></div>';
        }
        $out .= '<div class="container nopadding">';
            $out .= '<div class="col-md-12">';
                $out .= '<div class="hero-content text-center">';

                    if ( $herologoimg !='' ) {
                        $out .= '<div class="app-img">';
                            $hero_logoimg = wp_get_attachment_url( $herologoimg,'full' );
                            $out .= '<img class="img-circle wow '.$logo_animation.'" src="'.esc_url( $hero_logoimg ).'"  width="80" alt="App Logo" />';
                        $out .= '</div>';
                    }

                    if ( $section_heading !='' || $section_desc !='' ) {
                        $out .= '<div class="app-info wow '.$heading_animation.'">';
                            $out .= '<h1 class="wow '.$heading_animation.'"'.$heading_color.'>'.advent_sanitize_data( $section_heading ).'</h1>';
                            $out .= '<h4 class="wow '.$heading_animation.'"'.$desc_color.'>'.advent_sanitize_data( $section_desc ).'</h4>';
                            $out .= '<i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>';
                            if ( $starcount !='' ) { $out .= '<span>'.esc_html( $starcount ).'</span>'; }
                        $out .= '</div>';
                    }
                    $out .= '<div class="download-buttons wow '.$btn_animation.'">';
                        if ( $appstoreimg !='' ) {
                            $out .= '<a href="'.esc_attr( $herobtn_href1 ).'"'; if ( $herobtn_target1 != '' ) { $out .= ' target="'.$herobtn_target1.'"';}$out .= '>';
                                $appstore_img = wp_get_attachment_url( $appstoreimg,'full' );
                                $out .= '<img src="'.esc_url( $appstore_img ).'" width="150" alt="'.esc_html( $herobtn_title1 ).'" />';
                            $out .= '</a>';
                        }
                        if ( $playstoreimg !='' ) {
                            $out .= '<a href="'.esc_attr( $herobtn_href2 ).'"'; if ( $herobtn_target2 != '' ) { $out .= ' target="'.$herobtn_target2.'"';}$out .= '>';
                                $playstore_img = wp_get_attachment_url( $playstoreimg,'full' );
                                $out .= '<img src="'.esc_url( $playstore_img ).'" width="150" alt="'.esc_html( $herobtn_title2 ).'" />';
                            $out .= '</a>';
                        }
                    $out .= '</div>';
                $out .= '</div>';
            $out .= '</div>';

            if ( $herobottomimg !='' ) {
                $out .= '<div class="col-md-12 wow '.$img_animation.'">';

                $hero_bottomimg = wp_get_attachment_url( $herobottomimg,'full' );
                $out .= '<img class="img-responsive" src="'.esc_url( $hero_bottomimg ).'" alt="Hero Image" />';
                $out .= '</div>';
            }

        $out .= '</div>';
    $out .= '</div>';
return $out;
}
add_shortcode('nt_advent_section_heroapp', 'theme_nt_advent_section_heroapp');

/*-----------------------------------------------------------------------------------*/
/*	HERO 7 COMINGSOON advent
/*-----------------------------------------------------------------------------------*/

function theme_nt_advent_section_herocomingsoon( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "imganimation" => '',
        "herobottomimg" => '',
        "sectionbgcss" => '',
        "right_sectionbg" => '',
        "herologoimg" => '',
        "logoanimation" => '',
        "headinganimation" => '',
        "section_heading" => '',
        "section_desc" => '',
        "starcount" => '',
        "btnanimation" => '',
        "herobtnlink1" => '',
        "appstoreimg" => '',
        "herobtnlink2" => '',
        "playstoreimg" => ''
    ), $atts) );

    $leftsectionbg_img = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
    $rightsectionbg = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $right_sectionbg, ' ' ),  $atts );
    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

    $herobtnlink1 = ( $herobtnlink1 == '||' ) ? '' : $herobtnlink1;
    $herobtnlink1 = vc_build_link( $herobtnlink1 );
    $herobtn_href1 = $herobtnlink1['url'];
    $herobtn_title1 = $herobtnlink1['title'];
    $herobtn_target1 = $herobtnlink1['target'];

    $herobtnlink2 = ( $herobtnlink2 == '||' ) ? '' : $herobtnlink2;
    $herobtnlink2 = vc_build_link( $herobtnlink2 );
    $herobtn_href2 = $herobtnlink2['url'];
    $herobtn_title2 = $herobtnlink2['title'];
    $herobtn_target2 = $herobtnlink2['target'];

    $heading_animation = $headinganimation ? $headinganimation : '';
    $btn_animation = $btnanimation ? $btnanimation : '';
    $img_animation = $imganimation ? $imganimation : '';
    $logo_animation = $logoanimation ? $logoanimation : '';

    $out = '';

    $out .= '<section '.$id.' class="split-home cs-main">';
        $out .= '<section class="left-section wow '.$img_animation.''.esc_attr( $leftsectionbg_img ).'" data-wow-delay="0.3s">';
        $out .= '</section>';

        $out .= '<section class="right-section'.esc_attr( $rightsectionbg ).'">';
            $out .= '<div class="hero-section">';
                $out .= '<div class="hero-content text-center">';

                    if ( $herologoimg !='' ) {
                        $out .= '<div class="app-img">';
                            $hero_logoimg = wp_get_attachment_url( $herologoimg,'full' );
                            $out .= '<img class="img-circle wow '.$logo_animation.'" src="'.esc_url( $hero_logoimg ).'"  width="80" alt="App Logo" />';
                        $out .= '</div>';
                    }

                    if ( $section_heading !='' || $section_desc !='' ) {
                        $out .= '<div class="app-info wow '.$heading_animation.'">';
                            if ( $section_heading !='' ) { $out .= '<h1 class="wow '.$heading_animation.'">'.advent_sanitize_data( $section_heading ).'</h1>'; }
                            if ( $section_desc !='' ) { $out .= '<h4 class="wow '.$heading_animation.'">'.advent_sanitize_data( $section_desc ).'</h4>'; }
                            $out .= '<i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>';
                            if ( $starcount !='' ) { $out .= '<span>'.esc_html( $starcount ).'</span>'; }
                        $out .= '</div>';
                    }

                    if ( $appstoreimg !='' || $playstoreimg !='' ) {
                        $out .= '<div class="download-buttons wow '.$btn_animation.'">';
                            if ( $appstoreimg !='' ) {
                                $out .= '<a href="'.esc_attr( $herobtn_href1 ).'"'; if ( $herobtn_target1 != '' ) { $out .= ' target="'.$herobtn_target1.'"';}$out .= '>';
                                $appstore_img = wp_get_attachment_url( $appstoreimg,'full' );
                                $out .= '<img src="'.esc_url( $appstore_img ).'" width="150" alt="'.esc_html( $herobtn_title1 ).'" />';
                                $out .= '</a>';
                            }
                            if ( $playstoreimg !='' ) {
                                $out .= '<a href="'.esc_attr( $herobtn_href2 ).'"'; if ( $herobtn_target2 != '' ) { $out .= ' target="'.$herobtn_target2.'"';}$out .= '>';
                                $playstore_img = wp_get_attachment_url( $playstoreimg,'full' );
                                $out .= '<img src="'.esc_url( $playstore_img ).'" width="150" alt="'.esc_html( $herobtn_title2 ).'" />';
                                $out .= '</a>';
                            }
                        $out .= '</div>';
                    }

                $out .= '</div>';
            $out .= '</div>';
        $out .= '</section>';
    $out .= '</section>';
    return $out;
}
add_shortcode('nt_advent_section_herocomingsoon', 'theme_nt_advent_section_herocomingsoon');

/*-----------------------------------------------------------------------------------*/
/*	CLIENT advent
/*-----------------------------------------------------------------------------------*/

function theme_nt_advent_section_clients( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "clientloop" => '',
        "item_img" => '',
        "sectionbgcss" => ''
        ), $atts) );

        wp_enqueue_script( 'owl-carousel' );
        wp_enqueue_script( 'nt-advent-carousel-set' );

        $sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
        $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
        $client_loop = (array) vc_param_group_parse_atts($clientloop);

        $out = '';

        $out .= '<div '.$id.' class="client-section'.esc_attr( $sectionbg_css ).'">';
            $out .= '<div class="container text-center">';
                if ( !empty( $client_loop ) ) {
                $out .= '<div class="clients owl-carousel owl-theme">';
                    foreach ( $client_loop as $client ) {
                        if ( isset( $client['item_img'] ) !='' ){
                            $out .= '<div class="single">';
                                $itemimg = wp_get_attachment_url( $client['item_img'],'full' );
                                $out .= '<img src="'.esc_url( $itemimg ).'" alt="Image" />';
                            $out .= '</div>';
                        }
                    }
                $out .= '</div>';
                }
            $out .= '</div>';
        $out .= '</div>';

    return $out;
}
add_shortcode('nt_advent_section_clients', 'theme_nt_advent_section_clients');

/*-----------------------------------------------------------------------------------*/
/*	ABOUT advent
/*-----------------------------------------------------------------------------------*/
function theme_nt_advent_section_aboutone( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "heading_display" => '',
        "headinganimation" => '',
        "section_heading" => '',
        "section_desc" => '',
        "item_column" => '',
        "desk_column" => '',
        "desk_column_offset"=> '',
        "mob_column" => '',
        "itemanimation" => '',
        "aboutloop" => '',
        "istype" => '',
        "icon_two" => '',
        "icon_name" => '',
        "item_title" => '',
        "item_desc" => '',
        "sectionbgcss" => '',
        "tcolor" => '',
        "tsize" => '',
        "tlineh" => '',
        "dcolor" => '',
        "dsize" => '',
        "dlineh" => '',
        "icolor" => '',
        "isize" => '',
        "ibg" => '',
        "itcolor" => '',
        "itsize" => '',
        "itlineh" => '',
        "idcolor" => '',
        "idsize" => '',
        "idlineh" => '',
    ), $atts) );

    $sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
    $about_loop = (array) vc_param_group_parse_atts($aboutloop);

    $heading_animation = $headinganimation ? $headinganimation : '';
    $item_animation = $itemanimation ? $itemanimation : '';

    $out = '';

    $out .= '<div '.$id.' class="pitch text-center'.esc_attr( $sectionbg_css ).'">';
        $out .= '<div class="container">';
            $headingdisplay = $heading_display ? $heading_display : 'show';
            if ( $headingdisplay !='hide' ) {
                $out .= '<div class="pitch-intro">';
                    if ( $section_heading !='' ) {
                        $t_color = ( $tcolor !='' ) ? ' color:'.esc_attr( $tcolor ).';' : '';
                        $t_size = ( $tsize  !='' ) ? ' font-size:'.esc_attr( $tsize ).';' : '';
                        $t_lineh = ( $tlineh !='' ) ? ' line-height:'.esc_attr( $tlineh ).';' : '';
                        $titlestyle = ( $t_color   !='' || $t_size !='' || $t_lineh !='' ) ? ' style="'.$t_color.$t_size.$t_lineh.'"' : '';
                        $out .= '<h1 class="wow '.$heading_animation.'" data-wow-delay="0.2s" '.$titlestyle.'>'.advent_sanitize_data( $section_heading ).'</h1>';
                    }
                    if ( $section_desc !='' ) {
                        $d_color = ( $dcolor !='' ) ? ' color:'.esc_attr( $dcolor ).';' : '';
                        $d_size = ( $dsize  !='' ) ? ' font-size:'.esc_attr( $dsize ).';' : '';
                        $d_lineh = ( $dlineh !='' ) ? ' line-height:'.esc_attr( $dlineh ).';' : '';
                        $descstyle = ( $d_color   !='' || $d_size !='' || $d_lineh !='' ) ? ' style="'.$d_color.$d_size.$d_lineh.'"' : '';
                        $out .= '<p class="wow '.$heading_animation.'" data-wow-delay="0.2s" '.$descstyle.'>'.advent_sanitize_data( $section_desc ).'</p>';
                    }
                $out .= '</div>';
            }
            $out .= '<div class="col-md-12">';
                if ( $item_column !='custom' ) {
                    $itemcolumntotal = $item_column ? $item_column : 'col-md-4';
                }
                if ( $item_column =='custom' ) {
                $deskcolumn = $desk_column ? $desk_column : 'col-md-4';
                $deskcolumn_offset = $desk_column_offset ? $desk_column_offset : '';
                $mobcolumn = $mob_column ? $mob_column : '';
                $itemcolumn =  ''.esc_attr( $deskcolumn ).' '.esc_attr( $deskcolumn_offset ).' '.esc_attr( $mobcolumn ).'';
                $itemcolumntotal = preg_replace('/\s\s+/', ' ', $itemcolumn);
                }
                $count = 2;
                foreach ( $about_loop as $about ) {
                    $istype=isset( $about['istype'] ) !='' ? $about['istype'] : '';

                    $out .= '<div class="'.$itemcolumntotal.' wow '.$item_animation.'" data-wow-delay="0.'.$count++.'s">';
                        if ( isset( $about['icon_name'] ) !='' || isset( $about['icon_two'] ) !='' ){
                            $i_color = ( $icolor !='' ) ? ' color:'.esc_attr( $icolor ).';' : '';
                            $i_size = ( $isize  !='' ) ? ' font-size:'.esc_attr( $isize ).';' : '';
                            $i_bgc = ( $ibg !='' ) ? ' style="background:'.esc_attr( $ibg ).'";' : '';
                            $iconstyle = ( $i_color   !='' || $i_size !='' ) ? ' style="'.$i_color.$i_size.'"' : '';
                            $out .= '<div class="pitch-icon" '.$i_bgc.'>';
                                if($istype != 'iconlist'){
                                    $out .= '<i class="'.$about['icon_name'].'" '.$iconstyle.'></i>';
                                }else{
                                    $out .= '<i class="'.$about['icon_two'].'" '.$iconstyle.'></i>';
                                }
                            $out .= '</div>';
                        }
                        $out .= '<div class="pitch-content">';
                            if ( isset( $about['item_title'] ) !='' ){
                                $it_color = ( $itcolor !='' ) ? ' color:'.esc_attr( $itcolor ).';' : '';
                                $it_size = ( $itsize  !='' ) ? ' font-size:'.esc_attr( $itsize ).';' : '';
                                $it_lineh = ( $itlineh !='' ) ? ' line-height:'.esc_attr( $itlineh ).';' : '';
                                $ititlestyle = ( $it_color !='' || $it_size !='' || $it_lineh !='' ) ? ' style="'.$it_color.$it_size.$it_lineh.'"' : '';
                                $out .= '<h1 '.$ititlestyle.'>'.$about['item_title'].'</h1>';
                            }
                            if ( isset( $about['item_desc'] ) !='' ){
                                $id_color = ( $idcolor !='' ) ? ' color:'.esc_attr( $idcolor ).';' : '';
                                $id_size = ( $idsize !='' ) ? ' font-size:'.esc_attr( $idsize ).';' : '';
                                $id_lineh = ( $idlineh !='' ) ? ' line-height:'.esc_attr( $idlineh ).';' : '';
                                $idescstyle = ( $id_color !='' || $id_size !='' || $id_lineh !='' ) ? ' style="'.$id_color.$id_size.$id_lineh.'"' : '';
                                $out .= '<p '.$idescstyle.'>'.$about['item_desc'].'</p>';
                            }
                        $out .= '</div>';
                    $out .= '</div>';
                }
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';

return $out;
}
add_shortcode('nt_advent_section_aboutone', 'theme_nt_advent_section_aboutone');

/*-----------------------------------------------------------------------------------*/
/*	FEATURES advent
/*-----------------------------------------------------------------------------------*/
function theme_nt_advent_section_features( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "heading_display" => '',
        "section_heading" => '',
        "section_desc" => '',
        "headinganimation" => '',
        "featuresleftloop" => '',
        "l_itemanimation" => '',
        "l_icon_name" => '',
        "istype" => '',
        "icon_two" => '',
        "l_item_title" => '',
        "l_item_desc" => '',
        "device_image" => '',
        "imganimation" => '',
        "featuresrightloop" => '',
		"r_istype" => '',
        "r_itemanimation" => '',
        "r_icon_name" => '',
        "r_item_title" => '',
        "r_item_desc" => '',
        "sectionbgcss" => '',
        "tcolor" => '',
        "tsize" => '',
        "tlineh" => '',
        "dcolor" => '',
        "dsize" => '',
        "dlineh" => '',
        "icolor" => '',
        "isize" => '',
        "ibg" => '',
        "itcolor" => '',
        "itsize" => '',
        "itlineh" => '',
        "idcolor" => '',
        "idsize" => '',
        "idlineh" => '',
	), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$features_leftloop = (array) vc_param_group_parse_atts($featuresleftloop);
	$features_rightloop = (array) vc_param_group_parse_atts($featuresrightloop);

	$heading_animation = $headinganimation ? $headinganimation : '';
	$img_animation = $imganimation ? $imganimation : '';
	$l_item_animation = $l_itemanimation ? $l_itemanimation : '';
	$r_item_animation = $r_itemanimation ? $r_itemanimation : '';

        $out = '';
        $out .= '<div '.$id.' class="app-features text-center'.esc_attr( $sectionbg_css ).'">';
            $out .= '<div class="container">';

                $headingdisplay = $heading_display ? $heading_display : 'show';

                if ( $headingdisplay !='hide' ) {

                    if ( $section_heading !='' ) {
                    $t_color = ( $tcolor !='' ) ? ' color:'.esc_attr( $tcolor ).';' : '';
                    $t_size  = ( $tsize  !='' ) ? ' font-size:'.esc_attr( $tsize ).';' : '';
                    $t_lineh = ( $tlineh !='' ) ? ' line-height:'.esc_attr( $tlineh ).';' : '';
                    $titlestyle = ( $t_color   !='' || $t_size !='' || $t_lineh !='' ) ? ' style="'.$t_color.$t_size.$t_lineh.'"' : '';
                    $out .= '<h1 class="wow '.$heading_animation.'" data-wow-delay="0.1s" '.$titlestyle.'>'.advent_sanitize_data( $section_heading ).'</h1>';
                    }

                    if ( $section_desc !='' ) {
                    $d_color = ( $dcolor !='' ) ? ' color:'.esc_attr( $dcolor ).';' : '';
                    $d_size  = ( $dsize  !='' ) ? ' font-size:'.esc_attr( $dsize ).';' : '';
                    $d_lineh = ( $dlineh !='' ) ? ' line-height:'.esc_attr( $dlineh ).';' : '';
                    $descstyle = ( $d_color   !='' || $d_size !='' || $d_lineh !='' ) ? ' style="'.$d_color.$d_size.$d_lineh.'"' : '';
                    $out .= '<p class="wow '.$heading_animation.'" data-wow-delay="0.2s" '.$descstyle.'>'.advent_sanitize_data( $section_desc ).'</p>';
                    }

                }

                $out .= '<div class="col-md-4 features-left">';

                    foreach ( $features_leftloop as $fl ) {

                        $out .= '<div class="col-md-12 wow '.$l_item_animation.'" data-wow-delay="0.2s">';

                        if ( isset( $fl['l_icon_name'] ) OR  isset( $fl['icon_two'] ) OR  isset( $fl['l_icon_image'] ) !='' ){

                            $i_color = ( $icolor !='' ) ? ' color:'.esc_attr( $icolor ).';' : '';
                            $i_size = ( $isize  !='' ) ? ' font-size:'.esc_attr( $isize ).';' : '';
                            $i_bgc = ( $ibg !='' ) ? ' style="background:'.esc_attr( $ibg ).'";' : '';
                            $iconstyle = ( $i_color   !='' || $i_size !='' ) ? ' style="'.$i_color.$i_size.'"' : '';

                            $out .= '<div class="icon" '.$i_bgc.'>';

                                $istype=isset( $fl['istype'] ) !='' ? $fl['istype'] : '';

                                if ($istype =='iconlist'){

                                    $out .= '<i class="'.$fl['icon_two'].'" '.$iconstyle.'></i>';

                                } elseif ($istype =='iconimg'){

                                    $iconimgurl = wp_get_attachment_url( $fl['l_icon_image'], '100' );
                                    $out .= '<img src="'.$iconimgurl.'" >';

                                } else {

                                    $out .= '<i class="'.$fl['l_icon_name'].'" '.$iconstyle.'></i>';
                                }

                            $out .= '</div>';

                        }

                        $out .= '<div class="feature-single">';
                            if ( isset( $fl['l_item_title'] ) !='' ){
                                $it_color = ( $itcolor !='' ) ? ' color:'.esc_attr( $itcolor ).';' : '';
                                $it_size  = ( $itsize  !='' ) ? ' font-size:'.esc_attr( $itsize ).';' : '';
                                $it_lineh = ( $itlineh !='' ) ? ' line-height:'.esc_attr( $itlineh ).';' : '';
                                $ititlestyle = ( $it_color   !='' || $it_size !='' || $it_lineh !='' ) ? ' style="'.$it_color.$it_size.$it_lineh.'"' : '';
                                $out .= '<h1 '.$ititlestyle.'>'.$fl['l_item_title'].'</h1>';
                            }
                            if ( isset( $fl['l_item_desc'] ) !='' ){
                                $id_color = ( $idcolor !='' ) ? ' color:'.esc_attr( $idcolor ).';' : '';
                                $id_size  = ( $idsize  !='' ) ? ' font-size:'.esc_attr( $idsize ).';' : '';
                                $id_lineh = ( $idlineh !='' ) ? ' line-height:'.esc_attr( $idlineh ).';' : '';
                                $idescstyle = ( $id_color   !='' || $id_size !='' || $id_lineh !='' ) ? ' style="'.$id_color.$id_size.$id_lineh.'"' : '';
                                $out .= '<p '.$descstyle.'>'.$fl['l_item_desc'].'</p>';
                            }
                        $out .= '</div>';
                    $out .= '</div>';
                }
                $out .= '</div>';

                $out .= '<div class="col-md-4 wow '.$img_animation.'" data-wow-delay="0.5s">';
                    if ( $device_image !='' ) {
                        $deviceimage = wp_get_attachment_url( $device_image,'full' );
                        $out .= '<img class="img-responsive" src="'.esc_url( $deviceimage ).'" alt="App" />';
                    }
                $out .= '</div>';

                $out .= '<div class="col-md-4 features-left">';

                    foreach ( $features_rightloop as $fr ) {

                        $out .= '<div class="col-md-12 wow '.$r_item_animation.'" data-wow-delay="0.2s">';

                            if ( isset( $fr['r_icon_name'] ) || isset( $fr['r_icon_two'] ) || isset( $fr['r_icon_image'] ) !='' ){

                                $i_color  = ( $icolor !='' ) ? ' color:'.esc_attr( $icolor ).';' : '';
                                $i_size = ( $isize  !='' ) ? ' font-size:'.esc_attr( $isize ).';' : '';
                                $i_bgc  = ( $ibg !='' ) ? ' style="background:'.esc_attr( $ibg ).'";' : '';
                                $iconstyle   = ( $i_color   !='' || $i_size !='' ) ? ' style="'.$i_color.$i_size.'"' : '';

                                $out .= '<div class="icon" '.$i_bgc.'>';

                                    $r_istype=isset( $fr['r_istype'] ) !='' ? $fr['r_istype'] : '';

                                    if ($r_istype =='iconlist'){

                                        $out .= '<i class="'.$fr['r_icon_two'].'" '.$iconstyle.'></i>';

                                    } elseif ($r_istype =='iconimg'){

                                        $iconimgurl = wp_get_attachment_url( $fr['r_icon_image'], '100' );
                                        $out .= '<img src="'.$iconimgurl.'" >';

                                    } else {

                                        $out .= '<i class="'.$fr['r_icon_name'].'" '.$iconstyle.'></i>';
                                    }

                                $out .= '</div>';

                            }

                            $out .= '<div class="feature-single">';
                            if ( isset( $fr['r_item_title'] ) !='' ){
                            $it_color = ( $itcolor !='' ) ? ' color:'.esc_attr( $itcolor ).';' : '';
                            $it_size  = ( $itsize  !='' ) ? ' font-size:'.esc_attr( $itsize ).';' : '';
                            $it_lineh = ( $itlineh !='' ) ? ' line-height:'.esc_attr( $itlineh ).';' : '';
                            $ititlestyle = ( $it_color   !='' || $it_size !='' || $it_lineh !='' ) ? ' style="'.$it_color.$it_size.$it_lineh.'"' : '';
                            $out .= '<h1 '.$ititlestyle.'>'.$fr['r_item_title'].'</h1>';
                            }
                            if ( isset( $fr['r_item_desc'] ) !='' ){
                            $id_color = ( $idcolor !='' ) ? ' color:'.esc_attr( $idcolor ).';' : '';
                            $id_size  = ( $idsize  !='' ) ? ' font-size:'.esc_attr( $idsize ).';' : '';
                            $id_lineh = ( $idlineh !='' ) ? ' line-height:'.esc_attr( $idlineh ).';' : '';
                            $idescstyle = ( $id_color   !='' || $id_size !='' || $id_lineh !='' ) ? ' style="'.$id_color.$id_size.$id_lineh.'"' : '';

                            $out .= '<p '.$descstyle.'>'.$fr['r_item_desc'].'</p>';
                            }
                            $out .= '</div>';
                        $out .= '</div>';

                    }

                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    return $out;
}
add_shortcode('nt_advent_section_features', 'theme_nt_advent_section_features');

/*-----------------------------------------------------------------------------------*/
/*	SUBFEATURES advent
/*-----------------------------------------------------------------------------------*/

function theme_nt_advent_section_subfeatures( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "section_heading" => '',
        "headinganimation" => '',
        "downloadlink" => '',
        "btn_type" => '',
        "btnanimation" => '',
        "headingcolor" => '',
        "bgimg" => '',
        "bgcolor" => '',
        "parallax" => '',
        "overlay_display" => '',
        "gradient_display" => '',
        "overlaycolor" => ''
    ), $atts) );

    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

    $downloadlink = ( $downloadlink == '||' ) ? '' : $downloadlink;
    $downloadlink = vc_build_link( $downloadlink );
    $download_href = $downloadlink['url'];
    $download_title = $downloadlink['title'];
    $download_target = $downloadlink['target'];
    $btntype = $btn_type ? $btn_type : 'rectangle';

    $heading_animation = $headinganimation ? $headinganimation : '';
    $btn_animation = $btnanimation ? $btnanimation : '';

    if ( $headingcolor != '' ) { $heading_color = ' style="color:'.$headingcolor.'"'; } else{ $heading_color = ''; }

    if ( $bgimg !='' ) {
        if ( $parallax == 'show' ) {
            wp_enqueue_script( 'device' );
            wp_enqueue_script( 'stellar' );
            wp_enqueue_script( 'nt-advent-parallax-set' );
            $bg_class = ' parallax img-bg';
            $bg_img = wp_get_attachment_url( $bgimg,'full' );
            $parallaxbg = ' data-stellar-background-ratio="0.5" data-stellar-vertical-offset="50" data-stellar-offset-parent="true" style="background-image: url('.esc_url( $bg_img ).'); background-size: cover;background-attachment: fixed; background-position: 50% 50%; background-repeat: no-repeat;"';
        } else {
            if ( $bgimg !='' ) {
                $bg_img = wp_get_attachment_url( $bgimg,'full' );
                $parallaxbg = ' style="background-image: url('.esc_url( $bg_img ).');background-size: cover; background-repeat: no-repeat;"';
                $bg_class = ' img-bg';
            }
        }
    } else {
        $bg_class = '';
        $bg_color = $bgcolor ? $bgcolor : '#ffffff';
        $parallaxbg = ' style="background-color: '.$bg_color.';"';
    }
    $gradient = $gradient_display == 'hide' ? ' grad-hide' : '';
    $out = '';

    $out .= '<div '.$id.' class="sub-features software'.esc_attr( $bg_class ).'"'.$parallaxbg.'>';
        if ( $overlay_display == 'show' ) {
            $out .= '<div class="overlay" style="background-color:'.$overlaycolor.'"></div>';
        }
        $out .= '<div class="feature-sub'.$gradient.'">';
            $out .= '<div class="container">';
                $out .= '<div class="sub-inner">';
                    if ( $section_heading !='' ) { $out .= '<h1 class="wow '.$heading_animation.'" data-wow-delay="0.1s"'.$heading_color.'>'.advent_sanitize_data( $section_heading ).'</h1>'; }
                    if ( $download_title !='' ) {
                        $out .= '<a href="'.esc_attr( $download_href ).'" '; if ( $download_target != '' ) { $out .= ' target="'.$download_target.'"';}$out .= 'class="btn btn-action wow '.$btn_animation.' '.$btntype.'" data-wow-delay="0.2s">'.esc_html( $download_title ).'</a>';
                    }
                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';

    return $out;
}
add_shortcode('nt_advent_section_subfeatures', 'theme_nt_advent_section_subfeatures');

/*-----------------------------------------------------------------------------------*/
/*	FEATURES TWO advent
/*-----------------------------------------------------------------------------------*/

function theme_nt_advent_section_featurestwo( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "listsection" => '',
        "leftimage" => '',
        "imganimation" => '',
        "section_heading" => '',
        "section_desc" => '',
        "headinganimation" => '',
        "featurestwoloop" => '',
        "features" => '',
        "sectionbgcss" => '',
        "tcolor" => '',
        "tsize" => '',
        "tlineh" => '',
        "dcolor" => '',
        "dsize" => '',
        "dlineh" => '',
        "itcolor" => '',
        "itsize" => '',
        "itlineh" => '',
    ), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$featurestwo_loop = (array) vc_param_group_parse_atts($featurestwoloop);

	$heading_animation = $headinganimation ? $headinganimation : '';
	$img_animation = $imganimation ? $imganimation : '';

	$out = '';
    if ( $listsection =='normal' ) {
        $out .= '<div '.$id.' class="software'.esc_attr( $sectionbg_css ).'">';
            $out .= '<div class="features">';
                $out .= '<div class="container">';
                    $out .= '<div class="features-inner">';
                        $out .= '<div class="col-md-6">';
                            if ( $leftimage !='' ) {
                                $left_image = wp_get_attachment_url( $leftimage,'full' );
                                $out .= '<img class="img-responsive wow '.$img_animation.'" data-wow-delay="0.2s" src="'.esc_url( $left_image ).'" alt="Features" />';
                            }
                        $out .= '</div>';
                        $out .= '<div class="col-md-5 col-md-offset-1 nopadding">';
                            $out .= '<div class="features-list">';
                                if ( $section_heading !='' ) {
                                    $t_color = ( $tcolor !='' ) ? ' color:'.esc_attr( $tcolor ).';' : '';
                                    $t_size  = ( $tsize  !='' ) ? ' font-size:'.esc_attr( $tsize ).';' : '';
                                    $t_lineh = ( $tlineh !='' ) ? ' line-height:'.esc_attr( $tlineh ).';' : '';
                                    $titlestyle = ( $t_color   !='' || $t_size !='' || $t_lineh !='' ) ? ' style="'.$t_color.$t_size.$t_lineh.'"' : '';
                                    $out .= '<h1 class="wow '.$heading_animation.'" data-wow-delay="0.1s" '.$titlestyle.'>'.advent_sanitize_data( $section_heading ).'</h1>';
                                }
                                if ( $section_desc !='' ) {
                                    $d_color = ( $dcolor !='' ) ? ' color:'.esc_attr( $dcolor ).';' : '';
                                    $d_size  = ( $dsize  !='' ) ? ' font-size:'.esc_attr( $dsize ).';' : '';
                                    $d_lineh = ( $dlineh !='' ) ? ' line-height:'.esc_attr( $dlineh ).';' : '';
                                    $descstyle = ( $d_color   !='' || $d_size !='' || $d_lineh !='' ) ? ' style="'.$d_color.$d_size.$d_lineh.'"' : '';
                                    $out .= '<p class="wow '.$heading_animation.'" data-wow-delay="0.2s" '.$descstyle.'>'.advent_sanitize_data( $section_desc ).'</p>';
                                }

                                $out .= '<ul class="wow '.$heading_animation.'" data-wow-delay="0.3s">';
                                    foreach ( $featurestwo_loop as $ftwo ) {
                                        $it_color = ( $itcolor !='' ) ? ' color:'.esc_attr( $itcolor ).';' : '';
                                        $it_size  = ( $itsize  !='' ) ? ' font-size:'.esc_attr( $itsize ).';' : '';
                                        $it_lineh = ( $itlineh !='' ) ? ' line-height:'.esc_attr( $itlineh ).';' : '';
                                        $ititlestyle = ( $it_color   !='' || $it_size !='' || $it_lineh !='' ) ? ' style="'.$it_color.$it_size.$it_lineh.'"' : '';
                                        if ( isset( $ftwo['features'] ) !='' ){ $out .= '<li '.$ititlestyle.'>'.$ftwo['features'].'</li>'; }
                                    }
                                $out .= '</ul>';
                            $out .= '</div>';
                        $out .= '</div>';
                    $out .= '</div>';
                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    }
    else {
        $out .= '<div '.$id.' class="signup split-features'.esc_attr( $sectionbg_css ).'">';
            $out .= '<div class="col-md-6 nopadding">';
                $out .= '<div class="split-image">';
                    if ( $leftimage !='' ) {
                        $left_image = wp_get_attachment_url( $leftimage,'full' );
                        $out .= '<img class="img-responsive wow '.$img_animation.'" data-wow-delay="0.2s" src="'.esc_url( $left_image ).'" alt="Features" />';
                    }
                $out .= '</div>';
            $out .= '</div>';
            $out .= '<div class="col-md-6 nopadding">';
                $out .= '<div class="split-content">';
                    if ( $section_heading !='' ) {
                        $t_color = ( $tcolor !='' ) ? ' color:'.esc_attr( $tcolor ).';' : '';
                        $t_size  = ( $tsize  !='' ) ? ' font-size:'.esc_attr( $tsize ).';' : '';
                        $t_lineh = ( $tlineh !='' ) ? ' line-height:'.esc_attr( $tlineh ).';' : '';
                        $titlestyle = ( $t_color   !='' || $t_size !='' || $t_lineh !='' ) ? ' style="'.$t_color.$t_size.$t_lineh.'"' : '';
                        $out .= '<h1 class="wow '.$heading_animation.'" data-wow-delay="0.1s" '.$titlestyle.'>'.advent_sanitize_data( $section_heading ).'</h1>';
                    }
                    if ( $section_desc !='' ) {
                        $d_color = ( $dcolor !='' ) ? ' color:'.esc_attr( $dcolor ).';' : '';
                        $d_size  = ( $dsize  !='' ) ? ' font-size:'.esc_attr( $dsize ).';' : '';
                        $d_lineh = ( $dlineh !='' ) ? ' line-height:'.esc_attr( $dlineh ).';' : '';
                        $descstyle = ( $d_color   !='' || $d_size !='' || $d_lineh !='' ) ? ' style="'.$d_color.$d_size.$d_lineh.'"' : '';
                        $out .= '<p class="wow '.$heading_animation.'" data-wow-delay="0.2s" '.$descstyle.'>'.advent_sanitize_data( $section_desc ).'</p>';
                    }
                    $out .= '<ul class="wow '.$heading_animation.'" data-wow-delay="0.3s">';
                        foreach ( $featurestwo_loop as $ftwo ) {
                            if ( isset( $ftwo['features'] ) !='' ){
                                $it_color = ( $itcolor !='' ) ? ' color:'.esc_attr( $itcolor ).';' : '';
                                $it_size  = ( $itsize  !='' ) ? ' font-size:'.esc_attr( $itsize ).';' : '';
                                $it_lineh = ( $itlineh !='' ) ? ' line-height:'.esc_attr( $itlineh ).';' : '';
                                $ititlestyle = ( $it_color   !='' || $it_size !='' || $it_lineh !='' ) ? ' style="'.$it_color.$it_size.$it_lineh.'"' : '';
                                $out .= '<li '.$ititlestyle.'>'.$ftwo['features'].'</li>';
                            }
                        }
                    $out .= '</ul>';
                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    }

return $out;
}
add_shortcode('nt_advent_section_featurestwo', 'theme_nt_advent_section_featurestwo');

/*-----------------------------------------------------------------------------------*/
/*	FEATURES ICON advent
/*-----------------------------------------------------------------------------------*/

function theme_nt_advent_section_featuresicon( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "section_heading" => '',
        "section_desc" => '',
        "headinganimation" => '',
        "item_column" => '',
        "desk_column" => '',
        "desk_column_offset"=> '',
        "mob_column" => '',
        "itemanimation" => '',
        "featuresiconloop" => '',
        "icon_name" => '',
        "item_title" => '',
        "item_desc" => '',
        "sectionbgcss" => ''
    ), $atts) );

    $sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
    $featuresicon_loop = (array) vc_param_group_parse_atts($featuresiconloop);

    $heading_animation = $headinganimation ? $headinganimation : '';
    $item_animation = $itemanimation ? $itemanimation : '';

    $out = '';

    $out .= '<div '.$id.' class="icon-features'.esc_attr( $sectionbg_css ).'">';
        $out .= '<div class="container nopadding">';
            if ( $section_heading !='' || $section_desc !='' ) {
            $out .= '<div class="icon-features-intro">';
                if ( $section_heading !='' ) { $out .= '<h1 class="wow '.$heading_animation.'">'.advent_sanitize_data( $section_heading ).'</h1>'; }
                if ( $section_desc !='' ) { $out .= '<p class="wow '.$heading_animation.'">'.advent_sanitize_data( $section_desc ).'</p>'; }
            $out .= '</div>';
            }
            if ( $item_column !='custom' ) {
                $itemcolumntotal = $item_column ? $item_column : 'col-md-4';
            }
            if ( $item_column =='custom' ) {
                $deskcolumn = $desk_column ? $desk_column : 'col-md-4';
                $deskcolumn_offset = $desk_column_offset ? $desk_column_offset : '';
                $mobcolumn = $mob_column ? $mob_column : '';
                $itemcolumn =  ''.esc_attr( $deskcolumn ).' '.esc_attr( $deskcolumn_offset ).' '.esc_attr( $mobcolumn ).'';
                $itemcolumntotal = preg_replace('/\s\s+/', ' ', $itemcolumn);
            }

            foreach ( $featuresicon_loop as $ficon ) {
                $out .= '<div class="'.$itemcolumntotal.' wow '.$item_animation.'">';
                    $out .= '<div class="f-single">';
                        $out .= '<div class="f-icon">';
                            if ( $ficon['icon_type'] !='iconlist' and $ficon['icon_name'] !='' ){$out .= '<i class="'.$ficon['icon_name'].'"></i>';}
                            if ( $ficon['icon_type'] =='iconlist' and $ficon['icon_names'] !='' ){$out .= '<i class="'.$ficon['icon_names'].'"></i>';}
                        $out .= '</div>';
                        $out .= '<div class="f-content">';
                            if ( isset( $ficon['item_title'] ) !='' ){ $out .= '<h2>'.$ficon['item_title'].'</h2>'; }
                            if ( isset( $ficon['item_desc'] ) !='' ){ $out .= '<p>'.$ficon['item_desc'].'</p>'; }
                        $out .= '</div>';
                    $out .= '</div>';
                $out .= '</div>';
            }
        $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('nt_advent_section_featuresicon', 'theme_nt_advent_section_featuresicon');


/*-----------------------------------------------------------------------------------*/
/*	COUNTNUMBER advent
/*-----------------------------------------------------------------------------------*/
function theme_nt_advent_section_countnumber( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "item_column" => '',
        "desk_column" => '',
        "desk_column_offset"=> '',
        "mob_column" => '',
        "itemanimation" => '',
        "countnumberloop" => '',
        "icon_name" => '',
        "item_number" => '',
        "item_title" => '',
        "sectionbgcss" => ''
    ), $atts) );

    $sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
    $countnumber_loop = (array) vc_param_group_parse_atts($countnumberloop);

    $item_animation = $itemanimation ? $itemanimation : '';
    $out = '';
    $out .= '<div '.$id.' class="counter-section'.esc_attr( $sectionbg_css ).'">';
        $out .= '<div class="container">';
            $out .= '<div class="row text-center">';

                if ( $item_column !='custom' ) {
                    $itemcolumntotal = $item_column ? $item_column : 'col-sm-3 col-xs-6';
                }
                if ( $item_column =='custom' ) {
                    $deskcolumn = $desk_column ? $desk_column : 'col-md-3';
                    $deskcolumn_offset = $desk_column_offset ? $desk_column_offset : '';
                    $mobcolumn = $mob_column ? $mob_column : '';
                    $itemcolumn =  ''.esc_attr( $deskcolumn ).' '.esc_attr( $deskcolumn_offset ).' '.esc_attr( $mobcolumn ).'';
                    $itemcolumntotal = preg_replace('/\s\s+/', ' ', $itemcolumn);
                }

                foreach ( $countnumber_loop as $count ) {
                    $out .= '<div class="'.$itemcolumntotal.' wow '.$item_animation.'">';
                        $out .= '<div class="counter-up">';
                            if ( isset( $count['icon_name'] ) !='' ){
                                $out .= '<div class="counter-icon">';
                                    $out .= '<i class="'.$count['icon_name'].'"></i>';
                                $out .= '</div>';
                            }
                            if ( isset( $count['item_number'] ) !='' ){ $out .= '<h3><span class="counter">'.$count['item_number'].'</span></h3>'; }
                            if ( isset( $count['item_title'] ) !='' ){
                                $out .= '<div class="counter-text">';
                                    $out .= '<h4>'.$count['item_title'].'</h4>';
                                $out .= '</div>';
                            }
                        $out .= '</div>';
                    $out .= '</div>';
                }
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('nt_advent_section_countnumber', 'theme_nt_advent_section_countnumber');

/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIAL advent
/*-----------------------------------------------------------------------------------*/
function theme_nt_advent_section_testimonial( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "testianimation"=> '',
        "testiloop" => '',
        "testi_img" => '',
        "testi_quote" => '',
        "testi_name" => '',
        "testi_job" => '',
        "stars" => '',
        "sectionbgcss" => '',
        "qcolor" => '',
        "qlineh" => '',
        "qsize" => '',
        "ncolor" => '',
        "nlineh" => '',
        "nsize" => '',
        "jcolor" => '',
        "jlineh" => '',
        "jsize" => '',
    ), $atts) );

    wp_enqueue_script( 'owl-carousel' );
    wp_enqueue_script( 'nt-advent-carousel-set' );
    $sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
    $testi_loop = (array) vc_param_group_parse_atts($testiloop);

    $testi_animation = $testianimation ? $testianimation : '';

    $out = '';

    $out .= '<div '.$id.' class="review-section'.esc_attr( $sectionbg_css ).'">';
        $out .= '<div class="container">';
            $out .= '<div class="col-md-10 col-md-offset-1">';
                $out .= '<div class="reviews owl-carousel owl-theme">';
                    foreach ( $testi_loop as $testi ) {
                        $out .= '<div class="review-single">';
                            if ( isset( $testi['testi_img'] ) !='' ){
                                $testiimg = wp_get_attachment_url( $testi['testi_img'],'full' );
                                $out .= '<img class="img-circle" src="'.esc_url( $testiimg ).'" alt="Client" />';
                            }
                            $out .= '<div class="review-text wow '.$testi_animation.'" data-wow-delay="0.2s">';
                                if ( isset( $testi['testi_quote'] ) !='' ){
                                    $q_color = ( $qcolor !='' ) ? ' color:'.esc_attr( $qcolor ).';' : '';
                                    $q_size  = ( $qsize  !='' ) ? ' font-size:'.esc_attr( $qsize ).';' : '';
                                    $q_lineh = ( $qlineh !='' ) ? ' line-height:'.esc_attr( $qlineh ).';' : '';
                                    $quotestyle = ( $q_color   !='' || $q_size !='' || $q_lineh !='' ) ? ' style="'.$q_color.$q_size.$q_lineh.'"' : '';
                                    $out .= '<p '.$quotestyle.'>'.$testi['testi_quote'].'</p>';
                                }
                                if ( isset( $testi['testi_name'] ) !='' ){
                                    $n_color = ( $ncolor !='' ) ? ' color:'.esc_attr( $ncolor ).';' : '';
                                    $n_size  = ( $nsize  !='' ) ? ' font-size:'.esc_attr( $nsize ).';' : '';
                                    $n_lineh = ( $nlineh !='' ) ? ' line-height:'.esc_attr( $nlineh ).';' : '';
                                    $namestyle = ( $n_color   !='' || $n_size !='' || $n_lineh !='' ) ? ' style="'.$n_color.$n_size.$n_lineh.'"' : '';
                                    $out .= '<h3 '.$namestyle.'>'.$testi['testi_name'].'</h3>';
                                }
                                if ( isset( $testi['testi_job'] ) !='' ){
                                    $j_color = ( $jcolor !='' ) ? ' color:'.esc_attr( $jcolor ).';' : '';
                                    $j_size  = ( $jsize  !='' ) ? ' font-size:'.esc_attr( $jsize ).';' : '';
                                    $j_lineh = ( $jlineh !='' ) ? ' line-height:'.esc_attr( $jlineh ).';' : '';
                                    $jobstyle = ( $j_color   !='' || $j_size !='' || $j_lineh !='' ) ? ' style="'.$j_color.$j_size.$j_lineh.'"' : '';
                                    $out .= '<h3 '.$jobstyle.'>'.$testi['testi_job'].'</h3>';
                                }
                                if ( isset( $testi['stars'] ) !='' ){
                                if ( $testi['stars'] == '1' ){$out .= '<i class="ion ion-star"></i>';}
                                if ( $testi['stars'] == '2' ){$out .= '<i class="ion ion-star"></i><i class="ion ion-star"></i>';}
                                if ( $testi['stars'] == '3' ){$out .= '<i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i>';}
                                if ( $testi['stars'] == '4' ){$out .= '<i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i>';}
                                else{$out .= '<i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i>';}
                                }

                            $out .= '</div>';
                        $out .= '</div>';
                    }

                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';

    return $out;
}
add_shortcode('nt_advent_section_testimonial', 'theme_nt_advent_section_testimonial');


/*-----------------------------------------------------------------------------------*/
/*	PRICE TABLE
/*-----------------------------------------------------------------------------------*/
function theme_nt_advent_section_pricing($atts){
    extract(shortcode_atts(array(
        'section_id' => '',
        'heading_display'	=> 'show',
        'secheading' => '',
        'secdescription'	=> '',
        "headinganimation" => '',
        'sectionbgcss' => '',
        "priceanimation" => '',
        'orderby' => 'date',
        'order' => 'DESC',
        'post_number'  => '4',
        'price_category' => 'all',
        'pricelink' => '',
        'price_btntype'  => '',
        "tcolor" => '',
        "tsize" => '',
        "tlineh" => '',
        "dcolor" => '',
        "dsize" => '',
        "dlineh" => '',
        "icolor" => '',
        "isize" => '',
        "ilineh" => '',
        "ptcolor" => '',
        "ptsize" => '',
        "ptlineh" => '',
        "pacolor" => '',
        "pasize" => '',
        "palineh" => '',
        "pdcolor" => '',
        "pdsize" => '',
        "pdlineh" => '',
        "itcolor" => '',
        "itsize" => '',
        "itlineh" => '',
    ), $atts));

    $pricelink = ( $pricelink == '||' ) ? '' : $pricelink;
    $pricelink = vc_build_link( $pricelink );
    $price_btnhref = $pricelink['url'];
    $price_btntitle = $pricelink['title'];
    $price_btntarget = $pricelink['target'];
    $pricebtntarget = $price_btntarget ? 'target="'.esc_attr( $price_btntarget ).'"' : '';
    $pricebtntype = $price_btntype ? $price_btntype : 'rectangle';
    $heading_animation = $headinganimation ? $headinganimation : '';
    $price_animation = $priceanimation ? $priceanimation : '';

    global $post;
    $args = array(
        'post_type' => 'price',
        'posts_per_page' => $post_number,
        'order' => $order,
        'orderby' => $orderby,
        'post_status' => 'publish'
    );
    if( $price_category != 'all' ){
        $str = $price_category;
        $arr = explode(',', $str);
        $args['tax_query'][] = array( 'taxonomy' => 'price_category', 'field' => 'slug', 'terms' => $arr );
    }

    $sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

    $out = '';

    $out .= '<div '.$id.' class="pricing-section text-center'.esc_attr( $sectionbg_css ).'">';
        $out .= '<div class="container">';
            $out .= '<div class="col-md-12 col-sm-12 nopadding">';
                if ( $heading_display != 'hide' ){
                    $out .= '<div class="pricing-intro">';
                        if ( $secheading !='' ) {
                            $t_color = ( $tcolor !='' ) ? ' color:'.esc_attr( $tcolor ).';' : '';
                            $t_size  = ( $tsize  !='' ) ? ' font-size:'.esc_attr( $tsize ).';' : '';
                            $t_lineh = ( $tlineh !='' ) ? ' line-height:'.esc_attr( $tlineh ).';' : '';
                            $titlestyle = ( $t_color   !='' || $t_size !='' || $t_lineh !='' ) ? ' style="'.$t_color.$t_size.$t_lineh.'"' : '';
                            $out .= '<h1 class="wow '.$heading_animation.'" data-wow-delay="0s" '.$titlestyle.'>'.advent_sanitize_data( $secheading ).'</h1>';
                        }
                        if ( $secdescription !='' ) {
                            $d_color = ( $dcolor !='' ) ? ' color:'.esc_attr( $dcolor ).';' : '';
                            $d_size  = ( $dsize  !='' ) ? ' font-size:'.esc_attr( $dsize ).';' : '';
                            $d_lineh = ( $dlineh !='' ) ? ' line-height:'.esc_attr( $dlineh ).';' : '';
                            $descstyle = ( $d_color   !='' || $d_size !='' || $d_lineh !='' ) ? ' style="'.$d_color.$d_size.$d_lineh.'"' : '';
                            $out .= '<p class="wow '.$heading_animation.'" data-wow-delay="0.2s" '.$descstyle.'>'.advent_sanitize_data( $secdescription ).'</p>';
                        }
                    $out .= '</div>';
                }

                $count = 4;
                $nt_advent_price_query = new WP_Query($args);
                if( $nt_advent_price_query->have_posts() ) :
                    while ($nt_advent_price_query->have_posts()) : $nt_advent_price_query->the_post();

                        $column_mobile	= get_post_meta( get_the_ID(), 'nt_advent_column_mobile', true );
                        $column_desk	= get_post_meta( get_the_ID(), 'nt_advent_column_desk', true );
                        $column_offset	= get_post_meta( get_the_ID(), 'nt_advent_column_offset', true );

                        $packname = get_post_meta( get_the_ID(), 'nt_advent_packname', true );
                        $pack_style = get_post_meta( get_the_ID(), 'nt_advent_packstyle', true );
                        $priceamount	= get_post_meta( get_the_ID(), 'nt_advent_priceamount', true );
                        $pricedesc = get_post_meta( get_the_ID(), 'nt_advent_pricedesc', true );
                        $icon_type = get_post_meta( get_the_ID(), 'nt_advent_icon_type', true );
                        $iconimg = get_post_meta( get_the_ID(), 'nt_advent_iconimg', true );
                        $iconfont = get_post_meta( get_the_ID(), 'nt_advent_iconfont', true );
                        $tablefeatures	= get_post_meta( get_the_ID(), 'nt_advent_features_list', true );

                        $columnmobile = $column_mobile ? $column_mobile : 'col-sm-6';
                        $columndesk = $column_desk ? $column_desk : 'col-md-4';
                        $columnoffset = $column_offset ? $column_offset : '';
                        $packstyle = $pack_style ? $pack_style : '';
                        $col_str = ''.esc_attr( $columnmobile ).' '.esc_attr( $columndesk ).' '.esc_attr( $columnoffset ).'';

                        $out .= '<div class="'.$col_str = preg_replace('/\s\s+/', ' ', $col_str).'">';
                            $out .= '<div class="table-left '.esc_attr( $packstyle ).' wow '.$price_animation.'" data-wow-delay="0.'.$count++.'s">';

                                $out .= '<div class="icon">';
                                    if ( $icon_type !='iconfont' && $iconimg !='' ) {
                                        $icon_img = wp_get_attachment_url( $iconimg,'full' );
                                        $out .= '<img src="'.esc_url( $icon_img ).'" alt="Icon" />';
                                    } else {
                                        $i_color = ( $icolor !='' ) ? ' color:'.esc_attr( $icolor ).';' : '';
                                        $i_size  = ( $isize  !='' ) ? ' font-size:'.esc_attr( $isize ).';' : '';
                                        $i_lineh = ( $ilineh !='' ) ? ' line-height:'.esc_attr( $ilineh ).';' : '';
                                        $iconstyle = ( $i_color   !='' || $i_size !='' || $i_lineh !='' ) ? ' style="'.$i_color.$i_size.$i_lineh.'"' : '';
                                        $out .= '<i class="price-icon '.esc_html( $iconfont ).'" '.$iconstyle.'></i>';
                                    }
                                $out .= '</div>';

                                $out .= '<div class="pricing-details">';
                                    if ( $packname !='' ) {
                                        $pt_color = ( $ptcolor !='' ) ? ' color:'.esc_attr( $ptcolor ).';' : '';
                                        $pt_size  = ( $ptsize  !='' ) ? ' font-size:'.esc_attr( $ptsize ).';' : '';
                                        $pt_lineh = ( $ptlineh !='' ) ? ' line-height:'.esc_attr( $ptlineh ).';' : '';
                                        $ptstyle = ( $pt_color   !='' || $pt_size !='' || $pt_lineh !='' ) ? ' style="'.$pt_color.$pt_size.$pt_lineh.'"' : '';
                                        $out .= '<h2 '.$ptstyle.'>'.esc_html( $packname ).'</h2>';
                                    }
                                    if ( $priceamount !='' ) {
                                        $pa_color = ( $pacolor !='' ) ? ' color:'.esc_attr( $pacolor ).';' : '';
                                        $pa_size  = ( $pasize  !='' ) ? ' font-size:'.esc_attr( $pasize ).';' : '';
                                        $pa_lineh = ( $palineh !='' ) ? ' line-height:'.esc_attr( $palineh ).';' : '';
                                        $pastyle = ( $pa_color   !='' || $pa_size !='' || $pa_lineh !='' ) ? ' style="'.$pa_color.$pa_size.$pa_lineh.'"' : '';
                                        $out .= '<span '.$pastyle.'>'.esc_html( $priceamount ).'</span>';
                                    }
                                    if ( $pricedesc !='' ) {
                                        $pd_color = ( $pdcolor !='' ) ? ' color:'.esc_attr( $pdcolor ).';' : '';
                                        $pd_size  = ( $pdsize  !='' ) ? ' font-size:'.esc_attr( $pdsize ).';' : '';
                                        $pd_lineh = ( $pdlineh !='' ) ? ' line-height:'.esc_attr( $pdlineh ).';' : '';
                                        $pdstyle = ( $pd_color   !='' || $pd_size !='' || $pd_lineh !='' ) ? ' style="'.$pd_color.$pd_size.$pd_lineh.'"' : '';
                                        $out .= '<p '.$pdstyle.'>'.esc_html( $pricedesc ).'</p>';
                                    }

                                    $out .= '<ul>';
                                        foreach ( $tablefeatures as $listitem ) {
                                            $it_color = ( $itcolor !='' ) ? ' color:'.esc_attr( $itcolor ).';' : '';
                                            $it_size  = ( $itsize  !='' ) ? ' font-size:'.esc_attr( $itsize ).';' : '';
                                            $it_lineh = ( $itlineh !='' ) ? ' line-height:'.esc_attr( $itlineh ).';' : '';
                                            $ititlestyle = ( $it_color   !='' || $it_size !='' || $it_lineh !='' ) ? ' style="'.$it_color.$it_size.$it_lineh.'"' : '';
                                            $out .= '<li '.$ititlestyle.'>'.esc_html( $listitem ).'</li>';
                                        }
                                    $out .= '</ul>';
                                    if ( $price_btntitle !='' ) {
                                        $out .= '<a href="'.esc_attr( $price_btnhref ).'" '.$pricebtntarget.' class="btn btn-primary btn-action btn-fill '.esc_attr( $pricebtntype ).'">'.esc_html( $price_btntitle ).'</a>';
                                    }
                                $out .= '</div>';
                            $out .= '</div>';
                        $out .= '</div>';
                    endwhile;
                endif;
                wp_reset_postdata();
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('nt_advent_section_pricing', 'theme_nt_advent_section_pricing');

/*-----------------------------------------------------------------------------------*/
/*	SUBSCRIBE advent
/*-----------------------------------------------------------------------------------*/

function theme_nt_advent_section_subscribe( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "section_id" => '',
        "secheading" => '',
        "secdescription" => '',
        "headinganimation" => '',
        "formanimation" => '',
        "headingcolor" => '',
        "desccolor" => '',
        "bgimg" => '',
        "bgcolor" => '',
        "parallax" => '',
        "overlay_display" => '',
        "overlaycolor" => ''
    ), $atts) );

    $id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

    $heading_animation = $headinganimation ? $headinganimation : '';
    $form_animation = $formanimation ? $formanimation : '';

    if ( $headingcolor != '' ) { $heading_color = ' style="color:'.$headingcolor.'"'; } else{ $heading_color = ''; }
    if ( $desccolor != '' ) { $desc_color = ' style="color:'.$desccolor.'"'; } else{ $desc_color = ''; }

    if ( $bgimg !='' ) {
        if ( $parallax == 'show' ) {
            wp_enqueue_script( 'device' );
            wp_enqueue_script( 'stellar' );
            wp_enqueue_script( 'nt-advent-parallax-set' );
            $bg_class = ' parallax img-bg';
            $bg_img = wp_get_attachment_url( $bgimg,'full' );
            $parallaxbg = ' data-stellar-background-ratio="0.5" data-stellar-vertical-offset="50" data-stellar-offset-parent="true" style="background-image: url('.esc_url( $bg_img ).'); background-size: cover;background-attachment: fixed; background-position: 50% 50%; background-repeat: no-repeat;"';
        } else {
            if ( $bgimg !='' ) {
                $bg_img = wp_get_attachment_url( $bgimg,'full' );
                $parallaxbg = ' style="background-image: url('.esc_url( $bg_img ).');background-size: cover; background-repeat: no-repeat;"';
                $bg_class = ' img-bg';
            }
        }
    } else{
        $bg_class = '';
        $bg_color = $bgcolor ? $bgcolor : '#ffffff';
        $parallaxbg = ' style="background-color: '.$bg_color.';"';
    }

    $out = '';

    $out .= '<div '.$id.' class="cta-sub no-color'.esc_attr( $bg_class ).'"'.$parallaxbg.'>';
        if ( $overlay_display == 'show' ) {
            $out .= '<div class="overlay" style="background-color:'.$overlaycolor.'"></div>';
        }
        $out .= '<div class="container">';
            $out .= '<div class="cta-inner">';
                if ( $secheading !='' ) { $out .= '<h1 class="wow '.$heading_animation.'" data-wow-delay="0s"'.$heading_color.'>'.advent_sanitize_data( $secheading ).'</h1>'; }
                if ( $secdescription !='' ) { $out .= '<p class="wow '.$heading_animation.'" data-wow-delay="0.2s"'.$desc_color.'>'.advent_sanitize_data( $secdescription ).'</p>'; }
                $out .= '<div class="form wow '.$form_animation.'" data-wow-delay="0.3s">';
                    $out .= do_shortcode( $content );
                $out .= '</div>';

            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';

    return $out;
}
add_shortcode('nt_advent_section_subscribe', 'theme_nt_advent_section_subscribe');
