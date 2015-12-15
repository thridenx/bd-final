<?php 
    require('ref.php');
    require('init.php');
    require('dadosEquipa.php');
    include 'sessao.php';
    $_SESSION['team_id'] = $_GET['team_id'];
    include 'team-session.php';

    $user_id_selected = $_POST['user_id'];    
    echo $user_id_selected;
    $addtoteam_query = "INSERT into team_user (team_id, user_id) VALUES ('".$team_id."', '".$user_id_selected."');";

    $result_add = mysqli_query($db_select,$addtoteam_query);
        if($result_add) {
            echo 'COMMIT';
            mysqli_query($db_select, "COMMIT");
            echo $team_id;
            echo $user_id_selected;
            //echo '<meta http-equiv="refresh" content="0; URL=team-view.php">';
        }else{
            mysqli_query($db_select, "ROLLBACK");
            echo '<meta http-equiv="refresh" content="0; URL=erro_inserir_naequipa.php">';
        }

    
    ?>