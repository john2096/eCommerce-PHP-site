<?php
require_once('DB_Conn.php');
require_once('User_Class.php');
require_once('Admin_Class.php');
$U1= new User;
$A1 = new Admin;
session_start();

$query = 'SELECT * FROM categories ORDER BY category_ID';
//says $DB is undefined but is it the DB_conn.php file
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();

if(isset($_SESSION['User']))
{
    $U1=$_SESSION['User'];
   
    echo "Dear, " . $U1 ->getUFirstName() . " you have been logged out by entering this page.  If you wish to return to customer services please select a location from the navigation area.";

    session_destroy();
}

if(isset($_POST['AUsername']) and (!isset($_SESSION['User'])))
{
        $A1 ->setDataAdmin($_POST['AUsername'],$_POST['APassword']);
		$test = $A1 -> getTest();
		if($test == 'true'){
			
		echo "Welcome ". $A1 ->getAFirstName();
        $_SESSION['Admin']=$A1;
		header("Location: Admin_main.php");
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
                <li><a href="Main.php">Main Page</a></li>
                <li><a href="Cart.php">Cart</a></li>
                <li><a href="Login.php">Login</a></li>
            </ul>

            <h3 id="subhead">Product Categories</h3>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <
                    <li><a href="Categories.php?link_clicked=true&category_id=<?php echo $category['Category_ID']; ?>">
                            
                            <?php echo $category['Category_name']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li><a href="Prod_page.php">Product page</a>
            </ul>
        </div>
        
        <div id="login portion">
            <br>
            <form action="#" method="post">
                <p> Please enter Administration username:</p><input type="text" name="AUsername">
                <br>
                <p>Please enter password: </p><input type="password" name="APassword">
                <input type="submit" name="Submit" value="Submit">
            </form>
            
        </div>
    </body>

</html>