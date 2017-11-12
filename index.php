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

//session_destroy();

    if($session -> is_signed_in()){
        
        redirect("form.php");
        
    }

    if(isset($_POST['create'])){
        
       
        $password = trim($_POST['password']);
    
    

// Metod to check database user
        
    $user_found = User::verify_user($password);


        if($user_found){

            $session -> login($user_found);
            redirect("form.php");
        } else {

            $message = "Your password or username is incorrect";


        }
        
        
    } else if(isset($_POST['view'])) {

            $password = trim($_POST['password']);
            $user_found = User::verify_user($password);


        if($user_found){

            $session -> login($user_found);
            redirect("admin/view_creatures.php");
        } else {

            $message = "Your password or username is incorrect";


        }



    }

    else {
        
        $username = "";
        $password = "";
        $message  = "";
        
    }


?>

<div class="login">
   
   <p><?php echo $session->message; ?></p>
   <p><?php echo $message; ?></p>
    
    <form action="" id="login-id" method="post">
        
 
        
        <div class="form-group">
            
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
            
        </div>
        
        <div class="form-group">
           
            <input type="submit" class="" name="create" value="Create creature">
            <input type="submit" class="" style="margin-left: 9%;" name="view" value="View creatures">
            
        </div>
        
        
    </form>
    
</div>

    
</body>
</html>



