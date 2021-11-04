<?php
  session_start();
  include 'config.php';

  // Variables taken from form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Accessing account from database
  $sql = "SELECT * FROM akun WHERE username='$username'";
  // Getting result from database
  $result = mysqli_query($conn, $sql);

  // Counting amount of records
  $count = mysqli_num_rows($result);
  // If theres one record carry one
  if ($count == 1) {
      // Convert DB result array into text
      while ($row = mysqli_fetch_array($result)) {
        // Assigning variable to password record
        $dbPass = $row['password'];
      }
      // Verifying password
      if ($password == $dbPass) {
        header("location: tablePage.php");
      } else {
        header("location: loginfail.html");
      }
  }
  else{
    header("location: loginfail.html");
  }
    
?>
