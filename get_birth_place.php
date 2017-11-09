<?php require_once "admin/includes/init.php";?>

<?php 

$data = $_POST['data'];

if(!empty($data)) {

	$query = "SELECT * FROM creatures WHERE birth_place LIKE '$data%' LIMIT 1 ";

$creatures = Creature::find_by_query($query);

foreach ($creatures as $creature) {
	# code...
?>
	

			<ul>

				<?php echo "<li style='background-color:red;' id='chose-place' onclick='hey();return false;'>{$creature->birth_place}</li>"; ?>

			</ul>

			<?php  
}


}

 ?>

