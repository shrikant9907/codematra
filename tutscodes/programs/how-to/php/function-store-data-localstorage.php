<?php
/*
* Function to save in localstorage in PHP | Site - codematra.com
*/
function saveToLocalStorage($key, $value) {
	?>
	<script type="text/javascript">
		localstorage.setItem('<?php echo $key; ?>', '<?php echo $value; ?>');	
	</script>
	<?php
}

// Calling the function
saveToLocalStorage('referralCode', 'XYZ123');