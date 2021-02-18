<?php
require_once('DB_Conn.php');

if(isset($_POST['write']))
{
	
		$S1= filter_input(INPUT_POST, 'syear');
		$S2= filter_input(INPUT_POST, 'smonth');
		$S3= filter_input(INPUT_POST, 'sday');
		$S4= filter_input(INPUT_POST, 'eyear');
		$S5= filter_input(INPUT_POST, 'emonth');
		$S6= filter_input(INPUT_POST, 'eday');
		$Start = $S1 .'-' .$S2 .'-' .$S3;
		$End = $S4 .'-' .$S5 .'-' .$S6;
	
		$file = fopen('E:\ITS362\report.csv', 'wb');
		$list = array('Sale ID', 'Sale Amount', 'Sale Date', 'ProdID', 'UserID');
		$query = 'SELECT * FROM sales WHERE Sale_Date BETWEEN :startdate AND :enddate ORDER BY Sale_Date DESC;';
		$statement = $db->prepare($query);
		$statement->bindValue(':startdate', $Start);
		$statement->bindValue(':enddate', $End);
		$statement->execute();
		$sales = $statement->fetchAll();
		$statement->closeCursor(); 
		fputcsv($file, $list);
		foreach ($sales as $sales) {
		fputcsv($file, $sales);
		}
		fclose($file);
	header("Location: Report.php");
}
?>