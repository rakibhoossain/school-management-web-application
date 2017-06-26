<?php 
	if (isset($_POST['get_class'])) {
		$cls=$_POST['get_class'];
?>

<option value=" ">-Class-</option>
<option <?php if($cls=='Eleven') echo 'selected' ?> value="Eleven">Eleven</option>
<option <?php if($cls=='Twelve') echo 'selected' ?> value="Twelve">Twelve</option>
<option <?php if($cls=='Hons.') echo 'selected' ?> value="Hons.">Hons.</option>
<option <?php if($cls=='Hons. Prof.') echo 'selected' ?> value="Hons. Prof.">Hons. Prof.</option>
<option <?php if($cls=='Degree Pass') echo 'selected' ?> value="Degree Pass">Degree Pass</option>
<option <?php if($cls=='BM') echo 'selected' ?> value="BM">BM</option>

<?php } ?>




