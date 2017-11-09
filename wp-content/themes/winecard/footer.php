<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<footer>
	<div class="footer">
		<div class="container" >
			<div class="row" >
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3" >
					<div class="footer-item">
						<div class="footer-item-title">
							<?php
							$menu_name = 'footer_one';
							$locations = get_nav_menu_locations();
							$menu_id = $locations[ $menu_name ] ;
							$name_nav = wp_get_nav_menu_object($menu_id);
							echo $name_nav->name;
							?>
						</div>
						<?php
						$header_menu = array(
						  'theme_location'  => 'footer_one',
						  'menu'            => '', 
						  'container'       => false, 
						  'menu_class'      => 'footer-item-list', 
						  'menu_id'         => '',
						  'echo'            => true,
						  'fallback_cb'     => 'wp_page_menu',                           
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',                           
						  
						);
											
						wp_nav_menu( $header_menu );
						
						
						
						
						
						?>
					
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3" >
					<div class="footer-item">
						<div class="footer-item-title">
							<?php
							$menu_name = 'footer_two';
							$locations = get_nav_menu_locations();
							$menu_id = $locations[ $menu_name ] ;
							$name_nav = wp_get_nav_menu_object($menu_id);
							echo $name_nav->name;
							?>
						</div>
						<?php
						$header_menu = array(
						  'theme_location'  => 'footer_two',
						  'menu'            => '', 
						  'container'       => false, 
						  'menu_class'      => 'footer-item-list', 
						  'menu_id'         => '',
						  'echo'            => true,
						  'fallback_cb'     => 'wp_page_menu',                           
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',                           
						  
						);
											
						wp_nav_menu( $header_menu );
						
						?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3" >
					<div class="footer-item">
						<div class="footer-item-title">
							<?php
							$menu_name = 'footer_three';
							$locations = get_nav_menu_locations();
							$menu_id = $locations[ $menu_name ] ;
							$name_nav = wp_get_nav_menu_object($menu_id);
							echo $name_nav->name;
							?>
							
						</div>
						<?php
						$header_menu = array(
						  'theme_location'  => 'footer_three',
						  'menu'            => '', 
						  'container'       => false, 
						  'menu_class'      => 'footer-item-list', 
						  'menu_id'         => '',
						  'echo'            => true,
						  'fallback_cb'     => 'wp_page_menu',                           
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',                           
						  
						);
											
						wp_nav_menu( $header_menu );
						
						?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3" >
					<div class="footer-item">
						<div class="footer-item-title">
							<?php the_field('contact_footer_title', 'option');?>
						</div>
						<div class="footer-item-block">
							<?php the_field('footer_adress', 'option');?>
						</div>
						<?php if ( get_field('phone_numbers', 'option') ) { 
						$phones =  get_field('phone_numbers', 'option');
						?>
						<div class="footer-item-block">
						<?php foreach ($phones as $phones_item ) { ?>
							<a href="tel:<?=$phones_item['phone_numbers_item']?>"><?=$phones_item['phone_numbers_item']?></a>
						<?php } ?>	
						</div>
						<?php } ?>
						<?php if ( get_field('footer_emails', 'option') ) { 
						$footer_emails =  get_field('footer_emails', 'option');
						?>
						<div class="footer-item-block">
							<?php foreach ($footer_emails as $footer_emails_item ) { ?>
								<a href="mailto:<?=$footer_emails_item['footer_emails_item']?>"><?=$footer_emails_item['footer_emails_item']?></a>			
							<?php } ?>		
						</div>
						<?php } ?>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="footer-copyright-block">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="footer-copyright">
						<?php the_field('copyright', 'option');?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="footer-social">
						<?php if ( get_field('facebook_link', 'option') ) { ?>
						<a href="<?=get_field('facebook_link', 'option')?>" >
							<img src="<?=get_template_directory_uri()?>/img/fb-icon.png" alt="">
						</a>
						<?php } ?>
						<?php if ( get_field('twitter_link', 'option') ) { ?>
						<a href="<?=get_field('twitter_link', 'option')?>" >
							<img src="<?=get_template_directory_uri()?>/img/tw-icon.png" alt="">
						</a>
						<?php } ?>
						<?php if ( get_field('instagram_link', 'option') ) { ?>
						<a href="<?=get_field('instagram_link', 'option')?>" >
							<img src="<?=get_template_directory_uri()?>/img/insta-icon.png" alt="">
						</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
</footer>
<?php wp_footer(); ?>

</body>
</html>
