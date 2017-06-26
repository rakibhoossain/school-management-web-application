<?php        

include "core/connect.php";

$cls='';
$sub='';
// DELETE

// View


if(isset($_GET['action'])) {
      $action=$_GET['action'];
      $id=$_GET['id'];
       if ($action == 'del'){
if($user!=1){ header('Location: ?page=2'); return;}
        $sql="DELETE FROM student WHERE id='$id'";
          if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
             header('Location: ?page=2');
        } else {
            echo "Error deleting record: " . $conn->error;
        }
      }
      if ($action == 'view'){ 
        // include "core/connect.php";
        $sql = "SELECT * FROM student WHERE id='$id'";
        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // while($row = $result->fetch_assoc()) {
      $row = $result->fetch_assoc();

        $cls=$row['class'];
        $sub=$row['section'];

      ?>

<div class="container-fluid">
  
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h3 class="modal-title text-center" >Student Profile</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

<?php 

  if(isset($_POST['update'])) 
{   
    $u_id    = $_POST['s_id'];
    $u_f_name = $_POST['f_name'];
    $u_l_name = $_POST['l_name'];
    $u_class = $_POST['class'];
    $u_section = $_POST['section'];
    $u_gender = $_POST['gender'];
    $u_b_date = $_POST['b_date'];
    $u_city = $_POST['city'];
    $u_zip = $_POST['zip'];
    $u_address = $_POST['address'];
    $u_phone = $_POST['phone'];
    $u_email = $_POST['s_email'];
    $cls = $u_class;

    $stmt = $conn->prepare("UPDATE student SET roll = ?,f_name = ?,l_name = ?,class = ?,section = ?,gender = ?,b_date = ?,city = ?,
    zip = ?,address = ?,phone = ?,email = ? WHERE id=?");
    $stmt->bind_param("isssssssisisi", $u_id, $u_f_name, $u_l_name, $u_class, $u_section, $u_gender, $u_b_date, $u_city, $u_zip, $u_address,
    $u_phone, $u_email, $id);

    $stmt->execute(); 
    $stmt->close();
header("Location: ?page=2&id=".$id."&action=view&success=1");

    
}
if(isset($_GET['success'])) {
    $success=$_GET['success'];

       if ($success == 1){
        ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
               <span><i class="fa fa-check" aria-hidden="true"></i></span> <strong>Update Success</strong>
            </div>
        </div>
        
    </div>
</div>
        <?php

        }
    }
?>

            <form class="form-horizontal custom-form" id="s_update" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="stc">Class</label>
                        <div class="col-sm-4">
                        <div class="form-group input-group">
<span class="input-group-addon">Class</span>
                        <select class="form-control" id="stc" name="class" onchange="subject_list(this.value);">
                          <option selected value="<?php echo $row['class']; ?>"><?php echo $row['class']; ?></option>
                        </select>
                          </div>
                        </div>
                        <div class="col-sm-4 input-group">

                        <span class="input-group-addon">Roll</span>
                          <input class="form-control" id="roll" name="s_id" placeholder="Roll / ID" type="text" value="<?php echo $row['roll'];?>">
                        </div>
                </div>

                <div class="form-group">
                     <label class="col-sm-3 control-label" for="section">Section</label>
                        <div class="col-sm-4">

                          <select class="form-control" name="section" id="section">
                            
                          <option selected value="<?php echo $row['section']; ?>"><?php echo $row['section']; ?></option>
                            
                          </select>

                        </div>
                        <div class="col-sm-4">
                        <?php $s_gen=$row['gender']; ?>
                          <div data-toggle="buttons">
                              <label class="btn btn-default btn-circle <?php if($s_gen=='Male') echo "active";?>">
                              <input id="male" type="radio" name="gender" 
                          <?php if($s_gen=='Male') echo 'checked';?> value="Male"><i class="fa fa-male" aria-hidden="true"></i>
                          </label>
                          <label for="male">  Male</label>
                          <label class="btn btn-default btn-circle <?php if($s_gen=='Female') echo "active";?>">
                          <input id="fe-male" type="radio" name="gender" 
                              <?php if($s_gen=='Female') echo 'checked';?> value="Female"><i class="fa fa-female" aria-hidden="true"></i></label>
                              <label for="fe-male">  Female</label>
                          </div>
                        </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 control-label">
                        <label class="control-label" for="name-input-field">Name</label>
                    </div>
                    <div class="col-sm-4 input-column">
                        <input class="form-control" name="f_name" placeholder="First Name" id="name-input-field" type="text" value="<?php echo $row['f_name'];?>">
                    </div>
                    <div class="col-sm-4 input-column">
                        <input class="form-control" data-toggle="popover" title="Last Name" data-content="" name="l_name" placeholder="Last Name" type="text" value="<?php echo $row['l_name'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 control-label">
                        <label class="control-label" for="datepicker">Date of Birth</label>
                    </div>
                    <div class="col-sm-3 input-column">
                        <input class="form-control datepicker" id="datepicker" name="b_date" placeholder="30/01/1996" type="text" value="<?php echo $row['b_date'];?>">
                    </div>
                    <div class="col-sm-3">
                            <select class="city form-control col-sm-4" id="city" name="city">
                              <option selected="selected" value="">-City-</option>
                              <option value="<?php echo $row["city"]; ?>" selected ><?php echo $row["city"]; ?></option>
                            </select>



                        </div>
                        <div class="col-sm-2 input-column">
                          <input class="form-control" placeholder="Zip Code" name="zip" type="text" value="<?php echo $row['zip'];?>">
                        </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 control-label">
                        <label class="control-label" for="address">Address</label>
                    </div>
                    <div class="col-sm-8 input-column">
                        <textarea class="form-control" id="address" name="address" placeholder="Your address type hear!"><?php echo $row['address'];?></textarea>
                    </div>
                </div>

                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="phone">Phone</label>
                        <div class="col-sm-8 input-column">
                          <input class="form-control" id="phone" name="phone" placeholder="+8801234567890" type="text" value="<?php echo $row['phone'];?>">
                        </div>
                </div>
        
                <div class="form-group">
                    <div class="col-sm-3 control-label">
                        <label class="control-label" for="email">Email </label>
                    </div>
                    <div class="col-sm-8 input-column">
                        <input class="form-control" id="email" placeholder="Enter your email" name="s_email" type="email" value="<?php echo $row['email'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 control-label">
                        <label class="control-label" for="password">Password </label>
                    </div>
                    <div class="col-sm-8 input-column">
                        <input class="form-control" id="password" placeholder="******" disabled name="s_password" type="password">
                    </div>
                </div>
               
       
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php if ($user==1) {
          echo '<button type="submit button" class="btn btn-primary submit-button" name="update">Save changes</button>';
        } 
        ?>
      </div>

    </form>


    </div>
  </div>
</div>

</div>


      <script type="text/javascript">
    class_list("<?php echo $cls;?>");
    function class_list(val)
    {
     $.ajax({
     type: 'post',
     url: 'include/up_class.php',
     data: {
      get_class:val
     },
     success: function (response) {
      document.getElementById("stc").innerHTML=response; 
     }
     });
    }


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
        $('#myModal').modal('show');
      </script>
        <?php
    // }
} else {
    echo "0 results";
    
}
// $conn->close();
      }
    }

?>

<section id="nav-after">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-4 col-md-3 col-sm-12">
          <div id="search-box">
            <input type="search" id="search" placeholder="Type to search..." />
            <span class="search"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>  
        </div>
        <div class="col-sm-12 col-md-offset-2 col-md-3">
           <button onclick="window.location='include/pdf/student.php'" class="exel_dl_btn"><img class="exel_dl_img" alt="Download in Exel" title="Download in PDF" src="images/icons/pdf_dl.png"></button>

          <button onclick="window.location='include/exel/downloader/public_student.php'" class="exel_dl_btn"><img class="exel_dl_img" alt="Download in Exel" title="Download in Excel" src="images/icons/exel_dl.ico"></button>
        </div>
    </div>
  </div>
</section>


<section id="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
  <div class="table-responsive">
  <table id="table" class="table">
    <!-- <caption class="text-center">Student Table</caption> -->

    <thead>
      <tr><th style="width: 30px;">S\N</th><th>Name</th><th>Class</th><th>Roll</th><th>Section</th><th class="col-md-1">Gender</th><th>Birth Day</th><th>Address</th><th>City</th><th>Zip</th><th>Phone</th><th>Email</th><th style="width: 65px;">Action</th></tr>
    </thead>
    <tbody>

    <?php
    // include "core/connect.php";

    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
      $n=1;
    while($row = $result->fetch_assoc()) {
      ?>
      <tr>
        <td><?php echo $n; ?></td>
        <td><?php echo $row["f_name"];?>
        <?php echo $row["l_name"]; ?></td>
        <td><?php echo $row["class"]; ?></td>
        <td><?php echo $row["roll"]; ?></td>
        <td><?php echo $row["section"]; ?></td>
        <td><?php echo $row["gender"]; ?></td>
        <td><?php echo $row["b_date"]; ?></td>
        <td><?php echo $row["address"]; ?></td>
        <td><?php echo $row["city"]; ?></td>
        <td><?php echo $row["zip"]; ?></td>
        <td><?php echo $row["phone"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td>
        <?php $cls = $row["class"]; ?>

        <?php if ($user==1) { 
          echo '<a href="?page=2&id='.$row['id'].'&action=del"'; ?> onclick="return confirm('Are you sure?');" ><i class="fa fa-lg fa-trash-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
       <?php } ?>
        <a href="?page=2&id=<?php echo $row['id'];?>&action=view"><i class="fa fa-lg fa-eye" aria-hidden="true"></i></a>
        </td>
      </tr>
        <?php
        $n++;
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

    </div>
  </div>
  
</section>


<?php require "pages/footer.php"; ?>