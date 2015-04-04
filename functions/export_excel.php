<?php
	require '../PHPExcel/Classes/PHPExcel.php';
	
	if(!isset($_GET['query']) || !isset($_GET['sheetname']) || !isset($_GET['filename']) || !isset($_GET['headings']))
	{
		die("Error: No information on GET");
	}
	
	require_once '../functions/server.php';
	
	$query = $_GET['query'];
	$headings = explode('.',$_GET['headings']);
	$sheetname = $_GET['sheetname'];
	$filetname = $_GET['filename'];
	
	if($result = check_data($query) or die(mysqli_error()))
	{
		// Create a new PHPExcel object 
		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->getActiveSheet()->setTitle($sheetname); 
		
		$rowNumber = 1; 
		$col = 'A';
		foreach($headings as $heading) 
		{ 
		   $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$heading); 
		   $objPHPExcel->getActiveSheet()->getStyle($col . $rowNumber)->getFont()->setBold(true);
		   $col++;
		} 
		
		// Loop through the result set 
		$rowNumber = 2;
		while ($row = mysqli_fetch_row($result)) 
		{ 
		   $col = 'A';
		   foreach($row as $cell) 
		   {
			  $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$cell);
			  $col++; 
		   }
		   $rowNumber++; 
		} 

		// Freeze pane so that the heading line won't scroll 
		//$objPHPExcel->getActiveSheet()->freezePane('A2'); 
		
		// Save as an Excel BIFF (xls) file 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 

		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="' . $filetname . '.xls"');
		header('Cache-Control: max-age=0'); 
		
		$objWriter->save('php://output'); 
		exit(); 
	}
	
echo 'a problem has occurred... no data retrieved from the database'; 
	
?>