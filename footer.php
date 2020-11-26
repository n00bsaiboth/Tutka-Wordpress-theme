<?php
/* Footer of our theme.
 * 
 */
?>
    <br>
    <br>

    <section class="footer-widgets unit four-of-four">
      <div class="box">	
	      <div class="unit-inside one-of-four">
	      	<div class="box-with-margin">
	           <?php if ( is_active_sidebar('sidebar-2') ) : ?>
                 <div class="widget-area">
                 	<div class="margin-left-fix">
                      <?php dynamic_sidebar('sidebar-2'); ?>
                    </div>
                 </div>
               <?php endif; ?>
	      	</div>
	      </div>	
	      <div class="unit one-of-four">
	      	<div class="box-with-margin">
	           <?php if ( is_active_sidebar('sidebar-3') ) : ?>
                 <div class="widget-area">
                   <?php dynamic_sidebar('sidebar-3'); ?>
                 </div>
               <?php endif; ?>
	      	</div>
	      </div>
	      <div class="unit one-of-four">
	      	<div class="box-with-margin">
	           <?php if ( is_active_sidebar('sidebar-4') ) : ?>
                 <div class="widget-area">
                   <?php dynamic_sidebar('sidebar-4'); ?>
                 </div>
               <?php endif; ?> 
	      	</div>
	      </div>
	      <div class="unit one-of-four">
	      	<div class="box-with-margin">
	           <?php if ( is_active_sidebar('sidebar-5') ) : ?>
                 <div class="widget-area">
                   <?php dynamic_sidebar('sidebar-5'); ?>
                 </div>
               <?php endif; ?>
	      	</div>
	      </div>
      </div>
    </section>	
    
    <br>
    <br>
 	
 	<footer class="footer unit four-of-four">
 	  <div class="box">
 	  	<div class="margin-left-fix">
 	  	  <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php esc_attr(bloginfo('name')); ?>" title="<?php esc_attr(bloginfo('name')); ?>"><?php bloginfo('name'); ?></a> |
 	  	  Turun ammattikorkeakoulu | Lemminkäisenkatu 30 20540 Turku | <a href="tel:+358451234567">+358451234567</a> |
 	  	  <a href="mailto:tutka [at] turkuamk.fi">tutka [at] turkuamk.fi</a></p>	
 	  	</div>
 	  </div>
	</footer>
	<br>
    <br>
</section>
</section>	
<?php wp_footer(); ?>
</body>

</html>