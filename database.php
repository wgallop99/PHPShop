<?php

try{

      $db = new PDO("mysql:host=localhost;dbname=shirts4mike;port=8889", "root", "root");

      var_dump($db);

} catch (Exception $e) {

      echo "Could not connect to database.";
      exit;

}

echo "Woo-hoo!";

?>
