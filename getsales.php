
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

$con = mysqli_connect('localhost', 'root', 'root', 'GB');
if (!$con) {
    die('Couldnt connect to DB');
}

mysqli_select_db($con,"GB");
//$sql="SELECT * FROM sales WHERE item_type = '".$q."'";
$sql="SELECT * FROM sales WHERE 1";
$result = mysqli_query($con,$sql);
var_dump($q);

echo "<table>
<tr>
<th>ID</th>
<th>Region</th>
<th>Country</th>
<th>Item type</th>
<th>Order date</th>
<th>Order id</th>
<th>units_sold</th>
<th>unit_price</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['region'] . "</td>";
  echo "<td>" . $row['country'] . "</td>";
  echo "<td>" . $row['item_type'] . "</td>";
  echo "<td>" . $row['order_date'] . "</td>";
  echo "<td>" . $row['order_id'] . "</td>";
  echo "<td>" . $row['units_sold'] . "</td>";
  echo "<td>" . $row['unit_price'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 