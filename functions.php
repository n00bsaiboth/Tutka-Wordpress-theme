<?php
	/* Functions and definitions
	 * 
	 * Description: One of the most important files on the WP-theme directory.
	 * 
	 */  
	
	
	/* Theme setup
	 * 
	 * Description: Set's up the theme functions
	 * 
	 */ 
	 
	function tutka_setup() {
			  
		/* add support to featured images and custom sizes.
		 * 
		 */
		
		if (function_exists('add_theme_support')) {
			add_theme_support('post-thumbnails');
			set_post_thumbnail_size(150, 150, true);
		}
		
        if (function_exists('add_image_size')) {
        	add_image_size('category-thumb', 300, 9999);
			add_image_size('homepage-thumb', 220, 180, true);
        }
		
		/* add css support to editor 
		 * 
		 */ 
		
		add_editor_style();
		
		/* add support to variety of post formats
		 * 
		 */  
		 
   	    add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );
		 
		/* Register main menu and other menus
	 	 * - mobile menu is not completed, but you can find the navigation.js file in the js folder.
		 *   also in the images folder there are image called menu-icon.png that's the toggle button.
		 * - footer menu is also not completed, but we are working onit. 
	 	 */
	 	    
		register_nav_menu('main-menu', __('Main Menu', 'tutka')); 	
		register_nav_menu('mobile-menu', __('Mobile Menu', 'tutka'));
		register_nav_menu('fat-footer-menu', __('Fat Footer Menu', 'tutka'));
	} 
	
	add_action('after_setup_theme', 'tutka_setup');
	
	/* Scripts and styles
	 * 
	 */
	 
	function tutka_scripts_styles() {
	
		/* Load main stylesheet
		 * 
		 */	
		
		wp_enqueue_style( 'tutka-style', get_stylesheet_uri() );
		
		// load smoothness css libary from jquery ui
		wp_enqueue_style( 'tutka-smoothness', get_template_directory_uri() . '/css/jquery-ui.css');
		
		
		/* Load jquery
		 * 
		 */ 
		// we don't need to load jquery, because it comes with the wordpress. 
		
		wp_enqueue_script( 'tutka-jquery', get_template_directory_uri() . '/js/jquery-1.9.1.min.js');
		wp_enqueue_script( 'tutka-modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js');
		wp_enqueue_script( 'tutka-jqueryui', get_template_directory_uri() . '/js/jquery-ui-1.10.3.custom.min.js');
		wp_enqueue_script( 'tutka-navigation', get_template_directory_uri() . '/js/navigation.js');
		wp_enqueue_script( 'tutka-custom', get_template_directory_uri() . 'js/custom.js');
		
		// wp_enqueue_script( 'tutka-metaimage', get_template_directory_uri() . '/js/meta-image.js');
	    
	}
	
	add_action('wp_enqueue_scripts', 'tutka_scripts_styles');
	
	/* Widgets
	 * 
	 */
	
	function tutka_widgets_init() {
		register_sidebar(array(
		  'name' => __('Main sidebar', 'tutka'),
		  'id' => 'sidebar-1',
		  'description' => __('Etusivun sivupalkki, oikealla', 'tutka'),
		  'before_widget' => '<section id="%1$s" class="widget %2$s">',
		  'after_widget' => '</section>',
		  'before_title' => '<h3 class="widget-title">',
		  'after_title' => '</h3>'
		));
		
		register_sidebar(array(
		  'name' => __('Footer sidebar 1', 'tutka'),
		  'id' => 'sidebar-2',
		  'description' => __('Footer Widgets, 1', 'tutka'),
		  'before_widget' => '<section id="%1$s" class="widget %2$s">',
		  'after_widget' => '</section>',
		  'before_title' => '<h4 class="widget-title">',
		  'after_title' => '</h4>'
		));
		
		register_sidebar(array(
		  'name' => __('Footer sidebar 2', 'tutka'),
		  'id' => 'sidebar-3',
		  'description' => __('Footer Widgets, 2', 'tutka'),
		  'before_widget' => '<section id="%1$s" class="widget %2$s">',
		  'after_widget' => '</section>',
		  'before_title' => '<h4 class="widget-title">',
		  'after_title' => '</h4>'
		));

		register_sidebar(array(
		  'name' => __('Footer sidebar 3', 'tutka'),
		  'id' => 'sidebar-4',
		  'description' => __('Footer Widgets, 3', 'tutka'),
		  'before_widget' => '<section id="%1$s" class="widget %2$s">',
		  'after_widget' => '</section>',
		  'before_title' => '<h4 class="widget-title">',
		  'after_title' => '</h4>'
		));
		
		register_sidebar(array(
		  'name' => __('Footer sidebar 4', 'tutka'),
		  'id' => 'sidebar-5',
		  'description' => __('Footer Widgets, 4', 'tutka'),
		  'before_widget' => '<section id="%1$s" class="widget %2$s">',
		  'after_widget' => '</section>',
		  'before_title' => '<h4 class="widget-title">',
		  'after_title' => '</h4>'
		));
	}
	
	add_action('widgets_init','tutka_widgets_init');
	
	/* Metaboxes
	 * 
	 */
	 
    /* Here are all our custom fields
	 * 
	 * article_caption
     * article_image
     * article_image_caption
     * article_sub_header
     *
     * frontpage_caption
     * frontpage_image
     * frontpage_image_caption
     * frontpage_media_image
     * frontpage_media_url
     * frontpage_media_caption
     *
     * image
	 *
	 */
	 
	 /* Add metaboxes to edit screen
	  * 
	  */
	 
	 function tutka_setup_metaboxes() {
	 	add_meta_box('article_caption_id', 'Artikkelin ingressi', 'setup_article_caption', post);
		add_meta_box('article_image_id', 'Artikkelin kuva', 'setup_article_image', post);
		add_meta_box('article_image_caption_id', 'Artikkelin kuvateksti', 'setup_article_image_caption', post);
		add_meta_box('article_sub_header_id', 'Artikkelin otsikko', 'setup_article_sub_header', post);
		
		add_meta_box('frontpage_caption_id', 'Etusivun ingressi', 'setup_frontpage_caption', post);
		add_meta_box('frontpage_image_id', 'Etusivun kuva', 'setup_frontpage_image', post);
		add_meta_box('frontpage_image_caption_id', 'Etusivun kuvateksti', 'setup_frontpage_image_caption', post);
		
		add_meta_box('frontpage_media_image_id', 'Etusivun media', 'setup_frontpage_media_image', post);
		add_meta_box('frontpage_media_url_id', 'Etusivun media url', 'setup_frontpage_media_url', post);
		add_meta_box('frontpage_media_caption_id', 'Etusivun median kuvateksti', 'setup_frontpage_media_caption', post);
	 }
	 
	 add_action('add_meta_boxes','tutka_setup_metaboxes');
	 
	 /* Add content to metaboxes
	  * 
	  */	
	  
	function setup_article_caption( $post ) {
		// verificate data
		wp_nonce_field( plugin_basename( __FILE__ ), 'article_caption_check');
		
		$value = get_post_meta($post->ID,'article_caption', true);
		
		$setup_form = '<label for="article_caption">';
		$setup_form .= 'Syötä artikkelin ingressi: ';
		$setup_form .= '</label>';
		$setup_form .= '<input type="text" name="article_caption" id="article_caption" value="'. esc_attr($value) .'" size="25">';
	
	    echo $setup_form;
	}  
		
	function save_article_caption( $post_id ) {
	    // check user privileges
	     if ( 'page' == $_POST['post_type'] ) {
           if ( ! current_user_can( 'edit_page', $post_id ) )
           return;
         } else {
           if ( ! current_user_can( 'edit_post', $post_id ) )
             return;
        }
        // verificate that user had made the change
 
	    if ( ! isset( $_POST['article_caption_check'] ) || ! wp_verify_nonce( $_POST['article_caption_check'], plugin_basename( __FILE__ ) ) ) 
          return;
		
		
		$value = sanitize_text_field( $_POST['article_caption'] );		
		
		add_post_meta($post_id, 'article_caption', $value, true) or
        update_post_meta($post_id, 'article_caption', $value);	
	} 
	
    add_action('save_post','save_article_caption');
	
	function print_article_caption($caption) {
		global $post;
		
		$return_value = get_post_meta($post->ID, $caption, true);
		
		$return_value = esc_html($return_value);
		
		return $return_value;	
	}
	
	function setup_article_image_caption($post) {
		// verificate data
		wp_nonce_field( plugin_basename( __FILE__ ), 'article_image_caption_check');
		
		$value = get_post_meta($post->ID,'article_image_caption', true);
		
		$setup_form = '<label for="article_image_caption">';
		$setup_form .= 'Syötä artikkelin kuvateksti: ';
		$setup_form .= '</label>';
		$setup_form .= '<input type="text" name="article_image_caption" id="article_image_caption" value="'. esc_attr($value) .'" size="25">';
		
		echo $setup_form;
	}
	
	function save_article_image_caption($post_id) {
	    // check user privileges
	    if ( 'page' == $_POST['post_type'] ) {
          if ( ! current_user_can( 'edit_page', $post_id ) )
          return;
        } else {
          if ( ! current_user_can( 'edit_post', $post_id ) )
          return;
        }
		
		// verificate that user had made the change

	    if ( ! isset( $_POST['article_image_caption_check'] ) || ! wp_verify_nonce( $_POST['article_image_caption_check'], plugin_basename( __FILE__ ) ) ) 
          return;
		
		$value = sanitize_text_field( $_POST['article_image_caption'] );		
		
		add_post_meta($post_id, 'article_image_caption', $value, true) or
        update_post_meta($post_id, 'article_image_caption', $value);	
	} 
	
	add_action('save_post','save_article_image_caption');	
	
	function print_article_image_caption($image_caption) {
		global $post;
		
		$return_value = get_post_meta($post->ID, $image_caption, true);
		
		$return_value = esc_attr($return_value);
		
		return $return_value;	
	}
	
	
	function setup_article_sub_header($post) {
		// verificate data
		wp_nonce_field( plugin_basename( __FILE__ ), 'article_sub_header_check');
		
		$value = get_post_meta($post->ID,'article_sub_header', true);
		
		$setup_form = '<label for="article_sub_header">';
		$setup_form .= 'Syötä artikkelin väliotsikko: ';
		$setup_form .= '</label>';
		$setup_form .= '<input type="text" name="article_sub_header" id="article_sub_header" value="'. esc_attr($value) .'" size="25">';
		
		echo $setup_form;
	} 	 
	
	function save_article_sub_header($post_id) {
	    // check user privileges
	    if ( 'page' == $_POST['post_type'] ) {
          if ( ! current_user_can( 'edit_page', $post_id ) )
          return;
        } else {
          if ( ! current_user_can( 'edit_post', $post_id ) )
          return;
        }
		
		// verificate that user had made the change

	    if ( ! isset( $_POST['article_sub_header_check'] ) || ! wp_verify_nonce( $_POST['article_sub_header_check'], plugin_basename( __FILE__ ) ) ) 
          return;
		
		
		$value = sanitize_text_field( $_POST['article_sub_header'] );		
		
		add_post_meta($post_id, 'article_sub_header', $value, true) or
        update_post_meta($post_id, 'article_sub_header', $value);	
	} 
	
	add_action('save_post','save_article_sub_header');	

	function print_article_sub_header($header) {
		global $post;
		
		$return_value = get_post_meta($post->ID, $header, true);
		
		$return_value = esc_html($return_value);
		
		return $return_value;	
	}	
	
	
    function setup_article_image( $post ) {
		// verificate data
		wp_nonce_field( plugin_basename( __FILE__ ), 'article_image_check');
		
		$value = get_post_meta($post->ID,'article_image', true);
		
		$setup_form = '<label for="article_image">';
		$setup_form .= 'Syötä artikkelin kuva: ';
		$setup_form .= '</label>';
		$setup_form .= '<input type="text" name="article_image" id="article_image" value="'. esc_attr($value) .'" size="25">';
	    $setup_form .= '<input type="button" id="article_image_button" class="button" value="Valitse kuva" />';
		
	    echo $setup_form;
	}  
	
	function save_article_image( $post_id ) {
	    // check user privileges
	    if ( 'page' == $_POST['post_type'] ) {
          if ( ! current_user_can( 'edit_page', $post_id ) )
          return;
        } else {
          if ( ! current_user_can( 'edit_post', $post_id ) )
          return;
        }
		
		// verificate that user had made the change

	    if ( ! isset( $_POST['article_image_check'] ) || ! wp_verify_nonce( $_POST['article_image_check'], plugin_basename( __FILE__ ) ) ) 
          return;		
		
		$value = sanitize_text_field( $_POST['article_image'] );
		
        add_post_meta($post_id, 'article_image', $value, true) or
        update_post_meta($post_id, 'article_image', $value);		
	}
	
	add_action('save_post','save_article_image');	
	
	/* Load the image management to Javascript
	 * 
	 */
 
   function article_image_enqueue() {
   		global $typenow;
		
		if($typenow == 'post') {
			wp_enqueue_media();
			
			
			// Registers and enqueues the required javascript.
			wp_register_script( 'meta-image', get_template_directory_uri() . '/js/meta-image.js', array( 'jquery' ) );
			wp_localize_script( 'meta-image', 'meta_image',
				array(
					'title' => 'Valitse kuva',
					'button' => 'Käytä tätä kuvaa',
				)
			);
			wp_enqueue_script( 'meta-image' );
		} // End if
	}
	
	add_action( 'admin_enqueue_scripts', 'article_image_enqueue' );
	
	function print_article_image($image) {
		global $post;
		$return_value = get_post_meta($post->ID, $image, true);
	
	    return $return_value;
	}
	
	function setup_frontpage_caption($post) {
		wp_nonce_field( plugin_basename( __FILE__ ), 'frontpage_caption_check');
		
		$value = get_post_meta($post->ID,'frontpage_caption', true);
		
		$setup_form = '<label for="frontpage_caption">';
		$setup_form .= 'Syötä etusivun ingressi: ';
		$setup_form .= '</label>';
		$setup_form .= '<input type="text" name="frontpage_caption" id="frontpage_caption" value="'. esc_attr($value) .'" size="25">';
	
	    echo $setup_form;		
	}

	function save_frontpage_caption( $post_id ) {
	    // check user privileges
	     if ( 'page' == $_POST['post_type'] ) {
           if ( ! current_user_can( 'edit_page', $post_id ) )
           return;
         } else {
           if ( ! current_user_can( 'edit_post', $post_id ) )
             return;
        }
        // verificate that user had made the change
 
	    if ( ! isset( $_POST['frontpage_caption_check'] ) || ! wp_verify_nonce( $_POST['frontpage_caption_check'], plugin_basename( __FILE__ ) ) ) 
          return;
		
		
		$value = sanitize_text_field( $_POST['frontpage_caption'] );		
		
		add_post_meta($post_id, 'frontpage_caption', $value, true) or
        update_post_meta($post_id, 'frontpage_caption', $value);	
	} 
	
	add_action('save_post','save_frontpage_caption');
	
	function print_frontpage_caption($caption) {
		global $post;
		
		$return_value = get_post_meta($post->ID, $caption, true);
		$return_value = esc_html($return_value);
		
		return $return_value;
	}
	
    function setup_frontpage_image_caption($post) {
		wp_nonce_field( plugin_basename( __FILE__ ), 'frontpage_image_caption_check');
		
		$value = get_post_meta($post->ID,'frontpage_image_caption', true);
		
		$setup_form = '<label for="frontpage_image_caption">';
		$setup_form .= 'Syötä etusivun kuvateksti: ';
		$setup_form .= '</label>';
		$setup_form .= '<input type="text" name="frontpage_image_caption" id="frontpage_image_caption" value="'. esc_attr($value) .'" size="25">';
	
	    echo $setup_form;		
	}


	function save_frontpage_image_caption( $post_id ) {
	    // check user privileges
	     if ( 'page' == $_POST['post_type'] ) {
           if ( ! current_user_can( 'edit_page', $post_id ) )
           return;
         } else {
           if ( ! current_user_can( 'edit_post', $post_id ) )
             return;
        }
        // verificate that user had made the change
 
	    if ( ! isset( $_POST['frontpage_image_caption_check'] ) || ! wp_verify_nonce( $_POST['frontpage_image_caption_check'], plugin_basename( __FILE__ ) ) ) 
          return;
		
		
		$value = sanitize_text_field( $_POST['frontpage_image_caption'] );		
		
		add_post_meta($post_id, 'frontpage_image_caption', $value, true) or
        update_post_meta($post_id, 'frontpage_image_caption', $value);	
	} 
	
	add_action('save_post','save_frontpage_image_caption');	
	
	function print_frontpage_image_caption($caption) {
		global $post;
		
		$return_value = get_post_meta($post->ID, $caption, true);
		$return_value = esc_attr($return_value);
		
		return $return_value;
	}
	
	function setup_frontpage_media_caption($post) {
		wp_nonce_field( plugin_basename( __FILE__ ), 'frontpage_media_caption_check');
		
		$value = get_post_meta($post->ID,'frontpage_media_caption', true);
		
		$setup_form = '<label for="frontpage_media_caption">';
		$setup_form .= 'Syötä etusivun median kuvateksti: ';
		$setup_form .= '</label>';
		$setup_form .= '<input type="text" name="frontpage_media_caption" id="frontpage_media_caption" value="'. esc_attr($value) .'" size="25">';
	
	    echo $setup_form;		
	}


	function save_frontpage_media_caption( $post_id ) {
	    // check user privileges
	     if ( 'page' == $_POST['post_type'] ) {
           if ( ! current_user_can( 'edit_page', $post_id ) )
           return;
         } else {
           if ( ! current_user_can( 'edit_post', $post_id ) )
             return;
        }
        // verificate that user had made the change
 
	    if ( ! isset( $_POST['frontpage_media_caption_check'] ) || ! wp_verify_nonce( $_POST['frontpage_media_caption_check'], plugin_basename( __FILE__ ) ) ) 
          return;
		
		
		$value = sanitize_text_field( $_POST['frontpage_media_caption'] );		
		
		add_post_meta($post_id, 'frontpage_media_caption', $value, true) or
        update_post_meta($post_id, 'frontpage_media_caption', $value);	
	} 
	
	add_action('save_post','save_frontpage_media_caption');		
	
	function print_frontpage_media_caption($caption) {
		global $post;
		
		$return_value = get_post_meta($post->ID, $caption, true);
		$return_value = esc_attr($return_value);
		
		return $return_value;
	}
	
	
	function setup_frontpage_media_url($post) {
		wp_nonce_field( plugin_basename( __FILE__ ), 'frontpage_media_url_check');
		
		$value = get_post_meta($post->ID,'frontpage_media_url', true);
		
		$setup_form = '<label for="frontpage_media_url">';
		$setup_form .= 'Syötä etusivun median url: ';
		$setup_form .= '</label>';
		$setup_form .= '<input type="text" name="frontpage_media_url" id="frontpage_media_url" value="'. esc_attr($value) .'" size="25">';
	
	    echo $setup_form;		
	}


	function save_frontpage_media_url( $post_id ) {
	    // check user privileges
	     if ( 'page' == $_POST['post_type'] ) {
           if ( ! current_user_can( 'edit_page', $post_id ) )
           return;
         } else {
           if ( ! current_user_can( 'edit_post', $post_id ) )
             return;
        }
        // verificate that user had made the change
 
	    if ( ! isset( $_POST['frontpage_media_url_check'] ) || ! wp_verify_nonce( $_POST['frontpage_media_url_check'], plugin_basename( __FILE__ ) ) ) 
          return;
		
		
		$value = sanitize_text_field( $_POST['frontpage_media_url'] );		
		
		add_post_meta($post_id, 'frontpage_media_url', $value, true) or
        update_post_meta($post_id, 'frontpage_media_url', $value);	
	} 
	
	add_action('save_post','save_frontpage_media_url');		
	
	function print_frontpage_media_url($url) {
		global $post;
		
		$return_value = get_post_meta($post->ID, $url, true);
		$return_value = esc_url($return_value);
		
		return $return_value;
	}
	
	
    function setup_frontpage_image( $post ) {
		// verificate data
		wp_nonce_field( plugin_basename( __FILE__ ), 'frontpage_image_check');
		
		$value = get_post_meta($post->ID,'frontpage_image', true);
		
		$setup_form = '<label for="frontpage_image">';
		$setup_form .= 'Syötä etusivun kuva: ';
		$setup_form .= '</label>';
		$setup_form .= '<input type="text" name="frontpage_image" id="frontpage_image" value="'. esc_attr($value) .'" size="25">';
	    $setup_form .= '<input type="button" id="frontpage_image_button" class="button" value="Valitse kuva" />';
		
	    echo $setup_form;
	}  

	
	function save_frontpage_image( $post_id ) {
	    // check user privileges
	    if ( 'page' == $_POST['post_type'] ) {
          if ( ! current_user_can( 'edit_page', $post_id ) )
          return;
        } else {
          if ( ! current_user_can( 'edit_post', $post_id ) )
          return;
        }
		
		// verificate that user had made the change

	    if ( ! isset( $_POST['frontpage_image_check'] ) || ! wp_verify_nonce( $_POST['frontpage_image_check'], plugin_basename( __FILE__ ) ) ) 
          return;		
		
		$value = sanitize_text_field( $_POST['frontpage_image'] );
		
		add_post_meta($post_id, 'frontpage_image', $value, true) or
        update_post_meta($post_id, 'frontpage_image', $value);		
	}
	
	add_action('save_post','save_frontpage_image');	
 
 
   	function frontpage_image_enqueue() {
   		global $typenow;
		
		if($typenow == 'post') {
			wp_enqueue_media();
			
			
			// Registers and enqueues the required javascript.
			wp_register_script( 'meta-image', get_template_directory_uri() . '/js/meta-image.js', array( 'jquery' ) );
			wp_localize_script( 'meta-image', 'meta_image',
				array(
					'title' => 'Valitse kuva',
					'button' => 'Käytä tätä kuvaa',
				)
			);
			wp_enqueue_script( 'meta-image' );
		} // End if
	} // End example_image_enqueue()
	
	add_action( 'admin_enqueue_scripts', 'frontpage_image_enqueue' );		
	
	function print_frontpage_image($image) {
		global $post;
		$return_value = get_post_meta($post->ID, $image, true);
		if(empty($return_value)) :
			$return_value = NULL;
		else:
			$return_value = get_post_meta($post->ID, $image, true);
		endif;
	    return $return_value;
	}
	
		
    function setup_frontpage_media_image( $post ) {
		// verificate data
		wp_nonce_field( plugin_basename( __FILE__ ), 'frontpage_media_image_check');
		
		$value = get_post_meta($post->ID,'frontpage_media_image', true);
		
		$setup_form = '<label for="frontpage_media_image">';
		$setup_form .= 'Syötä etusivun median kuva: ';
		$setup_form .= '</label>';
		$setup_form .= '<input type="text" name="frontpage_media_image" id="frontpage_media_image" value="'. esc_attr($value) .'" size="25">';
	    $setup_form .= '<input type="button" id="frontpage_media_image_button" class="button" value="Valitse kuva" />';
		
	    echo $setup_form;
	}  
	
	function save_frontpage_media_image( $post_id ) {
	    // check user privileges
	    if ( 'page' == $_POST['post_type'] ) {
          if ( ! current_user_can( 'edit_page', $post_id ) )
          return;
        } else {
          if ( ! current_user_can( 'edit_post', $post_id ) )
          return;
        }
		
		// verificate that user had made the change

	    if ( ! isset( $_POST['frontpage_media_image_check'] ) || ! wp_verify_nonce( $_POST['frontpage_media_image_check'], plugin_basename( __FILE__ ) ) ) 
          return;		
		
		$value = sanitize_text_field( $_POST['frontpage_media_image'] );
		
		add_post_meta($post_id, 'frontpage_media_image', $value, true) or
        update_post_meta($post_id, 'frontpage_media_image', $value);		
	}
	
	add_action('save_post','save_frontpage_media_image');	
 
  	function frontpage_media_image_enqueue() {
   		global $typenow;
		
		if($typenow == 'post') {
			wp_enqueue_media();
			
			wp_register_script( 'meta-image', get_template_directory_uri() . '/js/meta-image.js', array( 'jquery' ) );
			wp_localize_script( 'meta-image', 'meta_image',
				array(
					'title' => 'Valitse kuva',
					'button' => 'Käytä tätä kuvaa',
				)
			);
			wp_enqueue_script( 'meta-image' );
		}
	} 
	
	add_action( 'admin_enqueue_scripts', 'frontpage_media_image_enqueue' );	
	
	function print_frontpage_media_image($image) {
		global $post;
		$return_value = get_post_meta($post->ID, $image, true);
	
	    return $return_value;
	}
	
?>