(function($){
  $(function(){
	  
	  
	  
	  
	$('body').on('click','.product-quantity .add_to_cart_count_block .add_to_cart_single_count_btn', function(){
		$('.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled]').prop( "disabled", false );	
	})
	 
	function ActiveBlock (){
		
		var activeSelect = '.single-product-sidebar-cart';
		if( $( activeSelect ).length > 0 ) {
			
			var blockWidth = $(activeSelect).width();
			if( $('#wpadminbar').length > 0 ){
				var activeBlock  =   $(activeSelect).offset().top - $('header').outerHeight() ; 
			}else{
				var activeBlock  =   $(activeSelect).offset().top ; 
			}
			
			//console.log(activeBlock);
			$( window ).scroll(function() {
				var currentTop = $(document).scrollTop();
				
				if( activeBlock < currentTop ){	
					$(activeSelect).css('width', blockWidth );							
					$(activeSelect).css('left',$(activeSelect).offset().left );	
					
					if( $('#wpadminbar').length > 0 ){
						$(activeSelect).css('top', $('header').outerHeight() + 40);	
					}else{
						$(activeSelect).css('top', $('header').outerHeight() );	
					}
					
					
					
					$(activeSelect).addClass('active');
					
					$('.single-product-sidebar-banner').css('margin-top',  $(activeSelect).height() );
					

				}else{
					$(activeSelect).css('left', '' );
					$(activeSelect).css('width', 'initial');					
					$(activeSelect).removeClass('active');
					$(activeSelect).css('top', 'initial' );	
					$('.single-product-sidebar-banner').css('margin-top', 'initial' );
				}
			});
		}else{
			return;
		}
		
		
		
	}
	if( $( window ).width() > 767 ){
		ActiveBlock();
	}
	$( window ).resize(function() {	
		if( $( window ).width() > 767 ){
			ActiveBlock();
		}
	});


	 
  /* Main block padding */
	function mainPadding () {
		var headerHeight = $('header').outerHeight();
		$('main').css('padding-top', headerHeight);
	}
	mainPadding();
	
	
	$( window ).resize(function() {
		mainPadding();

	});
	
	
	
	
	$('select.orderby').niceSelect();
	
	
	/* sidebar filter hide block*/
	$('.widget-title.berocket_aapf_widget-title').on('click', function () {
		$(this).toggleClass('active');
		$(this).parent().find('ul.berocket_aapf_widget').slideToggle('fast');
	})
	
	/* END sidebar filter hide block */
	
	
	/* COUNT ADD TO CART */
	
	$('body').on('click', '.add_to_cart_count_btn.down',  function(){
		var currentCount = $(this).parent().find('.add_to_cart_count').text().trim();
		if(currentCount > 1 ){
			var newCount = parseInt(currentCount) - 1;
			$(this).parent().find('.add_to_cart_count').text(newCount);
			$(this).parents('.product').find('.ajax_add_to_cart').attr('data-quantity',newCount);
		}	
		
	})
	$('body').on('click', '.add_to_cart_count_btn.up' , function(){
		var currentCount = $(this).parent().find('.add_to_cart_count').text().trim();		
		var newCount = parseInt(currentCount) + 1;
		$(this).parent().find('.add_to_cart_count').text(newCount);
		$(this).parents('.product').find('.ajax_add_to_cart').attr('data-quantity',newCount);			
	})
	
	
	
		
	/* COUNT ADD TO CART SINGLE PRODUCT */
	
	$('body').on('click', '.add_to_cart_single_count_btn.down',  function(){
		var currentCount = $(this).parent().find('.add_to_cart_count input').val().trim();
		if(currentCount > 1 ){
			var newCount = parseInt(currentCount) - 1;
			$(this).parent().find('.add_to_cart_count input').val(newCount);			
		}	
		
	})
	$('body').on('click', '.add_to_cart_single_count_btn.up' , function(){
		var currentCount = $(this).parent().find('.add_to_cart_count input').val().trim();		
		var newCount = parseInt(currentCount) + 1;
		$(this).parent().find('.add_to_cart_count input').val(newCount);				
	})
	
	
/* 	
	var trainingSlider = $(".home-training-slider");

    trainingSlider.owlCarousel({
		pagination : true,
		items : 1, //10 items above 1000px browser width
		itemsDesktop : [1200,1], //5 items between 1000px and 901px
		itemsDesktopSmall : [992,1], // 3 items betweem 900px and 601px
		itemsTablet: [768,1], //2 items between 600 and 0;
		itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
      
    });
	$(".home-training-prev").click(function(){
		trainingSlider.trigger('owl.prev');
    })
    $(".home-training-next").click(function(){
		trainingSlider.trigger('owl.next');
    }) 
 */
 
 
 
	var homeFeatured = $(".featured-slider");

    homeFeatured.owlCarousel({
		pagination : false,
		items : 4, //10 items above 1000px browser width
		itemsDesktop : [1400,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [1200,2], // 3 items betweem 900px and 601px
		itemsTablet: [768,1], //2 items between 600 and 0;
		itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
      
    });
	$(".featured-slider-prev").click(function(){
		homeFeatured.trigger('owl.prev');
    })
    $(".featured-slider-next").click(function(){
		homeFeatured.trigger('owl.next');
    }) 
	
	var productRelated = $(".related-slider");

    productRelated.owlCarousel({
		pagination : false,
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1400,2], //5 items between 1000px and 901px
		itemsDesktopSmall : [1200,1], // 3 items betweem 900px and 601px
		itemsTablet: [768,1], //2 items between 600 and 0;
		itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
      
    });
	$(".featured-slider-prev").click(function(){
		productRelated.trigger('owl.prev');
    })
    $(".featured-slider-next").click(function(){
		productRelated.trigger('owl.next');
    }) 
	
	
	var productUpSells = $(".up-sells-slider");
	productUpSells.owlCarousel({
		pagination : false,
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1400,2], //5 items between 1000px and 901px
		itemsDesktopSmall : [1200,1], // 3 items betweem 900px and 601px
		itemsTablet: [768,1], //2 items between 600 and 0;
		itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
      
    });
	$(".featured-slider-prev.up-sells").click(function(){
		productUpSells.trigger('owl.prev');
    })
    $(".featured-slider-next.up-sells").click(function(){
		productUpSells.trigger('owl.next');
    }) 
	
	var productAksessuarys = $(".aksessuary-slider");
	productAksessuarys.owlCarousel({
		pagination : false,
		items : 1, //10 items above 1000px browser width
		itemsDesktop : [1400,1], //5 items between 1000px and 901px
		itemsDesktopSmall : [1200,1], // 3 items betweem 900px and 601px
		itemsTablet: [768,1], //2 items between 600 and 0;
		itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
      
    });
	$(".aksessuary-slider-prev").click(function(){
		productAksessuarys.trigger('owl.prev');
    })
    $(".aksessuary-slider-next").click(function(){
		productAksessuarys.trigger('owl.next');
    }) 
	
	
	
	var homeSlider = $(".home-slider");

    homeSlider.owlCarousel({
		pagination : true,
		autoPlay : 5000,
		stopOnHover: true,
		items : 1, //10 items above 1000px browser width
		itemsDesktop : [1200,1], //5 items between 1000px and 901px
		itemsDesktopSmall : [992,1], // 3 items betweem 900px and 601px
		itemsTablet: [768,1], //2 items between 600 and 0;
		itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
      
    });
	
		
		
	
	$('body').click(function(e) {
		var target = $(e.target);
		if( !target.is('.header-inner-search *') &&  !target.is('.header-inner-search-hidden *') ) {
			$('.header-inner-search-hidden').slideUp();
		}
	});
	$('.header-inner-search').on('click', function(){
		$('.header-inner-search-hidden').slideToggle();
	})
	

	
	/** HOME SLIDER BLOG ACTION **/

	/* $( ".home-slider-item" )
		.mouseover(function() {
			$( this ).find(".hide-slider-block").slideToggle() 
		})
		.mouseout(function() {
			$( this ).find(".hide-slider-block").slideToggle() 
		}); */
	/** END HOME SLIDER BLOG ACTION **/
	
	
	
	/** CUSTOM SCROLL **/
	
	if ( $(".custom-scroll").length > 0 ) {
		 $(".custom-scroll").customScrollbar();
	}
	
    /** END CUSTOM SCROLL **/
	



	
  }); // end of document ready
})(jQuery); // end of jQuery name space