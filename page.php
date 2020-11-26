<?php
  
  /* The template of displaying pages.
   * 
   */
  
  get_header();
?>

<section class="page unit four-of-four">
  <div class="box">
  <?php
    if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <h2><?php the_title(); ?></h2>
      <p><?php the_content(); ?></p>
    </article>
  <?php endwhile; endif; ?>
  </div>		
</section>

<?php
  get_footer();
?>
