<?php
  /* classic 404 file
   * 
   */
   
  get_header();
?>

<section class="error-view unit four-of-four">
	<div class="box">
	  <div class="margin-left-fix">
		<h2>404: tiedostoa ei löytynyt</h2>
		<p>Hakemaanne sivua ei valitettavasti löytynyt.</p>
		<p>Palaa takaisin etusivulle ja yritä uudelleen. Voit myös yrittää hakea tulosta, hakupalvelustamme.</p>
		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Etusivulle.</a></p>
	  </div>
	</div>
</section>

<?php
  get_footer();
?>