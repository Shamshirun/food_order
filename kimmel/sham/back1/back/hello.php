<html>
<body>

<form method="post" action="<?php
echo $_SERVER['PHP_SELF'];
?>">
  Vehicle Number: <input type="text" name="vnum" placehoder="KA04MB1873">
  <input type="submit" placehoder="KA04MB1873">
</form>

<?php

$servername = "localhost";
$username   = "root";
$password   = "root123";
$dbname     = "TRAFFIC";

// Create connection
$conn = new mysqli($servername, $username, $password);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST['vnum'];
    if (empty($name)) {
        echo "Vehicle Number is Empty";
    } else {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql    = "SELECT reg_no, model, make FROM VEHICLE where VEHICLE.reg_no = '" . $name . "'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Registration: " . $row["reg_no"] . " - Model: " . $row["model"] . " " . $row["make"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
}

?>

</body>
</html>
