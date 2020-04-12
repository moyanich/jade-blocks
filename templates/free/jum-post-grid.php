<?php
/**
 * Post Grid Block
 *
 * @author       Amoy Nicholson
 * @since        1.0.0
 * @license  
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// create id attribute for specific styling
$jum_block_id = 'jumelles-' . $block['id'];
if( !empty($block['anchor']) ) {
    $jum_block_id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$jum_class_name = 'posts';
if( !empty($block['className']) ) {
    $jum_class_name .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $jum_class_name .= ' align' . $block['align'];
}


// Load values and assign defaults.
/* Main Variables */
$jum_post_count = get_field( 'jum_number_of_posts' );
$jum_post_type  = get_field( 'jum_post_type' );
$jum_post_excerpt_length = get_field( 'jum_post_excerpt_length' );
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

if ($jum_image_styles == 'Rounded') : 
    $jum_card_type = 'card-rounded';
elseif ($jum_image_styles == 'Circle') :
    $jum_card_type = 'card-circle';
elseif ($jum_image_styles == 'Square') :
    $jum_card_type = 'card-square';
endif; ?>


<section id="<?php echo esc_attr($jum_block_id); ?>" class="jumelles-element jumelles-grid-section jumelles-posts-block jumelles-card-<?php echo esc_attr($jum_class_name); ?> <?php echo esc_attr($jum_block_id); ?> ">

    <style type="text/css">
        <?php if (!empty( $jum_background_color )) : ?>
            .<?php echo $jum_block_id; ?> {
                background-color: <?php echo $jum_background_color; ?>; 
            }
        <?php endif; 
        
        if (!empty( $jum_background_image ))  : ?>
            #<?php echo $jum_block_id; ?> {
                background-image: url( <?php echo $jum_background_image; ?>); 
                background-repeat: no-repeat; 
                background-size: cover;
            }
        <?php endif; 

        if (!empty( $jum_card_background_color ))  : ?>
            #<?php echo $jum_block_id; ?> .jum-card {
                background-color: <?php echo $jum_card_background_color; ?>; 
            }
        <?php endif; 

        
        if ($jum_custom_title_styles == 1) : ?>
            #<?php echo $jum_block_id; ?> .jum-card .jum-card-title .jum-card-link {
                color: <?php echo $jum_title_color; ?> !important;
            }

            #<?php echo $jum_block_id; ?> .jum-card:hover .jum-card-title .jum-card-link {
                color: <?php echo $jum_title_color_hover; ?> !important;
            }
        <?php endif; 
    
        if ($jum_excerpt_custom_styles == 1) :  ?>
        #<?php echo $jum_block_id; ?> .jum-card .jum-card-content {
            color: <?php echo $jum_excerpt_color; ?> !important ;
            } 
        <?php endif; 

        ?>

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

    <div class="jumelles-container container">
        <div class="jumelles-row jumelles-grid jum-grid-col jumelles-grid-col-<?php echo esc_attr($jum_grid_columns); ?>">

            <?php
            $args = array(
                'post_type'         => array( $jum_post_type ),
                'posts_per_page'    => $jum_post_count,
                'post_status'       => 'publish'
            );

            $post_grid_query = new WP_Query( $args );

            if ( $post_grid_query->have_posts() ) :
                while ( $post_grid_query->have_posts() ) : 
                    $post_grid_query->the_post();  ?>

                    <div class="jumelles-column">
                        <div class="jum-card <?php echo esc_attr( $jum_card_type ); ?>">
                            <div class="jum-card-image">
                                <?php 
                                    if (has_post_thumbnail( )) :
                                        the_post_thumbnail( 'large', array('class' => 'jum-image') );
                                    else:
                                        echo '<img class="jum-image" src="' . esc_url( get_template_directory_uri() ) . '/acf-blocks/img/placeholder-image.jpg">';
                                    endif; 
                                ?>
                            </div>
                            
                            <div class="jum-card-body">
                                <?php if( !empty($jum_title_html_tag ) ): ?>
                                    <div class="jum-card-title">	
                                        <<?php echo $jum_title_html_tag; ?> class="jum-card-heading"><a class="jum-card-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo $jum_title_html_tag  ?>>
                                    </div>
                                <?php endif; ?>

                                <div class="clearfix"></div>

                                <div class="jum-card-content">
                                    <p><?php echo jum_excerpt($jum_post_excerpt_length); ?></p>
                                </div>

                                <div class="jum-card-button pt-3">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary jum-btn">Read More</a>
                                </div>
                            </div>
                        </div> 
                    </div>

                <?php  endwhile; wp_reset_postdata(); ?>  

            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

        </div>
    </div>
</section>


