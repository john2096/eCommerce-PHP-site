<?php
class Admin
{
	private $AID;
    private $AFirstName;
    private $ALastName;

    function getAID()
    {
        return $this ->  $AID;

    }
   
    function getAFirstName()
    {
        return $this -> AFirstName;

    }
    

    function getALastName()
    {
        return $this -> ALastName;

    }
	
	function getTest(){
		return $this -> ATest;
	}

    function setDataAdmin($SentEm,$StrPass)
    {
        $dsn = 'mysql:host=localhost;dbname=362_proj';
        $username = 'root';
        $password = '';
		  

        try {
            $db = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo $error_message;
            include('DB_error.php');
            exit();
        }

        $query = "SELECT * FROM admin where Admin_username= '".$SentEm."'";
//says $DB is undefined but is it the DB_conn.php file
        $statement = $db->prepare($query);
        $statement->execute();
        $Return = $statement->fetch();


        if(password_verify($StrPass,$Return['Admin_password'])==false)
        {
            echo "Password entered was incorrect, please check information and resubmit";
			$this ->ATest='false';
        }
        else
        {
            $this ->AID=$Return['AdminID'];
            $this ->AFirstName=$Return['AFirstName'];
            $this ->ALastName=$Return['ALastName'];
			$this ->ATest='true';
        }



    }


}
?>