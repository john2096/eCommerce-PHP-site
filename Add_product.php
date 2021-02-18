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

$query = 'SELECT * FROM categories';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

if(isset($_POST['Submit']))
{
$Category = $_POST['category_id'];
$Product = filter_input(INPUT_POST, 'name');
$Product_type = filter_input(INPUT_POST, 'type');
$Description = filter_input(INPUT_POST, 'desc');
$Price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

	if ($Category == null || $Category == false || $Product == null || $Product_type == null || $Description == null || $Price == null || $Price == false ) 
	{
		echo "Invalid product data. Check all fields and try again.";
		echo $Category ." " .$Product ." " .$Product_type ." " .$Description ." " .$Price;
	} 
	else {
		$query = 'INSERT INTO products
                 (Category_ID, Product_name, Product_type, Description, Price)
              VALUES
                 (:cat, :name, :type, :desc, :price)';
		$statement = $db->prepare($query);
		$statement->bindValue(':cat', $Category);
		$statement->bindValue(':name', $Product);
		$statement->bindValue(':type', $Product_type);
		$statement->bindValue(':desc', $Description);
		$statement->bindValue(':price', $Price);
		$statement->execute();
		$statement->closeCursor();
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="Stylesheet" href="Styles.css">
        <h2 id="Title">Bits and Bytes</h2>
        <hr>
    </head>
    <body>
        <div id="navbar">
            <h3 id="subhead">Navigation</h3>
            <ul>
                <li><a href="Sales.php">Sales</a></li>
                <li><a href="Database_management.php">Database</a></li>
				<li><form action="#" method="post"><input type="submit" name="Logout" value="Logout"></form></li>
            </ul>
        </div>
		<div id="navbar">
            <h3 id="subhead">Products</h3>
            <ul>
                <li><a href="Add_product.php">New Product</a></li>
                <li><a href="Modify_product.php">Edit Product</a></li>
                <li><a href="Delete_products.php">Remove Product</a></li>
            </ul>
        </div>
		<div>
			<h3 id="subhead">Add Product</h3>
				<table>
					<tr>
						<th>Category</th>
						<th>Name</th>
						<th>Type</th>
						<th>Description</th>
						<th>Price</th>
					</tr>
					<tr>
						<form action="#" method="post">
						<td><select name="category_id"><option value="1">Cases</option><option value="2">Processors</option><option value="3">Motherboards</option><option value="4">Graphics Cards</option></select></td>
						<td><input type="text" name="name"/></td>
						<td><input type="text" name="type"/></td>
						<td><input type="text" name="desc"/></td>
						<td><input type="text" name="price"/></td>
						<td><input type="submit" name="Submit" value="Submit"></td>						
						</form>
					</tr>
				</table>
		</div>
    </body>

</html>