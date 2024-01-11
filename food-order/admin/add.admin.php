<?php include('partials/menu.php');?>
<link rel="stylesheet" href="../css/admin.css">
 <div class="main-content">
   <div class="wrapper">
     <h1> Add Admin</h1>
     <br />
     <?php

      if (isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }



      ?>
     <form action ="" method="POST">
       <table class="tbl-size">
         <tr>
           <td>Full Name</td>
            <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
         </tr>
         <tr>
           <td>Username</td>
           <td><input type="text" name="username" placeholder="Your User name">
           </td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="password" placeholder="Enter Your Password">
           </td>
         </tr>

         <tr>
           <td colspan="2">
             <input type="submit" name="submit" value="Add Admin" class="btn-secondary" />

           </td>
         </tr>
       </table>
     </form>
   </div>
 </div>



<?php
// Process the value from Form and Save it in Database
//Check whether the button is clicked or //

if (isset($_POST['submit']))
  {
    // Button Clicked
    //echo "Button Clicked";
    //Get the Data from Form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Password Encryption with MD5

    //SQL Query For  Saving data into the Database
    $sql= "INSERT INTO admin SET
      full_name= '$full_name',
      username='$username',
      password='$password'


    ";
    // 3. Execute Query and Save Data in SQLiteDatabase
    $conn= mysqli_connect('localhost','root','') or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn,'food_order') or die(mysqli_error());


   // Executing Query data and saving data into database
    $res= mysqli_query($conn,$sql) or die(mysqli_error());

    // Check whether the data is inserted or not
    if ($res==TRUE)

    {
      //DATA inserted
      //echo "Data inserted";
      //create a session variable to display MessageFormatter
      $_SESSION['add']="Admin Added Successfully";
      //Redirect Page to Manage Admin
      header("location:".SITEURL.'admin/manage.admin.php');
    }
    else{
      //echo"Failed to Save Data";
      //create a session variable to display MessageFormatter
      $_SESSION['add']="Failed to Add Admin";
      //Redirect Page to Manage Admin
      header("location:".SITEURL.'admin/add.admin.php');
    }


  }
?>
