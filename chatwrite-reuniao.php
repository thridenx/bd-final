<?php
    require('init.php');
    include 'sessao.php';
    include 'team-session.php';
    $_SESSION['meeting_id'] = $_POST['meeting_id'];
    include 'meeting-session.php';
//TEXTO MENSAGEM
$text=$_POST["chatText"];
error_reporting(E_ALL);
mysqli_query($db_select, 'SET AUTOCOMMIT=0');

    $query_get_chat="SELECT chat_id FROM meeting WHERE meeting_id=".$meeting_id.";";
    
    echo $query_get_chat;
    $result_get_chat = mysqli_query($db_select, $query_get_chat);
    $array= array();
        while($count=mysqli_fetch_array($result_get_chat)){
            array_push($array, $count); 
            
        }
    
        if (sizeof($array) == 1) { 
            $chat_id  = htmlentities((int) $array[0][0], ENT_COMPAT, 'UTF-8');
            $inserirTexto="INSERT INTO messages(chat_id, message, user_id) VALUES ('".$chat_id."','".$text."', '".$user_id."');";
            $result_inserirTexto = mysqli_query($db_select, $inserirTexto);
            if ($result_inserirTexto){
                mysqli_query($db_select, "COMMIT");
                echo '<meta http-equiv="refresh" content="0; URL=meeting-room.php?meeting_id='.$meeting_id.'">';
            }
        }
	else{
		//echo 'ROLLBACK cenas';
		mysqli_query($db_select, "ROLLBACK");
	}

?>