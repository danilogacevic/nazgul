<?php require_once "includes/init.php";?>

<?php 

if(isset($_POST['limit'])){

	$limit = $_POST['limit'];
}

$query = "SELECT DISTINCT creature_id FROM crimes"; 

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


$creatures = Creature::find_by_query($query); ?>

<table>
                                <thead>
                                    <tr>
                                       <th>Name <select class="order">
                                      <option value="0">Order by</option>
                                      <option value="alphabet">A-Z</option>
                                    </select></th>
                                       <th>Gender</th>
                                       <th>Place of birth</th>
                                       <th>Date of birth<select class="order">
                                      <option value="0">Order by</option>
                                      <option value="birth_date">Birth date</option>
                                    </select></th>
                                       <th>Ever carried The ring ?</th>
                                       <th>Enslaved by Sauron</th>
                                       <th>Race<select class="order">
                                      <option value="0">Select by</option>
                                      <option value="elf">Elf</option>
                                      <option value="dwarf">Dwarf</option>
                                      <option value="hobbit">Hobbit</option>
                                      <option value="orc">Orc</option>
                                      <option value="human">Human</option>
                                      <option value="ghost">Ghost</option>
                                      <option value="other">Other</option>
                                    </select></th>
                                       <th>Crimes against Sauron <button id="with_crimes">With crimes<br>against Sauron</button><br><input type="text" id="crimes_num" style="width: 14%;
    margin: 2% 0% 4% 62%;"></th>
                                       <th>Notes</th>
                                    </tr>
                               </thead>
                               <tbody>

<?php   foreach ($creatures as $creature) {


    if($limit) {

      $query ="SELECT id FROM crimes WHERE creature_id= {$creature->id}";

    if (Crime::count($query) >= $limit){

    $creature->ever_carried_ring == 1 ? $creature->ever_carried_ring = 'yes' : $creature->ever_carried_ring = 'no';
    $creature->enslaved_by_sauron == 1 ? $creature->enslaved_by_sauron = 'yes' : $creature->enslaved_by_sauron = 'no';
                                    


          echo      "<tr>
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

            </tr>";
  


    }

    



  } else {

    $creature->ever_carried_ring == 1 ? $creature->ever_carried_ring = 'yes' : $creature->ever_carried_ring = 'no';
    $creature->enslaved_by_sauron == 1 ? $creature->enslaved_by_sauron = 'yes' : $creature->enslaved_by_sauron = 'no';

      echo      "<tr>
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

            </tr>";

  }


    }
  

    

  ?>

       </tbody>

                           </table> <!-- End of table -->
<?php } else {


$creatures = Creature::find_all();

?>
<table>
                                <thead>
                                    <tr>
                                       <th>Name <select class="order">
                                      <option value="0">Order by</option>
                                      <option value="alphabet">A-Z</option>
                                    </select></th>
                                       <th>Gender</th>
                                       <th>Place of birth</th>
                                       <th>Date of birth<select class="order">
                                      <option value="0">Order by</option>
                                      <option value="birth_date">Birth date</option>
                                    </select></th>
                                       <th>Ever carried The ring ?</th>
                                       <th>Enslaved by Sauron</th>
                                       <th>Race<select class="order">
                                      <option value="0">Select by</option>
                                      <option value="elf">Elf</option>
                                      <option value="dwarf">Dwarf</option>
                                      <option value="hobbit">Hobbit</option>
                                      <option value="orc">Orc</option>
                                      <option value="human">Human</option>
                                      <option value="ghost">Ghost</option>
                                      <option value="other">Other</option>
                                    </select></th>
                                       <th>Crimes against Sauron <button id="with_crimes">With crimes<br>against Sauron</button><br><input type="text" id="crimes_num" style="width: 14%;
    margin: 2% 0% 4% 62%;"></th>
                                       <th>Notes</th>
                                      
                                    </tr>
                               </thead>
                               <tbody>

                          
         <?php foreach ($creatures as $creature) : ?>
   
                               <tr>
                                    <td><?php echo $creature->name; ?></td>
                                    <td><?php echo $creature->gender; ?></td>
                                    <td><?php echo $creature->birth_place; ?></td>
                                    <td><?php echo $creature->birth_date; ?></td>
                                    <td><?php if($creature->ever_carried_ring == 1) {echo "yes";} else {echo "no";} ?></td>
                                    <td><?php if($creature->enslaved_by_sauron == 1) {echo "yes";} else {echo "no";} ?></td>
                                    <td><?php echo $creature->race; ?></td>
                                    <td><a href="javascript:void(0);" class="notecrim" rel="<?php echo $creature->id; ?>">Crimes</a></td>
                                    <td><a href="javascript:void(0);" class="notecrim" rel="<?php echo $creature->id; ?>">Notes</a></td>
                                    <td><a class="delete" href="javascript:void(0);" rel="<?php echo $creature->id; ?>" >Delete</a></td>
                                    

                               </tr>

                         <?php    endforeach; ?>

                               </tbody>

                           </table> <!-- End of table -->

                           <h1>Creatures didn't commit any crime</h1>
<?php } ?>




