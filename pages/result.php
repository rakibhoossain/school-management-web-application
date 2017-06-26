
<section id="nav-after">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
          <h3>Search your result</h3>
        </div>

    </div>
  </div>
</section>


<section class="src">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
      <div class="result_search">
        

<form class="form-horizontal custom-form" method="post">
<div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label" for="stc_1">Class</label>
                    <div class="col-md-8 col-sm-6">
                        <select class="form-control" id="stc_1" name="s_class" style="width:100%;"  onchange="subject_list(this.value);">
                            <option value="">-Class-</option>
                            <!-- Data  load from ajax method-->

                        </select>
                    </div>
                </div>
        <div class="form-group">
                    <label class="col-sm-2 control-label" for="section">Section</label>
                    <div class="col-md-8 col-sm-6">
                        <select class="form-control" id="section" name="section" style="width:100%;">
                            <option value="">-Section-</option>
                            <!-- Data  load from ajax method-->

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="roll">Roll</label>
                    <div class="col-md-8 col-sm-6 input-column">
                        <input class="form-control" id="roll" name="roll" placeholder="Roll" type="text">
                    </div>
                </div>


  
        <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                        <div class="col-md-4 col-sm-3">
                          <button class="btn btn-default btn-block submit-button" type="submit" name="mark_wh">Submit</button>
                        </div>
                        <div class="col-md-4 col-sm-3">
                          <button class="btn btn-default btn-block submit-button" type="reset">Reset</button>
                        </div>
                </div>

</form>
        </div>
      </div>
    </div>
  </div>
</section>


<?php

if(isset($_POST['mark_wh'])) 
{

    $class = $_POST['s_class'];
    $section = $_POST['section'];
    $roll = $_POST['roll'];

    
    include "core/connect.php";

    $sql = "SELECT mark.subject,mark.term,mark.year,mark.theory,mark.practical,mark.comment FROM mark INNER JOIN student ON mark.roll=student.roll WHERE student.class='$class' AND student.section='$section' AND mark.roll='$roll'";



    // $sql = "SELECT mark.roll AS roll,mark.subject AS subject,mark.term AS term,mark.year AS year,mark.theory AS theory,mark.practical AS practical,mark.comment AS comment FROM mark INNER JOIN student ON mark.roll=student.roll WHERE student.class='$class' AND student.section='$section' AND mark.roll='$roll'";


$result = $conn->query($sql);

if ($result->num_rows > 0) { 

  $info_sql = "SELECT f_name, l_name, roll, class, section FROM student WHERE roll='$roll'";
  $information = $conn->query($info_sql);

  if ($information->num_rows > 0) {
    $info = $information->fetch_assoc();
  }

  ?>

<section id="result_box">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

      <?php $info; ?>
        <div class="sc_logo"><img src="images/logo.png"></div>
        <div><h2>Institute</h2></div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <p><b>Name: </b><?php echo $info['f_name']." ".$info['l_name']; ?></td></p>
          <p><b>Roll: </b><?php echo $info['roll']; ?></p>
        </div>
        <div class="col-md-2 col-md-offset-8">
          <p><b>Class: </b><?php echo $info['class']; ?></p>
          <p><b>Section: </b><?php echo $info['section']; ?></p>
        </div>
      </div>
      <div class="col-md-12">

        <div class="table-responsive">


      <table id="table" class="table table-bordered table-condensed" cellpadding="0" cellspacing="0">
        <thead>
        <?php $names=array(); ?>
          <tr>
            <?php $i=0; while($title = $result->fetch_field()) { $th=$title->name; $names[$i]=$th; echo "<th class='$th'>".$th."</th>"; $i++; } ?>
          </tr>
        </thead>
        <tbody>

    <?php while($row = $result->fetch_assoc()) { ?>

<tr>
  <?php $length = count($names); for ($i=0; $i < $length ; $i++) { ?>

  <td><?php echo $row[$names[$i]]; ?></td>
  <?php } ?>         
</tr> <?php } ?>

        </tbody>
        <tfoot>
                    
        </tfoot>
      </table>

        </div>
      </div>
    </div>
  </div>
</section>


<?php
    }else{
    echo "No Result Found";
  }

    $conn->close();
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

    $("th").css("text-transform", "capitalize");

</script>
<?php require "pages/footer.php"; ?>