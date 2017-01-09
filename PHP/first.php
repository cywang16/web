<!DOCTYPE html>
<html>
<body>

<?php
// This is a single line comment

# This is also a single line comment

/*
This is a multiple lines comment block
that spans over more than
one line
*/

echo "My first PHP script!<br>";
// phpinfo();
ECHO "Hello World!<br>";
echo "Hello World!<br>";
EcHo "Hello World!<br>";
$color="red";
echo "My car is " . $color . "<br>";
echo "My house is " . $COLOR . "<br>";
echo "My boat is " . $coLOR . "<br>";

$x=5; // global scope

function myTest() {
  $y=10; // local scope
  echo "<p>Test variables inside the function:</p>";
  echo "Variable x is: $x";
  echo "<br>";
  echo "Variable y is: $y";
} 

myTest();

echo "<p>Test variables outside the function:</p>";
echo "Variable x is: $x";
echo "<br>";
echo "Variable y is: $y";
echo "<a href=\"" . "http://" . $_SERVER["SERVER_ADDR"] . ":8080\">Tomcat entry</a>";
// echo $_SERVER["SERVER_ADDR"];
// echo $_SERVER["PHP_SELF"];
?>  

</body>
</html>
