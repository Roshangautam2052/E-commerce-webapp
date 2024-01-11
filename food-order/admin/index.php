<html>
  <head>
    <title>Food Order Website- Home</title>
    <link rel="stylesheet" href="../css/admin.css">
  </head>
  <body>
    <?php include'partials/menu.php';?>
    <!--Main Content Section Starts-->
      <div class="main-content">
        <div class="wrapper">
          <h1> Dashboard</h1>
          <br />

          <?php

          if (isset($_SESSION['login']))
          {
            echo $_SESSION['login'];
            unset( $_SESSION['login']);
          }



           ?>
          <div class=" col-4 text-center">
            <?php

            $sql ="SELECT * FROM category";
              // Execute query
              $res =mysqli_query($conn, $sql);

              // Count ibase_affected_rows
              $count =mysqli_num_rows($res);



             ?>
            <h1><?php echo $count; ?></h1><br>
            Categories

          </div>
          <div class=" col-4 text-center">
            <?php

            $sql1 ="SELECT * FROM food";
              // Execute query
              $res1 =mysqli_query($conn, $sql1);

              // Count ibase_affected_rows
              $count1 =mysqli_num_rows($res1);



             ?>
            <h1><?php echo $count1; ?></h1><br>
            Foods

          </div>
          <div class=" col-4 text-center">
            <?php

            $sql2 ="SELECT * FROM tbl_order";
              // Execute query
              $res2 =mysqli_query($conn, $sql2);

              // Count ibase_affected_rows
              $count2 =mysqli_num_rows($res2);



             ?>
            <h1><?php echo $count2; ?></h1><br>
            Total Orders

          </div>
          <div class=" col-4 text-center">
            <?php

              // Creating SQL query for getting revenue Generated
              // Using Aggreate function in sql

              $sql3 ="SELECT SUM(total) AS net FROM tbl_order WHERE status='Delivered'";

              // Executing the query
              $res3 =mysqli_query($conn, $sql3);

              // Getting the value from database
              $row3 =mysqli_fetch_assoc($res3);

              //Getting the total Revenue

              $total_revenue =$row3['net'];






            ?>
            <h1>$<?php echo $total_revenue?></h1><br>
            Revenue Generated

          </div>


        </div>
        <div class="clearfix">

        </div>
      </div>
    <!--Main Contect Section Starts-->
