<?php
require('init.php');

/* WHAT*/

$username = $_POST['username'];
$password = $_POST['password'];

if ($username=='' or $password==''){ //Certificar mesmo que não acontece 
    echo 'Username e Password têm de ser preenchidos!
    <meta http-equiv="refresh" content="2; URL=index.php">';
}
else{
    $sql = "SELECT user_id, sex  FROM user WHERE username = '".$username."' and password = '".$password."' ";
    $result = mysqli_query($db_select, $sql);

    if ($result){
        $array= array();
        while($count =mysqli_fetch_array($result)){
            array_push($array, $count); 
        }

        if (sizeof($array) == 1) { 

            $user_id  = htmlentities((string) $array[0][0], ENT_COMPAT, 'UTF-8'); //primeira coluna
            $sex= htmlentities((string) $array[0][1], ENT_COMPAT, 'UTF-8'); //segunda

            //echo  $user_id.'<br>';
            //echo $username;
            session_start();
            $_SESSION['user_id']= $user_id;
            $_SESSION['username']= $username;

            echo '<meta http-equiv="refresh" content="0; URL=homepage.php">';
        }

        else{
          header("Location: naoexiste.php");
        }
    }else{
        echo 'nao consegue selecionar';
  }
}
?>