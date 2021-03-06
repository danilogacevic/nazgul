<?php 

function __autoload ($class) {
    
    $class = strtolower($class);
    
    $the_path = "includes/{$class}.php";
    
    
    if(file_exists($the_path)){
        
        require_once ($the_path);
        
        
    } else {
        
        die("This filename {$class}.php was not found man. ");
        
    }
    
    
    
}

function redirect($location){
    
    
    header("Location: {$location}");
    
    
    
}

function clean($string){

	return htmlentities($string);
}

function creatures_with_crimes($limit="",$query){

	$response='';

	if(Crime::count($query)){

	$creatures_id = Crime::find_by_query($query);

$a = [];

foreach ($creatures_id as $id) {
  # code...

  array_push($a, $id->creature_id);
}


$query = 'SELECT * 
          FROM `creatures` 
         WHERE `id` IN (' . implode(',', array_map('intval', $a)) . ')';


$creatures = Creature::find_by_query($query); 

foreach ($creatures as $creature) {


    if($limit !="") {

      $query ="SELECT id FROM crimes WHERE creature_id = {$creature->id} AND punished = 0 ";

    if (Crime::count($query) > $limit){

    $creature->ever_carried_ring == 1 ? $creature->ever_carried_ring = 'yes' : $creature->ever_carried_ring = 'no';
    $creature->enslaved_by_sauron == 1 ? $creature->enslaved_by_sauron = 'yes' : $creature->enslaved_by_sauron = 'no';
                                    


$response .= <<<DELIMITER

       <tr>
                        <td>$creature->name</td>
                        <td>$creature->gender</td>
                        <td>$creature->birth_place</td>
                        <td>$creature->birth_date</td>
                        <td>$creature->ever_carried_ring</td>
                        <td>$creature->enslaved_by_sauron</td>
                        <td>$creature->race</td>
                        <td><a href='javascript:void(0);' class='notecrim' rel='$creature->id'>Crimes</a></td>
                        <td><a href='javascript:void(0);' class='notecrim' rel='$creature->id'>Notes</a></td>
                        <td><a class='delete' href='javascript:void(0);' rel='$creature->id'>Delete</a></td>

            </tr>

DELIMITER;
  


    }



  } else {

    $query ="SELECT id FROM crimes WHERE creature_id= {$creature->id} AND punished = 0";

    if (Crime::count($query) > 0){


    $creature->ever_carried_ring == 1 ? $creature->ever_carried_ring = 'yes' : $creature->ever_carried_ring = 'no';
    $creature->enslaved_by_sauron == 1 ? $creature->enslaved_by_sauron = 'yes' : $creature->enslaved_by_sauron = 'no';

$response .= <<<DELIMITER

       <tr>
                        <td>$creature->name</td>
                        <td>$creature->gender</td>
                        <td>$creature->birth_place</td>
                        <td>$creature->birth_date</td>
                        <td>$creature->ever_carried_ring</td>
                        <td>$creature->enslaved_by_sauron</td>
                        <td>$creature->race</td>
                        <td><a href='javascript:void(0);' class='notecrim' rel='$creature->id'>Crimes</a></td>
                        <td><a href='javascript:void(0);' class='notecrim' rel='$creature->id'>Notes</a></td>
                        <td><a class='delete' href='javascript:void(0);' rel='$creature->id'>Delete</a></td>

            </tr>

DELIMITER;

    }



  }


    }
	} else {

		

		
			
    

$response .= <<<DELIMITER

       <tr>
                        <td style='background:yellow;color:red;'>There aren't creatures with crimes</td>

            </tr>

DELIMITER;

	
	}	

	return $response;


}

function crimes($id){

	$response='';

	$query = "SELECT * FROM crimes WHERE creature_id={$id} ";

	if(Crime::count($query) > 0){

		$crimes = Crime::find_by_query($query);

		foreach ($crimes as $crime) {

			$crime->punished == 1 ? $crime->punished = 'yes' : $crime->punished = 'no'; 

$response .= <<<DELIMITER

       <tr>
                        <td>$crime->note</td>
                        <td>$crime->datum</td>
                        <td>$crime->punished</td>

            </tr>

DELIMITER;
			

		}

	} else {

$response .= <<<DELIMITER

		<tr>
                        <td style='background:yellow;color:red;'>This creature is innocent</td>

            </tr>     

DELIMITER;

	}

return $response;
}


function notes($id){

	$response='';

	$query = "SELECT * FROM notes WHERE creature_id={$id} ";

	if(Note::count($query) > 0){

		$notes = Note::find_by_query($query);

		foreach ($notes as $note) {

			
$response .= <<<DELIMITER

       <tr>
                        <td>$note->note</td>
                        <td>$note->datum</td>

            </tr>

DELIMITER;
			

		}

	} else {

$response .= <<<DELIMITER

		<tr>
                        <td style='background:yellow;color:red;'>There aren't notes for this creature</td>

            </tr>     

DELIMITER;

	}

return $response;
}


function order($order,$text='') {

	$response='';

	if($order === 'alphabet'){

		$query = "SELECT * FROM creatures ORDER BY name ";		

	} elseif ($order === 'birth_date') {
		
		$query = "SELECT * FROM creatures ORDER BY birth_date ";

	} elseif (!empty($text)) {
		
		$query = "SELECT * FROM creatures WHERE race='{$order}' ";
	}

	if(Creature::count($query) > 0){

		$creatures = Creature::find_by_query($query);

	foreach ($creatures as $creature) {

		$creature->ever_carried_ring == 1 ? $creature->ever_carried_ring = 'yes' : $creature->ever_carried_ring = 'no';
		$creature->enslaved_by_sauron == 1 ? $creature->enslaved_by_sauron = 'yes' : $creature->enslaved_by_sauron = 'no';
		
$response .= <<<DELIMITER

       <tr>
            <td>$creature->name</td>
                        <td>$creature->gender</td>
                        <td>$creature->birth_place</td>
                        <td>$creature->birth_date</td>
                        <td>$creature->ever_carried_ring</td>
                        <td>$creature->enslaved_by_sauron</td>
                        <td>$creature->race</td>
                        <td><a href="javascript:void(0);" class="notecrim" rel="$creature->id">Crimes</a></td>
                        <td><a href="javascript:void(0);" class="notecrim" rel="$creature->id">Notes</a></td>
                        <td>$creature->reg_date</td>
                        <td><a class="delete" href="javascript:void(0);" rel="$creature->id">Delete</a></td>

            </tr>

DELIMITER;

	}
	} else {

$response .= <<<DELIMITER

       <tr>
                        <td style='background:yellow;color:red;'>There aren't creatures of that race</td>

            </tr> 

DELIMITER;

	}

	return $response;


}



?>