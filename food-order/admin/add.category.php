<?php include('partials/menu.php');?>
<link rel="stylesheet" href="../css/admin.css">
 <div class="main-content">
   <div class="wrapper">
     <h1> Add Category</h1>
     <br /><br/>

     <?php

      if (isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
      if (isset($_SESSION['upload']))
      {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
      }



      ?>
    <!-- Add Category-->
     <form action ="" method="POST" enctype="multipart/form-data">
       <table class="tbl-size">
         <tr>
           <td>Title:</td>
            <td><input type="text" name="title" placeholder="Category Title"></td>
         </tr>
         <tr>
           <td> Select Image:</td>
           <td>
             <input type="file" name="image">
           </td>
         </tr>
         <tr>
           <td>Featured</td>
           <td>
             <input type="radio" name="featured" value="Yes"> Yes
             <input type="radio" name="featured" value="Yes"> No
           </td>
         </tr>
         <tr>
           <td>Active: </td>
           <td>
             <input type="radio" name="active" value="Yes"> Yes
             <input type="radio" name="active" value="Yes"> No
            </td>
         </tr>

         <tr>
           <td colspan="2">
             <input type="submit" name="submit" value="Add Category" class="btn-secondary" />

           </td>
         </tr>
       </table>
     </form>
     <?php
     // Process the value from Form and Save it in Database
     //Check whether the button is clicked or //

     if (isset($_POST['submit']))
       {
         // Button Clicked
         //echo "Button Clicked";
         //Get the Data from Form
         $title = $_POST['title'];

         // For checking the radio button is selected or not
         if (isset($_POST['featured']))
         {
           // Get the value from form
           $featured =$_POST['featured'];
         }
         else
         {
           $featured="No";
         }
         if (isset($_POST['active']))
         {
           // Get the value from form
           $active =$_POST['active'];
         }
         else
         {
           $active="No";
         }
         // Check whether the image is selected or not and set the value for the image

         if (isset($_FILES['image']['name']))
         {
           // Upload the image
           // Extracting image name destination path and source path
           $image_name= $_FILES['image']['name'];

           // Upload the image only if there is selection of images
           if($image_name !="")
           {



             // Auto Renaming the image
             // Get the Extension of the image ( jpg, png, gif etc) for example. "Biryani.jpg"

             $ext = end(explode('.',$image_name));

             // Rename the images
             $image_name="Food_Category_".rand(000,999).'.'.$ext; // eg Food_Category_242.jpg



             $source_path =$_FILES['image']['tmp_name'];

             $destination_path="../images/category/".$image_name;

             // Uploading images
             $upload = move_uploaded_file($source_path,$destination_path);

             // Check whether the image is uploaded or not
             // And if there is no uploading of image then the process is to be stopped and redirecting with error image
             if($upload==false)
             {
               // Set Message
               $_SESSION['upload']="<div class='error'> Failed to upload image.</div>";
               // Redirect to Add Category page
               header('location:'.SITEURL.'admin/add.category.php');
               // Stop the process
               die();
              }
            }
          }
         else
         {
           // Dont Upload the image
           $image_name="";
         }




         //SQL Query For  inserting data into database
         $sql= "INSERT INTO category SET
           title= '$title',
           image_name='$image_name',
           featured='$featured',
           active='$active'


         ";
         // Executing Query data and saving data into database
          $res= mysqli_query($conn,$sql) or die(mysqli_error());





         // Check whether the data is inserted or not
         if ($res==TRUE)

         {
           //Query executed and Cateogry added
           $_SESSION['add']="<div class='success'>Category Added Successfully</div>";
           //Redirect Page to Manage Category
           header("location:".SITEURL.'admin/manage.category.php');
         }
         else{
           //Failed to Add Category
           $_SESSION['add']="<div class='error'>Failed to Add Category</div>";
           //Redirect Page to Manage Admin
           header('location:'.SITEURL.'admin/add.category.php');
         }


       }
     ?>
   </div>
 </div>
