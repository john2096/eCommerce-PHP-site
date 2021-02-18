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

$query = 'SELECT * FROM products';
$statement = $db->prepare($query);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();

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
            <h3 id="subhead">Modify Products</h3>
            <ul>
                <li><a href="Add_product.php">New Product</a></li>
                <li><a href="Modify_product.php">Edit Product</a></li>
                <li><a href="Delete_products.php">Remove Product</a></li>
            </ul>
        </div>
		<div>
			<h3 id="subhead">Modify Products</h3>
				<table>
					<tr>
						<th>Category</th>
						<th>Name</th>
						<th>Type</th>
						<th>Description</th>
						<th>Price</th>
					</tr>
					<?php foreach ($products as $products) : ?>
						<tr>
							<form action="modify.php" method="post">
							<td><input type="text" name="category" value = <?php echo $products['Category_ID']; ?> /></td>
							<td><input type="text" name="name" value = <?php echo $products['Product_name']; ?> /></td>
							<td><input type="text" name="type" value = <?php echo $products['Product_type']; ?> /></td>
							<td><input type="text" name="desc" value = "<?php echo $products['Description']; ?>" /></td>
							<td><input type="text" name="price" value = <?php echo $products['Price']; ?> /></td>
							<td><input type="hidden" name="product_id" value=<?php echo $products['Prod_ID']; ?>></td>
							<td><input type="submit" name="Modify" value="Modify"></td>
							</form>
						</tr>
					<?php endforeach; ?>
				</table>
		</div>
    </body>

</html>