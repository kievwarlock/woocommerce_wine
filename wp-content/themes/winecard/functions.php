<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

require_once 'wp_bootstrap_navwalker.php'; 
 
 
function winecard_setup() {
	
	
	load_theme_textdomain( 'winecard' );

	
	add_theme_support( 'post-thumbnails' );

	//add_image_size( 'winecard-featured-image', 2000, 1200, true );
	//add_image_size( 'winecard-thumbnail-avatar', 100, 100, true );


	register_nav_menus( array(
		'main_menu'    => 'Главное меню',
		'footer_one' => 'Подвал - меню1',
		'footer_two' => 'Подвал - меню2',
		'footer_three' => 'Подвал - меню3',
	) );

	

	

}
add_action( 'after_setup_theme', 'winecard_setup' );


function my_filter_berocket_widget_title ( $title ) {
	$title = __( $title, 'winecard' );
    return $title;
}

add_filter( 'berocket_aapf_widget_title', 'my_filter_berocket_widget_title' );

add_action( 'after_setup_theme', 'my_theme_setup' );
function my_theme_setup(){
    load_theme_textdomain( 'winecard', get_template_directory() . '/languages' );
}



function woocommerce_template_loop_add_to_cart_count() {
	
	?>
		<div class="add_to_cart_count_block">
			<div class="add_to_cart_count_btn up">
				<img src="<?=get_template_directory_uri()?>/img/count-up.png" alt="" >
			</div>
			<div class="add_to_cart_count">
				1
			</div>
			<div class="add_to_cart_count_btn down">
				<img src="<?=get_template_directory_uri()?>/img/count-down.png" alt="" >
			</div>
		</div>
		
	<?php
}

function winecard_widgets_init() {
	

	
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'winecard' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'winecard' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) ); 
	
	register_sidebar( array(
		'name'          => __( 'Product Sidebar', 'winecard' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'winecard' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) ); 


}
add_action( 'widgets_init', 'winecard_widgets_init' );



function winecard_scripts() {
	
	
		/* CSS include */ 
	wp_enqueue_style( 'nice-select',  get_theme_file_uri( '/assets/css/nice-select.css' ) , array(), null );	
	wp_enqueue_style( 'iconomous-icons',  get_theme_file_uri( '/assets/fonts/iconomous-font/style.css' ) , array(), null );	
	wp_enqueue_style( 'bootstrap-css',  get_theme_file_uri( '/assets/css/bootstrap.css' ), array(), null );
	wp_enqueue_style( 'bootstrap-theme',  get_theme_file_uri( '/assets/css/bootstrap-theme.css' ), array(), null );
	wp_enqueue_style( 'owl-carousel',  get_theme_file_uri( '/assets/owl-carousel/owl.carousel.css' ), array(), null );
	wp_enqueue_style( 'owl-carousel-theme',  get_theme_file_uri( '/assets/owl-carousel/owl.theme.css' ), array(), null );
	wp_enqueue_style( 'woocommerce-main-css',  get_theme_file_uri( '/assets/css/woocommerce.css' ), array(), null );
	wp_enqueue_style( 'winecard-style', get_stylesheet_uri() );
	if( is_front_page() ){
		wp_enqueue_style( 'custom-scrollbar-css',  get_theme_file_uri( '/assets/css/jquery.custom-scrollbar.css' ), array(), null );		
	}


	/* JS include */ 
	
	if( is_front_page() ){
		wp_enqueue_script( 'custom-scrollbar', get_theme_file_uri( '/assets/js/jquery.custom-scrollbar.js' ), array( 'jquery' ), '1.0', true );
	}
	
	wp_enqueue_script( 'nice-select', get_theme_file_uri( '/assets/js/jquery.nice-select.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/owl-carousel/owl.carousel.js' ), array( 'jquery' ), '1.0', true );	
	wp_enqueue_script( 'init-js', get_theme_file_uri( '/assets/js/init.js' ), array( 'jquery' ), '1.0', true );
	

	
}
add_action( 'wp_enqueue_scripts', 'winecard_scripts' );

add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {

     $currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );

     return $currencies;

}

if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
 
}


add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {

     switch( $currency ) {

         case 'UAH': $currency_symbol = 'грн'; break;

     }

     return $currency_symbol;

}



add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<a href="<?php echo WC()->cart->get_cart_url()?>" class="header-inner-info-cart">
		<i class="glyph" aria-hidden="true" data-icon="&#x34;"></i>	
		<span class="mini-cart-count"><?php echo WC()->cart->get_cart_contents_count();?></span>
	</a>
	
	<?php
	
	$fragments['a.header-inner-info-cart'] = ob_get_clean();
	
	return $fragments;
	
}

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +
 
function woo_archive_custom_cart_button_text() {
 
        return __( 'Buy', 'woocommerce' );
 
}



add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
function woo_hide_page_title() {	
	return false;	
}

// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	return $enqueue_styles;
}

// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}



// woocommerce_template_single_same_products  - same  products  
function woocommerce_template_single_same_products () {
	$product_id = get_the_ID();
	
	$return_str = '';

	if( $product_id ){
		$same_products = get_field('same_products', $product_id );
		if( $same_products ){
			$return_str .= '<div class="same-products">';
			foreach( $same_products as $same_products_item ){
				$product_obj = $same_products_item['same_products_item'];
				$prod_id = $product_obj->ID;
				$product = new WC_Product($prod_id );
				$product_data = $product->get_data();
				
				$return_str .= '<div class="same-products-item">';
					
					$volume = $product->get_attribute('volume');
					
			
					$return_str .= '<div class="same-products-item-val">';
						if(	$volume ){$return_str .= $volume;}
					$return_str .= '</div>';
									
				
					$return_str .= '<div class="same-products-item-sku">';
						if( $product_data['sku'] ){ $return_str .= 'арт. ' .$product_data['sku']; }
					$return_str .= '</div>';
					$return_str .= '<div class="same-products-item-price">';
						$return_str .= $product_data['price'] . ' ' . get_woocommerce_currency_symbol() ;
						
					$return_str .= '</div>';
					$return_str .= '<a href="' . get_permalink($prod_id) . '" class="same-products-item-link"></a>';

				$return_str .= '</div>';
			}
			$return_str .= '</div>';
		}else{
			return false;
		}
	}else{
		return false;
	}
	
	echo $return_str;
}


// woocommerce_output_accessories_products  - accessories product  
function woocommerce_output_accessories_products(){

		global $product, $woocommerce_loop;
		
	
		
		$terms_post = get_the_terms( $post->cat_ID , 'product_cat' );
		foreach ($terms_post as $term_cat) { 
			$term_cat_id = $term_cat->term_id; 
			if( $term_cat_id == 18){
				return false;
			}
		}

		

		$meta_query  = WC()->query->get_meta_query();
		$tax_query   = WC()->query->get_tax_query();
		$tax_query[] = array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => 'aksessuary',
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
				<div class="aksessuary-slider owl-carousel">
				<?php
				while ( $query_featured->have_posts() ) : $query_featured->the_post();							
					?>
					
					<div class="aksessuary-slider-item">
						<?php wc_get_template_part( 'content', 'featured' ); ?>
					</div>
					
					<?php
				endwhile; 
				?>
				</div>
				<div class="aksessuary-slider-prev">
					<img src="<?=get_template_directory_uri()?>/img/arrow-left.png" alt="slide prev">
				</div>
				<div class="aksessuary-slider-next">
					<img src="<?=get_template_directory_uri()?>/img/arrow-right.png" alt="slide next">
				</div>
			</div>
			<?php
			wp_reset_query();
		endif;
		
				
			
	
}

// woocommerce_template_single_exstra_description  - product description 

function woocommerce_template_single_exstra_description () {
	$product_id = get_the_ID();
	
	$return_str = '';
	
	if( $product_id ){
		$product_attr = get_field('product_attr', $product_id );
		if($product_attr){
			$return_str .= '<div class="product-exstra-fields">';			
			
			foreach ( $product_attr as $product_attr_item ) {
				$return_str .= '<div class="product-exstra-fields-name">';
				$return_str .= $product_attr_item['product_attr_name'];
				$return_str .= '</div>';
				$return_str .= '<div class="product-exstra-fields-value">';
				$return_str .= $product_attr_item['product_attr_description'];
				$return_str .= '</div>';	
			}
			
			$return_str .= '</div>';
		}
		
	}else{
		return false;
	}
	
	echo $return_str;
	
}

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );



add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {
	unset($tabs['reviews']);	 
	return $tabs;
}


// pa_recommended //

add_action( 'pa_recommended_add_form_fields', 'add_feature_group_field', 10, 2 );
function add_feature_group_field($taxonomy) {
    global $feature_groups;
    ?><div class="form-field term-group">
        <label for="featuret-group">Label font icon</label>
        <input type="text" class="postform"  name="label-font-icon" >          
    </div><?php
}

add_action( 'created_pa_recommended', 'save_feature_meta', 10, 2 );

function save_feature_meta( $term_id, $tt_id ){
    if( isset( $_POST['label-font-icon'] ) && '' !== $_POST['label-font-icon'] ){
        $group = $_POST['label-font-icon'];
        add_term_meta( $term_id, 'label-font-icon', $group, true );
    }
}

add_action( 'pa_recommended_edit_form_fields', 'edit_feature_group_field', 10, 2 );

function edit_feature_group_field( $term, $taxonomy ){
                
    global $feature_groups;
          
    // get current group
    $feature_group = get_term_meta( $term->term_id, 'label-font-icon', true );
                
    ?>
	<tr class="form-field term-group-wrap">
        <th scope="row"><label>label font icon</label></th>
        <td>
			<input type="text" class="postform" name="label-font-icon" value="<?=$feature_group?>">
		</td>
    </tr>
	<?php
}

add_action( 'edited_pa_recommended', 'update_feature_meta', 10, 2 );

function update_feature_meta( $term_id, $tt_id ){

    if( isset( $_POST['label-font-icon'] ) && '' !== $_POST['label-font-icon'] ){
        $group =  $_POST['label-font-icon'];
        update_term_meta( $term_id, 'label-font-icon', $group );
    }
	
}




/**
 * Добавление нового виджета banner_widget.
 */
class Banner_Widget extends WP_Widget {

	
	function __construct() {
		
		parent::__construct(
			'banner_widget',
			'Баннер',
			array( 'description' => 'Баннер в сайдбаре' )
		);

		
		// скрипты/стили виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_my_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_my_widget_style' ) );
		}		
		if ( is_admin() ) {
			wp_enqueue_script('init-js-admin', get_template_directory_uri() . '/assets/js/init-js-admin.js', array('jquery'));
		}	
	 
		
	}

	/**
	 * Вывод виджета во Фронт-энде
	 *
	 * @param array $args     аргументы виджета.
	 * @param array $instance сохраненные данные из настроек
	 */
	function widget( $args, $instance ) {
		

		echo $args['before_widget'];
		
		
		$instance['title'];
		$instance['btn_label'];
		$instance['btn_url'];
		$instance['image'];
		
		$return_html .= '<div class="main-sidebar-banner-inner hidden-xs">';
		if($instance['image']){
			$return_html .= '<img src="' . $instance['image'] . '" alt="">';
		}	
		if( $instance['btn_label'] and $instance['btn_url'] ){
			$return_html .= '<div class="main-sidebar-banner-inner-btn-block">';
				$return_html .= '<a href="' . $instance['btn_url'] . '" class="main-sidebar-banner-inner-btn">';
					$return_html .=   __(  $instance['btn_label'] , 'winecard' );
				$return_html .= '</a>';
			$return_html .= '</div>';
		}elseif( $instance['btn_url'] ){
			$return_html .= '<a href="' . $instance['btn_url'] . '" class="main-sidebar-banner-inner-btn-absolute">';
			$return_html .= '</a>';
		}
		
		$return_html .= '</div>';
		
		echo $return_html;
		echo $args['after_widget'];
	}

	/**
	 * Админ-часть виджета
	 *
	 * @param array $instance сохраненные данные из настроек
	 */
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Баннер';
		$btn_label = @ $instance['btn_label'] ?: '';
		$btn_url = @ $instance['btn_url'] ?: '';
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'btn_label' ); ?>">Текст кнопки:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'btn_label' ); ?>" name="<?php echo $this->get_field_name( 'btn_label' ); ?>" type="text" value="<?php echo esc_attr( $btn_label ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'btn_url' ); ?>">Ссылка кнопки:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'btn_url' ); ?>" name="<?php echo $this->get_field_name( 'btn_url' ); ?>" type="text" value="<?php echo esc_attr( $btn_url ); ?>">
		</p>
		
		<p>
		  <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
		  <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
		  <button class="upload_image_button button button-primary">Upload Image</button>
	   </p>
		<?php 
	}

	/**
	 * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance новые настройки
	 * @param array $old_instance предыдущие настройки
	 *
	 * @return array данные которые будут сохранены
	 */
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['btn_label'] = ( ! empty( $new_instance['btn_label'] ) ) ? strip_tags( $new_instance['btn_label'] ) : '';
		$instance['btn_url'] = ( ! empty( $new_instance['btn_url'] ) ) ? strip_tags( $new_instance['btn_url'] ) : '';
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
		 
		 
	
		return $instance;
	}


	// скрипт виджета
	function add_my_widget_scripts() {
		
		if ( is_admin() ) {
			$theme_url = get_stylesheet_directory_uri();
			wp_enqueue_script( 'media-upload' );
			wp_enqueue_media();
		}	
			

	}

	// стили виджета
	function add_my_widget_style() {
		// фильтр чтобы можно было отключить стили
		if( ! apply_filters( 'show_my_widget_style', true, $this->id_base ) )
			return;
		
	}

} 
// конец класса banner_widget


// регистрация banner_widget в WordPress
function register_banner_widget() {
	register_widget( 'banner_widget' );
}

add_action( 'widgets_init', 'register_banner_widget' );




/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );




/**
 * Implement the Custom Header feature.
 */
//require get_parent_theme_file_path( '/inc/custom-header.php' );

