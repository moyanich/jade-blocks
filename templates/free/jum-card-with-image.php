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

$jid = $block['id'];
$jade_class_name = 'card';

$jid_card = str_replace("block", $jade_class_name, $jid);

// Create class attribute allowing for custom "className" and "align" values.
if( !empty($block['className']) ) {
    $jade_class_name .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $jade_class_name .= ' align' . $block['align'];
}
if( !empty($block['anchor']) ) {
    $jid = $block['anchor'];
}

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
 }





// create id attribute for specific styling
$jum_block_id = 'jumelles-' . $block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';


/* Main Variables */
$jum_image = get_field( 'jum_image' );
$jum_content = get_field( 'jum_content' );
$jum_title = get_field( 'jum_title' );

$jum_title_html_tag = get_field('jum_title_html_tag');

/* Background Settings */
$jum_background_image = get_field('jum_background_image');
$jum_background_color = get_field('jum_background_color'); 
$jum_card_background_color = get_field('jum_card_background_color'); 

/* Content Structure */
$jum_grid_columns = get_field('jum_grid_columns');
$jum_grid_column_gap = get_field('jum_grid_column_gap');
$jum_grid_row_gap = get_field('jum_grid_row_gap');


/* Title Settings */
$jum_custom_title_styles = get_field('jum_custom_title_styles'); 
$jum_title_color = get_field('jum_title_color');
$jum_title_color_hover = get_field('jum_title_color_hover');

/* Excerpt Settings */
$jum_excerpt_custom_styles = get_field('jum_excerpt_custom_styles');
$jum_excerpt_color = get_field('jum_excerpt_color');


/* Image Settings */
$jum_image_styles = get_field('jum_image_styles');

?>

<style type="text/css">
    <?php if (!empty( $jum_background_color )) : ?>
        .<?php echo $jum_block_id; ?> {
            background-color: <?php echo $jum_background_color; ?>; 
        }
    <?php endif; 
    
    if (!empty( $jum_background_image ))  : ?>
        .<?php echo $jum_block_id; ?> {
            background-image: url( <?php echo $jum_background_image; ?>); 
            background-repeat: no-repeat; 
            background-size: cover;
        }
    <?php endif; 

    if (!empty( $jum_card_background_color ))  : ?>
        .<?php echo $jum_block_id; ?> .jum-card {
            background-color: <?php echo $jum_card_background_color; ?>; 
        }
    <?php endif; 

    
    if ($jum_custom_title_styles == 1) : ?>
        .<?php echo $jum_block_id; ?> .jum-card .jum-card-title .jum-card-link {
            color: <?php echo $jum_title_color; ?> !important;
        }

        .<?php echo $jum_block_id; ?> .jum-card:hover .jum-card-title .jum-card-link {
            color: <?php echo $jum_title_color_hover; ?> !important;
        }
    <?php endif; 
   
    if ($jum_excerpt_custom_styles == 1) :  ?>
       .<?php echo $jum_block_id; ?> .jum-card .jum-card-content {
           color: <?php echo $jum_excerpt_color; ?> !important ;
        } 
    <?php endif; 

    if ($jum_image_styles == 'Circle') : ?>

        .<?php echo $jum_block_id; ?> .jum-card-image {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            padding: 2rem;
        }
        .<?php echo $jum_block_id; ?> .jum-card-image img {
            border-radius: 100%;
            object-fit: cover;
            width: 250px;
            height: 250px;
        }

        .<?php echo $jum_block_id; ?> .jum-card-body {
            text-align: center;
        }
    
    <?php  endif;

    if ($jum_image_styles == 'Rounded') : ?>

        .<?php echo $jum_block_id; ?> .jum-card-image img {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            object-fit: cover;
        }

        .<?php echo $jum_block_id; ?> .jum-card {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

    <?php  endif; ?>

    @media (min-width: 768px) {
        
        .jumelles-grid-col-<?php echo $jum_grid_columns; ?> {
        
            <?php if (!empty( $jum_grid_columns )) : ?>
                grid-template-columns: repeat(<?php echo $jum_grid_columns; ?>, 1fr) !important;
            <?php endif; ?>

            <?php if (!empty( $jum_grid_column_gap )) : ?>
                grid-column-gap: <?php echo $jum_grid_column_gap; ?>px !important;
            <?php endif; ?>

            <?php if (!empty( $jum_grid_row_gap )) : ?>
                grid-row-gap: <?php echo $jum_grid_row_gap; ?>px !important;
            <?php endif; ?>
        }
    }
</style>


    <section class="jumelles-section jumelles-element jumelles-card-01 jumelles-element-<?php echo $jum_block_id; ?>">
        <div class="jumelles-container container">
            <div id="<?php echo $jum_block_id; ?>" class="jumelles-row jumelles-grid jum-grid-col jumelles-grid-col-<?php echo $jum_grid_columns; ?> <?php echo $align_class; ?>">

                <?php

                    $jum_unique_id = uniqid(); ?>

                    <div id="jumelles-column-id-<?php echo $jum_unique_id; ?>" class="jumelles-column jumelles-column-<?php echo $jum_unique_id; ?>">
                        <div class="jum-card display-grid">

                        <div class="jade-card-image" <?php /* echo ($jade_image) ? 'style="background-image: url(' . esc_url($jade_image['url']) . ');"' : 'style="background-image: url(' . plugins_url() . '/jade-blocks/img/placeholder-image.jpg);"'*/ ?>>

                        
                            <div class="jum-card-image">
                                <?php 
                                    if ( !empty($jum_image)) : ?>
                                       
                                       <img src="<?php echo esc_url($jum_image['url']); ?>" alt="<?php echo esc_attr($jum_image['alt']); ?>" />

                                <?php
                                    else:
                                        echo '<img class="jum-image" src="' . esc_url( get_template_directory_uri() ) . '/acf-blocks/img/placeholder-image.jpg">';
                                    endif; 
                                ?>
                            </div>
                            
                            <div class="jum-card-body">

                                <?php if( !empty($jum_title_html_tag ) || !empty($jum_title) ): ?>
                                    <div class="jum-card-title">	
                                        <<?php echo $jum_title_html_tag; ?> class="jum-card-heading"><?php echo $jum_title ?></<?php echo $jum_title_html_tag  ?>>
                                    </div>
                                <?php endif; ?>

                                <div class="clearfix"></div>
                                
                                <?php if( !empty($jum_content )  ): ?>
                                    <div class="jum-card-content">
                                       <?php echo $jum_content;  ?>
                                    </div>
                                <?php endif; ?>

                                <div class="jum-card-button pt-3">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary jum-btn">Read More</a>
                                </div>

                            </div>
                        </div> 
                    </div>

            </div>
        </div>
    </section>


