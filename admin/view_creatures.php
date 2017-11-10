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

	$creatures = Creature::find_all();

   
  //session_destroy();

} else {

    session_destroy();
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
                                      <option value="Elf">Elf</option>
                                      <option value="Dwarf">Dwarf</option>
                                      <option value="Hobbit">Hobbit</option>
                                      <option value="Orc">Orc</option>
                                      <option value="Human">Human</option>
                                      <option value="Ghost">Ghost</option>
                                      <option value="Other">Other</option>
                                    </select></th>
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
                                    <td><?php echo $creature->race; ?></td>
                                    <td><a href="javascript:void(0);" class="notecrim" rel="<?php echo $creature->id; ?>">Crimes</a></td>
                                    <td><a href="javascript:void(0);" class="notecrim" rel="<?php echo $creature->id; ?>">Notes</a></td>

                               </tr>

                         <?php    endforeach; ?>

                               </tbody>

                           </table> <!-- End of table -->




                        </div>

                        <div id="crimes"></div>

                        


        
    </body>

    <script>
        
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

// call funciton crimes on click crimes or notes

window.onload = function() {
        var anchors = document.getElementsByTagName('a');
        for(var i = 0; i < anchors.length; i++) {
            var anchor = anchors[i];
            if(("notecrim").match(anchor.className)) {
                anchor.onclick = crimes;
            }
        }

        var selects = document.getElementsByTagName('select');

        for(var i = 0; i < selects.length; i++) {
            var select = selects[i];
            if(("order").match(select.className)) {
                select.onchange = order;
            }
        }

      }



// order alphabetically 

function order() {

  // console.log(order);

  // var script = document.getElementsByTagName("script")[0];

  var data = this.options[this.selectedIndex].value;

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

    window.onload();
  }
}
http.send('order='+data);

}

        
    </script>