<?php
   	$number = $_REQUEST["txtno"];
    $conn= new mysqli("localhost","root","kulli123","VEHICLE");
	if($conn->connect_error){
	die("error");
	}
	
	$sql="select *from VEHICLE where reg_no='$number'";	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0){

		while($row = $result->fetch_assoc()){	
		echo $row["reg_no"].$row["model"]  ;
		}
	}
	
$conn->close();
?>
