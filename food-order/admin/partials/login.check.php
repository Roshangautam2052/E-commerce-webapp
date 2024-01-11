<?php
  //   Authorinzation- Access Control
  // Check whether the user is set or not
  if (!isset($_SESSION['user'])) //IF user session is not set
  {
    // User is logged in
    //Redirect to the login with the Message
    $_SESSION['no-login-message'] = "<div class='error text-center'> Please login to access the Admin Panel.</div>";
    // Redirect to login ldap_control_page

    header('location:'.SITEURL.'admin/login.php');



  }





 ?>
