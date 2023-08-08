<!DOCTYPE html>
<html lang="en" dir="ltr">

 <div class="topnav">
           
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

    <div >


    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-0"></div>
            <div class="col-lg-6 col-md-6 col-sm-10">
                
                 <div class="card">
                     <div class="container">
<form action="products.php" method="post">
     <h1 class="subheading">Update Devices</h1>
        <h6 class="subheading">Device Issue and Return System</h6><br>
    
    <br>
    <div>
       <div>
        <label style="width: 40%">Company</label>
        <input style="width: 50%" type="text" name="company" value="" placeholder="Enter Company" required>
      </div>
  
                  <br>
               
                  <div>
                   <label style="width: 40%">Type</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <input style="width: 50%" type="text" name="type" value="" placeholder="Enter type" required>
                 </div>

                  <div>
                    <br>
                      <input type="checkbox" name="returnable" value=1> Is it returnable<br>
                  </div>
                  <div>
                    <br>
                        <button class="btn btn-primary" type="submit" name="submit" value="Add Device">Submit</button>
                  </div>
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

  // insert data
  if(isset($_POST['submit'])){

    $company = $_POST['company'];
    $type = $_POST['type'];
    $ret = isset($_POST['returnable']) ? "Yes" : "No";
   

    $query2 = mysqli_query($conn, "INSERT INTO `products`(`Company`, `Type`, `Available`, `Returnable`) VALUES ('$company', '$type', 'Yes', '$ret') ");

    if($query2){
      echo "<h3>"."Data entered in database successfully"."</h3>";
    }
    else{
      echo "<h3>"."Some error occured while entering the data in database"."</h3>";
    }
  }
  
}

 ?>