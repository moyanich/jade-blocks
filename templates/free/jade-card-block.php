<?php
/**
 * Card with Image Block
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
$jade_class_name = 'jade-card';

$jid_card = str_replace("block", $jade_class_name, $jid);

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
$jade_card_background_color = get_field('jade_card_background_color'); 

/* Content Structure */
$jade_grid_columns = get_field('jade_grid_columns');
$jade_grid_column_gap = get_field('jade_grid_column_gap');
$jade_grid_row_gap = get_field('jade_grid_row_gap');


/* Title Settings */
$jade_custom_title_styles = get_field('jade_custom_title_styles'); 
$jade_title_color = get_field('jade_title_color');
$jade_title_color_hover = get_field('jade_title_color_hover');

/* Excerpt Settings */
$jade_excerpt_custom_styles = get_field('jade_excerpt_custom_styles');
$jade_excerpt_color = get_field('jade_excerpt_color');

/* Image Settings */
$jade_image_styles = get_field('jade_image_styles');

if ($jade_image_styles == 'Rounded') : 
    $jade_card_type = 'card-rounded';
elseif ($jade_image_styles == 'Circle') :
    $jade_card_type = 'card-circle';
elseif ($jade_image_styles == 'Square') :
    $jade_card_type = 'card-square';
endif; ?>


<section id="<?php echo esc_attr($jid); ?>" class="jade-section jade-element jade-card-box <?php echo esc_attr($jade_class_name); ?> <?php echo esc_attr($jid_card); ?> ">

<?php if (!empty( $jade_card_background_color ) || !empty(  $jade_custom_title_styles) || !empty( $jade_excerpt_custom_styles )  )  : ?>
<style type="text/css">

<?php 
if (!empty( $jade_card_background_color ))  : ?>
#<?php echo $jid; ?> .jade-card-body {
    background-color: <?php echo $jade_card_background_color; ?>; 
}
<?php endif; 

if ($jade_custom_title_styles == 1) : ?>
#<?php echo $jid; ?> .jade-card .jade-card-title .jade-card-heading {
    color: <?php echo $jade_title_color; ?> !important;
}
<?php endif; 

if ($jade_excerpt_custom_styles == 1) :  ?>
#<?php echo $jid; ?> .jade-card .jade-card-content {
    color: <?php echo $jade_excerpt_color; ?> !important ;
} 
<?php endif; ?>

</style>

<?php endif; ?>

    <div class="jade-container container">
        <div class="jade-row jade-card jade-grid <?php echo $jade_card_type; ?>">
            <div class="jade-card-image" <?php
             if ( !empty($jade_image)) : 
             echo  'style="background-image: url(' . esc_url($jade_image['url']) . ');"'; 
             endif; ?>>
                <?php /*
                    ?>
                        
                        <img src="" alt="<?php echo esc_attr($jade_image['alt']); ?>" />

                <?php
                    else:
                        echo '<img class="jade-image" src="' . esc_url( get_template_directory_uri() ) . '/acf-blocks/img/placeholder-image.jpg">';
                    endif; */
                ?>
            </div>
            
            <div class="jade-card-body">
                <?php if( !empty($jade_title_html_tag ) || !empty($jade_title) ): ?>
                    <div class="jade-card-title">	
                        <<?php echo $jade_title_html_tag; ?> class="jade-card-heading"><?php echo $jade_title; ?></<?php echo $jade_title_html_tag; ?>>
                    </div>
                <?php endif; ?>

                <div class="clearfix"></div>
                
                <?php if( !empty($jade_content )  ): ?>
                    <div class="jade-card-content">
                        <?php echo $jade_content;  ?>
                    </div>
                <?php endif; ?>

                <div class="jade-card-button pt-3">
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary jade-btn">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>