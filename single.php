<?php
/* For displaying a single article.
 * 
 */

 get_header(); 
?>

<section class="single-view unit four-of-four">
  <div class="box">	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="unit-inside two-of-four">
			  <?php
                 $article_image_caption = print_article_image_caption('article_image_caption');
			     $article_image = print_article_image('article_image');
               ?>
               <div class="image-container">
                 <a href="<?php echo esc_url($article_image); ?>" rel="prettyPhoto">	
                   <img src="<?php echo esc_url($article_image); ?>" alt="<?php echo esc_attr($article_image_caption); ?>" title="<?php echo esc_attr($article_image_caption); ?>">	
                 </a>
               </div>		
			</div>
				
			<div class="unit-inside two-of-four">
			  <?php
                 $article_caption = print_article_caption('article_caption');
                 $article_sub_header = print_article_sub_header('article_sub_header');
               ?>
              <h2><?php echo $article_sub_header; ?></h2> 
		      <p><?php echo $article_caption; ?></p>
		    </div>	
		    <div class="unit-inside one-of-four">
		      <div class="post_date margin-left-fix">
                <p><?php the_date('F j, Y H:i');?></p>
              </div>
              <div class="author_image margin-left-fix">
                <a href="<?php bloginfo('template_directory'); ?>/images/authors/<?php the_author_meta('id'); ?>.png" rel="prettyPhoto"> 
                  <img src="<?php bloginfo('template_directory'); ?>/images/authors/<?php the_author_meta('id'); ?>.png" alt="<?php the_author(); ?>" title="<?php the_author(); ?>" />
                </a>
              </div>

              <div class="author_name margin-left-fix">
                <p>Kirjoittaja</p>
                <p><?php the_author_posts_link(); ?></p>
              </div>  
              <div class="edit_article margin-left-fix">
                <?php edit_post_link('Muokkaa','','.'); ?>
              </div>
		    </div>				
		    <div class="unit-inside three-of-four">
		    	<?php the_content(); ?>
		    </div>
		</article>
		
		<br>
		
		<hr>
		
		<section id="comments" class="unit four-of-four">
		    <?php comments_template(); ?>	
		</section>
	<?php endwhile; endif; ?>
  </div>	
</section>
<?php 
  get_footer(); 
?>