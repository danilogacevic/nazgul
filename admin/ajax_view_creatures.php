<?php require_once "includes/init.php";?>

<?php 

if(isset($_POST['id']) && isset($_POST['constr'])) {

	$id = $_POST['id'];
	$constr = $_POST['constr'];

}

if(isset($_POST['order'])){

	$order = $_POST['order'];
}

if(isset($_POST['text'])){

  $text = $_POST['text'];
}


if(!empty($id) && $constr=='Crimes') {

	$query = "SELECT * FROM crimes WHERE creature_id={$id} ";

  if(Crime::count($query) >0){ 

  $crimes = Crime::find_by_query($query); ?>

  

  <table>
                                <thead>
                                    <tr>
                                       <th>Note</th>
                                       <th>Date</th>
                                       <th>Punished</th>
                                       
                                    </tr>
                               </thead>
                               <tbody>

                          
         <?php foreach ($crimes as $crime) : ?>
   
                               <tr>
                                    <td><?php echo $crime->note; ?></td>
                                    <td><?php echo $crime->datum; ?></td>
                                    <td><?php echo $crime->punished; ?></td>
                                    
                               </tr>

                         <?php    endforeach; ?>

                               </tbody>

                           </table> <!-- End of table -->

                           <?php } else {?>

                           <h1>This creature is innocent</h1>


                           <?php }?>

	



<?php } elseif (!empty($id) && $constr =='Notes') {
	# code...

	

$query = "SELECT * FROM notes WHERE creature_id={$id} ";


if(Note::count($query) > 0) {

  $notes = Note::find_by_query($query); ?>



<table>
                                <thead>
                                    <tr>
                                       <th>Note</th>
                                       <th>Date</th>
                                      
                                       
                                    </tr>
                               </thead>
                               <tbody>

                          
         <?php foreach ($notes as $note) : ?>
   
                               <tr>
                                    <td><?php echo $note->note; ?></td>
                                    <td><?php echo $note->datum; ?></td>
                                   
                                    
                               </tr>

                         <?php    endforeach; ?>

                               </tbody>

                           </table> <!-- End of table -->
<?php } else { ?>

<h1>There aren't any notes for this creature</h1>


<?php } ?>

	

<?php
} elseif ($order ==='alphabet') {

	$query = "SELECT * FROM creatures ORDER BY name ";

	$creatures = Creature::find_by_query($query); 

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
                                       <th>Crimes against Sauron<button id="with_crimes">With crimes<br>against Sauron</button><br><input type="text" id="crimes_num" style="width: 14%;
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

                           

                           <?php } elseif ($order ==='birth_date') {

	$query = "SELECT * FROM creatures ORDER BY birth_date ";

	$creatures = Creature::find_by_query($query); 

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
                                       <th>Crimes against Sauron<button id="with_crimes">With crimes<br>against Sauron</button><br><input type="text" id="crimes_num" style="width: 14%;
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

                           

                       <?php } elseif(!empty($order) && !empty($text)){

                $query = "SELECT * FROM creatures WHERE race='{$order}' ";

  $creatures = Creature::find_by_query($query); 

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
                                       <th>Crimes against Sauron<button id="with_crimes">With crimes<br>against Sauron</button><br><input type="text" id="crimes_num" style="width: 14%;
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
                           <?php } ?>