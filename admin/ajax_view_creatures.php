<?php require_once "includes/init.php";?>

<?php 

$id = $_POST['id'];
$constr = $_POST['constr'];

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
}

 ?>