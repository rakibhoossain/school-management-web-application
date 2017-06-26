<?php

if (isset($_SESSION['xbpqwe'])) {
  $key=$_SESSION['xbpqwe'];
  if ($key=='xbbpqf72cabzc4ryun') {
    header('Location: index.php');
  }
}
			
$error_message="";
if(isset($_POST['s_login'])) 
{
	try {
	
		
		if(empty($_POST['email'])) {
			throw new Exception('Email can not be empty');
		}
		
		if(empty($_POST['pass'])) {
			throw new Exception('Password can not be empty');
		}if(empty($_POST['condition'])) {
			throw new Exception('Please select tearms & Conditions');
		}

	
		$email = $_POST['email'];
		$pass = $_POST['pass']; // admin
		$condition = $_POST['condition'];
		
	
	
		include('core/connect.php');

		// $sql = "SELECT * FROM student WHERE password = '".$pass."'";
		// $sql = "SELECT * FROM student WHERE email = '".$email."'";

		$sql = "SELECT * FROM student WHERE email = '".$email."' AND password = '".$pass."'";
		$result = $conn->query($sql);
		if ($result->num_rows >0) {

echo $email;echo "<br>".$pass." <br> ".$condition;

		login('xbpqwe','xbbpqf72cabzc4ryun');

			
			
		} else {
			echo $result->num_rows;
		    echo "Password not match";
		}

		$conn->close();
	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

echo $error_message;
?>




<section id="content">
  <div class="container relative">
  <div class="row">
    <!-- <div class="Absolute-Center is-Responsive"></div> -->
      <div class="col-sm-12 col-md-10 col-md-offset-1">

      <div class="vcen">
      <div id="logo-container"><i class="fa fa-2x fa-sign-in"></i></div>
        <form name="login" method="post">
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
            <input type="email" class="form-control" placeholder="Email address" name="email">          
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" class="form-control" placeholder="Password" name="pass">     
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="condition" value="yes"> I agree to the <a href="#">Terms and Conditions</a>
            </label>
          </div>
          <div class="form-group">
            <button type="submit" name="s_login" class="btn btn-def btn-block">Login</button>
          </div>
          <div class="form-group text-center">
            <a href="#">Forgot Password</a>&nbsp;|&nbsp;<a href="#">Support</a>
          </div>
        </form> 
        </div>       
      </div>  
        
  </div>
</div>
</section>


<?php // require "pages/footer.php"; ?>