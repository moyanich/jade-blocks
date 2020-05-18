<?php
/**
 * Card V1
 *
 * @author       Amoy Nicholson
 * @since        1.0.0
 * @license  
 * 
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$jade_align = "";

if( !empty($block['align']) ) {
    $jade_align .= ' align' . $block['align'];
}



/* Main Variables */
$jade_image = get_field( 'jade_image' );
$jade_title = get_field( 'jade_title' );
$jade_content = get_field( 'jade_content' );
$jade_link = get_field( 'jade_link' );

/* Card Settings */
$jade_border_radius = get_field('jade_border_radius'); 
$jade_card_background_color = get_field('jade_card_background_color'); 

/* Title Settings */
$jade_title_html_tag = get_field('jade_title_html_tag');
$jade_title_color = get_field('jade_title_color');
$jade_title_color_hover = get_field('jade_title_color_hover');

/* Content Settings */
$jade_excerpt_custom_styles = get_field('jade_excerpt_custom_styles');
$jade_excerpt_color = get_field('jade_excerpt_color');


$styles = get_field('styles');

?>



<div class="jd-card card-v1 <?php echo $jade_align; ?>" <?php echo ($jade_card_background_color ) ? 'style="background-color:'. $jade_card_background_color . '; border-radius:'. $jade_border_radius. 'px; "' : '' ?>>
    <figure class="jd-card__img">
        <?php echo ($jade_image) ? '<img src="' . esc_url($jade_image['url'])  . '">' : '<img src="' . plugins_url() . '/jade-blocks/img/placeholder-image.jpg)">' ?>
    </figure>



    <div class="jd-card__content">
        <div class="jd-card__title">	

        <?php echo esc_attr($color['value']); ?>

        
            <<?php echo ($jade_title_html_tag ) ?  esc_attr($jade_title_html_tag) : 'h3'; ?> <?php echo ($jade_title_color) ? 'style="color:' . $jade_title_color . ';"' : '' ?>><?php echo esc_attr($jade_title) ; ?></<?php echo esc_attr($jade_title_html_tag ) ? $jade_title_html_tag : 'h3'; ?>>
        </div>
        
     
        <?php if( !empty($jade_content )  ): ?>
            <div class="jd-card__text" <?php echo ($jade_excerpt_custom_styles == 1) ? 'style="color:' .  $jade_excerpt_color . ';"' : '' ?>>
                <?php echo $jade_content;  ?>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="margin-top-sm">
        <a class="btn btn--subtle btn--sm" href="#0"><?php echo $jade_link; ?></a>
    </div>
</div>