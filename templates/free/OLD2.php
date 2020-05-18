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
$jade_custom_title_styles = get_field('jade_custom_title_styles'); 
$jade_title_color = get_field('jade_title_color');
$jade_title_color_hover = get_field('jade_title_color_hover');

/* Content Settings */
$jade_excerpt_custom_styles = get_field('jade_excerpt_custom_styles');
$jade_excerpt_color = get_field('jade_excerpt_color');



?>



<div class="jd-card card-v1" <?php echo ($jade_card_background_color) ? 'style="background-color:'. $jade_card_background_color . '; border-radius:'. $jade_border_radius. 'px; "' : '' ?>>
    <figure class="jd-card__img">
        <?php echo ($jade_image) ? '<img src="' . esc_url($jade_image['url'])  . '">' : '<img src="' . plugins_url() . '/jade-blocks/img/placeholder-image.jpg)">' ?>
    </figure>

    <div class="jd-card__content">
        <?php if( !empty($jade_title_html_tag ) || !empty($jade_title) ): ?>
            <div class="jade-card__title">	
                <<?php echo $jade_title_html_tag; ?> class="jade-card-heading" <?php echo ($jade_custom_title_styles == 1) ? 'style="color:' . $jade_title_color . ';"' : '' ?>><?php echo $jade_title; ?></<?php echo $jade_title_html_tag; ?>>
            </div>
        <?php endif; ?>
     
        <?php if( !empty($jade_content )  ): ?>
            <div class="jade-card-content" <?php echo ($jade_excerpt_custom_styles == 1) ? 'style="color:' .  $jade_excerpt_color . ';"' : '' ?>>
                <?php echo $jade_content;  ?>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="margin-top-sm">
      <a class="btn btn--subtle btn--sm" href="#0">Read more</a>
    </div>
  </div>
</div>