<?php
/**
 * Template Name: Main-page
 * The template used for displaying fullwidth page content in main-page.php
 *
 * @package ultrabootstrap
 */
get_header(); ?>		

<empty-space></empty-space>

<section class="page-section">
	<div class="custom-container">
		<div class="row">
			<div class="col-md-12">
				<div data-slick class="autoplay2  slider-img" style="margin-bottom: 70px;">
					<?php if( have_rows('home_slider') ):
						while ( have_rows('home_slider') ) : the_row(); ?>
							<div class="img-slider">
								<a href="<?php the_sub_field('url_slider'); ?>">
									<img src="<?php the_sub_field('home_slider'); ?>" alt="">
								</a>
							</div>
						<?php endwhile;
					endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>


		  					

<!-- <div class="container">
    <div class="content-teaser">
     1
    </div>
    <div class="content-full">
     2
    </div>
<button class="readmore glyphicon glyphicon-th-large" aria-hidden="true"></button>
</div>
 -->
<?php get_footer(); ?>

