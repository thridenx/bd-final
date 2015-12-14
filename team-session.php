<?php 
    
    require('init.php');
    if(!isset($_SESSION['team_id'])) {  
            echo '<meta http-equiv="refresh" content="0; URL=homepage.php">';
        }else{   
            $team_id = $_SESSION['team_id'];
            $team_query = "SELECT name, chat_id, workfield, skills FROM team WHERE team_id = ".$team_id.";";
            $result_team_query = mysqli_query($db_select, $team_query);
            if($result_team_query){
                $team_details = array();
                while($count = mysqli_fetch_array($result_team_query)) {
                    array_push($team_details, $count);
                }

                if(sizeof($team_details) == 1) {
                        $teamname = htmlentities((string) $team_details[0][0], ENT_COMPAT, 'UTF-8');
                        $team_chat_id = htmlentities((string) $team_details[0][1], ENT_COMPAT, 'UTF-8');
                        $workfield = htmlentities((string) $team_details[0][2], ENT_COMPAT, 'UTF-8');
                        $skills = htmlentities((string) $team_details[0][3], ENT_COMPAT, 'UTF-8');
                }
            }
        }
    ?>