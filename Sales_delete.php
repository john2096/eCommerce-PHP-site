<?php
require_once('DB_Conn.php');
require_once('Admin_Class.php');
$A1 = new Admin;
session_start();

if(isset($_SESSION['Admin']))
{
    $A1=$_SESSION['Admin'];
   
    echo "Welcome " . $A1 ->getAFirstName();
}

if(isset($_POST['Logout']))
{
    echo "Goodbye " . $A1 ->getAFirstName();
    session_destroy();
	header("Location: Main.php");
}
		$ID= filter_input(INPUT_POST, 'product_id');
		
		$query = "DELETE FROM sales WHERE ProdID = :id";
		$statement = $db->prepare($query);
		$statement->bindValue(':id', $ID);
		$success = $statement->execute();
		$statement->closeCursor();    
		header("Location: Sales.php");
?>