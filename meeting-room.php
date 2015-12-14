<?php
require('init.php');
require('ref.php');
session_start();
include 'sessao.php';
include 'team-session.php';
$_SESSION['meeting_id'] = $_GET['meeting_id'];
$meeting_id = $_SESSION['meeting_id'];

$meeting_query = "SELECT user_id, team_id, chat_id, name, date, time, creation, active FROM meeting WHERE meeting_id = '".$meeting_id."';";
$result_meeting_query = mysqli_query($db_select, $meeting_query);


if($result_meeting_query){
    $meeting_details = array();

    while($count = mysqli_fetch_array($result_meeting_query)) {
        array_push($meeting_details, $count);
    }

    if(sizeof($meeting_details) == 1) {
            $creatorname = htmlentities((string) $meeting_details[0][0], ENT_COMPAT, 'UTF-8');
            $meeting_team_id = htmlentities((string) $meeting_details[0][1], ENT_COMPAT, 'UTF-8');
            $chat_id = htmlentities((string) $meeting_details[0][2], ENT_COMPAT, 'UTF-8');
            $meetingname = htmlentities((string) $meeting_details[0][3], ENT_COMPAT, 'UTF-8');
            $meetingdate = htmlentities((string) $meeting_details[0][4], ENT_COMPAT, 'UTF-8');
            $meetingtime = htmlentities((string) $meeting_details[0][5], ENT_COMPAT, 'UTF-8');
            $meetingtimestamp = htmlentities((string) $meeting_details[0][6], ENT_COMPAT, 'UTF-8');
            $meetingactive = htmlentities((string) $meeting_details[0][7], ENT_COMPAT, 'UTF-8');
    }
}
?>

    <html>




    <body>
        <?php include 'header.php'?>
            <div class="container">
                <div class="row">
                    <h2 class="center">reunião <?php
            echo $meetingname;
            ?> </h2>
                    <div id="meetingchat row">
                        <!--RECEBER O QUE FOI ESCRITO-->
                        <div id="chatOutput" class="col s12">
                            <?
                include 'chatread-reuniao.php';
            ?>
                        </div>
                        <br>
                        <br>
                        <br>
                        <form id="chat" action="chatwrite-reuniao.php" method="post">
                            <div class="row">
                                <input class="col s11" type="text" name="chatText" placeholder="type your text here" required>
                                <?php echo '<input type="hidden" name="meeting_id" value="'.$meeting_id.'"/>'; ?>
                                    <button class="center indigo accent-4 btn col s1" id="chatSend">
                                        <i class="material-icons right">send</i>
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="js/jquery.js"></script>
            <script src="js/script.js"></script>
            <script>
                $(document).ready(function () {

                    setInterval(explode, 10000);
                });

                function explode() {
                    console.log("atualizou");
                    location.reload();
                    //FALTA ACTUALIZAR CHAT MIGA
                }
            </script>
    </body>

    </html>