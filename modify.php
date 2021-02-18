<?php
require_once('DB_Conn.php');
		$ID= filter_input(INPUT_POST, 'product_id');
		$Cat = filter_input(INPUT_POST, 'category');
		$PName = filter_input(INPUT_POST, 'name');
		$PType = filter_input(INPUT_POST, 'type');
		$PDesc = filter_input(INPUT_POST, 'desc');
		$PPrice = filter_input(INPUT_POST, 'price');
		
		$query = "UPDATE products SET Category_ID = :cat, Product_name = :pname, Product_type = :ptype, Description = :pdesc, Price = :pprice WHERE Prod_ID = :id";
		$statement = $db->prepare($query);
		$statement->bindValue(':id', $ID);
		$statement->bindValue(':cat', $Cat);
		$statement->bindValue(':pname', $PName);
		$statement->bindValue(':ptype', $PType);
		$statement->bindValue(':pdesc', $PDesc);
		$statement->bindValue(':pprice', $PPrice);
		$success = $statement->execute();
		$statement->closeCursor();    
		
		include('Modify_product.php');
?>