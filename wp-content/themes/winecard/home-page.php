<?php
/**
 * Template Name: Home page 
 */

get_header(); ?>


	
			
	
	<main>
		
		<div class="home-slider-block">
			<div class="home-slider owl-carousel">
				<div class="home-slider-item">
	
					<div class="home-slider-item-inner " style=" background: url(<?=get_template_directory_uri()?>/img/home-slide1.jpg);  background-size: cover;">
						<div class="home-slider-item-inner-article">
							<div class="home-slider-item-title">
								<div class="home-slider-item-name">
									блог WINE CARD
								</div>
								<div class="home-slider-item-desciption">
									Обо всём и обо всех, кто стоит
									за ассортиментом нашими вин	
								</div>
							</div>
							
							<div class="home-slider-articles">
								<div class="home-slider-articles-preview" style="background:url(<?=get_template_directory_uri()?>/img/article-preview.jpg) center; background-size:cover;">
							
								</div>
								<div class="home-slider-articles-block hide-slider-block">
									<div class="home-slider-articles-title">
										БЛОГ  WINE CARD
									</div>	
									<div class="home-slider-articles-inner gray-skin custom-scroll" >
										<div class="home-slider-article-item">
											<div class="home-slider-article-item-left">
												<div class="home-slider-article-item-image-block">
													<div class="home-slider-article-item-image-bg"></div>
												</div>
											</div>
												
											<div class="home-slider-article-item-right">
												<div class="home-slider-article-item-date">
													15.03.2017
												</div>
												<div class="home-slider-article-item-title">
													Wine School - образовательный проект,
													посвященный изучению вина и
													крепкого алкоголя.
												</div>
											</div>
										</div>	
										<div class="home-slider-article-item">
											<div class="home-slider-article-item-left">
												<div class="home-slider-article-item-image-block">
													<div class="home-slider-article-item-image-bg"></div>
												</div>
											</div>
											<div class="home-slider-article-item-right">
												<div class="home-slider-article-item-date">
													15.03.2017
												</div>
												<div class="home-slider-article-item-title">
													Wine School - образовательный проект,
													посвященный изучению вина и
													крепкого алкоголя.
												</div>
											</div>
										</div>	
										<div class="home-slider-article-item">
											<div class="home-slider-article-item-left">
												<div class="home-slider-article-item-image-block">
													<div class="home-slider-article-item-image-bg"></div>
												</div>
											</div>
											<div class="home-slider-article-item-right">
												<div class="home-slider-article-item-date">
													15.03.2017
												</div>
												<div class="home-slider-article-item-title">
													Wine School - образовательный проект,
													посвященный изучению вина и
													крепкого алкоголя.
												</div>
											</div>
										</div>	
										<div class="home-slider-article-item">
											<div class="home-slider-article-item-left">
												<div class="home-slider-article-item-image-block">
													<div class="home-slider-article-item-image-bg"></div>
												</div>
											</div>
											<div class="home-slider-article-item-right">
												<div class="home-slider-article-item-date">
													15.03.2017
												</div>
												<div class="home-slider-article-item-title">
													Wine School - образовательный проект,
													посвященный изучению вина и
													крепкого алкоголя.
												</div>
											</div>
										</div>
										<div class="home-slider-article-item">
											<div class="home-slider-article-item-left">
												<div class="home-slider-article-item-image-block">
													<div class="home-slider-article-item-image-bg"></div>
												</div>
											</div>
											<div class="home-slider-article-item-right">
												<div class="home-slider-article-item-date">
													15.03.2017
												</div>
												<div class="home-slider-article-item-title">
													Wine School - образовательный проект,
													посвященный изучению вина и
													крепкого алкоголя.
												</div>
											</div>
										</div>									
									</div>	
								</div>
							</div>
						</div>
						
						
					</div>

				</div>
				
				<div class="home-slider-item">
	
					<div class="home-slider-item-inner " style=" background: url(<?=get_template_directory_uri()?>/img/home-slide2.jpg);  background-size: cover;">
						<div class="home-slider-item-inner-article">
							<div class="home-slider-item-title">
								<div class="home-slider-item-name">
									2013 Gran
								</div>
								<div class="home-slider-item-desciption">
									PRUNAIO CHIANTI CLASSICO
								</div>
							</div>
							
							<div class="home-slider-articles product">
								<div class="home-slider-articles-preview" style="background:url(<?=get_template_directory_uri()?>/img/slider-botl.jpg) center; background-size:cover;">
							
								</div>
								<div class="home-slider-articles-block hide-slider-block">
										
								</div>
							</div>
						</div>
						
						
					</div>

				</div>
				
			</div>
			
			
		</div> <!-- End home slider -->
	
	
		
		<div class="main-products-block">
		
			<div class="container">
				<div class="main-products">
					<div class="products-sidebar">
						<div class="products-sidebar-title">
							Категории товара
						</div>
						<div class="products-sidebar-inner">
							<?php get_sidebar();?>
						</div>
					</div>
					<div class="products-block">
						<div class="products-block-title">
							Каталог вин
						</div>
						<div class="products-inner">
							
							<?php echo do_shortcode('[products per_page="12"]'); ?>	
						
		
							
						</div>
						
					
					</div>
				</div>
			</div>
		
		</div>
		
	
	
	</main>
	
	
							

<?php get_footer(); ?>


