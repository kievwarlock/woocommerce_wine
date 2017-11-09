<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		
			<?php
				/**
				 * woocommerce_before_single_product_summary hook.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
			?>
			
			
		</div>
		<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
			<div class="summary entry-summary single-product-center">

				<?php
					/**
					 * woocommerce_single_product_summary hook.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 ); 
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
					
					
					add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5 );
					add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 10 ); 
					add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_exstra_description', 15 );
					add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_same_products', 17 );
					add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
					do_action( 'woocommerce_single_product_summary' );
					
					
					

					
				
				?>
				<div class="visible-xs visible-sm mobile-single-cart-block">
					<?php
					
						
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5 );
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 10 ); 
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_exstra_description', 15 );
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_same_products', 17 );
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );				
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );					
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
						
						
						//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
						add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
						add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20 );
						
						
						
						do_action( 'woocommerce_single_product_summary' );
						
						echo do_shortcode('[viewBuyButton]');
					
					?>
				</div>
			

				<?php
					/**
					 * woocommerce_after_single_product_summary hook.
					 *
					 * @hooked woocommerce_output_product_data_tabs - 10
					 * @hooked woocommerce_upsell_display - 15
					 * @hooked woocommerce_output_related_products - 20
					 */
					 
					 
					remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
					//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
					remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
					
					
					//add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
					add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
					add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_accessories_products', 25 );
					add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 30 );	 
					 
					do_action( 'woocommerce_after_single_product_summary' );
					
				?>
			</div><!-- .summary -->
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" >
			<div class="single-product-sidebar hidden-xs hidden-sm">
				<div class="single-product-sidebar-cart ">
				<?php
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5 );
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 10 ); 
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_exstra_description', 15 );	
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_same_products', 17 );
					
					
					//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
					add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
					add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20 );
					
					
					
					do_action( 'woocommerce_single_product_summary' );
					
					echo do_shortcode('[viewBuyButton]');
				
				?>	
				</div>
				<div class="single-product-sidebar-banner">
					<?php get_template_part( 'template-parts/block/single', 'sidebar' ); ?>
				</div>
			</div>
		</div>
		
		
	</div> <!-- END ROW -->
	
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
