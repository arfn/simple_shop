<?php
    include(CONFIG_PATH . 'database.php');

    class Model extends DatabaseConnection
    {

        public function show_all()
        {
          $sql = $this->dbh->prepare("SELECT * FROM product ORDER BY product_id DESC");
          $sql->execute();
          $result = $sql->fetchAll();
          return  $result;
        }

        //Show only one product
        public function show($product_id)
        {
          $sql = $this->dbh->prepare("SELECT * FROM product WHERE product_id=?");
          $sql->bindValue(1, $product_id, PDO::PARAM_INT);
          $sql->execute();
          return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function insert_product($data = array())
        {

          function add_quote($str)
          {
              return sprintf("'%s'", $str);
          }

          $column = implode(", ", array_keys($data));
          $values = implode(", ", array_map("add_quote", array_values($data)));
          $sql = $this->dbh->prepare("INSERT INTO product ($column) VALUES ($values);");

          if ($sql->execute())
          {
            echo "<div class='notice_redirect'><p>Successfuly doing insert</p></div>";
          }
          else {
            echo "<div class='notice_redirect'><p>An error occured while doing insert</p></div>";
          }
        }

        public function update_product($data)
        {
          $sql = $this->dbh->prepare("UPDATE product SET product_name='".$data['product_name']."', ".
                                      "product_desc='".$data['product_desc']."', ".
                                      "product_price='".$data['product_price']."', ".
                                      "product_quantity='".$data['product_quantity']."', ".
                                      "product_category='".$data['product_category'].
                                       "' WHERE product_id=".$data['product_id']);

          if ($sql->execute())
          {
            echo "<div class='notice_redirect'><p>Successfuly update $data[product_name]</p></div>";
            return true;
          }
          else {
            echo "<div class='notice_redirect'><p>An error occured during update</p></div>";
            return false;
          }
        }

        public function login($usr, $pwd)
        {
          $sql = $this->dbh->prepare("SELECT * FROM admin WHERE admin_username = :user");
          $sql->bindValue(':user', $usr, PDO::PARAM_STR);
          $sql->execute();
          $row = $sql->fetch(PDO::FETCH_ASSOC);
          if($row && password_verify($pwd, $row['admin_password']))
          {
            $_SESSION['username'] = $row['admin_username'];
            return true;
          }
          else
          {
            return false;
          }
        }
    }

 ?>
