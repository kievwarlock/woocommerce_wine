<?php
/**
 * The template for displaying archive pages
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
		<div class="container">	
			<h1 class="page-title"><span>?</span>
			<?php 
			$obj = get_post_type_object( 'gallery' );
			echo $obj->labels->singular_name;
			?></h1>
			<div class="page-template">
				<div class="home-gallery-inner">
					<div class="row">
							
							<?php
							if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) : the_post(); 
								
								
								if( get_the_post_thumbnail_url() ) {
									
									$style_bg = 'style="background:url(' . get_the_post_thumbnail_url("", "large") . ') center no-repeat; background-size:cover; " ';
								
								}else{
									$style_bg = '';
								}	
			
								?>
									
							
									<div class="col-xs-12 col-sm-6 col-md-4">
										<div class="home-gallery-item">
											<div class="home-gallery-item-bg" <?=$style_bg?>  ></div>
											<div class="home-gallery-item-shadow"></div>
											<div class="home-gallery-item-title">
											<?php the_title();?>
											</div>
											<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="home-gallery-item-more"></a>
										</div>
									</div>
									
									
								
									
								<?php
								endwhile;

								

							else :

							endif;
							?>
					</div>
					<div class="post-pagination">
						<?php if(wp_pagenavi()) wp_pagenavi()?>
					</div>
				</div>
			</div>
		</div>
	</main>
	

<?php get_footer();
