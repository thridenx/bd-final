<?php 
    
    require('init.php');
    if(!isset($_SESSION['meeting_id'])) {  
            echo '<meta http-equiv="refresh" content="0; URL=homepage.php">';
        }else{   
            $meeting_id = $_SESSION['meeting_id'];
            echo $meeting_id.'from inside';
            $meeting_query = "SELECT user_id, team_id, chat_id, name, date, time, creation, active FROM meeting WHERE meeting_id = ".$meeting_id.";";
            $result_meeting_query = mysqli_query($db_select, $meeting_query);
            if($result_meeting_query){
                $meeting_details = array();
                while($count = mysqli_fetch_array($result_meeting_query)) {
                    array_push($meeting_details, $count);
                }

                if(sizeof($meeting_details) == 1) {
                        $creatorname = htmlentities((string) $meeting_details[0][0], ENT_COMPAT, 'UTF-8');
                        $meeting_team_id = htmlentities((string) $meeting_details[0][1], ENT_COMPAT, 'UTF-8');
                        $meeting_chat_id = htmlentities((string) $meeting_details[0][2], ENT_COMPAT, 'UTF-8');
                        $meeting_name = htmlentities((string) $meeting_details[0][3], ENT_COMPAT, 'UTF-8');
                        $meeting_date = htmlentities((string) $meeting_details[0][4], ENT_COMPAT, 'UTF-8');
                        $meeting_creation_timestamp = htmlentities((string) $meeting_details[0][5], ENT_COMPAT, 'UTF-8');
                        $meeting_active = htmlentities((string) $meeting_details[0][5], ENT_COMPAT, 'UTF-8');
                }
            }
        }
    ?>