<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		
			<div class="main-products woocommerce">
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
						<?php if ( have_posts() ) : ?>
							<?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '' . get_search_query() . '' ); ?>
						<?php else : ?>
							<?php _e( 'Nothing Found', 'twentyseventeen' ); ?>
						<?php endif; ?>
					</div>
					
					<div class="products-inner">
						<?php

						if ( have_posts() ) :
							woocommerce_product_loop_start(); 

							woocommerce_product_subcategories(); 
							
							while ( have_posts() ) : the_post();
								do_action( 'woocommerce_shop_loop' );
								wc_get_template_part( 'content', 'product' ); 

							endwhile; // End of the loop.

							 woocommerce_product_loop_end(); 

						else : ?>

							<p>
							<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
						
						<?php
						endif;
						?>					
					</div>
					
				
				</div>
			</div>
			
		</div>
	</div>
</div>
	

	
	
		



<?php get_footer();
