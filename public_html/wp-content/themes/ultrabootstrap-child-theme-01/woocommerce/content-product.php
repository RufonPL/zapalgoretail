<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>


<div <?php post_class('col-sm-6 shop'); ?>>


	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>

	<?php $slider = get_field('gallery_slider'); ?>
	<!--<div class="product-thumbnail row" draggable="false">
    	<div class="product-thumbnail-inner">-->
	<?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	
	?>
    <?php if($slider) : ?>
    	<?php $c = 0; foreach($slider as $slide) :?>
        <?php $image = $slide['gallery_image']; ?>
        <?php //print_r($image['sizes']); ?>

        <div class="zdj<?php echo $c++;?>"><img class="slide-img" src="<?php echo esc_url($image['sizes']['shop_catalog']); ?>" alt=""/></div>
      
      <?php if ($c==3) { break; } ?>
        <?php endforeach; ?>
    <?php endif; ?>
    	<!--</div>
    </div>-->

	<div class="contents main-title">
	    <div class="title post-title">
				<?php
				/**
				 * woocommerce_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' );
				?>
	    </div>
	    <div class="subtitle">
			<?php
			if ( ! $post->post_excerpt ) {
				return;
			}

			?>
            <div itemprop="description">
            <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>	
            </div>
        </div>
    
    </div>
</a>
</div>
