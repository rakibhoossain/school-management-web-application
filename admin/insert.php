<?php
if (!isset($_SESSION['xbpqwe'])) {
    header('Location: ?page=4');
}

include "core/connect.php";


// DELETE

// View
if(isset($_POST['up_reg'])) {
    $up_id    = $_POST['id'];
    $up_roll    = $_POST['roll'];
    $up_f_name = $_POST['f_name'];
    $up_l_name = $_POST['l_name'];
   // $up_class = $_POST['s_class'];
   // $up_section = $_POST['section'];
    $up_gender = $_POST['gender'];
    $up_b_date = $_POST['b_date'];
    $up_city = $_POST['city'];
    $up_zip = $_POST['zip'];
    $up_address = $_POST['address'];
    $up_phone = $_POST['phone'];
    $up_email = $_POST['email'];
    $up_password = $_POST['password'];

foreach ($up_id as $n => $id) {

    $stmt = $conn->prepare("UPDATE student SET roll = ?,f_name = ?,l_name = ?,gender = ?,b_date = ?,city = ?,
    zip = ?,address = ?,phone = ?,email = ?, password = ? WHERE id=?"); 

    // $stmt = $conn->prepare("UPDATE student SET roll = ?,f_name = ?,l_name = ?,class = ?,section = ?,gender = ?,b_date = ?,city = ?,
    // zip = ?,address = ?,phone = ?,email = ?, password = ? WHERE id=?");

    $stmt->bind_param("isssssisissi", $up_roll[$n], $up_f_name[$n], $up_l_name[$n], $up_gender[$id][0],
    $up_b_date[$n], $up_city[$n], $up_zip[$n], $up_address[$n], $up_phone[$n], $up_email[$n], $up_password[$n], $up_id[$n]);   

    // $stmt->bind_param("isssssssisissi", $up_roll[$n], $up_f_name[$n], $up_l_name[$n], $up_class[$n], $up_section[$n], $up_gender[$id][0],
    // $up_b_date[$n], $up_city[$n], $up_zip[$n], $up_address[$n], $up_phone[$n], $up_email[$n], $up_password[$n], $up_id[$n]);

    if ($stmt->execute()) {
       header("Location: ?page=5&success=1");
    }else{
      header("Location: ?page=5&success=0");
    };






}
    



}


if(isset($_GET['action'])) {
      $action=$_GET['action'];
      $id=$_GET['id'];
       if ($action == 'del'){
        echo "del";
        echo $id;
        $sql="DELETE FROM student WHERE id='$id'";
          if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
             header('Location: ?page=2');
        } else {
            echo "Error deleting record: " . $conn->error;
        }
      }
      if ($action == 'view'){
        echo "view";
      }
    }
?>

<section id="nav-after">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-12">
          <div id="excel-upload-box">
            <h4>Data Upload From Excel(.xlsx)</h4>
            <form enctype="multipart/form-data" action="include/exel/uploader/excel-upload.php" method="post" >
              <label class="form-label span3" for="file">File</label>
              <input type="file" name="file" id="file" required />
              <input type="submit" value="Insert" name="insert" /> <input type="submit" value="update" name="Update" />
            </form>
          </div>  
        </div>
        <div class="col-sm-12 col-md-3">
          <div id="search-box">
            <input type="search" id="search" placeholder="Type to search..." />
            <span class="search"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div> 
        </div>
        <div class="col-sm-12 col-md-offset-3 col-md-2">
          <button onclick="window.location='include/exel/downloader/student.php'" class="exel_dl_btn"><img class="exel_dl_img" alt="Download in Exel" title="Download in Excel" src="images/icons/exel_dl.ico"></button>
        </div>
    </div>
  </div>
</section>




<form class="form-horizontal custom-form" name="up_reg" method="post">
<section id="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      

<!-- <th>S\N</th><th>Name</th><th>Class</th><th>Roll</th><th>Section</th><th>Gender</th><th>Birth Day</th><th>City</th><th>Zip</th><th>Address</th><th>Phone</th><th>Email</th> -->
 
  <div class="table-responsive">
 
  <table id="table" class="table table-bordered table-condensed st_edit" cellpadding="0" cellspacing="0">
    <caption>Student Table</caption>
    <thead>
      <tr><th width="35px">Roll</th><th class="col-md-1">Class</th><th  class="col-md-1">Subject</th><th>First Name</th><th>Last Name</th>
      <th>Male</th><th>Female</th>
      <th>Birth Day</th><th>City</th><th>Zip</th><th>Address</th><th>Phone</th><th>Email</th><th>Password</th></tr>
    </thead>
    <tbody>
    
    <?php
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $id=$row['id'];
      ?>
      <tr>
        <input type="hidden" name="id[]" value="<?php echo $id;?>">
        <td><input type="text" class="form-control" placeholder="Roll" name="roll[]" value="<?php echo $row['roll'];?>"></td>

        <td>
          <?php echo $row['class']; ?>
        </td>

        <td>
          <?php echo $row['section']; ?>
        </td>

        <td><input type="text" class="form-control" placeholder="First Name" name="f_name[]" value="<?php echo $row['f_name'];?>"></td>
        <td><input type="text" class="form-control" placeholder="Last Name" name="l_name[]" value="<?php echo $row['l_name'];?>"></td>


  <td><input id="male" type="radio" <?php echo 'name="gender['.$id.'][]"'; if(($row['gender'])=='Male') echo 'checked'?> value="Male"></td>

<td><input id="fe-male" type="radio" <?php echo 'name="gender['.$id.'][]"'; if(($row['gender'])=='Female') echo 'checked'?> value="Female"></td>



        <td><input type="text" class="form-control datepicker" name="b_date[]" placeholder="30/01/1996" value="<?php echo $row['b_date'];?>"></td>

        <td>

                            <select class="city form-control" id="city" name="city[]">
                              <option value="<?php echo $row["city"]; ?>" selected ><?php echo $row["city"]; ?></option>
                            </select>

        </td>

        <td><input type="text" class="form-control" placeholder="Zip" name="zip[]" value="<?php echo $row['zip'];?>"></td>
        <td><input type="text" class="form-control" placeholder="Your address" name="address[]" value="<?php echo $row['address'];?>">

        <td><input type="text" class="form-control" placeholder="Phone" name="phone[]" value="<?php echo $row['phone'];?>"></td>
        <td><input type="email" class="form-control" placeholder="Email" name="email[]" value="<?php echo $row['email'];?>"></td>
        <td><input type="text" class="form-control admin" placeholder=" " name="password[]" value="<?php echo $row['password'];?>"></td>
      </tr>
        <?php
    }
} else {
    echo "0 results";
    
}
$conn->close();
?>
    </tbody>
    <tfoot>
                
    </tfoot>
    
    
  </table>

</div>

<div class="form-group">
  <div class="col-md-offset-10 col-sm-2">
    <button type="submit button" class="btn btn-primary submit-button" name="up_reg">Save changes</button>
  </div>
</div>

    </div>
  </div>
  
</section>

</form>

<script type="text/javascript">
      $(".stc").mousedown(function(){
        _this=this;
        $.post("include/class_list.php",
        function(data,status){
            $(_this).html(data);
        });
    });
    $(".stc").change(function(){
        _this = this.val;
        $.post("include/subject_list.php",
          {
            get_subject: _this
          },
        function(data,status){
             alert("Data: " + data + "\nStatus: " + status);
        });
    });


</script>

<?php require "pages/footer.php"; ?>