<?php require_once "includes/init.php";?>


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
                                       <th>Crimes against Sauron <button id="with_crimes">With crimes<br>against Sauron</button><br><input type="text" id="crimes_num" style="width: 14%;
    margin: 2% 0% 4% 62%;"></th>
                                       <th>Notes</th>
                                    </tr>
                               </thead>
                               <tbody>

<?php echo creatures_with_crimes($_POST['limit'],"SELECT DISTINCT creature_id FROM crimes"); ?>
        

                               </tbody>

                           </table> <!-- End of table -->



                           





