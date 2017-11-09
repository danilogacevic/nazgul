<?php 


$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if(mysqli_connect_errno()){
            
            die("Database connection failed" . mysqli_error());
            
            
        } 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS techire_h02";

if (!mysqli_query($conn,$sql) === TRUE) {

    echo "Something is wrong";
}

$conn->close();

$conn = mysqli_connect($servername, $username, $password, "techire_h02");

// create passwords table 

$sql = "CREATE TABLE IF NOT EXISTS passwords (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
feature VARCHAR(30) NOT NULL, 
password VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if (!mysqli_query($conn,$sql) === TRUE) {

    echo "Something is wrong";
}

$sql = "INSERT INTO passwords (feature, password) VALUE ('add_creature','PleCh513Tf')";

if (!mysqli_query($conn,$sql) === TRUE) {

    echo "Something is wrong";
}

$sql = "INSERT INTO passwords (feature,password) VALUE ('view_creature','Tlu864QwEm')";

if (!mysqli_query($conn,$sql) === TRUE) {

    echo "Something is wrong";
}

$conn->close();

?>


<?php 

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "techire_h02";

foreach ($db as $key => $value){
    
    define (strtoupper($key),$value);
    
}

// $con = mysql_connect("localhost", "root", "");  
// $selectdb = mysql_select_db("techire_h02",$con);


?>