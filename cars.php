<?php
echo "Hello from PHP!<br>";  // 临时调试用
require_once "settings.php"; // Load DB credentials

// Establish DB connection
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check connection
if ($dbconn) {
    $query = "SELECT * FROM cars";
    $result = mysqli_query($dbconn, $query);

    echo "<h1>Car Records</h1>";

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
                <th>ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Price</th>
                <th>Year of Manufacture</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['car_id'] . "</td>";
            echo "<td>" . $row['make'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>There are no cars to display.</p>";
    }

    // Close DB connection
    mysqli_close($dbconn);
} else {
    echo "<p>Unable to connect to the database.</p>";
}
?>


