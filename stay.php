
 <?php include('constants.php') ?>
<!DOCTYPE html>

<html>
<head>
  <style >
    input[type = text]{
  width: 100%;
  padding: 5px 0px;
  margin: 5px 1px;
  box-sizing: border-box;
}
  </style>
  <link rel="stylesheet" type="text/css" href="admin/manstyle.css">
  <link rel="icon" type="text/css" href="IMG/favicon.ico">
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
    <ul class="navbar-nav ml-auto">
       
      

    
       <a href="logouttd.php"><button class="btn btn-danger my-2 my-sm-0" type="submit" name="logout">LOGOUT</button></a>
  </div>
</nav>
  </header>
 <br>
 <h2 class="head">SELECT YOUR STAY/RESORT</h2>

 <div class="main-content">

<div class="wrapper">


<br>
      <?php 
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']);
            }
            if(isset($_SESSION['BACK']))
            {
              echo $_SESSION['BACK'];
              unset($_SESSION['BACK']);
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
    <table  class="but" align="right" width="0%">
        <tr>
<td><form class="form-inline my-2 my-lg-0" method="POST" action="cal.php">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">NEXT</button>
    </form></td>
    
    </tr>
      </table>

     
<table align="center" class="tbl-full">
  <tr style="background-color:#ffc048;">
    <th>S.NO</th>
    
    <th>ResortName</th>
   <th>ResortCost</th>

    <th>Image</th>

    <th>Actions</th>

  </tr>
<?php 
//QUERY TO GET ALL ADMIN 

 
    $sql ="SELECT * FROM resortdb ";
    //EXECUTE THE QUER
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
         
            
          <?php
        }
      }
      else{

      }
    }
?>
<?php 
   if(isset($_POST['resort1add'])) 
   { //1.get data from form
    $placeid=$_POST['placeid'];
    $cost1=$_POST['cost1'];
      $resort1=$_POST['resort1'];
    
     
   
     
     //2. sql quert to save data on db
     $sql = "UPDATE totaldb SET
             resort='$resort1',
             cost='$cost1'
            WHERE placeid=$placeid

    ";  

    $res=mysqli_query($conn,$sql);

    if($res==TRUE)
    {
      //admin updated
      echo "<h2><div align='center'> Selected Resort is $resort1 </div></h2>";
      // $_SESSION['update']="$resort1 added successfully";
      // header("location:".SITEURL."stay.php");

    }
    else
    {
      //failed
       $_SESSION['update']="Failed to update";
      header("location:".SITEURL."admin/manage_stay.php");
    }
  }
  else if (isset($_POST['resort2add'])) {
    // code...
    //1.get data from form
 
     //2. sql quert to save data on db
     $sql = "UPDATE totaldb SET
             resort='$resort2',
             cost='$cost2'
            WHERE placeid=$placeid

    ";  

    $res=mysqli_query($conn,$sql);

    if($res==TRUE)
    {
      //admin updated
      echo "<h2><div align='center'> Selected Resort is $resort2 </div></h2>";
      // $_SESSION['update']="$resort1 added successfully";
      // header("location:".SITEURL."stay.php");

    }
    else
    {
      //failed
       $_SESSION['update']="Failed to update";
      header("location:".SITEURL."admin/manage_stay.php");
    }
  } 
  else if(isset($_POST['resort3add']))
  {


    // code...
    
     //2. sql quert to save data on db
     $sql = "UPDATE totaldb SET
             resort='$resort3',
             cost='$cost3'
            WHERE placeid=$placeid

    ";  

    $res=mysqli_query($conn,$sql);

    if($res==TRUE)
    {
      //admin updated
      echo "<h2><div align='center'> Selected Resort is $resort3 </div></h2>";
      // $_SESSION['update']="$resort1 added successfully";
      // header("location:".SITEURL."stay.php");

    }
    else
    {
      //failed
       $_SESSION['update']="Failed to update";
      header("location:".SITEURL."admin/manage_stay.php");
    }
  }
  

?>


<form method="post">
               <tr>
               <td width="10%">
                <input  type="text" name="sn" value="<?php echo $sn++; ?>" ></input>
              </td>
             
               <td width="25%">
                <input  type="text" name="resort1" value="<?php echo $resort1; ?>" ></input>
              </td>
            
               <td width="15%">
                <input  type="text" name="cost1" value="<?php echo $cost1; ?> Rs" ></input>
              </td>
              
               <td width="25%">
                <img src="admin/img/resort/<?php echo $imgname1; ?>" style="width: 150px; height: 100px;">
              </td >
             
              <td width="7%">
                  <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo SITEURL; ?>stay.php?placeid=<?php echo $placeid; ?>">
              <button class="btn btn-success my-2 my-sm-0" type="submit" name="resort1add">Add</button>
           </form>
            <td colspan="2" width="1%">
          <input type="hidden" name="placeid" value="<?php   $_SESSION['placeid']=$placeid; echo $placeid;?>">
          </td>
              </td>
              
              </tr>

                 <tr>
               <td width="10%">
                <input  type="text" name="sn" value="<?php echo $sn++; ?>" ></input>
              </td>
             
               <td width="25%">
                <input  type="text" name="resort2" value="<?php echo $resort2; ?>" ></input>
              </td>
            
               <td width="15%">
                <input  type="text" name="cost2" value="<?php echo $cost2; ?> Rs" ></input>
              </td>
              
               <td width="25%">
                <img src="admin/img/resort/<?php echo $imgname2; ?>" style="width: 150px; height: 100px;">
              </td >
             
              <td width="7%">
                  <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo SITEURL; ?>stay.php?placeid=<?php echo $placeid; ?>">
              <button class="btn btn-success my-2 my-sm-0" type="submit" name="resort2add">Add</button>
           </form>
               <td colspan="2" width="1%">
          <input type="hidden" name="placeid" value="<?php   $_SESSION['placeid']=$placeid; echo $placeid;?>">
          </td>
              </td>
              
              </tr>

               <tr>
               <td width="10%">
                <input  type="text" name="sn" value="<?php echo $sn++; ?>" ></input>
              </td>
             
               <td width="25%">
                <input  type="text" name="resort3" value="<?php echo $resort3; ?>" ></input>
              </td>
            
               <td width="15%">
                <input  type="text" name="cost3" value="<?php echo $cost3; ?> Rs" ></input>
              </td>
              
               <td width="25%">
                <img src="admin/img/resort/<?php echo $imgname3; ?>" style="width: 150px; height: 100px;">
              </td>
              
              <td>
                  <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo SITEURL; ?>stay.php?placeid=<?php echo $placeid; ?>">
              <button class="btn btn-success my-2 my-sm-0" type="resort3add" name="resort3add">Add</button>
           </form>
           <td colspan="2" width="1%">
          <input type="hidden" name="placeid" value="<?php   $_SESSION['placeid']=$placeid; echo $placeid;?>">
          </td>
              </td>
             
              </tr>
            </form>


  
</table>


</div>

</div>
</body>
</html>