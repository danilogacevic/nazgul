<?php require_once "includes/header.php";?>



<?php if(!$session -> is_signed_in()){ redirect("index.php");}?>

<?php 
    $creature = new Creature();
    $crime = new Crime();
    $note = new Note();

    if(isset($_POST['create'])){

        

        if($creature){

            $creature->name=$_POST['name'];
            $creature->gender=$_POST['gender'];
            $creature->birth_place=$_POST['birth_place'];
            $creature->birth_date=$_POST['birth_date'];
            $creature->ever_carried_ring=$_POST['ever_carried_ring'];
            $creature->enslaved_by_sauron=$_POST['enslaved_by_sauron'];
           
            $creature->create();
            // $session->message("The creature {$creature->name} has been created");
            // session_destroy();
            // redirect("index.php");
            $creature_id = $database->the_insert_id();
        }

        if($crime) {

            $mi = new MultipleIterator();
            $mi->attachIterator(new ArrayIterator($_POST['crime_note']));
            $mi->attachIterator(new ArrayIterator($_POST['crime_date']));
            $mi->attachIterator(new ArrayIterator($_POST['punished_by_sauron']));

            foreach ( $mi as $value ) {
            list($_POST['crime_note'], $_POST['crime_date'], $_POST['punished_by_sauron']) = $value;


            $crime->creature_id=$creature_id;
            $crime->note = $_POST['crime_note'];
            $crime->datum = $_POST['crime_date'];
            $crime->punished = $_POST['punished_by_sauron'];
            $crime->create();
        }

            
             
        }

        if($note) {

            $vi = new MultipleIterator();
            $vi->attachIterator(new ArrayIterator($_POST['note_date']));
            $vi->attachIterator(new ArrayIterator($_POST['note']));
            
            foreach ( $vi as $value ) {

            list($_POST['note_date'], $_POST['note']) = $value;


            $note->creature_id=$creature_id;
            $note->datum = $_POST['note_date'];
            $note->note = $_POST['note'];
            
           
            $note->create();
        }

            
             session_destroy();
             redirect("index.php");
        }


    	
        
    }



 ?>


<h1 style="text-align: center;">Nazgul form</h1>

<form action="" style="text-align: center; " method="post">
	
                      
							<div style="width: 25%;text-align: center;margin-left: 25%;">

       
                               
                                <div >

                                    <label for="name" class="">Name</label>
                                    <input type="text"  name="name">

                                </div>

                                <div >

                                    <label for="gender">Gender</label>
                                    <select name="gender">
									  <option value="male">Male</option>
									  <option value="female">Female</option>
									  <option value="unknown">Unknown</option>
									  <option value="other">Other</option>
									</select>

                                </div>
                              
                                <div >

                                    <label for="birth_place">Place of birth</label>
                                    

                                 <input type="text" name="birth_place" id="birth_place" onkeyup="myFunction(); return false;">
                                 <div id="javas" style="position: absolute;top: 11%;left: 45%;"></div>

                                </div>

                                <div >

                                    <label for="birth_date">Date of birth</label>
                                    <input type="date"  name="birth_date">

                                </div>

                                 <div >

                                    <label for="ever_carried_ring">Ever carried the ring ? </label>
                                
                                    <input type="checkbox" name="ever_carried_ring" value="1">

                                </div>

                                <div >

                                    <label for="enslaved_by_sauron">Enslaved by Sauron ? </label>
                                
                                    <input type="checkbox" name="enslaved_by_sauron" value="1">

                                </div>

                                <div >

                                    <label for="race">Race</label>
                                    <select name="race">
									  <option value="elf">Elf</option>
									  <option value="dwarf">Dwarf</option>
									  <option value="hobbit">Hobbit</option>
									  <option value="orc">Orc</option>
									  <option value="human">Human</option>
									  <option value="ghost">Ghost</option>
									  <option value="other">Other</option>
									</select>

                                </div>

                                <div id="duplicater">

                                    <label for="crime_date">Crimes against Sauron </label>

                                    <input type="date"  name="crime_date[]">

                                    <input type="textarea" class="" name="crime_note[]">
                                
                                   
                                    <select name="punished_by_sauron[]">
                                      <option value="0">Not punished</option>
                                      <option value="1">Punished</option>
                                    </select>



                                </div>
                                <a  id="add_crime" href="javascript:void(0);">Add crime</a>

                                <div id="note">

                                    <label for="note_date">Notes </label>

                                    <input type="date"  name="note_date[]">

                                    <input type="textarea" class="" name="note[]">
                                
                                    

                                </div>
                                <a  id="add_note" href="javascript:void(0);">Add note</a>

                                <div >

                                    <input type="submit"  name="create" value="submit">

                                </div>
                                

                            </div>
</form>


<script>

	function myFunction()
{
  

    var http = new XMLHttpRequest();


    var url = "get_birth_place.php";

var data = document.getElementById("birth_place").value;
http.open("POST", url, true);

//Send the proper header information along with the request
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
http.setRequestHeader("Content-length", data.length);
http.setRequestHeader("Connection", "close");

http.onreadystatechange = function() {//Call a function when the state changes.
	if(http.readyState == 4 && http.status == 200) {
		document.getElementById("javas").innerHTML =http.responseText;
	}
}
http.send("data="+data);
}

function hey () {


	document.getElementById('birth_place').value=document.getElementById('chose-place').innerHTML;

	document.getElementById('chose-place').style.display='none';
}


var i = 0;
var original = document.getElementById('duplicater');
var original_note = document.getElementById('note');

function duplicate() {
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "duplicater" + ++i;
    // or clone.id = ""; if the divs don't need an ID
    // original.appendChild(clone);

    insertAfter(clone,original);

    
}

function duplicate_note() {
    var clone = original_note.cloneNode(true); // "deep" clone
    clone.id = "duplicater" + ++i;
    // or clone.id = ""; if the divs don't need an ID
    // original.appendChild(clone);

    insertAfter(clone,original_note);

    
}

function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

document.getElementById("add_crime").onclick = duplicate;
document.getElementById("add_note").onclick = duplicate_note;








</script>