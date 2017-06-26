<?php
// $class=$roll=$first_name=$last_name=$gender=$b_date=$address=$city=$zip=$country=$phone=$email=$password=$r_password=$photo="";

$s_class=$s_id=$section=$gender=$f_name=$l_name=$b_date=$city=$zip=$address=$phone=$email=$passwor="";
$error_msg="";


if(isset($_POST['s_reg'])) 
{
  
  try {
   
    
    if(empty($_POST['s_class'])) {
      throw new Exception('Class can not be empty');
    }

    $passwor = $_POST['s_password']; 
    $s_id    = $_POST['s_id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $s_class = $_POST['s_class'];
    $section = $_POST['section'];
    $gender = $_POST['gender'];
    $b_date = $_POST['b_date'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['s_email'];
    
    include "core/connect.php";

    $stmt = $conn->prepare("INSERT INTO student (roll,f_name,l_name,class,section,gender,b_date,city,zip,address,phone,email,password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("isssssssisiss", $s_id, $f_name, $l_name, $s_class, $section, $gender, $b_date, $city, $zip, $address, $phone, $email, 
      $passwor);

    $stmt->execute();

    printf("%d Row inserted.\n", $stmt->affected_rows);

    echo "New records created successfully";

    $stmt->close();
    $conn->close();
  }
  
  catch(Exception $e) {
    $error_msg = $e->getMessage();
  }
  
}
?>

<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="bcon">
          <img src="images/h_bg.jpg">
        </div>
      </div>
      <div class="col-md-7">
        <div class="reg page-header">
          <h4 class="text-center">Student Registation Form</h4>
        </div>
       <!-- Form start hear //<?php echo $_SERVER['PHP_SELF'];?> -->
            <form class="form-horizontal custom-form" name="s_form" method="post">
                

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="stc_1">Class</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="stc_1" name="s_class" style="width:100%;"  onchange="subject_list(this.value);">
                              <option value="">-Class-</option>
                            <!-- Data  load from ajax method-->

                            </select>
                        </div>
                        <div class="col-sm-4 input-column">
                          <input class="form-control" id="roll" name="s_id" placeholder="Roll / ID" type="text">
                        </div>
                </div>

                <div class="form-group">
                     <label class="col-sm-4 control-label" for="section_1">Subject</label>
                  <!--  <div class="col-sm-4 input-column">
                          <input class="form-control" id="roll" name="S_id" placeholder="ID" type="text">
                      </div> -->
                    
                        <div class="col-sm-4">
                            <select class="form-control col-sm-4" name="section" id="section">

                                <option value="">-Subject-</option>


                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div data-toggle="buttons">
                              <label class="btn btn-default btn-circle active"><input id="male" type="radio" name="gender" checked value="Male"><i class="fa fa-male" aria-hidden="true"></i></label>
                              <label for="male">  Male</label>
                              <label class="btn btn-default btn-circle"><input id="fe-male" type="radio" name="gender" value="Female"><i class="fa fa-female" aria-hidden="true"></i></label>
                              <label for="fe-male">  Female</label>
                          </div>
                        </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 control-label">
                        <label class="control-label" for="name-input-field">Name</label>
                    </div>
                    <div class="col-sm-4 input-column">
                        <input class="form-control" name="f_name" placeholder="First Name" id="name-input-field" type="text">
                    </div>
                    <div class="col-sm-4 input-column">
                        <input class="form-control" name="l_name" placeholder="Last Name" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 control-label">
                        <label class="control-label" for="datepicker">Date of Birth</label>
                    </div>
                    <div class="col-sm-3 input-column">
                        <input class="form-control datepicker" id="datepicker" name="b_date" placeholder="30/01/1996" type="text">
                    </div>
                    <div class="col-sm-3">
                            <select class="form-control col-sm-4" id="city" name="city">
                              <option selected="selected" value="">-City-</option>
                             <!-- Update from ajay database  -->
                            </select>



                        </div>
                        <div class="col-sm-2 input-column">
                          <input class="form-control" placeholder="Zip Code" name="zip" type="text">
                        </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 control-label">
                        <label class="control-label" for="address">Address</label>
                    </div>
                    <div class="col-sm-8 input-column">
                        <textarea class="form-control" id="address" name="address" placeholder="Your address type hear!"></textarea>
                    </div>
                </div>

                
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="phone">Phone</label>
                        <div class="col-sm-8 input-column">
                          <input class="form-control" id="phone" name="phone" placeholder="+8801234567890" type="text">
                        </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-4 control-label">
                        <label class="control-label" for="email">Email </label>
                    </div>
                    <div class="col-sm-8 input-column">
                        <input class="form-control" id="email" placeholder="Enter your email" name="s_email" type="email" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 control-label">
                        <label class="control-label" for="password">Password </label>
                    </div>
                    <div class="col-sm-8 input-column">
                        <input class="form-control" id="password" placeholder="Enter your new password" name="s_password" type="password">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-4">
                          <button class="btn btn-default btn-block submit-button" type="submit" name="s_reg">Submit</button>
                        </div>
                        <div class="col-sm-4">
                          <button class="btn btn-default btn-block submit-button" type="reset">Reset</button>
                        </div>
                </div>
            </form>
      </div>

    </div>
  </div>
  
</section>


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

    $.ajax({
     type: 'post',
     url: 'include/city.php',
     success: function (response) {
      document.getElementById("city").innerHTML=response; 
     }
    });

  });
</script>


<?php include('footer.php'); ?>