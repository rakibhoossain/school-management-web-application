<option value="">--City--</option>
<?php require '../core/connect.php';

	$sql = "SELECT name FROM city";
    $result = $conn->query($sql);
       if ($result->num_rows > 0) {
   		 while($row = $result->fetch_assoc()) {
?>

<option value="<?php echo $row['name'] ;?>"><?php echo $row['name'];?></option>

<?php
       }
  }


$conn->close();
?>