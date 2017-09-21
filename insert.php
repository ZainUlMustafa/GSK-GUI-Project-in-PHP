<?php

    //session_start();
    $db = mysqli_connect("localhost", "root", "", "a_database");
    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $first_name = mysqli_real_escape_string($db, $_REQUEST['firstname']);
    $second_name = mysqli_real_escape_string($db, $_REQUEST['secondname']);
    $user_name = mysqli_real_escape_string($db, $_REQUEST['username']);
    $pass_word = mysqli_real_escape_string($db, $_REQUEST['password']);
    $cpass_word = mysqli_real_escape_string($db, $_REQUEST['cpassword']);

    if ($pass_word == $cpass_word) {
        session_start();
        //$pass_word = md5($pass_word);
        //$encrypt_password = password_hash($pass_word, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (firstname, secondname, username, password) VALUES ('$first_name', '$second_name', '$user_name', '$pass_word')";
        //$sql = "INSERT INTO users (firstname, secondname, username, password) VALUES ('$first_name', '$second_name', '$user_name', '$encrypt_password')";

        if(mysqli_query($db, $sql)){
            //echo "Records added successfully.";
            $_SESSION['message'] = "Registration successful!";
            $_SESSION['username'] = $user_name . ', please login with your credentials to access the database!';
        } else{
            $_SESSION['message'] = "ERROR: Could not able to execute $sql." . mysqli_error($db);
        }
    }else{
        // passwords dont match
        $_SESSION['message'] = "The two passwords don't match!";
        //echo "The two passwords don't match";
        $_SESSION['username'] = "user, please contact the admin or register again!";
    }


	/*$sql = "INSERT INTO users (firstname, secondname, username, password) VALUES ('$first_name', '$second_name', '$user_name', '$pass_word')";

    if(mysqli_query($db, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }*/

    mysqli_close($db);

?>



<!DOCTYPE html>
<html>
<head>
    <title>Information about Registration</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class='header'>
    <p> 
    <img class='logo' src='media/GSKlogo.png' align='left'/> <a href='index.php' class="regLog"> Register </a>or <a href='login.php' class="regLog"> Login </a></p>
</div>

<h2><?php echo $_SESSION['message']?></h2>
<div class='container'>
    <p>Dear <?php echo $_SESSION['username'] ?></p>
</div>

</body>
</html>

