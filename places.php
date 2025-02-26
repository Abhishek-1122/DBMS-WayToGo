
 <?php 
 include('constants.php') ?>
<!DOCTYPE html>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-size: 28px;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  background-color: #f1f1f1;
  padding-bottom: 10px;
  text-align: center;
}

#navbar {
  overflow: hidden;
  
}

#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: #04AA6D;
  color: white;
}

.content {
  padding: 90px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}
</style>
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
    <div id="navbar">
  <nav class="navbar navbar-expand-sm bg-warning navbar-dark" >

  <img src="IMG/logo.png" alt="way to go logo" width="200" height="80">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
       
      

    
               <a href="logouttp.php"><button class="btn btn-danger my-2 my-sm-0" type="submit" name="logout">LOGOUT</button></a>

      
  </div>

</nav>
</div>
  </header>
  <div class="content">
    <table align="center " class="tbl-full">
      <tr>
        <td>
          <marquee id="navbar">NOTE : Do Not Press Next Untill You Select The Place!!!!</marquee>
 <br>

 <h2 class="head">SELECT YOUR PACKAGE</h2>
        </td>
      </tr>
    </table>
  

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
<td><form class="form-inline my-2 my-lg-0" method="POST" action="clickgo2.php">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">NEXT</button>
    </form></td>
    
    </tr>
      </table>

<table align="center" class="tbl-full" >

 
  <tr style="background-color:#ffc048;">
    
    <th>S.NO</th>

    <th> PlaceID</th>
    
    <th>PlaceName</th>

    <th>Image</th>
    
    <th>KM</th>

    <th>Add</th>


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
          $place=$rows['place'];
          $imagename=$rows['imagename'];
          $km=$rows['km'];
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
          <form action="places.php" method="post"  >

              <tr>
               

               <td width="10%" >
                <input  type="text" name="sn" value="<?php echo $sn++; ?>" ></input>
              </td>
              <td width="10%">
                <input type="text" name="placeid" value="<?php 
                  $_SESSION['placeid']=$placeid;
                echo $placeid; ?>"></input>
              </td>
              <td width="20%">
                <input type="text" name="place" value="<?php echo $place; ?>"></input>
              </td>
              <td width="22%">
                <img src="admin/img/places/<?php echo $imagename; ?>" style="width: 150px; height: 100px;">
              </td>

              <td width="10%">
                <input type="text" name="km" value="<?php echo $km; ?> KM"></input>
              </td>
              <td width="10%"> 

              <input  class="btn btn-danger" type="submit" value="Add"name="submit">
           </td>
             
             
               <td width="10%">
                <input  type="hidden" name="resort1" value="<?php echo $resort1; ?>" ></input>
              </td>
             
               <td width="10%">
                <input  type="hidden" name="cost1" value="<?php echo $cost1; ?> " ></input>
              </td>
              
               <td width="10%" >
                 <input  type="hidden" name="imgname1" value="<?php echo $imgname1; ?>" ></input>
              </td>
            <td colspan="2" width="1%">
          <input type="hidden" name="placeid" value="<?php echo $placeid;?>">
          </td>
              
              </tr>
              <tr>
                   <td width="10%">
                <input  type="hidden" name="resort2" value="<?php echo $resort2; ?>" ></input>
              </td>
             
               <td width="10%">
                <input  type="hidden" name="cost2" value="<?php echo $cost2; ?> " ></input>
              </td>
              
               <td width="10%" >
                 <input  type="hidden" name="imgname2" value="<?php echo $imgname2; ?> " ></input>
              </td>
               <input  type="hidden" name="resort3" value="<?php echo $resort3; ?>" ></input>
              </td>
             
               <td width="10%">
                <input  type="hidden" name="cost3" value="<?php echo $cost3; ?> " ></input>
              </td>
              
               <td width="10%" >
                 <input  type="hidden" name="imgname3" value="<?php echo $imgname3; ?> " ></input>
              </td>

              </tr>
        </form>
              
          
          <?php
        }
      }
      else{

      }
     
    }
    ?>
    <?php
   if(isset($_POST['submit'])) 
   { //1.get data from form
    $placeid=$_POST['placeid'];
     $place =$_POST['place'];
     $km=$_POST['km'];
     $resort1=$_POST['resort1'];
     $resort2=$_POST['resort2'];
     $resort3=$_POST['resort3'];
     $cost1=$_POST['cost1'];
      $cost2=$_POST['cost2'];
       $cost3=$_POST['cost3'];
     $imgname1=$_POST['imgname1'];

  $imgname2=$_POST['imgname2'];

  $imgname3=$_POST['imgname3'];
        $sql1="INSERT INTO totaldb SET
            placeid='$placeid',
            place='$place',
            km='$km'
            ";



     

     //2. sql quert to save data on db
     $sql = "INSERT INTO resortdb SET
            placeid='$placeid',
            place='$place',
            km='$km',
            resort1='$resort1',
            cost1='$cost1',
            imgname1='$imgname1',
            resort2='$resort2',
            cost2='$cost2',
            imgname2='$imgname2',
            resort3='$resort3',
            cost3='$cost3',
            imgname3='$imgname3'
            ";
      
     //3.exceute  query and save in dbS
      $res1= mysqli_query($conn,$sql1) or die(mysqli_error());
     $res= mysqli_query($conn,$sql) or die(mysqli_error());//check

     //4.check wheter the data inserted or not and display
    
     if($res1==TRUE)
     {
         echo "<h2><div align='center'> Selected Place is $place  of $km </div></h2>";
      //create a session var to display msg 
      // $_SESSION['add']= "<h2><div align='center'> Selected Place is $place </div></h2>";
      // header("location:".SITEURL.'clickgo2.php');//redirect
          }
     else
   {
    
     //echo "data not  inserted";
      //create a session var to display msg 
      $_SESSION['add']= "Failed to Add place try again!!";
      header("location:".SITEURL.'places.php');
   }
  }
   
?>
    



  
</table>


</div>

</div>
</div>

 <?php
if(isset($_POST['logout'])) 
   { //1.get data from form
    $placeid= $_POST['placeid'];
          $place=$_POST['place'];
          $km=$_POST['km'];
          $meals=$_POST['meals'];
          $price=$_POST['price'];
          $resort=$_POST['resort'];
          $cost=$_POST['cost'];
          $tollcost=$_POST['tollcost'];
           $totalamt=$_POST['totalamt'];
          $kmtotal=$_POST['kmtcost'];
          $phtotal=$_POST['phcost'];
          $pkm=$_POST['pkm'];
          $nop=$_POST['nop'];
   
    
     
   
     
     //2. sql quert to save data on db
     $sql = "DELETE FROM totaldb 
             
            WHERE placeid='$placeid'

    ";  

    $res=mysqli_query($conn,$sql);

    }
?>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

</body>
</html>