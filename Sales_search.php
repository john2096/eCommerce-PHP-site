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
if(isset($_POST['Return']))
{
	header("Location: Sales.php");
}
		
		$S1= filter_input(INPUT_POST, 'syear');
		$S2= filter_input(INPUT_POST, 'smonth');
		$S3= filter_input(INPUT_POST, 'sday');
		$S4= filter_input(INPUT_POST, 'eyear');
		$S5= filter_input(INPUT_POST, 'emonth');
		$S6= filter_input(INPUT_POST, 'eday');
		$S7= filter_input(INPUT_POST, 'product_id');
		$S8= filter_input(INPUT_POST, 'user_id');
		$Start = $S1 .'-' .$S2 .'-' .$S3;
		$End = $S4 .'-' .$S5 .'-' .$S6;
		
		
		$query = 'SELECT * FROM sales WHERE UserID = :user AND ProdID = :prod AND Sale_Date BETWEEN :startdate AND :enddate ORDER BY Sale_Date DESC;';
		$statement = $db->prepare($query);
		$statement->bindValue(':startdate', $Start);
		$statement->bindValue(':enddate', $End);
		$statement->bindValue(':prod', $S7);
		$statement->bindValue(':user', $S8);
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
				<form action="#" method="post"><input type="submit" name="Return" value="Return"></form>
		</div>
    </body>
</html>