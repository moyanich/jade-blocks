<?php
/**
 * Block - Hero One
 *
 * @author       Amoy Nicholson
 * @since        1.0.0
 * @license  
 * 
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// create id attribute for specific styling
$jid = $block['id'];
$jade_element = 'jade-element';
$jade_class_name = 'jade-hero-one';

//$jid_card = str_replace("block", $jade_class_name, $jid);
$jade_element = str_replace("block", $jade_element, $jid);

// Create class attribute allowing for custom "className" and "align" values.
if( !empty($block['className']) ) {
    $jade_class_name .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $jade_class_name .= ' align' . $block['align'];
}


/* Main Variables */
$jade_image = get_field( 'jade_image' );
$jade_content = get_field( 'jade_content' );
$jade_title = get_field( 'jade_title' );

$jade_title_html_tag = get_field('jade_title_html_tag');

/* Background Settings */
$jade_hero_background_image = get_field('jade_hero_background_image'); 
$jade_card_background_color = get_field('jade_hero_background_color'); 
//$jade_hero_background_image = get_field('jade_hero_background_image') ?: 295;



/* Content Structure */
/*
$jade_grid_columns = get_field('jade_grid_columns');
$jade_grid_column_gap = get_field('jade_grid_column_gap');
$jade_grid_row_gap = get_field('jade_grid_row_gap');

/* Title Settings */ /*
$jade_custom_title_styles = get_field('jade_custom_title_styles'); 
$jade_title_color = get_field('jade_title_color');
$jade_title_color_hover = get_field('jade_title_color_hover');

/* Excerpt Settings */ /*
$jade_excerpt_custom_styles = get_field('jade_excerpt_custom_styles');
$jade_excerpt_color = get_field('jade_excerpt_color');

/* Image Settings */ /*
$jade_image_styles = get_field('jade_image_styles');

if ($jade_image_styles == 'Rounded') : 
    $jade_image_styles = 'card-rounded';
elseif ($jade_image_styles == 'Circle') :
    $jade_image_styles = 'card-circle';
elseif ($jade_image_styles == 'Square') :
    $jade_image_styles = 'card-square';
endif; */ ?>

<section id="<?php echo esc_attr($jid); ?>" class="jade-section jade-hero hero-1 <?php echo esc_attr($jade_class_name) . ' ' . esc_attr($jade_element); ?>" <?php echo (!empty($jade_hero_background_image) || !empty($jade_card_background_color)) ? 'style="background-image:url(' . esc_url($jade_hero_background_image['url']) . '); background-color:' . $jade_card_background_color . '; margin: 0;"' : '' ?>; >
    <div class="block-hero_background-overlay">
        <div class="block-hero_container">
            <div class="block-hero_wrapper">
                <h1 class="block-hero_heading"></h1>
                <p class="block-hero_text"></p>
                <div>
                    <a class="block-hero_button-1"></a>
                    <a class="block-hero_button-2"></a>
                </div>
            </div>
        </div>   
    </div>
</section>

