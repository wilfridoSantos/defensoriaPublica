<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','bddefensoria');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
if($q == 2){
    $q=1;
}
$sql="SELECT * FROM personal_campo ";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>id personal</th>
<th>id juzgado</th>
<th>estado</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id_personal'] . "</td>";
    echo "<td>" . $row['id_juzgado'] . "</td>";
    echo "<td>" . $row['estado'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>