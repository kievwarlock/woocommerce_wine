<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<main>
	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();

	?>
	<div class="container">	
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
					
				<div class="single-header-gallery">
					
					<div class="single-gallery-title">
						<span class="iconomous" >?</span><?php the_title();?>
					</div>
					<div class="single-header-share">
						<span><?=__( 'Share', 'woocommerce' );?></span> <?php echo do_shortcode('[apss-share]');?>
					</div>
				
				</div>			
				
			</div>
		</div>
		<div class="page-template">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
					<div class="post-single">
						<?php 
						$gallery_page = get_field('gallery_page');
						if( $gallery_page ){
							foreach ( $gallery_page  as $gallery_page_item ) { 
						
							$style_bg = 'style="background:url(' . $gallery_page_item['sizes']['large'] . ') center no-repeat; background-size:cover; " ';
								
							
							?>
							<div class="col-xs-12 col-sm-6">
								<div class="home-gallery-item">
									<div class="home-gallery-item-bg" <?=$style_bg?>  ></div>
									<div class="home-gallery-item-shadow">
										
									</div>
									
									<a href="<?php echo $gallery_page_item['url'] ?>" rel="lightbox" class="home-gallery-item-more">
										<span class="iconomous">~</span>
									</a>
								</div>
							</div>	
							<?php }
						}
						?>
						
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<div class="blog-sidebar">
						<?php get_template_part( 'template-parts/sidebar/sidebar', 'gallery' ); ?>
					</div>
				</div>
				
			</div>
		</div>
	</div>


	<?php
	endwhile; // End of the loop.
	?>

</main>	

<?php get_footer();
