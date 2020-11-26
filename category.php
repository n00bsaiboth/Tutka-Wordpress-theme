<?php
  /* Template Name: Kategoria
   * 
   * Description: Display different categories. It's not perfect, so we need to work on this one.
   */

  get_header();
?>

<?php 
    
  /* first of all get the page and category name and set then to lower case
   * also you need the id of the category to make a query_posts
   * if left the page, category and id on the template so you can check
   * if something goes wrong
   * 
   */
  
  $page = get_the_title();
  $category = get_term_by('name', $page, 'category');
  
  $cat = $category->name;
  $id = $category->term_id;
  
  $page = strtolower($page);
  $cat = strtolower($cat);
  
  // these echoes are for testing purposes.
  
  // echo $page;
  // echo $cat;
  // echo $id;
?>  
  <section class="category-view unit four-of-four">
  	
    <?php  
      // check that page and category are a match!
      
      if(strcmp($page, $cat) == 0):
    ?>  	
	
    <div class="box">
    
      <?php
        // echo out five (5) more recent posts
	  	  
  	    $query = 'cat='.$id.'&showposts=5&offset=0&order=DESC';
        query_posts($query);
	    if(have_posts()) : while(have_posts()) : the_post();      
      ?>
      
      <article>
      	<div class="unit two-of-four">
      	  <div class="margin-left-fix">	
            <?php
      	      $frontpage_image_caption = print_frontpage_image_caption('frontpage_image_caption');
		      $frontpage_image = print_frontpage_image('frontpage_image');
		      $frontpage_media_url = print_frontpage_media_url('frontpage_media_url');
		      $frontpage_media_caption = print_frontpage_media_caption('frontpage_media_caption');
		      $frontpage_media_image = print_frontpage_media_image('frontpage_media_image');
      	    ?>
      		
      	    <?php if(!isset($frontpage_image) || empty($frontpage_image)): ?>
		      <div class="image-container-small">
		        <a href="<?php echo esc_url($frontpage_media_url); ?>" rel="prettyPhoto">
		          <img src="<?php echo esc_url($frontpage_media_image); ?>" alt="<?php echo esc_attr($frontpage_media_caption); ?>" title="<?php echo esc_attr($frontpage_caption_caption); ?>">	
		        </a>
		      </div> 
		    <?php else: ?>
		      <div class="image-container-small">	
		        <a href="<?php echo esc_url($frontpage_image); ?>" rel="prettyPhoto">
		          <img src="<?php echo esc_url($frontpage_image); ?>" alt="<?php echo esc_attr($frontpage_image_caption); ?>" title="<?php echo esc_attr($frontpage_image_caption); ?>">	
		        </a>
		      </div>		
	        <?php endif; ?>
      	  </div>
      	</div>

        <div class="unit two-of-four">  
          <div class="margin-left-fix">	
	          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	          <?php 
	            $frontpage_caption = print_frontpage_caption('frontpage_caption'); 
	          ?>
      	      <p><?php echo $frontpage_caption; ?></p>  	
      	  </div>
      	</div>  	      	
      </article>
      
      <?php 
        endwhile;
		wp_reset_query;
      ?>
          	
    </div>

    <?php	
      else :  
  	    echo '<section class="unit four-of-four">';
	      echo '<div class="box">';
  	        echo '<p>Jotain meni vikaan. Tarkista, että sivun nimi sekä kategorian nimi täsmäävät.</p>';
		    echo '<p>Tarvittaessa ota yhteyttä sivujen ylläpitäjään.</p>'; 
	      echo '</div>';
	    echo '<section>';  
      endif; 
    ?>

    <?php 
	  endif;
    ?>

  </section>
      
<?php
  get_footer();
?>