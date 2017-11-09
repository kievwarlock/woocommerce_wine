
	
	<main>
		
		<?php
		$frontpage_id = get_option( 'page_on_front' );
		$home_slider = get_field('home_slider',$frontpage_id  );
		
		if( $home_slider ){ ?>
			
	
		<div class="home-slider-block">
			<div class="home-slider owl-carousel">
				<?php foreach ( $home_slider as $home_slider_item ) { ?>
				
				
					<?php if ( $home_slider_item['home_slider_type'] == 'Blog' ) { ?>
					
					<div class="home-slider-item">
		
						<div class="home-slider-item-inner " style=" background: url(<?=$home_slider_item['home_slider_background']?>);  background-size: cover;">
							<div class="home-slider-item-inner-article">
								<div class="home-slider-item-title">
									<div class="home-slider-item-name">
										<?=$home_slider_item['home_slider_title_1']?>
									</div>
									<div class="home-slider-item-desciption">
										<?=$home_slider_item['home_slider_title_2']?>
									</div>
								</div>
								
								
								
									<div class="home-slider-articles">
										<div class="home-slider-articles-preview" style="background:url(<?=$home_slider_item['home_slider_background_block']?>) center; background-size:cover;">
									
										</div>
										<div class="home-slider-articles-block hide-slider-block">
											<div class="home-slider-articles-title">
												WINE CARD
											</div>	
											<div class="home-slider-articles-inner gray-skin custom-scroll" >
											
												<?php
								
												$args = array(
													'posts_per_page' => 6,
													'post_type' => 'post',
													'post_status' => 'publish',					
												);

												$query = new WP_Query( $args );

												// Цикл
												if ( $query->have_posts() ) {
													while ( $query->have_posts() ) {
														$query->the_post();
														if( get_the_post_thumbnail_url() ) {
															$style_bg = 'style="background:url(' . get_the_post_thumbnail_url("", "medium") . ') center no-repeat; background-size:cover; " ';
														}else{
															$style_bg ='';
														}
														?>
														
													
														<div class="home-slider-article-item">
															<div class="home-slider-article-item-left">
																<div class="home-slider-article-item-image-block">
																	<div class="home-slider-article-item-image-bg" <?=$style_bg?> ></div>
																</div>
															</div>
																
															<div class="home-slider-article-item-right">
																<div class="home-slider-article-item-date">
																	<?php echo get_the_date();?>
																</div>
																<a href="<?php the_permalink();?>" class="home-slider-article-item-title">
																	<?php the_title();?>
																</a>
															</div>
														</div>
														
														<?php
													}
												} else {
													// Постов не найдено
												}
												/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
												wp_reset_postdata();
												
												?>
												
																				
											</div>	
										</div>
									</div>
									
								
								
								
								
								
								
								
								
								
								
							</div>
							
							
						</div>

					</div>
					
					
					<?php } ?>	
						
					<?php if ( $home_slider_item['home_slider_type'] == 'Product' ) { 
						
					
					?>
						<div class="home-slider-item">
	
							<div class="home-slider-item-inner " style=" background: url(<?=$home_slider_item['home_slider_background']?>);  background-size: cover;">
								
								
								
								<div class="home-slider-item-inner-article slider-product-block">
									<?php
											
									$product_id = array( $home_slider_item['home_slider_type_product_id'] );
									
									$args = array(
										'post_type' => 'product',
										'post__in' => $product_id,
										'posts_per_page' => 1,
										);
									$loop = new WP_Query( $args );
									if ( $loop->have_posts() ) {
										while ( $loop->have_posts() ) : $loop->the_post(); 
										
										global $product;
										
										if( get_the_post_thumbnail_url() ) {
										
											$style_bg = 'style="background:url(' . get_the_post_thumbnail_url("", "large") . ') center no-repeat; background-size:cover; " ';
										
										}else{
											$style_bg = '';
										}	
										?>
									<div class="home-slider-item-title">
										<div class="home-slider-item-name">
											<?php echo $home_slider_item['home_slider_title_1'];?>
										</div>
										<div class="home-slider-item-desciption">
											<?php echo $home_slider_item['home_slider_title_2'];?>
										</div>
									</div>
									
									<div class="home-slider-articles product">
										
											
										<div class="home-slider-articles-preview" <?=$style_bg?> ></div>
										<div class="home-slider-articles-block hide-slider-block ">
											<div class="home-slider-product-block ">
												<div class="home-slider-product-block-title ">
													<?php the_title();?>						
												</div>
												<div class="home-slider-product-block-atbibute" >
													<?php																				
													do_action( 'woocommerce_product_additional_information', $product );
													?>
												</div>
												<div class="home-slider-product-block-price" >
													<?php																				
													do_action( 'woocommerce_after_shop_loop_item_title' );
													?>
												</div>
												<div class="home-slider-product-block-more" >
													<div class="home-slider-product-block-add-to-cart" >
														<?php																				
														do_action( 'woocommerce_after_shop_loop_item' );
														?>
													</div>
													<div class="home-slider-product-block-read-more" >
														<a href="<?php the_permalink();?>" ><?=__( 'Read more', 'woocommerce' );?></a>
													</div>
												</div>
												
												
												
											</div>
											
										</div>
										
									</div>
									
									<?php
											//wc_get_template_part( 'content', 'product' );
										endwhile;
									} else {
										echo __( 'No products found' );
									}
									wp_reset_postdata();
									?>
								</div>
								
								
							</div>

						</div>
					
					<?php }	?>
						
						
				<?php } ?>
				
				
			</div>
			
			
		</div> <!-- End home slider -->
		
		<?php }	?>
		
		
		
		
		<div class="home-featured-products">
			<div class="container">
				<h3 class="home-featured-products-title">
					<i class="glyph" aria-hidden="true" data-icon="7"></i>
					<?=__( 'Most popular', 'woocommerce' );?>
				</h3>
				
				<?php
	
				$meta_query  = WC()->query->get_meta_query();
				$tax_query   = WC()->query->get_tax_query();
				$tax_query[] = array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'featured',
					'operator' => 'IN',
				);
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => 10,		
					'post_status'    => 'publish',
					'meta_query'          => $meta_query,
					'tax_query'           => $tax_query,
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
		</div>
		
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
							<?=__( 'Products', 'woocommerce' );?>
						</div>
						<div class="products-inner">
							
							<?php woocommerce_content(); ?>				
							
						</div>
						
					
					</div>
				</div>
				
				<div class="home-gallery">
				
					<h3 class="home-gallery-title">					
						<i class="glyph" aria-hidden="true" data-icon="?"></i>						
						<?php echo __(  'Gallery' , 'winecard' );	?>				
					</h3>
					<div class="home-gallery-inner">
						<div class="row">
						<?php
						
						$args = array(
							'posts_per_page' => 6,
							'post_type' => 'gallery',
							'post_status' => 'publish',					
						);

						$query = new WP_Query( $args );

						// Цикл
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								if( get_the_post_thumbnail_url() ) {
									$style_bg = 'style="background:url(' . get_the_post_thumbnail_url("", "large") . ') center no-repeat; background-size:cover; " ';
								}else{
									$style_bg ='';
								}
								?>
								<div class="col-xs-12 col-sm-6 col-md-4">
									<div class="home-gallery-item">
										<div class="home-gallery-item-bg" <?=$style_bg?> ></div>
										<div class="home-gallery-item-shadow"></div>
										<div class="home-gallery-item-title">
										<?php the_title();?>
										</div>
										<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="home-gallery-item-more"></a>
									</div>
								</div>
								
								
								<?php
							}
						} else {
							// Постов не найдено
						}
						/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
						wp_reset_postdata();
						?>
					

							
						</div>
					</div>
					<div class="home-gallery-more">
						<a href="<?php echo get_post_type_archive_link( 'gallery' ); ?>" class="text-read-more">
							<?=__( 'Read more', 'woocommerce' );?>
						</a>
					</div>
					
				
				</div>
				
				
				
				<div class="home-news">
				
					<h3 class="home-news-title">					
						<i class="glyph" aria-hidden="true" data-icon="U"></i>						
						<?php echo __(  'Last news' , 'winecard' );	?>		
					</h3>
					
					<div class="home-news-inner">
						<div class="row">
							<?php
						
							$args = array(
								'posts_per_page' => 4,
								'post_type' => 'post',
								'post_status' => 'publish',					
							);

							$query = new WP_Query( $args );

							// Цикл
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();
									if( get_the_post_thumbnail_url() ) {
										$style_bg = 'style="background:url(' . get_the_post_thumbnail_url("", "medium") . ') center no-repeat; background-size:cover; " ';
									}else{
										$style_bg ='';
									}
									?>
									
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3" >
										<div class="home-news-item">
											<div class="home-news-item-image">
												<div class="home-news-item-image-bg" <?=$style_bg?>  ></div>
												<a href="<?php the_permalink();?>" ></a>
											</div>
											<a href="<?php the_permalink();?>" class="home-news-item-title">
												<?php the_title();?>
											</a>
											<div class="home-news-item-date">
												<?php echo get_the_date();?>
											</div>
											<div class="home-news-item-content">
												<?php the_excerpt();?>
											</div>
										</div>										
									</div>
									
									<?php
								}
							} else {
								// Постов не найдено
							}
							/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
							wp_reset_postdata();
							
							?>
							
							
						
						</div>
			
					</div>
				
					<div class="home-news-more">
						<a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="text-read-more">
							<?=__( 'Read more', 'woocommerce' );?>
						</a>
					</div>
					
				
				</div>
				
				<div class="social-feed">
					<?php echo do_shortcode('[WD_FB id="1"]');?>
					
					<?php //echo do_shortcode('[custom-facebook-feed]');?>
					
					
				</div>
				
			</div>
		
		</div>
		
		
			
				
	
	</main>
	


