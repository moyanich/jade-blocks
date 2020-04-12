<?php
/**
 * Post Grid Block
 *
 * @author       Amoy Nicholson
 * @since        1.0.0
 * @license  
 * 
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


// get image field (array)
$jum_post_count = get_field( 'number_of_posts' );
$jum_post_type  = get_field( 'chosen_post_type' );
$jum_background = get_field('background_color'); 

// create id attribute for specific styling
$jum_id = 'team-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

$jum_inline_css = '';

if (!empty( $jum_background )) : 

	$inline_css = "background-color: $jum_background";

endif;

?>

<section class="jumelles-section jumelles-element jumelles-wrapper"  <?php if (!empty($jum_inline_css)) echo 'style="'. $jum_inline_css . '"'; ?>>
	<div class="jumelles-container container">
		<div id="<?php echo $jum_id; ?>" class="jumelles-row jumelles-grid jumelles-grid-col-3 <?php echo $align_class; ?>">
			<?php
				// WP_Query arguments
				$args = array(
					'post_type'         => array( $jum_post_type ),
					'posts_per_page'    => $jum_post_count,
				);

				// The Query
				$post_grid_query = new WP_Query( $args );

				// The Loop
				while ( $post_grid_query->have_posts() ) :
					$post_grid_query->the_post();  

					$jum_unique_id = uniqid(); ?>

					<div id=jumelles-column-id-<?php echo $jum_unique_id; ?>" class="jumelles-col-3 jumelles-team jumelles-column-<?php echo $jum_unique_id; ?>">
						<div class="jum-card">

							<?php 
								if (has_post_thumbnail( )) :
									the_post_thumbnail( 'large', array('class' => 'jum-card-image') );
								else:
									echo '<img class="jum-card-image" src="' . esc_url( get_template_directory_uri() ) . '/acf-blocks/img/placeholder-image.jpg"';
								endif; 
							?>

							<a href="<?php the_permalink(); ?>">
								
							</a>
							<div class="jum-card-body">
								<h5 class="jum-card-title"><?php the_title(); ?></h5>
								<div class="clearfix"></div>
								<div class="pt-3">
									<a class="btn btn-primary" href="<?php the_permalink(); ?>">Continue reading</a>
								</div>
							</div>
						</div>
					</div>

					<?php
				endwhile;
				wp_reset_postdata();
				?>  
		</div>
	</div>
</section>



