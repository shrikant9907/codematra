<?php
/*
* Code to redirect using javascript | Site - codematra.com
*/
function javascript_redirect($url) { 
	?> 
	<script >
		window.location.href="<?php echo $url; ?>"; 
	</script>
	<?php
	die();
}