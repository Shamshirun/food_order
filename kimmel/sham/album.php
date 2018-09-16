<?php
	$dbname = 'MusicMonkey';
	$passwd = 'somarsha3333';
	$username = 'root';
	$dbhost = 'localhost';
	echo "string";
	$conn = mysqli_connect($dbhost, $username, $passwd);
	if(!$conn){
		die('Could not connect: ' . mysql_error());
	}
	
	$sql = 'select Album_Name, Artwork_URL from ALBUM order by Album_Name';
	mysql_select_db('MusicMonkey');
	$retval = mysql_query($sql, $conn);

	if(!$retval){
		echo "no";
		die('Could not get data: ' . mysql_error());
	}

	while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
		echo "{$row['Artwork_URL']}";
		echo "hi";
	}
	echo "fsdgdf";
	mysql_close($conn);
?>