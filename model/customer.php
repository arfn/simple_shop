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

          $column = implode(", ", array_keys($data));
          $values = implode(", ", array_map("add_quote", array_values($data)));
          $sql = $this->dbh->prepare("INSERT INTO customer ($column) VALUES ($values);");

          if ($sql->execute())
          {
            echo "<div class='notice_redirect'><p>Successfuly Register. Please check your email confirmation.</p></div>";
          }
          else {
            echo "<div class='notice_redirect'><p>An error occured while Register</p></div>";
          }
	}
}

 ?>