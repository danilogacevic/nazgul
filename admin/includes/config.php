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

// create users table 

$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL, 
password VARCHAR(40) NOT NULL,
reg_date TIMESTAMP
)";

if (!mysqli_query($conn,$sql) === TRUE) {

    echo "Something is wrong";
}

$result = mysqli_query($conn,"SELECT * FROM users");

// create users for app

if(mysqli_num_rows($result) == 0) {

			$sql = "INSERT INTO users (username, password) VALUE ('add_creature','6a446225bb626a97e28b2adf116c3748')";

		if (!mysqli_query($conn,$sql) === TRUE) {

		    echo "Something is wrong";
		}

		$sql = "INSERT INTO users (username,password) VALUE ('view_creature','5ed8150cd2f23d489d693d2f3050d9ba')";

		if (!mysqli_query($conn,$sql) === TRUE) {

		    echo "Something is wrong";
		}

} 

// create creatures table

$sql = "CREATE TABLE IF NOT EXISTS creatures (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL, 
gender VARCHAR(30) NOT NULL,
birth_place VARCHAR(30) NOT NULL,
birth_date DATE,
ever_carried_ring TINYINT(1),
enslaved_by_sauron TINYINT(1),
race VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if (!mysqli_query($conn,$sql) === TRUE) {

    echo "Something is wrong";
}

// create crimes table

$sql = "CREATE TABLE IF NOT EXISTS crimes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
creature_id INT(6) UNSIGNED,
note TEXT, 
datum DATE,
punished TINYINT(1),
reg_date TIMESTAMP
)";

if (!mysqli_query($conn,$sql) === TRUE) {

    echo "Something is wrong";
}

// create notes table

$sql = "CREATE TABLE IF NOT EXISTS notes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
creature_id INT(6) UNSIGNED,
note TEXT, 
datum DATE,
reg_date TIMESTAMP
)";

if (!mysqli_query($conn,$sql) === TRUE) {

    echo "Something is wrong";
}



$conn->close();

?>



 <!-- Tables created - continue to app -->


<?php 

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "techire_h02";

foreach ($db as $key => $value){
    
    define (strtoupper($key),$value);
    
}




?>