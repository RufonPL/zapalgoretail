<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
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
 * @version 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) ) : ?>

	<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

        <h3><?php _e( 'Additional Information', 'woocommerce' ); ?></h3>

	<?php endif; ?>

	<?php foreach ( $checkout->checkout_fields['order'] as $key => $field ) : ?>

		<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

	<?php endforeach; ?>

<?php endif; ?>

<?php wc_get_template( 'checkout/terms.php' ); ?>

<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>

<div class="woocommerce-shipping-fields">
	<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>

		<h3 id="ship-to-different-address">
			<label for="ship-to-different-address-checkbox" class="checkbox"><?php _e( 'Ship to a different address?', 'woocommerce' ); ?></label>
			<input id="ship-to-different-address-checkbox" class="input-checkbox" type="checkbox" name="ship_to_different_address" value="0" />
		</h3>

		<div class="shipping_address">

            <h3><?php _e( 'Shipping information', 'woocommerce' ); ?></h3>

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

			<?php foreach ( $checkout->checkout_fields['shipping'] as $key => $field ) : ?>

				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

			<?php endforeach; ?>

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

	<?php endif; ?>

</div>

<script type="text/javascript">
   $('#ship-to-different-address-checkbox').change(function(){
     var shippingField = $('#shipping_address_1_field');
     if($(this).is(':checked')){
       shippingField.addClass('validate-required');
     }else{
       shippingField.removeClass('validate-required');
     }
   });
   $(document).ready(function() {
     setTimeout(function(){
       $('#ship-to-different-address-checkbox').change();
     },300);
  
});
   
</script>