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

   

} else {

    session_destroy();
     redirect("../index.php");

 }



	?>

    <div class="col-md-12">
                           <table class="table table-hover">
                                <thead>
                                    <tr>
                                       <th>Name</th>
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
                                    <td><a href="javascript:void(0);" rel="<?php echo $creature->id; ?>">Crimes</a></td>
                                    <td><a href="" class="notes" rel="<?php echo $creature->id; ?>">Notes</a></td>

                               </tr>

                         <?php    endforeach; ?>

                               </tbody>

                           </table> <!-- End of table -->




                        </div>

                        


        
    </body>

    <script>
        

        function crimes () {

            console.log(this.rel);
        }

        window.onload = function() {
        var anchors = document.getElementsByTagName('a');
        for(var i = 0; i < anchors.length; i++) {
            var anchor = anchors[i];
            if(("crimes").match(anchor.className)) {
                anchor.onclick = crimes;
            }
        }
    }

        // document.getElementById('crimes').onclick=crimes;
    </script>