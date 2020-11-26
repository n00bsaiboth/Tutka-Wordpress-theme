<?php
/* Author page of our theme.
 * 
 */

 get_header(); 
?>

<div id="single-author" class="author-view unit four-of-four">
  <div class="box">	
  	<div class="margin-left-fix">
	    <?php $current_author = (isset($_GET['author_name']))? get_user_by('slug', $author_name)  : get_userdata(intval($author)); ?>
	    <?php 
	      $first_name = the_author_meta('first_name');
	      $last_name = the_author_meta('last_name');
	    ?> 
	  
	  <h2>Tietoa: <?php echo $current_author->nickname; ?></h2>
	  <dl>
	    <dt><h2>Profiili: </h2></dt>
	    <dd><?php echo $current_author->user_description; ?></dd>
	    <dt><h2>Kotisivu:</h2></dt>
	    <?php
	      $homepage = $current_author->user_url;
	    ?>   
	    <dd><a href="<?php echo esc_url( $homepage ); ?>" target="_blank" alt="<?php echo esc_attr($homepage); ?>" title="<?php echo esc_attr($homepage); ?>"><?php echo $current_author->user_url; ?></a></dd>
	    <dt><h2>S&auml;hk&ouml;posti:</h2></dt>
	    <?php
	      $email = $current_author->user_email;
		  $email = str_replace("@", " [at] ", $email);
	    ?>
	    <dd><a href="mailto:<?php echo $email; ?>" alt="<?php esc_attr($email); ?>" title="<?php esc_attr($email); ?>"><?php echo $email; ?></a></dd>
	  </dl>
	
	  <br>
	  <hr>
	  <br>
	
	  <h2>Julkaisut: <?php echo $current_author->nickname; ?></h2>
	
	  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <ul>
	      <li>
	        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	      </li>
	    </ul>
	  <?php endwhile; ?>
	  <?php endif; ?>
    </div>
  </div>
</div>


<?php
  get_footer();
?>
