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
  <title>Index</title>
  <link href="styling.css" rel="stylesheet" type="text/css" >
</head>
<body style = "padding:10px;">
  <br>
 
  <br>
  <br>
  <br>

  <div style='padding:20px'>

       <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-0"></div>
        <div class="col-lg-6 col-md-6 col-sm-10">
            
              <div class="card">
               <div class="container">
                <form action = "" method = "POST">
                   <h1 class="subheading">Replacement Devices</h1>
                   <h6 class="subheading">Device Issue and Return System</h6><br>
              <div>
                       <label style="width: 40%">Date Of Issue</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input style="width: 50%" type="date" name="idate">
                   </div>
                    <br>
                    <div>
                       <label style="width: 40%">Employee Number</label>
                        <input style="width: 50%" type="Number" name="emplno" placeholder="Enter Employee Number" required>
                   </div>
                   <br>
                    <div>
                       <label style="width: 40%">Device Number</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input style="width: 50%" type="Number" name="dnumber" placeholder="Enter Employee Number" required> 
                   </div>
                   <br>
                    <div>
                    
                        <button class="btn btn-primary" type="submit" name="submit" value="Retrun">Return</button>
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

  
  //if submit button is pressed.
  
  if(isset($_POST['submit'])){

    

    $idate = strtotime($_POST["idate"]);
    $idate1 = date('Y-m-d', $idate);
    $emplno = $_POST['emplno'];
    $deno = $_POST['dnumber'];

    
    $q0 = mysqli_query($conn, "SELECT DeviceNo FROM products WHERE DeviceNo=$deno AND Returnable='Yes'");
    if(mysqli_num_rows($q0)){

      
      $q1 = mysqli_query($conn, "SELECT DeviceNo FROM products WHERE DeviceNo=$deno AND Available='No'");
      if(mysqli_num_rows($q1)){

        
        $q2 = mysqli_query($conn, "UPDATE `products` SET `Available`='Yes' WHERE `DeviceNo`=$deno");
        if($q2){

          $q3 = mysqli_query($conn, "INSERT INTO `replacement`(`Date`, `EmployeeNo`, `DeviceNo`) VALUES ('$idate1', '$emplno', '$deno')");
          
          if($q3){
            echo "<h3>"."Process Successful"."</h3>";}
          else{
            echo "<h3>"."Unsuccessful: Failed to enter"."</h3>";}

        }
        else{
          echo "<h3>"."Couln't update returned flag"."</h3>";}

      }
      else{
        echo "<h3>"."No such device has been issued"."</h3>";}
    }
    else {
      echo "<h3>"."No such device is returnable"."</h3>";
    }
  }

}


 ?>
