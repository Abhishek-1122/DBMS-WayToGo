<?php include('../config/constants.php') ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="manstyle.css">
  <link rel="icon" type="text/css" href="img/favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>way to go</title>
</head>
<body>
  <header class="header">
    
  <nav class="navbar navbar-expand-sm bg-warning navbar-dark">
  <img src="IMG/logo.png" alt="way to go logo" width="200" height="80">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mx-auto">
       
      <li class="nav-item active">
        <a class="nav-link" href="admin_page.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a href="manage_admin.php" class="nav-link ">Admin</a>
      </li>
      <li class="nav-item active">
        <a href="manage_places.php" class="nav-link ">Places</a>
      </li>
      <li class="nav-item active">
        <a href="manage_hotels.php" class="nav-link ">Hotels</a>
      </li>
      <li class="nav-item active">
        <a href="manage_stay.php" class="nav-link ">Stay/Resort</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="admin.php">
      
      <button   class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
    </form>
  </div>
</nav>
 <div class="main-content">

<div class="wrapper">

<h1 align="center"> Add Admin</h1>
<br>
<table width="100%">
    <tr>
    <td><form class="form-inline my-2 my-lg-0" method="POST" action="manage_admin.php">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Manage Admin</button>
    </form></td>
    </tr>
      </table>
<?php 
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];//disp session msg
              unset($_SESSION['add']);//remove on refresh
            }

      ?>
      <br>
  <form action="" method="POST">
    <table  width="40%" align="center" border="1" >
      <tr>
        <td>Fullname: </td>
        <td><input type="text" name="fullname"></td>
      </tr>
      <tr>
        <td>Username: </td>
        <td><input type="text" name="username"></td>
      </tr>
      <tr>
        <td>Password: </td>
        <td><input type="password" name="password_1"></td>
      </tr>
      <tr>
        <td>Confirm password: </td>
        <td><input type="password" name="password_2"></td>
      </tr>
      <tr>
        
        <td><input  class="btn btn-danger" type="submit" value="Add"name="submit"></td>
      </tr>
     
    </table>



  </form>


</div>

</div>
</header>

</body>
</html>
<?php
   if(isset($_POST['submit'])) 
   { //1.get data from form
     $fullname =$_POST['fullname'];
     $username =$_POST['username'];
     $password =md5($_POST['password_1']);
     $confirmpassword=md5($_POST['password_2']);
     //2. sql quert to save data on db
     $sql = "INSERT INTO admindb SET 
            fullname='$fullname',
            username='$username', 
            password ='$password' 
      ";
      
     //3.exceute  query and save in dbS
      
     $res= mysqli_query($conn,$sql) or die(mysqli_error());//check

     //4.check wheter the data inserted or not and display
    
     if($res==TRUE)
     {
      //echo "data inserted";
      //create a session var to display msg 
      $_SESSION['add']= "Admin added successfully";
      header("location:".SITEURL.'admin/manage_admin.php');//redirect
     }
     else
   {
    
     //echo "data not  inserted";
      //create a session var to display msg 
      $_SESSION['add']= "Failed to Add admin";
      header("location:".SITEURL.'admin/add_admin.php');
   }
  }
   
?>