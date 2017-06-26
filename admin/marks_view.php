<section id="nav-after">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-sm-12">
          

<form class="form-inline" method="post">
  <div class="form-group">
    <label for="stc_1">Class</label>
    <select class="form-control" id="stc_1" name="s_class"  onchange="subject_list(this.value);">
        <option value="">-Class-</option>
        <!-- Data  load from ajax method-->
  </select>
  </div>
  <div class="form-group">
    <label for="section">Subject</label>
    <select class="form-control" name="section" id="section">
     <option value="">-Subject-</option>
    </select>
  </div>

  <button type="submit" name="mark_wh" class="btn btn-default">View</button>
</form>


        </div>
    </div>
  </div>
</section>


<?php
$error_msg="";


if(isset($_POST['submit'])) 
{
  
  try {

    $target = $_POST['target'];
    $roll = $_POST['roll']; 
    $subject    = $_POST['subject'];
    $term = $_POST['term'];
    $year = $_POST['year'];
    $theory = $_POST['theory'];
    $practical = $_POST['practical'];
    $comment = $_POST['comment'];
    
    include "core/connect.php";
foreach ($roll as $n => $vl) {


  if(empty($roll[$n])) {
      throw new Exception('Roll can not be empty');
    }
    if(empty($subject[$n])) {
      throw new Exception('Subject name can not be empty');
    }
    if(empty($term[$n])) {
      throw new Exception('Term can not be empty');
    }
    if(empty($year[$n])) {
      throw new Exception('Year can not be empty');
    }if(empty($theory[$n]) && empty($practical[$n])) {
      throw new Exception('Result can not be empty');
    }



    $stmt = $conn->prepare("UPDATE mark SET roll = ?,subject = ?,term = ?,year = ?,theory = ?,practical = ?,comment = ? WHERE id=?");
    $stmt->bind_param("issiiisi", $roll[$n], $subject[$n], $term[$n], $year[$n], $theory[$n], $practical[$n], $comment[$n], $target[$n]);

    if ($stmt->execute()) {
      echo "success";
    }else{
      echo "fail" . $conn->error;
    }

}
$stmt->close();
$conn->close();

  }
  
  catch(Exception $e) {
    $error_msg = $e->getMessage();
  }
  
}
echo $error_msg;








if(isset($_POST['mark_wh'])) 
{
  
  try {
   
    
    if(empty($_POST['s_class'])) {
      throw new Exception('Class can not be empty');
    }


    $class = $_POST['s_class'];
    $section = $_POST['section'];

    
    include "core/connect.php";

    $sql = "SELECT student.f_name AS 'First Name',mark.id,mark.roll,mark.subject,mark.term,mark.year,mark.theory,mark.practical,mark.comment FROM mark INNER JOIN student ON mark.roll=student.roll WHERE student.class='$class' AND student.section='$section' ORDER BY mark.roll";

    $result = $conn->query($sql);

if ($result->num_rows > 0) {
  //   	$fild = "SELECT roll,subject,term,year,theory,practical,comment FROM mark";
		// $filds = $conn->query($fild);
?>
<form class="form-horizontal custom-form" name="up_reg" method="post">
<section id="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
 
		  <div class="table-responsive">
		  <table id="table_in" class="table table-bordered table-condensed st_edit" cellpadding="0" cellspacing="0">
		    <thead>
        <?php $names=array(); ?>
		      <tr>
		      	<?php $i=0; while($title = $result->fetch_field()) { $th=$title->name; $names[$i]=$th; echo "<th class='$th'>".$th."</th>"; $i++; } ?>
		      </tr>
		    </thead>
		    <tbody>

		<?php while($row = $result->fetch_assoc()) { $id=$row['id']; ?>

<tr>
<input type="hidden" name="target[]" value="<?php echo $id;?>">
  <?php $length = count($names); for ($i=0; $i < $length ; $i++) { ?>

  <td class="<?php echo $names[$i]; ?>"><input type="text" class="form-control" placeholder="<?php // echo $names[$i];?>" name="<?php echo $names[$i]; ?>[]" value="<?php echo $row[$names[$i]]; ?>"></td>
  <?php } ?>         
</tr> <?php } ?>

		    </tbody>
		    <tfoot>
		                
		    </tfoot>
		  </table>

		</div>
		<div class="form-group">
		  <div class="col-md-offset-10 col-sm-2">
		    <button type="submit button" class="btn btn-primary submit-button" name="submit">Update</button>
		  </div>
		</div>

    </div>
  </div>
</section>
</form> 

<?php
    }



    $conn->close();
  }
  
  catch(Exception $e) {
    $error_msg = $e->getMessage();
  }
  
}

?>




<script type="text/javascript">


        function subject_list(val)
    {
     $.ajax({
     type: 'post',
     url: 'include/subject_list.php',
     data: {
      get_subject:val
     },
     success: function (response) {
      document.getElementById("section").innerHTML=response; 
     }
     });
    }

    $( function() {

    $.ajax({
     type: 'post',
     url: 'include/class_list.php',
     success: function (response) {
      document.getElementById("stc_1").innerHTML=response; 
     }
    });

  });


$(document).ready(function(){

$("th").css("text-transform", "capitalize");
        $("th.id,td.id").css("display", "none");
// jquery end

});
</script>
<?php require "pages/footer.php"; ?>