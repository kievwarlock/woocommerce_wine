<div class="blog-archive-item">
	<div class="blog-archive-item-date">
		<span><?php echo get_the_date('n.j'); ?></span>
		<span><?php echo get_the_date('Y'); ?></span>
	</div>
	<div class="row">
		<?php
		if( get_the_post_thumbnail_url() ) {
			$style_bg = 'style="background:url(' . get_the_post_thumbnail_url("", "large") . ') center no-repeat; background-size:cover; " ';
			
			?>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="blog-archive-item-left">
				
				
					<div class="blog-archive-item-image">
						<div class="blog-archive-item-image-bg" <?=$style_bg?>  ></div>
					</div>		
				
				
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
		<?php
		}else{ ?>
			<div class="col-xs-12 col-sm-3 col-md-2">
				<div class="blog-archive-item-left"></div>
			</div>
		
			<div class="col-xs-12 col-sm-9 col-md-10">
		<?php } ?>
		
		
			<div class="blog-archive-item-right">
				<a href="<?php the_permalink();?>">
					<div class="blog-archive-item-title">
						<?php the_title();?>
					</div>
				</a>
				<div class="blog-archive-item-categories">
					<?php
						$post_id = get_the_ID();
						$post_categories = wp_get_post_categories( $post_id  );
						$cats = array();
							 
						foreach($post_categories as $c){
							$cat = get_category( $c );					
							?>
							<a href="<?=get_category_link($cat->term_id) ?>">
								<?=$cat->name?>
							</a>
							<?php
						}
					?>
					
				</div>
				<div class="blog-archive-item-description">
					<?php the_excerpt();?>
				</div>
				<div class="blog-archive-item-info">
					<div class="blog-archive-item-info-share">
						<div class="single-header-share">
							<span><?=__( 'Share', 'woocommerce' );?></span> <?php echo do_shortcode('[apss-share]');?>
						</div>
					</div>	
					<div class="blog-archive-item-info-read-more">
						<a href="<?php the_permalink();?>">
							<?=__( 'Read more', 'woocommerce' );?><span class="iconomous" >J</span>
						</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>

</div>