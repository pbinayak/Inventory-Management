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
    <title>Employee</title>
   
    <link href="styling.css" rel="stylesheet" type="text/css" >
  </head>
  <body style = "padding:10px;">
 
    <div >

     
          <div class="container">

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-0"></div>
            <div class="col-lg-6 col-md-6 col-sm-10">
                <br><br>
                 <div class="card">
                     <div class="container">
<form action="employee.php" method="post">
     <h1 class="subheading">Update Employee</h1>
        <h6 class="subheading">Device Issue and Return System</h6><br>
    <div>
        <label style="width: 40%">Employee's Name</label>
        <input style="width: 50%"type="text" name="name" placeholder="Enter Employee's Name" required>
    </div>
    <br>
    <div>
        <label style="width: 40%">Designation</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input style="width: 50%" type="text" name="designation" placeholder="Enter Designation" required>
</div>
    <br>
     <div>
        <label style="width: 40%">Department</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input style="width: 50%" type="text" name="department" placeholder="Enter Department" required>
    </div>
    <br>
    
    <div>
    
                    <br>
                        <button class="btn btn-primary" type="submit" name="submit" value="Add Row">ADD EMPLOYEE</button>
                      
    </div>
    </form>
    </div>
    </div>
    <br><br>
    </div>
     <div class="col-lg-3 col-md-3 col-sm-0"></div>
    </div>
    </div> 

<?php
@include "connection.php";

if($conn){

  // to insert data 
  if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $designation = $_POST['designation'];
    
    $department = $_POST['department'];

    $res2 = mysqli_query($conn, "INSERT INTO Employee(name, designation, department) VALUES('$name', '$designation','$department' )");

    if($res2){
      echo "<h3>"."Employee is added successfully"."</h3>";
    }
    else{
      echo "<h2>". "Unsuccessfully : Couldn't add employee". "</h2>";
    }
  }

}

 ?>

 <button class= "new-btn"><a href="view.php"> Click here to update or delete employee data</a></button>
