<?php 


$servername = "localhost";
$username = "root";
$password = "";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password);
// // Check connection
// if(mysqli_connect_errno()){
            
//             die("Database connection failed" . mysqli_error());
            
            
//         } 

// // Create database
// $sql = "CREATE DATABASE IF NOT EXISTS techire_h02";

// if (!mysqli_query($conn,$sql) === TRUE) {

//     echo "Something is wrong";
// }

// $conn->close();

$conn = mysqli_connect($servername, $username, $password, "techire_h02");

// create users table 

$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL, 
password VARCHAR(60) NOT NULL,
reg_date TIMESTAMP
)";

if (!mysqli_query($conn,$sql) === TRUE) {

    echo "Something is wrong";
}

$result = mysqli_query($conn,"SELECT * FROM users");

// create users for app

$add_creature_password = '$2y$12$b/nXMIopg19jDg.hl21UouQdXoCF09zG3E32S82XI5OCshnHAOKrG';
$view_creature_password = '$2y$12$cVd6TRE34yR/yoeP5SmR2.4Arq0C5nzgPhfMULtnp2Q3k9By83Kjy';

if(mysqli_num_rows($result) == 0) {

			$sql = "INSERT INTO users (username, password) VALUE ('add_creature','$add_creature_password')";

		if (!mysqli_query($conn,$sql) === TRUE) {

		    echo "Something is wrong";
		}

		$sql = "INSERT INTO users (username,password) VALUE ('view_creature','$view_creature_password')";

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