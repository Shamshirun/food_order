<?php
require("db.php");
$reg_no = $_request['reg_no'];
$sql = "select * from VEHICLE_INFO where reg_no = '$reg_no' ;";
echo "$sql";
$result = mysqli_query($db,$sql);
$rows = mysqli_num_rows($result);
if( mysqli_num_rows($result)>0){
 while($row = mysqli_fetch_assoc($result)){
echo "REGISTRATION NO :".$row['reg_no']."<br>";
echo "INSURED :".$row['insured']."<br>";
echo "EMISSION_TEST:".$row['emission_test']."<br>";
echo "MODEL :".$row['model']."<br>";
echo "MAKE :".$row['make']."<br>";
echo "OWNER_ID:".$row['owner_id']."<br>";
}
}
else{
echo "data fetching failed";
}

?>




