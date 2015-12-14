<?php
require('init.php');
require('ref.php');
include 'sessao.php';

?>
    <html>

    <body>
        <?php include 'header.php'?>
            <div class="container row">
                <div id="new-team" class="row center  col-md-6">
                    <form id="registo-equipa" action="team-create.php" method="post">
                        <h3>Registar uma nova equipa</h3>
                        <input name="teamname" class="registar_team" type="text" placeholder="* teamname" required>
                        <input name="workfield" class="registar_team" type="text" placeholder="* workfield" required>
                        <input name="skills" class="registar_team" type="text" placeholder="* Write your team skills" required>
                        <input class=" btn indigo accent-4 button7_input centrar" type="submit" value="Registar">
                </div>


                <div id="teamselection" class="row col-md-6 center">
                    <h3>Entrar numa equipa existente</h3>
                    <a class='dropdown-button indigo accent-4 btn' href='#' data-activates='dropdown1'>Equipas</a>
                    <ul id='dropdown1' class='dropdown-content'>
                        <?php
            
            require('init.php');
            require('ref.php');
        
            session_start();
            if(!isset($_SESSION['user_id'])) {  
            }else{   
               $username= $_SESSION['username'];
               $user_id=$_SESSION['user_id'];
            }
        
            $sql_get_teams = "SELECT user.name, team.name, team.team_id FROM user, team, team_user WHERE user.user_id=".$user_id." AND user.user_id = team_user.user_id AND team_user.team_id = team.team_id;";
             
        
            $results_found = mysqli_query($db_select, $sql_get_teams);
        
            if($results_found) {
                $array2 = array();
                while($count = mysqli_fetch_array($results_found)) {
                    array_push($array2, $count);
                }
                

                
                if (sizeof($array2) == 0) {
                    echo '<p>Não existem equipas.</p>';
                } else {
                    for ($i = 0; $i < sizeof($array2); $i++) {
                       $teamname = htmlentities((string) $array2[$i][1], ENT_COMPAT, 'UTF-8');
                        $team_id = htmlentities((string) $array2[$i][2], ENT_COMPAT, 'UTF-8');
                        echo '<li><a href="./team-view.php?team_id='.$team_id.'">'.$teamname.'</a></li>';
                    } 
                
                }                 
            } 
            ?>
                    </ul>
                </div>
            </div>
    </body>


    </html>