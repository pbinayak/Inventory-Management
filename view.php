
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Update Page</title>
    <div class="topnav">
             <a class="nav-item nav-link" href="home.php">Home</a>
            <a class="nav-item nav-link " href="employee.php">Employee</a>
            <a class="nav-item nav-link" href="products.php">Products</a>
            <a class="nav-item nav-link" href="problem.php">Issue</a>
            <a class="nav-item nav-link" href="replacement.php">Return</a>
            <a class="nav-item nav-link" href="report.php">Records</a>
</div>
    <link href="styling.css" rel="stylesheet" type="text/css" >
</head>
<body>
    
    <?php

    @include "connection.php";

    
    {
        
        ?>


        <table class="card">
        <tr>
            <th colspan='10'><h1 class='s'> Searched employee </h1></th>
        </tr>
        <t>
            <th > Employee Number</th> 
            <th > Name</th> 
            <th> Designation</th> 
            <th> Department</th>  
            <th> Edit </th>
            <th> Delete </th>
        </t>

        <?php
        $query=mysqli_query($conn, "SELECT * FROM `employee`;");  

        while($row = mysqli_fetch_assoc($query)) 
        //  list of all employee.
        {
            
            ?>
            <tr>
            
                <td> <?php echo($row['EmployeeNo']) ?> </td>
                <td> <?php echo($row['Name']) ?> </td>
                <td> <?php echo($row['Designation']) ?> </td>
                <td> <?php echo($row['Department']) ?> </td>
                
                <td> <a href="update.php?em=<?php echo($row['EmployeeNo']) ?>"> Update  </a> </td>
                <td> <a href="delete.php?em=<?php echo($row['EmployeeNo']) ?>"> Delete  </a> </td>
                
            </tr>
            <?php
        }
        
    
    
}
?>


</table>

<br>
<br>

<button class='new-btn'><a href="home.php"> Go back to Home Page </a> </button>



</body>
</html>