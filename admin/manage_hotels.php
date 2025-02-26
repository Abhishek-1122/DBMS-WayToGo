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

<h1> Manage Food Items</h1>
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
        <tr><td><form class="form-inline my-2 my-lg-0" method="POST" action="add_food.php">
      <button class="btn btn-danger my-2 my-sm-0" type="submit">Add Food Items</button>
    </form></td>
</tr>
</table>
      
<table align="center" class="tbl-full" border="2">
  <tr >
    <th>S.NO</th>
    <th> FoodID</th>
    <th> category</th>
    
    <th>ItemName</th>

    <th>Image</th>
    <th>Amount</th>

    <th>Actions</th>

  </tr>
<?php 
//QUERY TO GET ALL ADMIN 
    $sql ="SELECT * FROM menu";
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
          $foodid =$rows['foodid'];
           $catg =$rows['catg'];
           $itemname =$rows['itemname'];
           $imgname=$rows['imgname'];
           $amount =$rows['amount'];
           
         
          
          //disp value in table
          ?>
              <tr>
               <td width="12%"><?php echo $sn++; ?>
              <td width="12%"><?php echo $foodid; ?></td>
              <td width="12%"><?php echo $catg; ?></td>
              <td width="15%"><?php echo $itemname; ?></td>
              <td width="18%">
                <img src="img/food/<?php echo $imgname; ?>" style="width: 150px; height: 100px;">
              </td>
              <td width="12%"><?php echo $amount; ?> Rs</td>

             <td width="10%">
           <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo SITEURL; ?>admin/update_food.php?foodid=<?php echo $foodid; ?>">
              <button class="btn btn-success my-2 my-sm-0" type="submit">Update</button>
           </form>
         </td>

         <td width="15%" >
           <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo SITEURL; ?>admin/del_food.php?foodid=<?php echo $foodid; ?>">
              <button class="btn btn-danger my-2 my-sm-0" type="submit">Delete</button>
            </form>
         
							
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
