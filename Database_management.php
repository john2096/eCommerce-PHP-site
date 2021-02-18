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
            <h3 id="subhead">Products</h3>
            <ul>
                <li><a href="Add_product.php">New Product</a></li>
                <li><a href="Modify_product.php">Edit Product</a></li>
                <li><a href="Delete_products.php">Remove Product</a></li>
            </ul>
        </div>
    </body>

</html>