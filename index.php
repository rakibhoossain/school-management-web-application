  <?php
  $user=0;
  $login=0;
  session_start();
  function login($nm,$vl){
    $_SESSION[$nm] = $vl;
    if ($_SESSION['xbpqwe']=='xbbpqf72cabzc4ryun') header('Location: index.php');
  }
  if (isset($_SESSION['xbpqwe'])) {
    $login=1;
    $user=1;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>School management system</title>
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico" />
     

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     
     
     
  </head>
     <body>
<!--==============================header=================================-->
 <header> 
  <nav class="navbar navbar-default fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="images/logo.png" class="brand-image"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <!-- <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
          <li><a href="about.html">Result</a></li>
          <li class="active"><a href="#">Student</a></li>
          <li><a href="news.html">News</a></li>
          <li><a href="contact.html">Contacts</a></li>
        </ul> -->

 <ul class="nav navbar-nav navbar-right">

   <li <?php if ((!isset($_GET['page']))||(isset($_GET['page']) && $_GET['page'] == '1')) echo 'class="active"'?>><a href="?page=1">Home</a></li>

   <li <?php if (isset($_GET['page']) && $_GET['page'] == '2') echo 'class="active"'?>><a href="?page=2">Student</a></li>

   <li <?php if (isset($_GET['page']) && $_GET['page'] == '3') echo 'class="active"'?>><a href="?page=3">Result</a></li>
<?php if ($user==1) {?>


<li class="dropdown <?php if (isset($_GET['page']) && ($_GET['page'] == '30' || $_GET['page'] == '31') ) echo 'active'?>">
  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Marks
    <span class="caret"></span></a>
    <ul class="dropdown-menu">

    <li <?php if (isset($_GET['page']) && $_GET['page'] == '30') echo 'class="active"'?>><a href="?page=30">Marks Entry</a></li>
<li <?php if (isset($_GET['page']) && $_GET['page'] == '31') echo 'class="active"'?>><a href="?page=31">View Marks</a></li>
       
    </ul>
</li>


  <li <?php if (isset($_GET['page']) && $_GET['page'] == '5') echo 'class="active"'?>><a href="?page=5">Insert</a></li>

<?php } if ($login==1) { ?>
  <li><a href="?page=6">Logout</a></li>
<?php }else{?>
  <li <?php if (isset($_GET['page']) && $_GET['page'] == '4') echo 'class="active"'?>><a href="?page=4">Login</a></li>
<?php } ?>
   

</ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>
<?php
    if ((!isset($_GET['page']))) include 'pages/registation.php';

     if(isset($_GET['page'])) {
      $page=$_GET['page'];

       if ($page == '1'){
        include 'pages/registation.php';
      }
      if ($page == '2'){
        include 'pages/student.php';
      }
      if ($page == '3'){
        include 'pages/result.php';
      }
      if ($page == '30'){
        include 'admin/marks_entry.php';
      }
      if ($page == '31'){
        include 'admin/marks_view.php';
      }
      if ($page == '4'){
        include 'pages/login.php';
      }
      if ($page == '5'){
        include 'admin/insert.php';
      }
      if ($page == '6'){
        session_unset(); 
        session_destroy();
        header('Location: index.php');
      }
    }
  ?>