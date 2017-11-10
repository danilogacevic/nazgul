<?php require_once "includes/init.php";?>

<?php 

if(isset($_POST['id']) && isset($_POST['constr'])) {

	$id = $_POST['id'];
	$constr = $_POST['constr'];

}

if(isset($_POST['order'])){

	$order = $_POST['order'];
}


if(!empty($id) && $constr=='Crimes') {

	$query = "SELECT * FROM crimes WHERE creature_id={$id} ";

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



<?php } elseif (!empty($id) && $constr =='Notes') {
	# code...

	

$query = "SELECT * FROM notes WHERE creature_id={$id} ";

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









<?php
} elseif ($order =='alphabet') {

	$query = "SELECT * FROM creatures ORDER BY name ";

	$creatures = Creature::find_by_query($query); 

?>

 <table>
                                <thead>
                                    <tr>
                                       <th>Name <select id="order">
                                      <option value="0">Order by</option>
                                      <option value="alphabet">A-Z</option>
                                    </select></th>
                                       <th>Gender</th>
                                       <th>Place of birth</th>
                                       <th>Date of birth</th>
                                       <th>Ever carried The ring ?</th>
                                       <th>Enslaved by Sauron</th>
                                       <th>Race</th>
                                       <th>Crimes against Sauron</th>
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
                                    <td><?php echo $creature->ever_carried_ring; ?></td>
                                    <td><?php echo $creature->enslaved_by_sauron; ?></td>
                                    <td><?php echo $creature->name; ?></td>
                                    <td><a href="javascript:void(0);" class="notecrim" rel="<?php echo $creature->id; ?>">Crimes</a></td>
                                    <td><a href="javascript:void(0);" class="notecrim" rel="<?php echo $creature->id; ?>">Notes</a></td>

                               </tr>

                         <?php    endforeach; ?>

                               </tbody>

                           </table> <!-- End of table -->

                           

                           <?php } ?>