<?php
require "../../../core/connect.php";
/** Set default timezone (will throw a notice otherwise) */
date_default_timezone_set('Asia/Dhaka');

// include PHPExcel
require('../PHPExcel.php');

// create new PHPExcel object
$objPHPExcel = new PHPExcel;

// set default font
$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');

// set default font size
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

// create the writer
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");

 

/**

 * Define currency and number format.

 */

// currency format, € with < 0 being in red color
$currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';

// number format, with thousands separator and two decimal points.
$numberFormat = '#,#0.##;[Red]-#,#0.##';

 

// writer already created the first sheet for us, let's get it
$objSheet = $objPHPExcel->getActiveSheet();

// rename the sheet
$objSheet->setTitle('Student Details');

 

// let's bold and size the header font and write the header
// as you can see, we can specify a range of cells, like here: cells from A1 to A4
$objSheet->getStyle('A1:L1')->getFont()->setBold(true)->setSize(12);

 

// write header
$objSheet->getCell('A1')->setValue('S/N');
$objSheet->getCell('B1')->setValue('Full Name');
$objSheet->getCell('C1')->setValue('Roll');
$objSheet->getCell('D1')->setValue('Class');
$objSheet->getCell('E1')->setValue('Subject');
$objSheet->getCell('F1')->setValue('Gender');
$objSheet->getCell('G1')->setValue('Birth Day');
$objSheet->getCell('H1')->setValue('Address');
$objSheet->getCell('I1')->setValue('City');
$objSheet->getCell('J1')->setValue('Zip');
$objSheet->getCell('K1')->setValue('Phone');
$objSheet->getCell('L1')->setValue('Email');



// we could get this data from database

    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
      $n=1;$ro=2;
    while($row = $result->fetch_assoc()) {

    	$name = $row["f_name"].' '.$row["l_name"];

		$objSheet->getCell("A".$ro)->setValue($n);
		$objSheet->getCell("B".$ro)->setValue($name);
		$objSheet->getCell("C".$ro)->setValue($row["roll"]);
		$objSheet->getCell("D".$ro)->setValue($row["class"]);
		$objSheet->getCell("E".$ro)->setValue($row["section"]);
		$objSheet->getCell("F".$ro)->setValue($row["gender"]);
		$objSheet->getCell("G".$ro)->setValue($row["b_date"]);
		$objSheet->getCell("H".$ro)->setValue($row["address"]);
		$objSheet->getCell("I".$ro)->setValue($row["city"]);
		$objSheet->getCell("J".$ro)->setValue($row["zip"]);
		$objSheet->getCell("K".$ro)->setValue($row["phone"]);
		$objSheet->getCell("L".$ro)->setValue($row["email"]);

        $n++;
		$ro++;
    }
} else {
    echo "0 results";
    
}
$conn->close();

// autosize the columns
$objSheet->getColumnDimension('A')->setAutoSize(true);
$objSheet->getColumnDimension('B')->setAutoSize(true);
$objSheet->getColumnDimension('C')->setAutoSize(true);
$objSheet->getColumnDimension('D')->setAutoSize(true);
$objSheet->getColumnDimension('E')->setAutoSize(true);
$objSheet->getColumnDimension('F')->setAutoSize(true);
$objSheet->getColumnDimension('G')->setAutoSize(true);
$objSheet->getColumnDimension('H')->setAutoSize(true);
$objSheet->getColumnDimension('I')->setAutoSize(true);
$objSheet->getColumnDimension('J')->setAutoSize(true);
$objSheet->getColumnDimension('K')->setAutoSize(true);
$objSheet->getColumnDimension('L')->setAutoSize(true);



//Setting the header type
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="student.xlsx"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output');

/* If you want to save the file on the server instead of downloading, replace the last 4 lines by 
	$objWriter->save('test.xlsx');
*/

?>
