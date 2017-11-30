<html>
<head>
<title>logged</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">    
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../scripts/jquery.min.js"></script>
<script src="../scripts/bootstrap.min.js"></script>
</head>
<style>
.b{padding-left:15px;
padding-top:10px;}

.c{padding:3px;}
.a{margin-top:55px;}

.thumb{margin-top:2px;
border:1px solid black;
background-color:rgb(240, 240, 240);
}
 #footer{ margin-top:3px;
padding:10px;	
border-top:1px solid DodgerBlue;
color: #eeeeee;
background-color: #211f22;
text-allign:centre;
}
.btn-info{margin-right:10px;
float:right;}

</style>
<body>
<?php
session_start();

require_once "../includes/connect.php"; 

$email = $_SESSION['email'];
$pass = $_SESSION['pass'];
$sql = "select * from adminLogin where email = '$email' and password = '$pass';";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    // output data of each row
   while($row = $result->fetch_assoc()) {
        echo "Welcome " . $row["email"]. "<br>";
    }
} 
else {
    echo "0 results";
}

$sql2 = "select * from doctor;";
$result2 = mysqli_query($conn,$sql2);

//$result = mysqli_query("select * from doctor where department = '$x';");

//$sql = "select * from doctor where department = '$x';";

//$result = mysqli_query($conn, $sql);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        $firstName = $row["firstName"];
        $lastName = $row["lastName"];
        $gender = $row["gender"]; 
        $qualification = $row["qualification"];
        $fee = $row["fee"];
        $doctorID = $row["doctorID"];
?>
    <div class="media thumb">
        <div class="media-body b">
           <h4 class="media-heading"><b> <?php echo $firstName;?> <?php echo $lastName;?></b></h4>
           <p>Gender : <?php echo $gender;?></p>
           <p>Qualification :  <?php echo $qualification;?></p>
           <p>Fee : <?php echo $fee;?></p>

            <a href="accept.php?doctorID=<?php echo $doctorID; ?>"><span class="btn btn-info">
           Accept &rsaquo;&rsaquo;
            </span></a>

            <a href="reject.php?doctorID=<?php echo $doctorID; ?>"><span class="btn btn-info">
           Reject &rsaquo;&rsaquo;
            </span></a>
        </div>

    </div>
<?php   } 
}
else {
    echo "0 results";
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
