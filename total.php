
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
       
      

    
         <a href="logoutt.php"><button class="btn btn-danger my-2 my-sm-0" type="submit" name="logout">LOGOUT</button></a>

      
  </div>
</nav>
  </header>
  
 <br>

 
 <marquee> ALERT!!! IF YOU LOGOUT YOUR DATA WILL BE DELETED.</marquee>
 <br>
  <br>
<table  class="but" align="center" width="0%">
        <tr>
<td><form class="form-inline my-2 my-lg-0" method="POST" action="edit.php">
      <button class="btn btn-success my-2 my-sm-0" type="submit">EDIT</button>
    </form></td>
    
    </tr>
      </table>
<div class="main-content">

<div class="wrapper">
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

<?php 
//QUERY TO GET ALL ADMIN 
    $sql ="SELECT * FROM totaldb";
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
          $km=$rows['km'];
          $meals=$rows['meals'];
          $price=$rows['price'];
          $resort=$rows['resort'];
          $cost=$rows['cost'];
          $tollcost=$rows['tollcost'];
           $totalamt=$rows['totalamt'];
          $kmtotal=$rows['kmtcost'];
          $phtotal=$rows['phcost'];
          $pkm=$rows['pkm'];
          $nop=$rows['nop'];
          $mealtotal=$rows['mealtot'];
           $resorttotal=$rows['resorttot'];
           $fname=$rows['fname'];
           $email=$rows['email'];
           $mobno=$rows['mobno'];
          //disp value in table
          ?>
          <?php                    
$sql = "SELECT * from totaldb ";
foreach ($conn->query($sql) as $rows)
{  
    $total= $rows['mealtot']+$rows['resorttot']+$rows['tollcost']+ $rows['kmtcost'] ; 
    $placeid = $rows['placeid']; 
    $sql="UPDATE totaldb SET totalamt='$total' WHERE placeid = $placeid"; 
    mysqli_query($conn,$sql); 
}
?>
<?php                    
$sql = "SELECT * from totaldb ";
foreach ($conn->query($sql) as $rows)
{  
    $kmtotal= ($rows['km'] * $rows['pkm']); 
    $placeid = $rows['placeid'];
    $sql="UPDATE totaldb SET kmtcost='$kmtotal' WHERE placeid = $placeid"; 
    mysqli_query($conn,$sql); 
}
?>
<?php                    
$sql = "SELECT * from totaldb ";
foreach ($conn->query($sql) as $rows)
{  
    $phtotal= (($rows['totalamt'])/($rows['nop'])) ; 
     $placeid = $rows['placeid']; 
    $sql="UPDATE totaldb SET phcost='$phtotal' WHERE placeid = $placeid"; 
    mysqli_query($conn,$sql); 
}
?>
   
   <?php                    
$sql = "SELECT * from totaldb ";
foreach ($conn->query($sql) as $rows)
{  
    $mealtotal= ($rows['price']* $rows['nop']) ; 
    $placeid = $rows['placeid']; 
    $sql="UPDATE totaldb SET mealtot='$mealtotal' WHERE placeid = $placeid"; 
    mysqli_query($conn,$sql); 
}
?> 
   <?php                    
$sql = "SELECT * from totaldb ";
foreach ($conn->query($sql) as $rows)
{  
    $resorttotal= ($rows['cost']* $rows['nop']) ; 
    $placeid = $rows['placeid']; 
    $sql="UPDATE totaldb SET resorttot='$resorttotal' WHERE placeid = $placeid"; 
    mysqli_query($conn,$sql); 
}
?>  

    
             <div class ="card" id="generatePDF">
              <img src="admin/img/logo.png" width="200" height="100">

                             <h2 class="head">TOTAL BILL</h2>
  <form action="" method="POST" >
    <table  width="50%" align="center" >
       <tr><td><strong><u>Personel Information</strong></td></tr>
            <tr>
            
        <td>Name: </td>
        <td><input type="text" name="fname" value="<?php echo $fname ?>"></td>
      </tr>
            <tr>
        <td>Email: </td>
        <td><input type="text" name="email" value="<?php echo $email ?>"></td>
      </tr>
            <tr>
        <td>MobileNo: </td>
        <td><input type="text" name="mobno" value="<?php echo $mobno ?>"></td>
      </tr>
      <tr><td><strong><u>Travel Expenses</strong></td></tr>
      <tr>
        
        <td>Selected Place: </td>
        <td><input type="text" name="place" value="<?php echo $place ?>"></td>
      </tr>
      <tr>
        <td>Total KM: </td>
        <td><input type="text" name="km" value="<?php echo $km  ?> KM"></td>
      </tr>
      <br>
       <tr>
        <td> Selected Meal : </td>
        <td><input type="text" name="meals" value="<?php echo $meals ?> "></td>
      </tr>
      <tr>
        <td>Meal Cost : </td>
        <td><input type="text" name="price" value="<?php echo $price  ?> RS"></td>
      </tr>
     <br>
       <tr>
        <td> Selected Resort : </td>
        <td><input type="text" name="resort" value="<?php echo $resort ?>"></td>
      </tr>
      <tr>
        <td>Resort cost : </td>
        <td><input type="text" name="cost" value="<?php echo $cost  ?> RS"></td>
      </tr>
      <table width="60%" align="center" border="1">
      <tr>
        <th>
          Meals Cost
        </th>
        <th>
          Resort Cost
        </th>
        <th>
          Toll
        </th>
        <th>
          No.Of Passengers
        </th>
        <th>
          Per KM Cost
        </th>
      </tr>
      
        <tr>
        <td>
          <?php echo $price  ?> RS
        </td>
         <td>
          <?php echo $cost  ?> RS
        </td>
        <td>
          <?php echo $tollcost  ?> Rs
        </td>
        <td>
          <?php echo $nop  ?> Passengers
        </td>
        <td>
          <?php echo $pkm  ?> Rs
        </td>
      </tr>
            
      <table width="60%" align="center" border="1">>
      <tr>

        <td>Total Cost: </td>
        
        <td><input type="text" name="total" value="<?php echo $totalamt  ?>  RS"></td>
      </tr>
      <tr>

        <td>Per Head Cost:</td>
        
        <td><input type="text" name="phcost" value="<?php echo $phtotal  ?>  RS"></td>
      </tr>

      <br>
       
      
  
        <tr>

        <td colspan="2" >
          <input type="hidden" name="placeid" value="<?php echo $placeid;?>">
          <button id="pdfButton" class="btn-danger"><b>PRINT</b></button>
      </tr>
    </table>
      </table>
     
    </table>



  </form>
</div>
          <?php
        }
      }
      else{

      }
    }
?>
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
    $sql = "DELETE FROM resortdb 
             
            WHERE placeid='$placeid'

    ";  


    $res=mysqli_query($conn,$sql);

    }
?>

  
</table>

</div>

</div>


<script>
      var button = document.getElementById("pdfButton");
      var makepdf = document.getElementById("generatePDF");
      button.addEventListener("click", function () {
         var mywindow = window.open("", "PRINT", "height=600,width=600");
         mywindow.document.write(makepdf.innerHTML);
         mywindow.document.close();
         mywindow.focus();
         mywindow.print();
         return true;
      });
   </script>
 
</body>
</html>
