<?php

$upd_insrt=0;
if (isset($_POST['insert'])) {
	$upd_insrt=1;
}
if (isset($_POST['Update'])) {
	$upd_insrt=2;
}


echo $upd_insrt;
/** Set default timezone (will throw a notice otherwise) */
date_default_timezone_set('Asia/Dhaka');

include '../PHPExcel/IOFactory.php';

if(isset($_FILES['file']['name'])){
		
	$file_name = $_FILES['file']['name'];
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	
	//Checking the file extension
	if($ext == "xlsx"){
			
			$file_name = $_FILES['file']['tmp_name'];
			$inputFileName = $file_name;

		//  Read your Excel workbook
		try {
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch (Exception $e) {
			die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) 
			. '": ' . $e->getMessage());
		}


		
		//  Get worksheet dimensions
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		// Database connection
		include '../../../core/connect.php';
		$field = array('f_name','l_name','roll','class','section','gender','b_date','address','city','zip','phone','email','password');

//Funciton Call//

	if ($upd_insrt==1) {
		insert($highestRow,$sheet,$highestColumn,$conn);
	}	

	if ($upd_insrt==2) {
		update($highestRow,$sheet,$highestColumn,$conn,$field);
	}

//Funciton Call End//

	$conn->close();
		
	}

	else{
		echo '<p style="color:red;">Please upload file with xlsx extension only</p>'; 
	}	
		
}




//Function defination for insert

function insert($highestRow,$sheet,$highestColumn,$conn){	

		for ($row = 2; $row <= $highestRow; $row++) {
			//  Read a row of data into an array
			$rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row, 
			NULL, TRUE, FALSE);

			$cmnd="";
			foreach($rowData[0] as $k=>$v)
				$cmnd.="'".$v."',";
				$cmnd = trim($cmnd,',');

				$sql = "INSERT INTO student (f_name,l_name,roll,class,section,gender,b_date,address,city,zip,phone,email,password) VALUES ($cmnd)";

				if ($conn->query($sql) === TRUE) {
				    echo "New record created successfully</br>";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		}

//Function defination for update

function update($highestRow,$sheet,$highestColumn,$conn,$field){
for ($row = 2; $row <= $highestRow; $row++) {
			$rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row, 
			NULL, TRUE, FALSE);
			$cmnd="";
			$roll="";
			foreach($rowData[0] as $k=>$v){
				$cmnd.=$field[$k]."='".$rowData[0][$k]."',";
				$roll=$rowData[0][2];
			}				
				$cmnd = trim($cmnd,',');
				$cmnd.=" WHERE roll='".$roll."'";

				$sql = "UPDATE student SET $cmnd";

			 if ($conn->query($sql) === TRUE) {
			   echo "Update successfully</br>";
			} else {
				   echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}

	}





?>