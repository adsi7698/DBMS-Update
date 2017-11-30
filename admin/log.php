<html>
<body>
<?php
session_start();

require_once "../includes/connect.php"; 

$n = $_POST["email"];
$pass = $_POST["pass"];
$sql = "select * from adminLogin where email='$n' and password='$pass';";
$result = mysqli_query($conn, $sql);


if($result->num_rows === 1) {
    $_SESSION['email'] = $n;
    $_SESSION['pass'] = $pass;
    header('Location: logged.php');
    exit;
}
else {
    header('Location: Failed.php');
    exit;
}

/*$result = mysql_query("SELECT number FROM one");

$array = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
        $array[] = $row;
	echo $row['number'];
    }
	print_r($array);
	echo $array[0];
} 
else {
    echo "0 results";
}
*/
$conn->close();
?>

</body>
</html>
