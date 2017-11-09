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
						<?=$wp_query->get_queried_object()->name;?>
					</div>
					<div class="products-inner">
						<?php woocommerce_content(); ?>						
					</div>
					
				
				</div>
			</div>
			
		</div>
	
	</div>
		
</main>