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
} else {
  $text='';
}


if(isset($id) && $constr === 'Crimes') { ?>


  <table>
                                <thead>
                                    <tr>
                                       <th>Note</th>
                                       <th>Date</th>
                                       <th>Punished</th>
                                       
                                    </tr>
                               </thead>
                               <tbody>

                          <?php echo crimes($id); ?>
     

                               </tbody>

                           </table> <!-- End of table -->

 

<?php } elseif (isset($id) && $constr === 'Notes') {?>

<table>
                                <thead>
                                    <tr>
                                       <th>Note</th>
                                       <th>Date</th>
                                      
                                       
                                    </tr>
                               </thead>
                               <tbody>

                          <?php echo notes($id); ?>
       

                               </tbody>

                           </table> <!-- End of table -->


	

<?php } elseif (isset($order)) {

?>

 <table>
                                <thead>
                                    <tr>
                                       <th>Name <select class="order">
                                      <option value="0">All</option>
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
                                       <th>Created_at</th>
                                    </tr>
                               </thead>
                               <tbody>

                      <?php echo order($order,$text); ?>
                         

                               </tbody>

                           </table> <!-- End of table -->
                           <?php } ?>