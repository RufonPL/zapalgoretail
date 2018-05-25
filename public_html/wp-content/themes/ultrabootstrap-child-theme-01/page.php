<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ultrabootstrap
 */

get_header(); ?>
<empty-space></empty-space>
<div class="spacer">
<div class="custom-container">
	<div class="row">
		<div  class="col-sm-12">
<section class="page-section">					
			<div class="detail-content">            
	            <?php while ( have_posts() ) : the_post(); ?>
	                <?php get_template_part( 'template-parts/content', 'page' ); ?>   
	            <?php endwhile; // End of the loop. ?> 
	            <?php /*comments_template();*/ ?> 
	        </div> <!-- /.end of detail-content -->	
</section><!-- /.end of section -->
	</div>
	</div>
</div>
</div>
<?php get_footer(); ?>