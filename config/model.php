<?php

    class Model extends Database
    {
        public function show_all()
        {
          $sql = $this->dbh->prepare("SELECT * FROM customer");
          $sql->execute();
          $result = $sql->fetchAll();
          return  $result;
        }
    }

 ?>
