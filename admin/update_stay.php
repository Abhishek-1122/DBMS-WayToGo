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

<h1 align="center"> Update Stay/Resort</h1>
<br>
<table width="100%">
    <tr>
    <td><form class="form-inline my-2 my-lg-0" method="POST" action="manage_stay.php">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Manage Stay</button>
    </form></td>
    </tr>
      </table>
  <?php 

    //get aid 
    $placeid=$_GET['placeid'];

    //create aql query
    $sql="SELECT * FROM placedb WHERE placeid=$placeid";

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
        $placeid= $row['placeid'];
          $resort1= $row['resort1'];
          $cost1=$row['cost1'];
          $imgname1=$row['imgname1'];
          $resort2= $row['resort2'];
          $cost2=$row['cost2'];
          $imgname2=$row['imgname2'];
          $resort3= $row['resort3'];
          $cost3=$row['cost3'];
          $imgname3=$row['imgname3'];
          
      }
      else
      {
        //redirect back the manage page
        header("location:".SITEURL."admin/manage_stay.php");
      }

    }


  ?>
      <br>

  <form action="" method="POST">
    <table  width="50%" align="center" >
      
      <tr>
        <td>Resort 1: </td>
        <td><input type="text" name="resort1" value="<?php echo $resort1 ?>"></td>
      </tr>
      <tr>
        <td>Cost 1: </td>
        <td><input type="text" name="cost1" value="<?php echo $cost1 ?>"></td>
      </tr>
       <tr>
        <td>Add Image 1: </td>
        <td><input type="file" name="imgname1" value="<?php echo $imgname1 ?>"></td>
      </tr>
      <br>
       <tr>
        <td>Resort 2: </td>
        <td><input type="text" name="resort2" value="<?php echo $resort2 ?>"></td>
      </tr>
      <tr>
        <td>Cost 2: </td>
        <td><input type="text" name="cost2" value="<?php echo $cost2 ?>"></td>
      </tr>
       <tr>
        <td>Add Image 2: </td>
        <td><input type="file" name="imgname2" value="<?php echo $imgname2 ?>"></td>
      </tr>
      <br>
       <tr>
        <td>Resort 3: </td>
        <td><input type="text" name="resort3" value="<?php echo $resort3 ?>"></td>
      </tr>
      <tr>
        <td>Cost 3: </td>
        <td><input type="text" name="cost3" value="<?php echo $cost2 ?>"></td>
      </tr>
       <tr>
        <td>Add Image 3: </td>
        <td><input type="file" name="imgname3"value="<?php echo $imgname3 ?>"></td>
      </tr>
      
  
        <tr>

        <td colspan="2">
          <input type="hidden" name="placeid" value="<?php echo $placeid;?>">
          <input  class="btn btn-danger" type="submit" value="Update"name="submit"></td>
      </tr>
     
    </table>



  </form>


</div>

</div>




</header>
<?php 
   if(isset($_POST['submit'])) 
   { //1.get data from form
    $placeid=$_POST['placeid'];
      $resort1 =$_POST['resort1'];
     $cost1 =$_POST['cost1'];
     $imgname1=$_POST['imgname1'];
      $resort2 =$_POST['resort2'];
     $cost2 =$_POST['cost2'];
     $imgname2=$_POST['imgname2'];
      $resort3 =$_POST['resort3'];
     $cost3 =$_POST['cost3'];
     $imgname3=$_POST['imgname3'];
     
     //2. sql quert to save data on db
     $sql = "UPDATE placedb SET
             resort1='$resort1',
            cost1='$cost1',
            imgname1='$imgname1',
            resort2='$resort2',
            cost2='$cost2',
            imgname2='$imgname2',
            resort3='$resort3',
            cost3='$cost3',
            imgname3='$imgname3'
    
    WHERE placeid='$placeid'
    ";  

    $res=mysqli_query($conn,$sql);

    if($res==TRUE)
    {
      //admin updated
      $_SESSION['update']="Stay/Resort updated successfully";
      header("location:".SITEURL."admin/manage_stay.php");

    }
    else
    {
      //failed
       $_SESSION['update']="Failed to update";
      header("location:".SITEURL."admin/manage_stay.php");
    }
  }
?>

</body>
</html>
