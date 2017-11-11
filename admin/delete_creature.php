<?php require_once "includes/init.php";?>

<?php


if(isset($_POST['id'])){

$id=$_POST['id'];


$creature = Creature::find_by_id($id);

$creature->delete();

$creatures = Creature::find_all();
	?>
<div id="creatures">
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
                                       <th>Created_at</th>
                                      
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
                                    <td><?php echo $creature->reg_date ?></td>
                                    <td><a class="delete" href="javascript:void(0);" rel="<?php echo $creature->id; ?>" >Delete</a></td>
                                    

                               </tr>

                         <?php    endforeach; ?>

                               </tbody>

                           </table> <!-- End of table -->

                           <?php } ?>