<?php
/* 
* Store date in localstorage in PHP | Site - codematra.com
*/

// Suppose we need to store a referral code in localstorage
$referralCode = 'XYZ123';
?>
<script type="text/javascript">
	localstorage.setItem('referralCode', '<?php echo $referralCode; ?>');	
</script>
<?php