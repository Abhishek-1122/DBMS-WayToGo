
 <?php include('constants.php') ?>
<!DOCTYPE html>

<html>
<head>
  <style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}

#myVideo {
  position: fixed;
  right: 0;
  
}

.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0);
  color: #f1f1f1;
  width: 100%;
  padding: 201px;
}

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
    
  <nav class="navbar navbar-expand-sm bg-warning navbar-dark">
  <img src="IMG/logo.png" alt="way to go logo" width="200" height="80">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
     
  </div>
</nav>
  </header>
   <video autoplay muted loop id="myVideo" >
  <source src="clickgo2.mp4" type="video/mp4">
</video>
 <br>
<br>
<br>
<br>
 <div class="content">
<br>
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

<table  width="50%"align="center">
	<tr >
		<td  >
			<h2>ARE YOU SURE?</h2>
		</td>
	</tr>
</table>
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

          
          
          //disp value in table
          ?>

	<table width="20%" align="center">
	<tr >
		<td  >
			  <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo SITEURL; ?>dellog.php?placeid=<?php echo $placeid; ?>">
              <button class="btn btn-danger my-2 my-sm-0" type="submit">YES</button>
            </form>
		</td>
		<td  >
			<a href="clickgo3.php"><button class="btn btn-danger my-2 my-sm-0" type="submit" name="logout">NO</button></a>
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


</div>
 
</body>
</html>

