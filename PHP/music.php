<!DOCTYPE html>
<html>
<body>

<?php
require_once 'music_users.php';
echo "Display Music DB tables<br>";
$con = mysql_connect($db_hostname, $db_username, $db_userpassword);

// Check connection
if (!$con) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db("music")
    or die("Unable to select database: " . mysql_error());

$tblSql = mysql_query("show tables");
# $arrayCount = 0;
// echo getSelect($tblSql);
/*
select data_type 
from information_schema.columns 
where table_schema = 'myschema'
and table_name = 'mytable' 
and column_name = 'mycol'
*/

function getSelect($sql, $name, $formId)
{
    $select = "<select name=\"$name\" form=\"$formId\">";
    while ($row = mysql_fetch_row($sql))
    {
        $select .= getOption($row[0]);
    }
    $select .= "</select>";
    return $select;
}

function getOption($table)
{
    return "<option value=\"$table\">$table</option>";
}

function tableContent($tblname)
{
    $sqlHeader = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS ";
    $sqlHeader .= "WHERE TABLE_SCHEMA='music' ";
    $sqlHeader .= "AND TABLE_NAME='$tblname'";
    // echo "<br> " . $sqlHeader;
    $tblheader = mysql_query($sqlHeader);
    $row = mysql_fetch_row($tblheader);
    $tblcols = "$row[0]";
    $tbltop = "<th>$row[0]</th>";
    while ($row = mysql_fetch_row($tblheader))
    {
        // echo "<br> " . $row[0];
        $tblcols .= ", $row[0]";
        $tbltop .= "<th>$row[0]</th>";
    }

    $tblstr = "<table><tr>$tbltop</tr>";
    $selectall = "select $tblcols from $tblname";
    // echo "<br> " . $selectall;
    $content = mysql_query($selectall);
    while ($row = mysql_fetch_row($content))
    {
        $tblrow = "";
        for ($i = 0; $i < count($row); $i++)
        {
            $tblrow .= "<td>$row[$i]</td>";
        }
        $tblstr .= "<tr>$tblrow</tr>";
    }
    $tblstr .= "</table>";
    return $tblstr;
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
      id="showTable"
      method='post'>
    Display Table Content:
    <input type="submit">
</form>

<?php echo getSelect($tblSql, "tableName", "showTable");?>

<hr>

<?php
if (empty($_POST["tableName"]))
{
    echo "Table is not selected.\n";
}
else
{
    echo $_POST["tableName"] . " content";
    echo tableContent($_POST["tableName"]);
}
?>

</body>
</html>
