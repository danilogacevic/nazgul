<?php require_once "includes/header.php";?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mordor</title>





    <link rel="stylesheet" href="css/style.css" class="">

</head>

<body>



<?php 



    if($session -> is_signed_in()){
        
        redirect("form.php");
        
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        if(isset($_POST['create']) && $_POST['create'] === 'add'){
        
       
        $password = clean($_POST['password']);
        $username = $_SESSION['feature'] = 'add_creature';
    

// Metod to check database user
        
    $user_found = User::verify_user($password,$username);


        if($user_found){

            $session -> login($user_found);
            redirect("form.php");
        } else {

            $poruka = "Your password or username is incorrect";


        }
        
        
    } else if(isset($_POST['create']) && $_POST['create'] === 'view') {

            $password = clean($_POST['password']);
            $username = $session->feature = $_SESSION['feature'] ='view_creature';
            $user_found = User::verify_user($password,$username);


        if($user_found){

            $session -> login($user_found);
            redirect("admin/view_creatures.php");
        } else {

            $poruka = "Your password or username is incorrect";


        }



    } else {

        $poruka="";
    }

 
} else {
    $poruka="";
}

    


?>

<div class="login">
   
   <p><?php echo $session->message; ?></p>
   <p><?php echo $poruka; ?></p>
    
    <form action="" id="login-id" method="post">
        
 
        
        <div class="form-group">
            
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="">
            
        </div>

       

        <div class="form-group">
            <select name="create" required>
                        <option value="">Action</option>
                      <option value="add">Add creature</option>
                      <option value="view">View creatures</option>
            </select>
        </div>
        
        <div class="form-group">
           
            <input type="submit" class="" value="Enter">
            
            
        </div>
        
        
    </form>
    
</div>

    
</body>
</html>



