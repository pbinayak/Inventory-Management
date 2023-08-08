<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searched Records</title>
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

            if(isset($_POST['submit']))
            {
                // to search the issue row from replacement 
                if(!empty($_POST['text']) || (!empty($_POST['text2'])))
                {
                    $text=$_POST['text'];
                    $text2=$_POST['text2'];

                    $query = mysqli_query($conn, "select * from replacement inner join employee on replacement.EmployeeNo = employee.EmployeeNo where replacement.EmployeeNo = '$text' AND replacement.DeviceNo = '$text2';");

                    $row=mysqli_fetch_array($query);

                    if($row > 1)
                    {
                        
                        ?>

                        <table class='home'>
                            <th colspan='10'><h1 class='s'> Searched results </h1></th>
                            <tr>
                            <th> Return No</th> 
                            <th> Date</th> 
                            <th> Employee Number</th> 
                            <th> Device No</th> 
                            <th> Employee Number </th> 
                            <th> Name </th> 
                            <th> Designation </th> 
                            <th> Department</th> 
                            </tr>
                        
                            <?php

                            if($row>1)
                            {
                             ?>
                             <tr>
                             <td> <?php echo($row['ReturnNo']) ?> </td>
                            <td> <?php echo($row['Date']) ?> </td>
                            <td> <?php echo($row['EmployeeNo']) ?> </td>
                            <td> <?php echo($row['DeviceNo']) ?> </td>
                            <td> <?php echo($row['EmployeeNo']) ?> </td>
                            <td> <?php echo($row['Name']) ?> </td>
                            <td> <?php echo($row['Designation']) ?> </td>
                            <td> <?php echo($row['Department']) ?> </td>
                            </tr>
                            <?php
                            }

                    }

                }
                else
                {
                    echo "Please fill the form";
                }
            }
            else
            {
                echo "Not allowed";
            }
            

        
        ?>




</body>
</html>

