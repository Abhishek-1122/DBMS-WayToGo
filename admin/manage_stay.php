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

<h1> Manage Stay/Resort</h1>
<br>

      <?php 
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
              echo $_SESSION['delete'];
              unset($_SESSION['delete']);
            }
              if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }

      ?>
<br>
</br>
<table  class="but" align="center" width="180%">
        <tr><td><form class="form-inline my-2 my-lg-0" method="POST" action="add_stay.php">
      <button class="btn btn-danger my-2 my-sm-0" type="submit">Add Stay/Resort</button>
    </form></td>
</tr>
</table>


      
<table align="center" class="tbl-full" border="2">
  <tr >
    <th>S.NO</th>
    <th> ResortID</th>
    
    <th>ResortName</th>

    <th>Image</th>

    <th>Actions</th>

  </tr>
<?php 
//QUERY TO GET ALL ADMIN 
    $sql ="SELECT * FROM placedb";
    //EXECUTE THE QUERY
    $res=mysqli_query($conn,$sql);

    //check query execution
    if($res==TRUE)
    {
      //count rows
      $rows=mysqli_num_rows($res);

      $sn=1; //

      //check num of rows
      if($rows>0)
      {
        //get data from db
        while($rows=mysqli_fetch_assoc($res))
        {
          $placeid= $rows['placeid'];

          $resort1= $rows['resort1'];
          $cost1=$rows['cost1'];
          $imgname1=$rows['imgname1'];
          $resort2= $rows['resort2'];
          $cost2=$rows['cost2'];
          $imgname2=$rows['imgname2'];
          $resort3= $rows['resort3'];
          $cost3=$rows['cost3'];
          $imgname3=$rows['imgname3'];
          
          
          //disp value in table
          ?>
              <tr>
               <td width="9%"><?php echo $sn++; ?>
              <td width="9%"><?php echo $resort1; ?></td>
              <td width="9%"><?php echo $cost1; ?></td>
              <td width="9%">
                <img src="img/resort/<?php echo $imgname1; ?>" style="width: 150px; height: 100px;">
              </td>
               <td width="10%">
           <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo SITEURL; ?>admin/update_stay.php?placeid=<?php echo $placeid; ?>">
              <button class="btn btn-success my-2 my-sm-0" type="submit">Update</button>
           </form>
         </td>
              </td>
            </tr>

            <tr>
               <td><?php echo $sn++; ?>
              <td><?php echo $resort2; ?></td>
              <td><?php echo $cost2; ?></td>
              <td>
                <img src="img/resort/<?php echo $imgname2; ?>" style="width: 150px; height: 100px;">
              </td>
              <td width="9%">
           <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo SITEURL; ?>admin/update_stay.php?placeid=<?php echo $placeid; ?>">
              <button class="btn btn-success my-2 my-sm-0" type="submit">Update</button>
           </form>
         </td>
              </td>
            </tr>

            <tr>
               <td><?php echo $sn++; ?>
              <td><?php echo $resort3; ?></td>
              <td><?php echo $cost3; ?></td>
              <td>
                <img src="img/resort/<?php echo $imgname3; ?>" style="width: 150px; height: 100px;">
              </td>
              <td width="9%">
           <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo SITEURL; ?>admin/update_stay.php?placeid=<?php echo $placeid; ?>">
              <button class="btn btn-success my-2 my-sm-0" type="submit">Update</button>
           </form>
         </td>
              </td>
            </tr>
          <?php
        }
      }
      else{

      }
    }
?>

  
</table>


</div>

</div>
</body>
</html>
