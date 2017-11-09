<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<main>
	<div class="main-products-block">

		<div class="container">
			
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
			$class_page = '';
			if( is_cart() or is_checkout() ){
				
				$cart_header = '<a href="' . esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ) . '" class="back-to-shop">
					&#60;&nbsp; ' .  __( 'Return to shop', 'woocommerce' ) .  
				'</a>
				<h1 class="cart-title"><span class="iconomous">4</span>'. get_the_title() . '</h1>';
				
				$class_page = 'cart-page';
				
				?>
				
				<div class="page-inner <?=$class_page?>">
					<?=$cart_header?>
					<div class="content-block">
						<?php the_content(); ?>
					</div>
				
				</div>
				
				<?php
			}else{
				?>
				
				<div class="main-products default-page">
					<div class="products-sidebar">
						<div class="products-sidebar-title">
							<?=__( 'All categories', 'woocommerce' );?>
						</div>
						<div class="products-sidebar-inner">
							<?php get_sidebar();?>
						</div>
					</div>
					<div class="products-block">
						<div class="products-block-title">
							<?php the_title();?>
						</div>						
						
						<div class="content-block">
							<?php the_content(); ?>
						</div>				
										
					
					</div>
				</div>
				
				<?php
			}
			?>
			
		  		
		  
		  
			<?php
			endwhile;
			?>
		
		</div>
    </div>
</div>


<?php get_footer();
