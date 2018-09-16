

<?php
	require('db.php');
    // If form submitted, insert values into the database.
          $police_id= $_POST['police_id'];
		$password = $_POST['password'];
               
              

$sql = "SELECT * FROM POLICE WHERE police_id = '$police_id' and password ='$password' ;";
$result = mysqli_query($db,$sql);
echo "$sql";
$rows = mysqli_num_rows($result);
echo "$rows";
if($rows == 1){
 header("location:signup.html");
}
else{
echo " <div class='form'><h3>INVALID username/password/domain<br>
                       <a href = 'login.html'> LOGIN</a> </h3> </div>"; 
}
// while($row = mysql_fetch_assoc($result))

?>

