<?php
  /* Template Name: Haku
   * 
   */
   get_header();
?>
<div id="single-search" class="search-view unit four-of-four">
  <div class="box">
  	<div class="margin-left-fix">
  		<?php if (have_posts()) : ?>
          <h2>Hakutulokset:</h2> 
          <?php while (have_posts()) : the_post(); ?>
          	  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          	  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php $frontpage_caption = print_frontpage_caption('frontpage_caption'); 
                if(isset($frontpage_caption) && !empty($frontpage_caption)) {
              	  echo '<p>' . $frontpage_caption . '</p>';
                }
              ?>
            </article>
            
          <?php endwhile; ?>
          
        <?php else: ?>	
          <h3>Hakutuloksia ei l&ouml;ytynyt.</h3>
        <?php endif; ?>   			
  	</div>
  </div>
</div>

<?php
  get_footer();
?>