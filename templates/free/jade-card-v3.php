<?php
/**
 * Card V2
 *
 * @author       Amoy Nicholson
 * @since        1.0.0
 * @license  
 * 
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$jade_id = $block['id'];
$jade_class_name = 'card';
$jade_id = str_replace("block", $jade_class_name, $jade_id);

$jade_align = "";

if( !empty($block['align']) ) {
    $jade_align .= ' align' . $block['align'];
}

/* Main Variables */
$jade_image = get_field( 'jade_image' );
$jade_title = get_field( 'jade_title' );
$jade_content = get_field( 'jade_content' );
$jade_linked_card = get_field( 'jade_linked_card' );
$jade_link = get_field( 'jade_link_url' );

/* Card Settings */
$jade_border_radius = get_field('jade_border_radius'); 
$jade_card_overlay_color = get_field('jade_card_overlay_color'); 

/* Title Settings */
$jade_title_html_tag = get_field('jade_title_html_tag');
$jade_title_color = get_field('jade_title_color');
$jade_title_color_hover = get_field('jade_title_color_hover');

/* Content Settings */
$jade_excerpt_custom_styles = get_field('jade_excerpt_custom_styles');
$jade_excerpt_color = get_field('jade_excerpt_color');

/* Button Settings */
$jade_button_color = get_field('jade_button_color');
$jade_button_color_hover = get_field('jade_button_color_hover');

?>


<?php echo ($jade_linked_card == 1) ? '<a class="jd-card jd-card__v3" href=" ' . $jade_link . '">'  : '<div class="jd-card jd-card__v3">'; ?>
    <figure>
        <?php echo ($jade_image) ? '<img src="' . esc_url($jade_image['url'])  . '">' : '<img src="' . plugins_url() . '/jade-blocks/img/placeholder-image.jpg)">' ?>
        <figcaption class="jd-card__caption text-center">
            <div class="jd-card__text">
                <<?php echo ($jade_title_html_tag ) ?  esc_attr($jade_title_html_tag) : 'h3'; ?> class="jd-card__title" <?php echo ($jade_title_color) ? 'style="color:' . $jade_title_color . ';"' : '' ?>><?php echo esc_attr($jade_title) ; ?></<?php echo esc_attr($jade_title_html_tag ) ? $jade_title_html_tag : 'h3'; ?>>
            </div>
            <?php if( !empty($jade_content )  ): ?>
                <div class="jd-card__text" <?php echo ($jade_excerpt_color) ? 'style="color:' .  $jade_excerpt_color . ';"' : '' ?>>
                    <?php echo $jade_content;  ?>
                </div>
            <?php endif; ?>
        </figcaption>
    </figure>
<?php echo ($jade_linked_card == 1) ? '</a>'  : '</div>'; ?>



<?php /*
<div class="jd-card jd-card__v2 <?php echo $jade_id . $jade_align; ?>" <?php echo ($jade_border_radius) ? 'style="border-radius:'. $jade_border_radius. 'px; "' : '' ?>>
    <figure class="jd-card__img">
        <?php echo ($jade_image) ? '<img src="' . esc_url($jade_image['url'])  . '">' : '<img src="' . plugins_url() . '/jade-blocks/img/placeholder-image.jpg)">' ?>
    </figure>
    <div class="jd-card__content" <?php echo ($jade_card_overlay_color ) ? 'style="background-color:'. $jade_card_overlay_color . '; "' : '' ?>>
        <<?php echo ($jade_title_html_tag ) ?  esc_attr($jade_title_html_tag) : 'h3'; ?> class="jd-card__title" <?php echo ($jade_title_color) ? 'style="color:' . $jade_title_color . ';"' : '' ?>><?php echo esc_attr($jade_title) ; ?></<?php echo esc_attr($jade_title_html_tag ) ? $jade_title_html_tag : 'h3'; ?>>
       
        <?php if( !empty($jade_content )  ): ?>
            <div class="jd-card__text" <?php echo ($jade_excerpt_color) ? 'style="color:' .  $jade_excerpt_color . ';"' : '' ?>>
                <?php echo $jade_content;  ?>
            </div>
        <?php endif; ?>

        <div class="margin-top-sm">
            <a class="btn btn--reg" href="<?php echo $jade_link; ?>" <?php echo ($jade_button_color) ? 'style="background-color:' .  $jade_button_color . ';"' : '' ?>><?php echo ($jade_link_text ) ?  esc_attr($jade_link_text) : 'Read more'; ?></a>
        </div>
    </div>

    <?php if( !empty( $jade_title_color_hover) || empty($jade_button_color_hover) ): ?>
        <style type="text/css">
            .<?php echo $jade_id; ?> .jd-card__title:hover {
                color: <?php echo $jade_title_color_hover; ?> !important;
            }
            .<?php echo $jade_id; ?> .btn--reg:hover {
                background-color: <?php echo $jade_button_color_hover; ?> !important;
            }
        </style>
    <?php endif; ?>
</div>
*/ ?>



