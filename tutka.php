<?php
  
  /* Template Name: Tama on Tutka.
   * 
   */
  
  get_header();
?>

<section class="page unit four-of-four">
  <div class="box">
    <div class="margin-left-fix">	  
      <?php
        if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <h2><?php the_title(); ?></h2>
          <p><?php the_content(); ?></p>
        </article>
      <?php endwhile; endif; ?>
    
      <hr>
      <br>
      <h2>
    	  Me teemme Tutkaa:
      </h2>
      <?php
        /* This does not work the way we want it, need to do something about it, maybe?
		 * 
		 */
      ?>
      <div class="unit-inside one-of-four">
      	<ul>
      		<li>
      		  <a href="#tabs-1">
      			<img src="<?php bloginfo('template_directory'); ?>/images/authors/1.png" alt="<?php esc_attr("1"); ?>" title="<?php esc_attr("1"); ?>">  
      		  </a>
      		</li>
      		<li>
      		  <a href="#tabs-2">
      			<img src="<?php bloginfo('template_directory'); ?>/images/authors/2.png" alt="<?php esc_attr("2"); ?>" title="<?php esc_attr("2"); ?>">  	
      		  </a>
      		</li>
      	</ul>
      </div>
      
      <div class="unit-inside three-of-four">
      	<div id="tabs-1">
      	  <h2>Jussi Jokinen</h2>
      	  <p>Hei, olen Jussi Jokinen. 3 vuoden tietojenkäsittelyn opiskelija Turusta. Opiskelun ohella toimin kotisivujen ylläpitäjänä, sekä freelancer-kirjoittajana.</p>	
      	</div>
      	<div id="tabs-2">
      		<h2>Timo toimittaja</h2>
      		<p>Timo toimittaja tekee töitä tutkalle ympäri vuorokauden, Timolla on kokemusta freelancer-töistä jo 12 vuotta.</p>
      	</div>
      </div>	
    </div>    
  </div>		
</section>

<?php
  get_footer();
?>
