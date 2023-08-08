<!DOCTYPE html>
<html lang="en" dir="ltr">

 <div class="topnav">
          
            </a>
            <a class="nav-item nav-link" href="home.php">Home</a>
            <a class="nav-item nav-link " href="employee.php">Employee</a>
            <a class="nav-item nav-link" href="products.php">Products</a>
            <a class="nav-item nav-link" href="problem.php">Issue</a>
            <a class="nav-item nav-link" href="replacement.php">Return</a>
            <a class="nav-item nav-link" href="report.php">Records</a>
           
              </div>
<head>

  <meta charset="utf-8">
  <title>Problems in the Product</title>
  <link href="styling.css" rel="stylesheet" type="text/css" >
</head>
<body style = "padding:10px;">
  <br>
  <br>
  <br>

  <div style='padding:20px'>

     <div class="container">

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-0"></div>
        <div class="col-lg-6 col-md-6 col-sm-10">
            
           <div class="card">
               <div class="container">
                <form action="" method="POST">
                   <h1 class="subheading">Issue Devices</h1>
                   <h6 class="subheading">Register for Device issue</h6><br>
                   <div>
                       <label style="width: 40%">Date of problem</label> &nbsp;&nbsp;&nbsp;&nbsp;
                       <input style="width: 50%" type="date" name="datepr" required>
                   </div>
                    <br>
                    <div>
                       <label style="width: 40%">Employee Number</label>
                        <input style="width: 50%" type="Number" name="employeeno" placeholder="Enter Employee Number" required>
                   </div>
                   <br>
                    <div>
                       <label style="width: 40%">Device Number</label> &nbsp;&nbsp;&nbsp;&nbsp;
                        <input style="width: 50%" type="Number" name="dno" placeholder="Enter Employee Number" required>
                   </div>
                <br>
                 <div>
                   
                        <button class="btn btn-primary" type="submit" name="submit" value="Issue">Issue</button>
                  </div>
                
            </form>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-0"></div>
</div>
</div>

<?php

@include "connection.php";
if($conn){

  //insert data
  if(isset($_POST['submit'])){

    $datepr = strtotime($_POST["datepr"]);
    $datepr = date('Y-m-d', $datepr);
    $employeeno = $_POST['employeeno'];
    $dno = $_POST['dno'];

    

    $q1 = mysqli_query($conn, "SELECT * FROM Problem");
    
    if(mysqli_num_rows($q1)){
      
      $q2 = mysqli_query($conn, "SELECT * FROM Problem WHERE EXISTS (SELECT * FROM products WHERE DeviceNo=$dno AND Available='Yes') OR NOT EXISTS(SELECT * FROM problem WHERE DeviceNo=$dno)");

      if(mysqli_num_rows($q2)){
        
        $q3 = mysqli_query($conn, "INSERT INTO `problem`(`Date`, `EmployeeNo`, `DeviceNo`) VALUES ('$datepr', $employeeno, $dno)");
        if($q3){
          
          $q4 = mysqli_query($conn, "UPDATE `products` SET `Available`='No' WHERE `DeviceNo`=$dno");
          if($q4)
          {
            echo "<h3>"."Process Successfull"."</h3>";
          }

          else
          {
            echo "<h3>"."Process could not be handled"."</h3>";
          }

        }
        else{
          echo "<h3>"."Couln't insert given data into the database"."</h3>";}

      }
      else{
        echo "<h3>"."No such device can be issued"."</h3>";}
    }

    
    else{
      //INSERT
      $q3 = mysqli_query($conn, "INSERT INTO `problem`(`Date`, `EmployeeNo`, `DeviceNo`) VALUES ('$datepr', $employeeno, $dno)");
      if($q3){
        //UPDATE RETURN FLAG TO 0
        $q4 = mysqli_query($conn, "UPDATE `products` SET `Available`='No' WHERE `DeviceNo`=$dno");
        if($q4){
          echo "<h3>"."Process Successfull"."</h3>";}

        else{
          echo "<h3>"."Couln't update returned flag"."</h3>";}

      }
      else{
        echo "<h3>"."Process could not be handled"."</h3>";}
      }
  }

  echo "<br>";

 
}

 ?>
