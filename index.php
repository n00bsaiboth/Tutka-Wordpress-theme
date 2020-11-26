<?php
/* Index of our theme.
 * 
 */

 get_header(); 
?>

<section id="main-news" class="main-news">
    <?php
      $query = 'cat=3&showposts=1&offset=0&order=DESC';
      query_posts($query);
    ?>
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>	
    <article <?php post_class('unit four-of-four'); ?> id="post-<?php the_ID(); ?>">
      <div class="box">
      	<div class="unit-inside three-of-four">
      		<?php
      		   $frontpage_image_caption = print_frontpage_image_caption('frontpage_image_caption');
		       $frontpage_image = print_frontpage_image('frontpage_image');
		       $frontpage_media_url = print_frontpage_media_url('frontpage_media_url');
		       $frontpage_media_caption = print_frontpage_media_caption('frontpage_media_caption');
		       $frontpage_media_image = print_frontpage_media_image('frontpage_media_image');
      		?>
      		
      	   <?php if(!isset($frontpage_image) || empty($frontpage_image)): ?>
		     <div class="image-container">
		       <a href="<?php echo esc_url($frontpage_media_url); ?>" rel="prettyPhoto">
		         <img src="<?php echo esc_url($frontpage_media_image); ?>" alt="<?php echo esc_attr($frontpage_media_caption); ?>" title="<?php echo esc_attr($frontpage_caption_caption); ?>">	
		       </a>
		     </div> 
		   <?php else: ?>
		     <div class="image-container">	
		       <a href="<?php echo esc_url($frontpage_image); ?>" rel="prettyPhoto">
		         <img src="<?php echo esc_url($frontpage_image); ?>" alt="<?php echo esc_attr($frontpage_image_caption); ?>" title="<?php echo esc_attr($frontpage_image_caption); ?>">	
		       </a>
		     </div>		
	       <?php endif; ?>  		
      	</div>
      	
      	<div class="unit-inside one-of-four">
      	  <div class="margin-left-fix">	
      	    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
      	    <?php $frontpage_caption = print_frontpage_caption('frontpage_caption'); ?>
      	    <p><?php echo $frontpage_caption; ?></p>	
      	  </div>
      	</div>
      </div>	
    </article>
    <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>    
</section>	

<br>

<section id="featured-articles" class="featured-articles unit four-of-four">
  <div class="box">	
    <?php
      $query = 'cat=3&showposts=2&offset=1&order=DESC';
      query_posts($query);
    ?>
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <article <?php post_class('unit-inside two-of-four'); ?> id="post-<?php the_ID(); ?>">		
          <?php
      		$frontpage_image_caption = print_frontpage_image_caption('frontpage_image_caption');
		    $frontpage_image = print_frontpage_image('frontpage_image');
		    $frontpage_media_url = print_frontpage_media_url('frontpage_media_url');
		    $frontpage_media_caption = print_frontpage_media_caption('frontpage_media_caption');
		    $frontpage_media_image = print_frontpage_media_image('frontpage_media_image');
          ?>
      		
      	  <?php if(!isset($frontpage_image) || empty($frontpage_image)): ?>
      	  	<div class="margin-left-fix">	
		    <div class="image-container-small">
		      <a href="<?php echo esc_url($frontpage_media_url); ?>" rel="prettyPhoto">
		        <img src="<?php echo esc_url($frontpage_media_image); ?>" alt="<?php echo esc_attr($frontpage_media_caption); ?>" title="<?php echo esc_attr($frontpage_caption_caption); ?>">	
		      </a>
		    </div> 
		    </div>
		  <?php else: ?>
		  <div class="margin-left-fix">	
		  <div class="image-container-small">	
		    <a href="<?php echo esc_url($frontpage_image); ?>" rel="prettyPhoto">
		      <img src="<?php echo esc_url($frontpage_image); ?>" alt="<?php echo esc_attr($frontpage_image_caption); ?>" title="<?php echo esc_attr($frontpage_image_caption); ?>">	
		    </a>
		  </div>		
		  </div>
	    <?php endif; ?>  
	    	
	    <div class="margin-left-fix">	
	      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      	  <?php $frontpage_caption = print_frontpage_caption('frontpage_caption'); ?>
      	  <p><?php echo $frontpage_caption; ?></p>	  
       </div>
      </article>	
      <?php endwhile; endif; ?>
      <?php wp_reset_query(); ?> 
      
    <?php
      $query = 'cat=3&showposts=2&offset=3&order=DESC';
      query_posts($query);
    ?>
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <article <?php post_class('unit-inside two-of-four'); ?> id="post-<?php the_ID(); ?>">		
          <?php
      		$frontpage_image_caption = print_frontpage_image_caption('frontpage_image_caption');
		    $frontpage_image = print_frontpage_image('frontpage_image');
		    $frontpage_media_url = print_frontpage_media_url('frontpage_media_url');
		    $frontpage_media_caption = print_frontpage_media_caption('frontpage_media_caption');
		    $frontpage_media_image = print_frontpage_media_image('frontpage_media_image');
          ?>
      		
      	  <?php if(!isset($frontpage_image) || empty($frontpage_image)): ?>
      	  	<div class="margin-left-fix">	
		    <div class="image-container-small">
		      <a href="<?php echo esc_url($frontpage_media_url); ?>" rel="prettyPhoto">
		        <img src="<?php echo esc_url($frontpage_media_image); ?>" alt="<?php echo esc_attr($frontpage_media_caption); ?>" title="<?php echo esc_attr($frontpage_caption_caption); ?>">	
		      </a>
		    </div> 
		    </div>
		  <?php else: ?>
		  <div class="margin-left-fix">		
		  <div class="image-container-small">	
		    <a href="<?php echo esc_url($frontpage_image); ?>" rel="prettyPhoto">
		      <img src="<?php echo esc_url($frontpage_image); ?>" alt="<?php echo esc_attr($frontpage_image_caption); ?>" title="<?php echo esc_attr($frontpage_image_caption); ?>">	
		    </a>
		  </div>		
		  </div>
	    <?php endif; ?>  	
	    <div class="margin-left-fix">	
	      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      	  <?php $frontpage_caption = print_frontpage_caption('frontpage_caption'); ?>
      	  <p><?php echo $frontpage_caption; ?></p>	  
        </div>
      </article>	
      <?php endwhile; endif; ?>
      <?php wp_reset_query(); ?>       
  </div>	
</section>

<br>
<br>

<section id="rest-of-the-news" class="rest-of-the-news unit four-of-four">
	<section class="unit-inside two-of-four">
	  <div class="box">
	   <?php
	     $query = 'cat=3&showposts=10&offset=5&order=DESC';
         query_posts($query);
       ?>
       <div class="margin-left-fix">	
         <ul>
          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          	  <?php $frontpage_caption = print_frontpage_caption('frontpage_caption'); ?>
              <a href="<?php the_permalink(); ?>" alt="<?php echo esc_attr($frontpage_caption); ?>" 
            title="<?php echo esc_attr($frontpage_caption); ?>"><?php the_title(); ?></a>
             </li>
           <?php endwhile; endif; ?>       	
         </ul>
       </div>
       <?php wp_reset_query(); ?>
	  </div>	
	</section>
	
	<aside style="margin-left: 40px;" id="main-sidebar" class="unit two-of-four">
	  <div class="box">	
		<?php get_sidebar(); ?>
	  </div>
	</aside>
</section>
<?php 
  get_footer(); 
?>
