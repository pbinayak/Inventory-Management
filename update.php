<?php 

    @include "connection.php";

    if($conn)
    {
        echo "Success";
        if (isset($_GET['em']))
        {
            $em=$_GET['em'];
        

            $query ="select * from employee where `EmployeeNo` = '$em'";
            $result=mysqli_query($conn,$query);

            if(!$result)
            {
                echo "error";
            }
            else
            {
                $row = mysqli_fetch_assoc($result);
                print_r($row);
            }

    }
    
    }

?>


<?php
    // update of data
    if(isset($_POST['update_new']))
    {
        if(isset($_GET['em_new']))
        {
            $emnew= $_GET['em_new'];
        }
        $emp=$_POST['emp'];
        $name=$_POST['name'];
        $designation=$_POST['designation'];
        $department=$_POST['department'];

        $query="update employee set Name='$name', Designation = '$designation' , Department = '$department' where EmployeeNo = '$emnew' ";

        $result=mysqli_query($conn,$query);

        if(!$result)
        {

            echo "<h3>"."Failed"."</h3>";
        }
        else
        {
            header('location:view.php');
            
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
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
    <div class='card'>
    <form action="update.php? em_new=<?php echo $em; ?>" method="post">
        <div>
            <h1 class='s'> Please update the details of the employeee </h1>
            <label><h3 class='s'> Employee Number </h3> </label>
            <input type="text" name="emp" value="<?php echo $row['EmployeeNo'] ?>">
        
            <label><h3 class='s'>  Name </h3></label>
            <input type="text" name="name" value="<?php echo $row['Name'] ?>">
        
            <label><h3 class='s'> Designation </h3></label>
            <input type="text" name="designation" value="<?php echo $row['Designation'] ?>">
        
            <label><h3 class='s'> Department </h3></label>
            <input type="text" name="department" value="<?php echo $row['Department'] ?>">
        
        <br>
        <br>
        <div>
            <input type="submit" name="update_new" value="UPDATE">
</div>
        </div>
</div>
    </form>
</body>
</html>

















































