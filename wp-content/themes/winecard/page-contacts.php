<?php
/**
 * Template Name: Contact page
 */

get_header(); ?>

<?php
// Start the loop.
while ( have_posts() ) : the_post();

?>
<main>
	<div class="contact-page">

		<div class="container">
			
			
			<div class="contact-page-inner">
				<h1 class="cart-title"><span class="iconomous">/</span><?php the_title()?></h1>
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="contact-page-info">
							<div class="contact-page-info-item">
								<div class="contact-page-info-item-title">
									<?php the_field('contact_page_phone_title');?>
								</div>
								<?php
								$contact_page_phones = get_field('contact_page_phones');
								if ( $contact_page_phones ) {
									foreach ( $contact_page_phones as $contact_page_phones_item ) {
									?>
									<a href="tel:<?=$contact_page_phones_item['contact_page_phone_item']?>">
										<i class="glyph" aria-hidden="true" data-icon="|"></i>
										<?=$contact_page_phones_item['contact_page_phone_item']?>
									</a>
								<?php } 
								}
								?>

							</div>
							<div class="contact-page-info-item">
								<div class="contact-page-info-item-adress">
									<?php the_content();?>
								</div>
							</div>
							<div class="contact-page-info-item">
								<div class="contact-page-info-item-title">
									<?php the_field('contact_page_mail_title');?>
								</div>
								<?php
								$contact_page_emails = get_field('contact_page_emails');
								if ( $contact_page_emails ) {
									foreach ( $contact_page_emails as $contact_page_emails_item ) {
									?>
									<a href="mailto:<?=$contact_page_emails_item['contact_page_email_item']?>">
										<i class="glyph" aria-hidden="true" data-icon=""></i>
										<?=$contact_page_emails_item['contact_page_email_item']?>
									</a>
								<?php } 
								}
								?>
														
							</div>
							<div class="contact-page-info-item">
								<div class="contact-page-info-item-title">
									<?php the_field('contact_page_skype_title');?>
								</div>
								<?php
								$contact_page_skype = get_field('contact_page_skype');
								if ( $contact_page_skype ) {
									foreach ( $contact_page_skype as $contact_page_skype_item ) { ?>
									<a href="skype:<?=$contact_page_skype_item['contact_page_skype_item']?>">										
										<?=$contact_page_skype_item['contact_page_skype_item']?>
									</a>
								<?php 
									}
								}
								?>
															
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-8">
						<?php
						$contact_form_7_shortcode = get_field('contact_form_7_shortcode');
						if( $contact_form_7_shortcode ) {	?>
						<div class="contact-page-form-block">
							<?php echo do_shortcode($contact_form_7_shortcode);?>
						</div>
						<?php } ?>
					</div>
				</div>
			
			</div>
		  
			
		  
		  
			
		
		</div>
   
	
		<div class="contact-page-map-block">
			<div class="contact-page-map-title"><?php the_field('contact_page_map_title');?></div>
			<div class="contact-page-map">
				<iframe src="https://www.google.com/maps/d/u/1/embed?mid=1JEvC1yxs5OSKK5o9qC9PW7KuYsY" width="100%" height="480"></iframe>
			</div>
		</div>
	
	
	 </div>
</div>
<?php
endwhile;
?>

<?php get_footer();
