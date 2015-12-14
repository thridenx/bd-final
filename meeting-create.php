<?php
    require('init.php');
    include 'sessao.php';
    $_SESSION['team_id'] = $_POST['team_id'];
    include 'team-session.php';
    echo $teamname;
    $meetingname=$_POST['meetingname'];
    $date=$_POST['meetingdate'];
    $time=$_POST['meetingtime'];
    error_reporting(E_ALL);
    mysqli_query($db_select, 'SET AUTOCOMMIT=0');
    $verificar = "SELECT * FROM meeting WHERE name = '".$meetingname."';";
    $result = mysqli_query($db_select, $verificar);
    $array3= array();
    while($check3 = mysqli_fetch_array($result)){
        array_push($array3, $check3); 
    } 
    if (sizeof($array3) >= 1) {
        echo "<script language='javascript' type='text/javascript'>alert('Nome de reunião já existente!');window.location.href='registo.php';</script>";    
    } else {
        
        //cria um chat
        $insert_meeting_chat = "INSERT INTO chat(name) VALUES ('".$meetingname."_chat');";
        $result_inserir_chat = mysqli_query($db_select, $insert_meeting_chat);
        
        
        if($result_inserir_chat){
            if (mysqli_query($db_select, $insert_meeting_chat)) {
                $last_chat_id = mysqli_insert_id($db_select);
            }
            
            if ($last_chat_id!=''){
                echo $team_id.' — team_id';
                echo $user_id;
                $insert_meeting ="INSERT INTO meeting(user_id, team_id, chat_id, name, date, time) 
                    VALUES ('".$user_id."', '".$team_id."','".$last_chat_id."', '".$meetingname."', '".$date."',  '".$time."');";
                $result_inserir_meeting = mysqli_query($db_select, $insert_meeting);
                var_dump($result_inserir_meeting);
                if($result_inserir_meeting) {
                    mysqli_query($db_select, "COMMIT");
                echo '<meta http-equiv="refresh" content="0; URL=team-view.php?team_id='.$team_id.'">';
                }
                    
                } else {
                    mysqli_query($db_select, "ROLLBACK");
                    echo 'erro a obter id de equipa, erro';
                }
                
            } else {
            mysqli_query($db_select, "ROLLBACK");
            echo 'erro a inserir chat de reunião, erro';
            }
        }
    
?>