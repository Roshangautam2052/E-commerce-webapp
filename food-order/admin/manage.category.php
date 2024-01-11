<?php include('partials/menu.php');?>
<link rel="stylesheet" href="../css/admin.css">

<div class="main-content">
  <div class="wrapper">
    <h1> Manage Category</h1>
    <br>
  <?php

   if (isset($_SESSION['add']))
   {
     echo $_SESSION['add'];
     unset($_SESSION['add']);
   }
   if(isset($_SESSION['remove']))
   {
       echo $_SESSION['remove'];
       unset($_SESSION['remove']);
   }
   if(isset($_SESSION['delete']))
   {
       echo $_SESSION['delete'];
       unset($_SESSION['delete']);
   }

   if(isset($_SESSION['no-category-found']))
   {
       echo $_SESSION['no-category-found'];
       unset($_SESSION['no-category-found']);
   }

   if(isset($_SESSION['update']))
   {
       echo $_SESSION['update'];
       unset($_SESSION['update']);
   }

   if(isset($_SESSION['upload']))
   {
       echo $_SESSION['upload'];
       unset($_SESSION['upload']);
   }

   if(isset($_SESSION['failed-remove']))
   {
       echo $_SESSION['failed-remove'];
       unset($_SESSION['failed-remove']);
   }





   ?>
   <br /><br />
    <!-- Button to Add the Admin for the system-->
     <a href="<?php echo SITEURL; ?>admin/add.category.php" class="btn-primary">Add Category</a>
    <br >
    <br>
    <br>
   <table class="tbl">
     <tr>
       <th>S.N</th>
       <th>Title</th>
       <th>Image</th>
       <th>Featured</th>
       <th>Active</th>
       <th>Actions</th>
     </tr>
     <?php
       //Query to Get all Admin
       $sql="SELECT * FROM category";
       $res= mysqli_query($conn, $sql);

       //Check wheter the query is executed or not
         if ($res==TRUE)
         {
           //Count rows to check wheter we have data in database or not
           $count= mysqli_num_rows($res); // Function to get all rows in Database

           $sn=1; //Create the variable assign value

           // Check the num of rows
           if ($count>0)
           {
             // We have data in Database
             while($rows=mysqli_fetch_assoc($res))
             {
               // to get all the data from Database
               // while loop will run as long as there is database

               // Get individual data
               $id=$rows['id'];
               $title=$rows['title'];
               $image_name=$rows['image_name'];
               $featured=$rows['featured'];
               $active=$rows['active'];

               //Display the value in mysql_list_tables
               ?>

               <tr>
                 <td><?php echo $sn++; ?></td>
                 <td><?php echo $title; ?> </td>
                 <td>
                  <?php
                   // Check whether image name is available or not
                   if ($image_name!="")
                   {
                     // Display the Image
                     ?>
                     <img src="<?php echo SITEURL; ?>/images/category/<?php echo $image_name;?>" width="100px">
                     <?php
                   }
                   else
                   {
                     // Display the message
                     echo "<div class='error'>Image not Added</div>";


                   }



                  ?>


                 </td>
                 <td><?php echo $featured; ?></td>
                 <td><?php echo $active; ?></td>

                 <td>

                  <a href="<?php echo SITEURL; ?>admin/update.category.php?id=<?php echo $id;  ?>" class="btn-secondary">Update Category</a>
                  <a href="<?php echo SITEURL; ?>admin/delete.category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete Category</a>
                 </td>

                 </td>
               </tr>




               <?php

              }
           }
           else
           {

           }
         }



      ?>






   </table>

</div>
</div>
<!--Main Contect Section Ends-->
