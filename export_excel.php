<?php
include('dbcon.php');

// Fetch data from the database
$sql = "SELECT * FROM students";
$result = mysqli_query($connection, $sql);

$finaldata = array();
while ($row = mysqli_fetch_assoc($result)) {
    $finaldata[] = $row;
}

// Set headers to trigger download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=students_data.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Output table headers
echo "<table border='1'>";
echo "<tr>";
if (!empty($finaldata)) {
    foreach (array_keys($finaldata[0]) as $header) {
        echo "<th>" . htmlspecialchars($header) . "</th>";
    }
}
echo "</tr>";

// Output table data
foreach ($finaldata as $row) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>" . htmlspecialchars($value) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
