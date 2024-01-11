<?php include('../config/constants.php') ?>
  <link rel="stylesheet" href="../css/admin.css">
  <div class="container">

	<div class="screen">
    <br />

		<div class="screen__content">
      <?php

      if (isset($_SESSION['login']))
      {
        echo $_SESSION['login'];
        unset ($_SESSION['login']);
      }

      if (isset($_SESSION['no-login-message']))
      {
        echo $_SESSION['no-login-message'];
        unset ($_SESSION['no-login-message']);
      }



?>
			<form action="" method="POST" class="login">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="username"class="login__input" placeholder="User name">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="password" class="login__input" placeholder="Password">
				</div>
				 <button type="submit" name="submit" class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>

			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>
	</div>
</div>
 <?php

 //Check whether the submit button is clicked or note
 if (isset($_POST['submit']))
 {
   //Process for login
   // Get the data from Login Form

   $username=$_POST['username'];
   $password=md5($_POST['password']);

   // SQL to check whether the user with user and password exists or // not
    $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";

    //3 Execute the Query
    $res =mysqli_query($conn, $sql);

    //4. Count rows to check whether the user exists or // not
    $count =mysqli_num_rows($res);

    if ($count==1)
    {
      //User Available and Login success
      $_SESSION['login']="";
      $_SESSION['user']=$username; // To check the user is logged in or not and logging out will unset it
      //Redirecting to Dashboard
      header('location:'.SITEURL.'admin/');
    }
    else{
      //User not Available
        $_SESSION['login']= "<div class='error text-center'>User Name or Password did not match</div>";
        //Redirecting to Login Page
        header('location:'.SITEURL.'admin/login.php');
    }
 }




  ?>
