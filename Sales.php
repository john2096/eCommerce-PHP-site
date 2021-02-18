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

$query = 'SELECT * FROM sales;';
$statement = $db->prepare($query);
$statement->execute();
$sales = $statement->fetchAll();
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
                <li><a href="Report.php">Report</a></li>
				<li><form action="#" method="post"><input type="submit" name="Logout" value="Logout"></form></li>
            </ul>
        </div>
		<div id="navbar">
			<form action="Sales_search.php" method="post">
				<label>Select Starting date:</label><br>
				<select name="syear">
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				<option value="2021">2021</option>
				</select>
				<select name="smonth">
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				</select>
				<select name="sday">
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="10">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				</select>
				<br>
				<br>
				<label>Select Ending date:</label><br>
				<select name="eyear">
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				<option value="2021">2021</option>
				</select>
				<select name="emonth">
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				</select>
				<select name="eday">
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="10">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				</select>
				<br>
				<br>
				<label>Product ID:</label>
				<input type="text" name="product_id"/>
				<br>
				<br>
				<label>User ID:</label>
				<input type="text" name="user_id"/>
				<br>
				<br>
				<input type="submit" name="search" value="Seach sales">
			</form>
		</div>
		<div>
			<h3 id="subhead">Sales</h3>
				<table>
					<tr>
						<th>Sale ID</th>
						<th>Sale Amount</th>
						<th>Date</th>
						<th>Product ID</th>
						<th>User ID</th>
					</tr>
					<?php foreach ($sales as $sales) : ?>
						<tr>
							<form action="Sales_delete.php" method="post">
							<td><input type="text" name="saleid" value = <?php echo $sales['SaleID']; ?> /></td>
							<td><input type="text" name="amount" value = <?php echo $sales['Sale_Amount']; ?> /></td>
							<td><input type="text" name="date" value = <?php echo $sales['Sale_Date']; ?> /></td>
							<td><input type="text" name="product_id" value = <?php echo $sales['ProdID']; ?> /></td>
							<td><input type="text" name="user_id" value = <?php echo $sales['UserID']; ?> /></td>
							<td><input type="submit" name="Delete" value="Delete"></td>
							</form>
						</tr>
					<?php endforeach; ?>
				</table>
		</div>
    </body>

</html>