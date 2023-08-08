<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Page</title>
    <link href="styling.css" rel="stylesheet" type="text/css" >
</head>
<body>
    
</body>
</html>
<?php
@include "connection.php";

// to delete data from the employee record.
if(isset($_GET['em']))
{
    $em=$_GET['em'];

$query="delete from employee where `EmployeeNo` = '$em'";
$q1=mysqli_query($conn,$query);
if(!$q1)
{
    echo "Process Failed";
}
else
{
    header("location:view.php");
}

}
?>