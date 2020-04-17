<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php
include('connect.php');
require('fpdf/fpdf.php');

class PDF_result extends FPDF
{
	function BuildTable($header,$data)
	{
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B'); 
		//Header
		// make an array for the column widths
		$w=array(30,30);
		// send the headers to the PDF document
		
		$this->Ln();
		//Color and font restoration
		
		$this->SetFillColor(175);
		$this->SetTextColor(0);
		$this->SetFont('');
		//now spool out the data from the $data array
		
		$fill=true; // used to alternate row color backgrounds
			foreach($data as $row)
			{
				$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
				// set colors to show a URL style link
				$this->SetTextColor(0,0,255);
				$this->SetFont('');
				
				$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
				// restore normal color settings
				$this->SetTextColor(0);
				$this->SetFont('');
				$this->Ln();
				// flips from true to false and vise versa
				$fill =! $fill;
			}
			$this->Cell(array_sum($w),0,'','T');
	}
}


$query = "SELECT * from book_information"; 

$result = mysql_query($query) or die('Query failed: '.mysql_error());
	
	while($row = mysql_fetch_array($result))
	{
		$data[] = array($row['Book_Name'], $row['ISBN'], $row['Author'], $row['Publisher'] );
	}

$pdf = new PDF_result();
$header=array('Book_Name','ISBN', 'Author', 'Publisher');
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->BuildTable($header,$data);
$pdf->Output(); 

?>

</body>

</html>