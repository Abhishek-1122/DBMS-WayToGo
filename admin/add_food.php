
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

<h1 align="center"> Add Food Items</h1>
<br>
<table width="100%">
    <tr>
    <td><form class="form-inline my-2 my-lg-0" method="POST" action="manage_hotels.php">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Manage Food Items</button>
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
    <table  width="40%" align="center" >
 


<tr>
<td>
<select name="catg" id="category" >
<option value=#> ------- Choose Category -----</option>

<option value=rice>Rice and Biriyani</option>
<option value=breakfast>Breakfast</option>
<option value=roti>Roti-Meals</option>
<option value=chapathi>Chapathi-Meals</option>


</select>

</td>
</tr>


<tr>
<td>
<input type="text" name="itemname"   required=required placeholder="Enter Item name "  onkeypress="return isAlpha();" />
</td>
</tr>



<tr>
<td>
<input type="text" name="amount"   required=required placeholder="Enter Amount " onkeypress="return isDigit();" maxlength=5 />
</td>
</tr>

<tr>
<td>
<input type="file" name="imgname"   required=required placeholder="Choose image file "  />
</td>
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
     $foodid =$_POST['foodid'];
     $catg =$_POST['catg'];
     $itemname =$_POST['itemname'];
     $amount =$_POST['amount'];
     $imgname=$_POST['imgname'];
     
     //2. sql quert to save data on db
     $sql = "INSERT INTO menu SET 
            foodid='$foodid',
            catg='$catg',
            itemname='$itemname',
            amount='$amount',
            imgname='$imgname'
            
      ";
      
     //3.exceute  query and save in dbS
      
     $res= mysqli_query($conn,$sql) or die(mysqli_error());//check

     //4.check wheter the data inserted or not and displa
    
     if($res==TRUE)
     {
      //echo "data inserted";
      //create a session var to display msg 
      $_SESSION['add']= "Food added successfully";
      header("location:".SITEURL.'admin/manage_hotels.php');//redirect
     }
     else
   {
    
     //echo "data not  inserted";
      //create a session var to display msg 
      $_SESSION['add']= "Failed to Add food";
      header("location:".SITEURL.'admin/add_food.php');
   }
  }
   
?>

</table>

</div>

</div>
</body>
</html>
