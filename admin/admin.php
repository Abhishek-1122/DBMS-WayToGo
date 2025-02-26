

<?php include('admindb.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="header">
    <h2>Admin Login</h2>
  </div>
   
  <form class="" method="post" action="admin.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button   type="submit" class="btn" name="admin_user">Login</button>
    </div>
    <p>
      Only For ADMIN

    </p>
     <p>
      Back to Login page <a href="../logup/login.php">login page</a>
    </p>
  </form>
</body>
</html>