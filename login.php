<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Index</title>
  <link href="styling.css" rel="stylesheet" type="text/css" >
</head>
<body style = "padding:10px;">
  <br>
  <div class ="login" style='padding:20px'>
    <h2 class="s">Admin Login</h2>
    <form  action="login.php" method="post">
      <label> Username </label>
      <input type="text" name="name" placeholder="Enter your username" value="" required> 
      <br>
      <br>
      <label> Password </label>
       <input type="password" name="password" placeholder="Enter your password" value="" required> 
       <br>
       <br>
       <input type="submit" name="submit" value="Login"> 
    </form>
</div>

<?php

@include "connection.php";

// login of admin.
if($conn){


  if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $pass = $_POST["password"];

    $query = mysqli_query($conn, "SELECT * FROM User WHERE username='$name'");
    if(mysqli_num_rows($query)){
      $query2 = mysqli_fetch_all($query);

      $user = $query2[0][0];
      $password = $query2[0][1];

      if($pass==$password){
        header('Location:home.php');
      }
      else{
        echo "<h3>"."Incorrect Credentials"."</h3>";
      }
    }
    else{
      echo "<h3>"."Can't find user"."</h3>";
    }
  }
}

 ?>
