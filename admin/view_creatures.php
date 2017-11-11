<?php require_once("includes/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
<!--     <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
<!--     <link href="css/blog-home.css" rel="stylesheet"> -->



    <link rel="stylesheet" href="../css/style.css" class="">

</head>

<body>



<?php if($session -> is_signed_in() && $session ->feature() == 'view_creature'){

  $session->logout();

	$creatures = Creature::find_all();

   
  //session_destroy();

} else {

    $session->logout();
     redirect("../index.php");

 }



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




                        </div>

                        <div id="crimes"></div>

                        


        
    </body>

    <script>


// call funciton crimes on click crimes,notes and filters

window.onload = function() {

        var anchors = document.getElementsByTagName('a');
          for(var i = 0; i < anchors.length; i++) {
              var anchor = anchors[i];
              if(("notecrim").match(anchor.className)) {
                  anchor.onclick = crimes;
              } else if(("delete").match(anchor.className)){

                  anchor.onclick = delete_creature;
              }
          }

        var selects = document.getElementsByTagName('select');

          for(var i = 0; i < selects.length; i++) {
              var select = selects[i];
              if(("order").match(select.className)) {
                  select.onchange = order;
              }
          }

        document.getElementById("with_crimes").onclick=creatures_with_crimes;

      }

        
// display crimes and notes

function crimes () {

            console.log(this.text);

             var http = new XMLHttpRequest();


var url = "ajax_view_creatures.php";



var id = this.rel;
var constr = this.text;

var  data = 'id='+id+'&constr='+constr;

http.open("POST", url, true);

//Send the proper header information along with the request
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// http.setRequestHeader("Content-length", data.length);
// http.setRequestHeader("Connection", "close");

http.onreadystatechange = function() {//Call a function when the state changes.
  if(http.readyState == 4 && http.status == 200) {
    document.getElementById("crimes").innerHTML =http.responseText;

    // alert(http.responseText);
  }
}
http.send(data);
        }


// order alphabetically 

function order() {

   // console.log(this.options[this.selectedIndex].innerHTML);

  // var script = document.getElementsByTagName("script")[0];

  var data = this.options[this.selectedIndex].value;
  var text = this.options[this.selectedIndex].innerHTML;

  var http = new XMLHttpRequest();


var url = "ajax_view_creatures.php";

http.open("POST", url, true);

//Send the proper header information along with the request
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// http.setRequestHeader("Content-length", data.length);
// http.setRequestHeader("Connection", "close");

http.onreadystatechange = function() {//Call a function when the state changes.
  if(http.readyState == 4 && http.status == 200) {
    document.getElementById("creatures").innerHTML =http.responseText;
    document.getElementById("crimes").innerHTML='';

    window.onload();
  }
}
http.send('order='+data+'&text='+text);

}

function creatures_with_crimes() {

  var http = new XMLHttpRequest();


var url = "creatures_with_crimes.php";



var limit = document.getElementById('crimes_num').value;


// var  data = 'id='+id+'&constr='+constr;

http.open("POST", url, true);

//Send the proper header information along with the request
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// http.setRequestHeader("Content-length", data.length);
// http.setRequestHeader("Connection", "close");

http.onreadystatechange = function() {//Call a function when the state changes.
  if(http.readyState == 4 && http.status == 200) {
    document.getElementById("creatures").innerHTML =http.responseText;
    document.getElementById("crimes").innerHTML='';
     window.onload();
    // alert(http.responseText);
  }
}
http.send('limit='+limit);
}

function delete_creature(){

  var http = new XMLHttpRequest();


var url = "delete_creature.php";

var id = this.rel;


// var  data = 'id='+id+'&constr='+constr;

http.open("POST", url, true);

//Send the proper header information along with the request
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// http.setRequestHeader("Content-length", data.length);
// http.setRequestHeader("Connection", "close");

http.onreadystatechange = function() {//Call a function when the state changes.
  if(http.readyState == 4 && http.status == 200) {
    document.getElementById("creatures").innerHTML =http.responseText;
    document.getElementById("crimes").innerHTML='';
     window.onload();
     // console.log('yueahhhhh');
    // alert(http.responseText);
  }
}
http.send('id='+id);
}

        
    </script>