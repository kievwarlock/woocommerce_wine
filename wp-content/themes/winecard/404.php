<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
			<div class="main-products">
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
						404
					</div>
					<div class="products-inner">
						404				
					</div>
					
				
				</div>
			</div>
			
		</div>
	
	</div>
		
</main>

<?php get_footer();
