<?php
    require('init.php');
    include 'sessao.php';
    $teamname=$_POST['teamname'];
    $workfield=$_POST['workfield'];
    $skills=$_POST['skills'];
    error_reporting(E_ALL);
    mysqli_query($db_select, 'SET AUTOCOMMIT=0');
    $verificar = "SELECT * FROM team WHERE name = '".$teamname."'";
    $result = mysqli_query($db_select,$verificar);
    $array2= array();
    while($check2 = mysqli_fetch_array($result)){
        array_push($array2, $check2); 
    }
    if (sizeof($check2) >= 1) {
        echo "<script language='javascript' type='text/javascript'>alert('Nome de equipa já existente!');window.location.href='registo.php';</script>";	
    }else{
        
        
        
        //cria um chat
        $insert_chat = "INSERT INTO chat(name) VALUES ('".$teamname."_chat')";
        $result_inserir_chat = mysqli_query($db_select, $insert_chat);
        
        if($result_inserir_chat){
        
            if (mysqli_query($db_select, $insert_chat)) {
                $last_id = mysqli_insert_id($db_select);
            }
        
            if ($last_id!=''){
                $array= array();
                while($count =mysqli_fetch_array($check)){
                    array_push($array, $count); 
                }
                $chat_id =$array[0][0];
                
                $insert_team = "INSERT into team(name, chat_id, workfield, skills)
                VALUES ('".$teamname."', '".$last_id."', '".$workfield."' , '".$skills."')";
                if (mysqli_query($db_select, $insert_team)) {
                    $team_id = mysqli_insert_id($db_select);
                }
                $result_insert_team = mysqli_query($db_select,$insert_team);
                if($result_insert_team){
                    $add_relationship ="INSERT into team_user( team_id, user_id)
                    VALUES('".$team_id."', '". $user_id."') ";
                     $result_add_relationship = mysqli_query($db_select,$add_relationship);
                    if($result_add_relationship){
                        mysqli_query($db_select, "COMMIT");
                        echo '<meta http-equiv="refresh" content="0; URL=team-view?team_id='".$team_id."'.php">';
                    }else{
                        mysqli_query($db_select, "ROLLBACK");
                        echo 'erro na ultima merda #pobres :(';
                    }
                }else{
                    mysqli_query($db_select, "ROLLBACK");
                    echo 'erro a criar team';
                }
            }else{
                mysqli_query($db_select, "ROLLBACK");
                echo 'erro a buscar id do chat';
            }
        }else{
            mysqli_query($db_select, "ROLLBACK");
            echo 'erro a inserir chat, erro';
        }
    }
?>