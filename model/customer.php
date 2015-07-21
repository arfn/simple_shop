<?php 
    include(CONFIG_PATH . 'database.php');

class Customer_Model extends DatabaseConnection
{
	public function register_customer($data = array())
	{
		function add_quote($str)
          {
              return sprintf("'%s'", $str);
          }
          $data['customer_password'] = password_hash($data['customer_password'], PASSWORD_BCRYPT);          
          $column = implode(", ", array_keys($data));
          $values = implode(", ", array_map("add_quote", array_values($data)));
          $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = $this->dbh->prepare("INSERT INTO customer ($column) VALUES ($values);");                       

          try{
            $sql->execute();
            echo "<div class='notice_redirect'><p>Successfuly Register. Please check your email confirmation.</p></div>";   
          } catch(PDOException $e)
          {
            if($e->errorInfo[1] == 1062)
            {
              $errdup = $e->errorInfo[2];
              if(strpos($errdup, 'customer_username')){
                echo "Username already taken.";
              } else if(strpos($errdup, 'customer_email')){
                echo "Email already exists";
              } else{
                echo "<div class='notice_redirect'><p>An error occured while Register</p></div>";
              }
            }
            var_dump($e->errorInfo);
          }
	}
}

 ?>