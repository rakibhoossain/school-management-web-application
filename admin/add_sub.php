<?php 
require '../core/connect.php';

$sub =array("1001"=>"BENGALI",

"1101"=>"ENGLISH",

"1201"=>"ARABIC",

"1501"=>"HISTORY",

"1601"=>"ISLAMIC HISTORY & CULTURE",

"1701"=>"PHILOSOPHY",

"1801"=>"ISLAMIC STUDIES",

"1901"=>"POLITICAL SCIENCE",

"2001"=>"SOCIOLOGY",

"2101"=>"SOCIAL WORK",

"2201"=>"ECONOMICS",

"2301"=>"MARKETING",

"2401"=>"FINANCE & BANKING",

"2501"=>"ACCOUNTING",

"2601"=>"MANAGEMENT",

"2701"=>"PHYSICS",

"2801"=>"CHEMISTRY",

"2901"=>"BIO CHEMISTRY",

"3001"=>"BOTANY",

"3101"=>"ZOOLOGY",

"3201"=>"GEOGRAPHY",

"3301"=>"SOIL SCIENCE",

"3401"=>"PSYCHOLOGY",

"3501"=>"HOME ECONOMICS",

"3601"=>"STATISTICS",

"3701"=>"ATHEMATICS",

"3801"=>"BRARY AND INFORMATION SCIENCE",

"3901"=>"ACHELOR OF EDUCATION",

"4001"=>"ANTHROPOLOGY",

"4101"=>"PUBLIC ADMINISTRATION",

"4201"=>"COMPUTER SCIENCE",

"4301"=>"BUSINESS ADMINISTRATION",

"4401"=>"ENVIRONMENTAL SCIENCES");



foreach ($sub as $code=> $name) {

  $sql = "UPDATE subject SET sub_class='HONOURS' WHERE id='".$code."'";
  var_dump($sql);


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}





// 

//     echo $code."->".$name."</br>";

//     $stmt->bind_param("ss", $code, $name);

//     var_dump($stmt);}





$conn->close();



?>