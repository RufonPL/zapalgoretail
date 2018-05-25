<?php /* Template Name: Clear session */ ?>
<?php get_header(); ?>

<?php
	 
	  if ($_GET['redirect'] == (true)){
//		  $hurl = $_GET['redirect'];
	  }

      global $woocommerce;
      $wc_session = $woocommerce->session;
      $cookie = $wc_session->get_session_cookie();
	  print_r($cookie);	  
	  $cookie = $_COOKIE;
	  echo "cookie -";
	  print_r($_COOKIE);

      // define a default session duration
      $session_lifetime = DAY_IN_SECONDS * 2;
      $session = $_SESSION;
      $time = time();

      // Check check if a wp_woocommerce_session cookie expiration exists and > current timestamp
      // if no session user is defined, and a woocommerce cookie is,
      // trash the woocommerce cookie

	  
      if (isset($cookie[1]) && $cookie[1] > $time) {
          if (isset($session['user'])) {
              $session_lifetime = $cookie[1] - $time;
          }
          else {
              $sessionHandler = new WC_Session_Handler();
              $sessionHandler->destroy_session();
              $sessionHandler->cleanup_sessions();
		  }
	  }
		foreach($_COOKIE as  $key => $val)
		{
			echo "Happen!";
//			echo "cookie name = ".$key.", and value = ".$val."\n";
			if (true/*strchr($key, "wp_woocommerce_session_") || strchr($key, "yith_wcms") || strchr($key, "wordpress_")*/) {
				?>
				<script>
				function unSetCookieForMePlease() {
					var date = new Date();
					date.setTime(date.getTime()-(3600));
					var expires = "; expires="+date.toGMTString();
					name = "<?php echo $key; ?>";
					value = "NULL";
					
					document.cookie = name+"="+value+expires+"; path=/retailer/";
					document.cookie = name+"="+value+expires+"; path=/zapalgo/";
					document.cookie = name+"="+value+expires+"; path=/";
					console.log("usunięto <?php echo $key; ?>");
				}
				
				unSetCookieForMePlease();
				</script>
				
				<?php
			}
		}

//		  echo '<script>window.location.href = "http://www.e-conex.pl/zapalgo/?showpopup=true";</script>';
		
/*		if (isset($_GET['redirect'])) {
			echo '<script>window.location.href = "http://www.e-conex.pl/retailer/?showpopup=true';
			echo "&redirect=".$_GET['redirect'];
		} else {
			echo '<script>window.location.href = "http://www.e-conex.pl/retailer/?showpopup=true';			
		}
		echo '";</script>';*/

		echo '<script>window.location.href = "';
		echo wp_logout_url();
		echo '/";</script>';
?>

<?php get_footer(); ?>
