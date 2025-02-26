<?php include('../config/constants.php') ?>
<?php
// LOGIN USER
if (isset($_POST['admin_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $sql= "SELECT * FROM admindb WHERE username='$username' AND password='$password'";
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: /dbb/admin/admin_page.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}



?>