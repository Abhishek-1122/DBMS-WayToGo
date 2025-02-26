<?php include('constants.php') ?>


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
  padding: 10px 15px;
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
  <nav class="navbar navbar-expand-sm bg-warning navbar-dark">

  <img src="IMG/logo.png" alt="way to go logo" width="200" height="80">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
         

    
                 <a href="logouttm.php"><button class="btn btn-danger my-2 my-sm-0" type="submit" name="logout">LOGOUT</button></a>

      
  </div>
</nav>
</div>

  
  
  </header>
   <div class="content">
    <table align="center " class="tbl-full">
      <tr>
        <td>
          <marquee id="navbar">NOTE : Do Not Press Next Untill You Select The Meal!!!!</marquee>
 <br>

 <h2 class="head">Select Your Meal</h2>
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
<td><form class="form-inline my-2 my-lg-0" method="POST" action="clickgo3.php">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">NEXT</button>
    </form></td>
    
    </tr>
      </table>
    

   
<table  align="center" class="tbl-full"  >

  <tr style="background-color:#ffc048;">
    <th>ItemName</th>
      <th> category</th>
    <th>Image</th>
    <th>Amount</th>
    <th>Add</th>

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
         
           $foodid=$rows['foodid'];

           $itemname =$rows['itemname'];
           $catg =$rows['catg'];
           $image=$rows['imgname'];
           $amount =$rows['amount'];
           
         
          
          //disp value in table
          ?>
          <form action="meals.php" method="post" >
              <tr>
               
               <td width="30%">
                <input  type="text" name="itemname" value="<?php echo $itemname; ?>" ></input>
              </td>
              <td width="18%">
                <input type="text" name="catg" value="<?php echo $catg; ?>"></input>
              </td>
              <td>
                <img src="admin/img/food/<?php echo $image; ?>" style="width: 150px; height: 100px;">
              </td>
              <td width="18%">
                <input type="text" name="amount" value="<?php echo $amount; ?> Rs"></input>
              </td>
          
              <td width="10%"><input  class="btn btn-danger" type="submit" value="Add" name="submit"></td>
                 <td colspan="2" width="1%">
          <input type="hidden" name="placeid" value="<?php  echo $placeid;?>">
          </td>
          <td colspan="2">
          <input type="hidden" name="foodid" value="<?php echo $foodid;?>">
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
    $foodid=$_POST['foodid'];
     $placeid=$_POST['placeid'];
     $itemname =$_POST['itemname'];
     $amount=$_POST['amount'];
     
     //2. sql quert to save data on db
     $sql = "UPDATE totaldb SET
           
           
            meals='$itemname',
            price='$amount'
            WHERE foodid=0
            ";
      
     //3.exceute  query and save in dbS
      
     $res= mysqli_query($conn,$sql) or die(mysqli_error());//check

     //4.check wheter the data inserted or not and displa
    
     if($res==TRUE)
     {
      echo "<h2> <div align='center' > Selected Meal is \n Meal : $itemname \n Cost : $amount </div></h2>";
      //create a session var to display msg 
      //$_SESSION['add']= "<h2> <div align='center' > Selected Meal is \n Meal : $itemname \n Cost : $amount </div></h2>";
      
     }
     else
   {
    
     //echo "data not  inserted";
      //create a session var to display msg 
      $_SESSION['add']= "Failed to Add food try again!!";
      header("location:".SITEURL.'meals.php');
   }
  }
   
?>

  
</table>

</div>

</div>
</div>
<!--  <h2 class="head">SELECT THE MEAL YOU LIKE</h2>
 <table align="center" cellpadding="17">
  <form method="post" action="final.php">
    <tr align="center">
      <td>
        <input type="text" name="meals" value="BANGLORE" style="width:0; height: 0;">
        <button><img src="IMG/north.jpg" width="200" height="125"></button>
        <p>north meals Rs:100</p>

      </td>
       <td>
         <input type="text" name="place" value="COORG" style="width:0; height: 0;">
         <button><img src="IMG/south.jpg" width="200" height="125"></button>
         <p>south mealsRs:200</p>
      </td>
       <td>
         <input type="text" name="place" value="CHIKMANGALURU" style="width:0; height: 0;">
          <button><img src="IMG/north.jpg" width="200" height="125"></button>
          <p>north meals Rs:300</p>
       <td>
         <input type="text" name="place" value="DANDELI" style="width:0; height: 0;">
         <button><img src="IMG/south.jpg" width="200" height="125"></button>
         <p>south meals Rs: 400</p>
      </td>
    </tr>
    <!-- <tr align="center">
        <td>
        <a href="places1.php" class="img"> <img src="IMG/hotelimg.jpg" width="200" height="125"></a>
      </td>
       <td>
         <a href="places1.php" class="img"> <img src="IMG/hotelimg.jpg" width="200" height="125"></a>
      </td>
       <td>
         <a href="places1.php" class="img"> <img src="IMG/hotelimg.jpg" width="200" height="125"></a>
      </td>
       <td>
         <a href="places1.php" class="img"> <img src="IMG/hotelimg.jpg" width="200" height="125"></a>
      </td>
   
   </tr> -->
</form>
  </table>
  -->
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