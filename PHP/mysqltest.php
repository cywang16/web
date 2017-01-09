<!DOCTYPE html>
<html>
<body>

<?php
echo "Test MySQL connection:<br>";
$con=mysqli_connect("","musicuser","student","music");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_close($con);
?>  

</body>
</html>
