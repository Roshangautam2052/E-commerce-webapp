<?php
  //Start Session
  session_start();
  // Create Constants to Store Non repeating array_count_values
  define('SITEURL','http://localhost:81/food-order/');
  define('LOCALHOST','localhost');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('DB_NAME','food_order');
  // 3. Execute Query and Save Data in SQLiteDatabase
  $conn= mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); //Database Connection
  $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());







 ?>
