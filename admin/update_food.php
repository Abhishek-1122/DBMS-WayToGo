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

<h1 align="center"> Update Food Items</h1>
<br>
<table width="100%">
    <tr>
    <td><form class="form-inline my-2 my-lg-0" method="POST" action="manage_hotels.php">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Manage Food Items</button>
    </form></td>
    </tr>
      </table>
  <?php 

    //get aid 
    $foodid=$_GET['foodid'];

    //create aql query
    $sql="SELECT * FROM menu WHERE foodid='$foodid'";

    //execute query

    $res=mysqli_query($conn,$sql);

    //checkza
    if($res==TRUE)
    {
      //check data available
      $count = mysqli_num_rows($res);

      //check we have admin data or not
      if($count==1)
      {
        //get the details
        //echo "Admin available";
        $row=mysqli_fetch_assoc($res);

            $foodid =$row['foodid'];
           $catg =$row['catg'];
           $itemname =$row['itemname'];
           $imgname=$row['imgname'];
           $amount =$row['amount'];


      }
      else
      {
        //redirect back the manage page
        header("location:".SITEURL."admin/manage_hotels.php");
      }

    }


  ?>
      <br>

  <form action="" method="POST">
    <table  width="40%" align="center" >
      <tr>
        <td>ItemName: </td>
        <td><input type="text" name="itemname" value="<?php echo $itemname ?>"></td>
      </tr>
      <tr>
        <td>Image: </td>
        <td><input type="file" name="imgname" value="<?php echo $imgname ?>"></td>
      </tr>
      <tr>
        <td>Amount: </td>
        <td><input type="text" name="amount" value="<?php echo $amount ?>"></td>
      </tr>
      <tr>
        <td>Category: </td>
        <td><select name="catg" id="category" >
<option value=#> ------- Choose Category -----</option>

<option value=rice>Rice and Biriyani</option>
<option value=breakfast>Breakfast</option>
<option value=roti>Roti-Meals</option>
<option value=chapathi>Chapathi-Meals</option>
</select>

            </td>
      </tr>
  
        <tr>

        <td colspan="2">
          <input type="hidden" name="foodid" value="<?php echo $foodid;?>">
          <input  class="btn btn-danger" type="submit" value="Update"name="submit"></td>
      </tr>
     
    </table>



  </form>


</div>

</div>




</header>
<?php 
  if(isset($_POST['submit']))
  {
    //echo "button clicked";
    $foodid =$_POST['foodid'];
     $catg =$_POST['catg'];
     $itemname =$_POST['itemname'];
     $amount =$_POST['amount'];
     $image=$_POST['imgname'];
    
    $sql="UPDATE menu SET
     foodid='$foodid',
            catg='$catg',
            itemname='$itemname',
            amount='$amount',
            imgname='$image'
    WHERE foodid='$foodid'
    ";

    $res=mysqli_query($conn,$sql);

    if($res==TRUE)
    {
      //admin updated
      $_SESSION['update']="Item updated successfully";
      header("location:".SITEURL."admin/manage_hotels.php");

    }
    else
    {
      //failed
       $_SESSION['update']="Failed to update item";
      header("location:".SITEURL."admin/manage_hotels.php");
    }
  }
?>

</body>
</html>
