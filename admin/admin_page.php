<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
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
        <h2>WELCOME TO ADMIN PAGE</h2>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0"  method="POST" action="admin.php">
      
      <button  class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
    </form>
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
  </div>
    <?php endif ?>
</nav>
  </header>
  <br>
  <br>
 <table  class="imgs" align="center" cellpadding="17"  >

    <tr>
      <td>
        <img  src="img/adminimg.jpg" alt="ADMIN" width="250" height="180">
      </td>
        <td>
        <img src="img/placesimg.jpg" alt="PLACE" width="250" height="180">
      </td>
        <td>
        <img src="img/hotelimg.jpg" alt="ADMIN" width="250" height="180">
      </td>
        <td>
        <img src="img/stayimg.jpg"  alt="ADMIN" width="250" height="180">
      </td>

  
    </tr>
    <tr align="center">
       <td>
      <a href="manage_admin.php">
      <button class="btn btn-danger my-2 my-sm-0" type="submit">ADD ADMIN</button>
      </a>
     </td>
     <td>
      <a href="manage_places.php">
      <button class="btn btn-danger my-2 my-sm-0" type="submit">ADD PLACES</button>
      </a>
     </td>
     <td>
       <a href="manage_hotels.php">
       <button class="btn btn-danger my-2 my-sm-0" type="submit"> ADD MEALS</button>
         </a>
     </td>
      <td>
       <a href="manage_stay.php">
       <button class="btn btn-danger my-2 my-sm-0" type="submit"> ADD STAY/RESORT</button>
        </a>
     </td>
   </tr>
    

  </table>
 
</body>
</html>