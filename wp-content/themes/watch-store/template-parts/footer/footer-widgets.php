<?php
/**
 * Displays footer widgets if assigned
 */
?>

<aside class="footersec">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
	            <?php dynamic_sidebar('footer-1');?>
	        </div>
	        <div class="col-lg-3 col-md-3">
	            <?php dynamic_sidebar('footer-2');?>
	        </div>
	        <div class="col-lg-3 col-md-3">
	            <?php dynamic_sidebar('footer-3');?>
	        </div> 
	        <div class="col-lg-3 col-md-3">
	            <?php dynamic_sidebar('footer-4');?>
	        </div>        
		</div>
	</div>
</aside>
