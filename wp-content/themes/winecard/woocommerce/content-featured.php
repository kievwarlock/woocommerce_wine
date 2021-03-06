<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div <?php post_class(); ?>>
	
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	 
	 ?>
	<div class="featured-product-item">
		<div class="featured-product-item-left">
			<a href="<?php the_permalink();?>">
			<?php
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
			</a>
		</div>
		
		<div class="featured-product-item-right">
	
		<?php
		/**
		 * woocommerce_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		 ?>
		 	 
		<a href="<?php the_permalink();?>">
			<?php do_action( 'woocommerce_shop_loop_item_title' );?>
		</a>
		
		<?php
		

		/**
		 * woocommerce_after_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		 
		$color_attr = $product->get_attribute('color');	
		$country_attr = $product->get_attribute('country');	
		$sweetness_attr = $product->get_attribute('sweetness');	

			?>
			<div class="preview-product-attr">
				<?php if ($country_attr) : ?>
				<div class="product-attr-country">
					<?=$country_attr?>
				</div>
				<?php endif; ?>
				<?php if ( $color_attr or $sweetness_attr ) : ?>
				<div class="product-attr-color-and-sweetness">
					<?php if ($color_attr) : ?>
					<span class="color-attr"><?=$color_attr?></span>
					<?php endif; ?>
					&nbsp;
					<?php if ($sweetness_attr) : ?>
					<span class="sweetness-attr"><?=$sweetness_attr?></span>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php
		
		do_action( 'woocommerce_after_shop_loop_item_title' );
				
		
		
		/**
		 * woocommerce_after_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		 
		
		remove_action( 'woocommerce_template_loop_product_link_close', 'woocommerce_template_loop_add_to_cart', 5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

		
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart_count', 7 );	
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		do_action( 'woocommerce_after_shop_loop_item' );
		
		?>
		</div>
	</div> <!-- End featured-product-item -->
	
</div>
