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
  <title>Home</title>
 
    <link href="styling.css" rel="stylesheet" type="text/css" >
</head>
<body style = "padding:10px;">
  <br>
  <br>
  <div style='padding:20px'>
  <h1> Hi admin!</h1>
  <h1> Welcome to Device Management System</h1>
  <h2> Here we here to manage the Devices that are being issued to the Employee. We keep the record of employee as well as the device. </h2>
  <h3> We deal with issues and return of devices. </h3>
  <h3> We also provide an option to add and update employee records. </h3> 


<?php
@include "connection.php";
if($conn){
  
  $res = mysqli_query($conn, "SELECT COUNT(products.DeviceNo), products.Type, products.Company FROM products WHERE products.Available='Yes' GROUP BY products.Type, products.Company");

  
  $res1 = mysqli_query($conn, "SELECT COUNT(products.DeviceNo), products.Type, products.Company FROM products WHERE products.Available='No' GROUP BY products.Type, products.Company");

  $res2 = mysqli_query($conn, "SELECT COUNT(DeviceNo), Type, Company FROM products GROUP BY Type, Company;");
  if(mysqli_num_rows($res)){
    if(mysqli_num_rows($res2)){


      $st = mysqli_fetch_all($res);
      $is = mysqli_fetch_all($res1);
      $to = mysqli_fetch_all($res2);


      echo "<div class='home'>   <h2>List of available devices</h2>
      <table class='table table-hover' > <thread> <tr> <th>Count</th>  <th>Type</th>  <th>Company</th> </tr> </thread>";
      for($i=0; $i<sizeof($st); $i++)
      {
        echo('<tr>'.'<td>'.$st[$i][0].'</td>'.'<td>'.$st[$i][1].'</td>'.'<td>'.$st[$i][2].'</td>'.'</tr>');
      }


    }
  }
}

 ?>

</body>
</html>
