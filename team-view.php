<?php
    require('init.php');
    require('ref.php');
    include 'sessao.php';
    $_SESSION['team_id'] = $_GET['team_id'];
    include 'team-session.php';
?>


    <html>

    <body>
        <nav class="indigo accent-4 navbar-fixed">
    <div class="container-fluid nav-wrapper">
        <a class="brand-logo" href="homepage.php">
            slecky
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="perfilUser.php">meu perfil</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
         <h5 class="container-fluid nav-wrapper right hide-on-med-and-down"><a href="perfilTeam.php/team_id=<? echo $team_id; ?>">Equipa 
                        <?php echo $teamname.' '.$team_id.'  '; ?></a></h5>
    </div>
</nav>
            
        
            <div class="container">
            <br><br>
                <div class="row">
                    <div id="" class="teamchat col s4">
                        <h4>Chat</h4><br>
                        
                        <div id="chatOutput">
                            <?
                include 'chatread.php';
                ?>
                        </div>
                        <br>
                        <br>
                        <br>
                        <form id="chat" action="chatwrite.php" method="post">
                            <div class="row">
                                <input class="col s9" type="text" name="chatText" placeholder="type your text here" required>



                                <?php echo '<input type="hidden" name="team_id" value="'.$team_id.'"/>'; ?>

                                    <button class="indigo accent-4 btn col s2" id="chatSend">
                                        <i class="material-icons right">send</i>
                                    </button>
                            </div>
                        </form>
                    </div>

                    <div id="meetings-register" class="col s4">
                        <h4>Reuniões</h4>
                        <form class="form-group" id="meeting" action="meeting-create.php" method="post">
                            <br><br><h7>Criar reunião: </h7>
                            <input type="text" name="meetingname" placeholder="type the reunion name here" required>
                            <input type="date" class="datepicker" name="meetingdate" placeholder="select the date" required>
                            <input type="time" name="meetingtime" placeholder="select the time" required><br><br>
                            <input class="indigo accent-4 btn center" type="submit" id="entermeeting" value="Submit">
                            <?php echo '<input type="hidden" name="team_id" value="'.$team_id.'"/>'; ?>

                        </form>
                    </div>
                    <div id="schedule" class="col s4">
                        <br><br>
                        <div class="meeting-container col s12">
                            <div class="meeting-cards" id="future-meetings">
                                <br><br><br><br><p><p>Reuniões Futuras: </p>
                                <ul class="collapsible" data-collapsible="accordion">
                                    <?php

            $time = new DateTime('', new DateTimeZone('Europe/Lisbon')); 
            $time = $time->format('H:i');
            
            $sql_get_meeting = "SELECT meeting_id, meeting.name, date, time, user.name, team.name from meeting, user, team where date > CURDATE() AND time > CURTIME() AND team.team_id=meeting.team_id AND meeting.team_id = '".$team_id."' AND user.user_id = meeting.user_id;";
        
            $results_found = mysqli_query($db_select, $sql_get_meeting);
        
            if($results_found) {
                $array2 = array();
                while($count = mysqli_fetch_array($results_found)) {
                    array_push($array2, $count);
                }
                
                if (sizeof($array2) == 0) {
                    echo '<p>Não existem reuniões futuras.</p>';
                } else {
                    for ($i = 0; $i < sizeof($array2); $i++) {
                        $meetingid = htmlentities((string) $array2[$i][0], ENT_COMPAT, 'UTF-8');
                        $meetingname = htmlentities((string) $array2[$i][1], ENT_COMPAT, 'UTF-8');
                        $meetingdate = htmlentities((string) $array2[$i][2], ENT_COMPAT, 'UTF-8');
                        $meetingtime = htmlentities((string) $array2[$i][3], ENT_COMPAT, 'UTF-8');
                        echo '<li>';
                        echo '<div class="collapsible-header"><i class="material-icons">schedule</i>'.$meetingname.'</div>';
                        echo '<div class="collapsible-body"><p>Date: '.$meetingdate.'<br>Time: '.$meetingtime.'</p><p><a class="waves-effect waves-light btn" href="./meeting-room.php?meeting_id='.$meetingid.'">Enter</a></p></div>';
                        echo '</li>';    
 
                    } 
                } 
            } 

            ?>
                                </ul>
                            </div>




                            <div class="meeting-cards" id="past-meetings">
                                Reuniões Passadas:</p>
                                <ul class="collapsible" data-collapsible="accordion">
                                    <?php
            $time = new DateTime('', new DateTimeZone('Europe/Lisbon')); 
            $time = $time->format('H:i');
            
            $sql_get_meeting = "SELECT meeting_id, meeting.name, date, time, user.name, team.name from meeting, user, team where date <= CURDATE() AND time <= CURTIME() AND team.team_id=meeting.team_id AND meeting.team_id = '".$team_id."' AND user.user_id = meeting.user_id;";
        
            $results_found = mysqli_query($db_select, $sql_get_meeting);
        
            if($results_found) {
                $array2 = array();
                while($count = mysqli_fetch_array($results_found)) {
                    array_push($array2, $count);
                }
                
                if (sizeof($array2) == 0) {
                    echo '<p>Não existem reuniões passadas.</p>';
                } else {
                    for ($i = 0; $i < sizeof($array2); $i++) {
                        $meetingid = htmlentities((string) $array2[$i][0], ENT_COMPAT, 'UTF-8');
                        $meetingname = htmlentities((string) $array2[$i][1], ENT_COMPAT, 'UTF-8');
                        $meetingdate = htmlentities((string) $array2[$i][2], ENT_COMPAT, 'UTF-8');
                        $meetingtime = htmlentities((string) $array2[$i][3], ENT_COMPAT, 'UTF-8');
                        echo '<li>';
                        echo '<div class="collapsible-header"><i class="material-icons">schedule</i>'.$meetingname.'</div>';
                        echo '<div class="collapsible-body"><p>Date: '.$meetingdate.'<br>Time: '.$meetingtime.'</p><p><a class="waves-effect waves-light btn" href="./meeting-room.php?meeting_id='.$meetingid.'">Enter</a></p></div>';
                        echo '</li>';    
                    } 
                } 
            } 
            ?>
                                </ul>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
            <script src="js/jquery.js"></script>
            <script src="js/script.js"></script>


            <script>
                $(document).ready(function () {

                    setInterval(explode, 30000);

                    var elem = document.getElementById('chatOutput');
                    elem.scrollTop = elem.scrollHeight;
                });

                function explode() {
                    console.log("atualizou");
                    location.reload();
                    //FALTA ACTUALIZAR CHAT MIGA
                }

                //LIMIT DATE INPUT

                var today = new Date().toISOString().split('T')[0];

                document.getElementsByName("meetingdate")[0].setAttribute('min', today);
                document.getElementsByName("meetingdate")[0].setAttribute('value', today);

                function addZero(i) {
                    if (i < 10) {
                        i = "0" + i;
                    }
                    return i;
                }

                var hours = addZero(new Date().getHours());
                var minutes = addZero(new Date().getMinutes());
                var currentTime = hours + ":" + minutes;
                console.log(currentTime);
                if (document.getElementsByName("meetingdate")[0].value == today) {
                    console.log('YAS QUEEN'); // CHECK THIS
                    document.getElementsByName("meetingtime")[0].setAttribute('min', currentTime);
                }
                document.getElementsByName("meetingtime")[0].setAttribute('value', currentTime);
            </script>





    </body>

    </html>