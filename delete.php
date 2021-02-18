<?php
require_once('DB_Conn.php');
		$ID= filter_input(INPUT_POST, 'product_id');
		
		$query = "DELETE FROM products WHERE Prod_ID = :id";
		$statement = $db->prepare($query);
		$statement->bindValue(':id', $ID);
		$success = $statement->execute();
		$statement->closeCursor();    
		
		include('Delete_products.php');
?>