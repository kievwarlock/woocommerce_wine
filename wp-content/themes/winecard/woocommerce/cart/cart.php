<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>






<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				
				<!-- <th class="product-thumbnail">&nbsp;</th> -->
				<th class="product-name" colspan="2" ><?php _e( 'Product', 'woocommerce' ); ?></th>
				<th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
				<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
				<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
				<th class="product-remove">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						

						<td class="product-thumbnail">
							<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail;
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
								}
							?>
						</td>

						<td class="product-name" data-title="<?php _e( 'Product', 'woocommerce' ); ?>">
							<?php
								if ( ! $product_permalink ) {
									echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
								} else {
									echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
								}

								// Meta data
								echo WC()->cart->get_item_data( $cart_item );

								// Backorder notification
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
								}
							?>
						</td>

						<td class="product-price" data-title="<?php _e( 'Price', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
						</td>

						<td class="product-quantity" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
						
							
						
						
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
										'min_value'   => '0',
									), $_product, false );
								}
								?>
								<div class="add_to_cart_count_block">
									<div class="add_to_cart_single_count_btn  up">
										<img src="<?=get_template_directory_uri()?>/img/count-up.png" alt="" >
									</div>
									<div class="add_to_cart_count">
									<?php
									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
									?>
									</div>
									<div class="add_to_cart_single_count_btn down">
										<img src="<?=get_template_directory_uri()?>/img/count-down.png" alt="" >
									</div>
								</div>
								
							
						</td>

						<td class="product-subtotal" data-title="<?php _e( 'Total', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
						</td>
						<td class="product-remove">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</td>
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="6" class="actions">
					<div class="cart-coupon-block">
						<h2><?php _e( 'Coupon:', 'woocommerce' ); ?> </h2>
							<div class="cart-coupon-inner">
							<?php if ( wc_coupons_enabled() ) { ?>
								<div class="coupon">
									<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
									<?php do_action( 'woocommerce_cart_coupon' ); ?>
								</div>
							<?php } ?>

							<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>" />
							</div>
					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
					</div>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="cart-collaterals">
	<?php do_action( 'woocommerce_cart_collaterals' ); ?>
</div>


<?php do_action( 'woocommerce_after_cart' ); ?>




<div class="home-featured-products">

		<h3 class="home-featured-products-title">
			<i class="glyph" aria-hidden="true" data-icon="7"></i>
			<?php esc_html_e( 'Related products', 'woocommerce' ); ?>
		</h3>
		
		<?php

		/* $meta_query  = WC()->query->get_meta_query();
		$tax_query   = WC()->query->get_tax_query();
		$tax_query[] = array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => 'featured',
			'operator' => 'IN',
		); */
		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => 10,		
			'post_status'    => 'publish',
			//'meta_query'          => $meta_query,
			//'tax_query'           => $tax_query,
		);

		
		
		$query_featured = new WP_Query( $args );
		
		if ( $query_featured->have_posts() ) :
			?>
			
			<div class="featured-slider-block">
				<div class="featured-slider owl-carousel">
				<?php
				while ( $query_featured->have_posts() ) : $query_featured->the_post();							
					?>
					
					<div class="featured-slider-item">
						<?php wc_get_template_part( 'content', 'featured' ); ?>
					</div>
					
					<?php
				endwhile; 
				?>
				</div>
				<div class="featured-slider-prev">
					<img src="<?=get_template_directory_uri()?>/img/arrow-left.png" alt="slide prev">
				</div>
				<div class="featured-slider-next">
					<img src="<?=get_template_directory_uri()?>/img/arrow-right.png" alt="slide next">
				</div>
			</div>
			<?php
			wp_reset_query();
		endif;
		
		
		?>
		

</div>



<div class="contact-page-map-block">
	<div class="contact-page-map-title"><?php the_field('contact_page_map_title');?></div>
	<div class="contact-page-map">
		<iframe src="https://www.google.com/maps/d/u/1/embed?mid=1JEvC1yxs5OSKK5o9qC9PW7KuYsY" width="100%" height="480"></iframe>
	</div>
</div>