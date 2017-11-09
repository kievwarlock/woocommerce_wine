<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<title>WineCard</title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<header>

	<div class="container">
		<div class="header-inner-search-hidden">
			<form role="search" method="get"  action="<?php echo esc_url( home_url( '/' ) ); ?>">
				
				<input type="text"  placeholder='<?= __( 'Product search', 'woocommerce' ) ?>' value="<?php echo get_search_query(); ?>" name="s" class="header-inner-search-input" >
				<button  type="submit" class="header-inner-search-submit" >
					<i class="glyph" aria-hidden="true" data-icon="&#x7e;"></i>	
				</button>
			</form>
		</div>
		<div class="header-inner">
			<div class="header-inner-left">
				<div class="header-inner-lang">
				
					<div class="header-inner-lang-dropdown dropdown">
					<?php
					
					$lang_array = icl_get_languages('skip_missing=0&orderby=id&order=asc&link_empty_to=empty');

					foreach($lang_array as $lang_array_item){
					   
						if($lang_array_item["active"] == 1){
							$active_lang = 'active';
							
							$active_lang_str = '							
							<div  class="lang-dropdown" id="lang-dropdown" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								'. $lang_array_item['code'] . '
								<i class="glyph" aria-hidden="true" data-icon="&#x3e;"></i>						
							</div>
							
							';
							
						}else{
							if($lang_array_item['url'] == "empty"){
								
							}else{
								$lang_str .= '

								<li>
									<a href="'. $lang_array_item['url'] . '">
										'. $lang_array_item['code'] . '
									</a>
								</li>								
								';	
							}
							
						}
					
					
					
					}
					$return_lang_html .= $active_lang_str;
					$return_lang_html .= '<ul class="dropdown-menu" aria-labelledby="lang-dropdown">';
					$return_lang_html .= $lang_str;
					$return_lang_html .= '</ul>';
					
					?>
				
				
					<?=$return_lang_html?>
					

						
					</div>	
				</div>
				<div class="header-inner-search">
					<div class="header-inner-search-icon">					
						<i class="glyph" aria-hidden="true" data-icon="&#x7e;"></i>						
					</div>
				</div>
				<a href="<?php echo get_home_url(); ?>" class="header-inner-logo">
					<img src="<?=get_template_directory_uri()?>/img/logo.png" alt="" >
				</a>
			</div>
			<div class="header-inner-nav">
				<div class="header-inner-main">
					<nav class="navbar navbar-default">
						
						  <div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false" aria-controls="navbar">
							  <span class="sr-only">Toggle navigation</span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							</button>
							
						  </div>
						  
						  
						  <div id="navbar" class="navbar-collapse collapse">
						  
						
							
							<?php
							$header_menu = array(
                              'theme_location'  => 'main_menu',
                              'menu'            => '', 
                              'container'       => false, 
                              'menu_class'      => 'nav navbar-nav', 
                              'menu_id'         => '',
                              'echo'            => true,
                              'fallback_cb'     => 'wp_page_menu',                           
                              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',                           
                              'walker' => new wp_bootstrap_navwalker()
                            );
                                                
                            wp_nav_menu( $header_menu );
							?>
							
						  </div>
						
					</nav>
			
				</div>
				<div class="header-inner-info">
					
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="header-inner-info-accoutn">
						<i class="glyph" aria-hidden="true" data-icon="&#x64;"></i>	
					</a>
					<a href="<?php echo WC()->cart->get_cart_url()?>" class="header-inner-info-cart">
						<i class="glyph" aria-hidden="true" data-icon="&#x34;"></i>	
						<span class="mini-cart-count"><?php echo WC()->cart->get_cart_contents_count();?></span>
					</a>
					
				</div>
			</div>
		</div>
		<div class="mobile-nav visible-xs">
		
			
			<div id="mobile-navbar" class="navbar-collapse collapse">

				<ul class="nav navbar-nav">
				  <li class="active"><a href="#">ВИНА</a></li>
				  <li><a href="#">АКСЕССУАРЫ</a></li>
				  <li><a href="#">Подарочные наборы</a></li>
				  <li><a href="#">блог  WC</a></li>
				  <li><a href="#">ГАЛЕРЕЯ</a></li>
				  <li><a href="#">КОНТАКТЫ</a></li>							                                                       
				</ul>
			
			</div>
		</div>
	</div>
	
</header>


