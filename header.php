<?php
/* Header of our theme.
 * 
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]> 
<html class="no-js ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html class="no-js ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html class="no-js ie8" <?php language_attributes(); ?>>	
<![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		
		<title><?php bloginfo('name'); ?></title>
		
		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<!-- mobile meta for smartphones and tablets -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	
	    <?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>
  <section class="container">
 	 <section class="grid">
		<header class="header unit four-of-four">
		  <div class="box">	
			<div class="unit two-of-four">
				<hgroup>
				  <h2>
				  	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri(). '/images/logo.png'); ?>" alt="<?php echo esc_attr( get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>	
				  </h2>
				  <h4>
				  	<?php bloginfo( 'description' ); ?>
				  </h4>
				</hgroup>			
			</div>
			
			<div class="unit two-of-four">
				 <?php get_search_form(); ?>
				 <div class="login">
				   <?php if ( is_user_logged_in() ) : ?>
				     <a href="<?php echo wp_logout_url(); ?>" title="Logout">Logout</a>
				   <?php else : ?>
				     <a href="<?php echo esc_url( home_url( '/' ) ); ?>/wp-login.php" alt="kirjaudu sisään" title="kirjaudu sisään">kirjaudu sisään</a>		
				   <?php endif; ?>
				 </div> 
			</div>
			<div class="unit four-of-four">
			  <nav id="site-navigation" class="main-navigation">
	          <?php
	        	  wp_nav_menu(array('theme_location' => 'main-menu', 'container' => '<nav>', 'menu_class' => 'main-menu', 'exclude' => 161));
			  ?>		  
			  </nav>
			</div>
			<!-- here is the extra page for mobile menu if needed --> 
		  </div>		
		</header>
