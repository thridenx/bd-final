<?php

    require('init.php');
    include 'sessao.php';
    $_SESSION['team_id'] = $_POST['team_id'];
    include 'team-session.php';
//TEXTO MENSAGEM
$text=$_POST["chatText"];

error_reporting(E_ALL);
mysqli_query($db_select, 'SET AUTOCOMMIT=0');
    
if ($text!=''){
    $query_get_chat="SELECT chat_id FROM team WHERE team_id=".$team_id.";";
    $result_get_chat = mysqli_query($db_select, $query_get_chat);
    $array= array();
        while($count=mysqli_fetch_array($result_get_chat)){
            array_push($array, $count); 
        }
        if (sizeof($array) == 1) {
            $chat_id  = htmlentities((int) $array[0][0], ENT_COMPAT, 'UTF-8');
            $inserirTexto="INSERT INTO messages(chat_id, message, user_id)
            VALUES ('".$chat_id."','".$text."', '".$user_id."');";
            $result_inserirTexto = mysqli_query($db_select, $inserirTexto);
            if ($result_inserirTexto){
                mysqli_query($db_select, "COMMIT");
                echo '<meta http-equiv="refresh" content="0; URL=team-view.php?team_id='.$team_id.'">'; 
            } 
        } else{ 
            //echo 'ROLLBACK cenas'; 
            mysqli_query($db_select, "ROLLBACK"); 
        } 
} 
?>