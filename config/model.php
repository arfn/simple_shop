<?php

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
          $sql->execute();
          var_dump($column);
          var_dump($values);
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
