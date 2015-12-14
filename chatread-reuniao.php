<?php
error_reporting(E_ALL);
mysqli_query($db_select, 'SET AUTOCOMMIT=0');

$mess = "SELECT message, username, timestamp FROM messages, user, meeting, chat where messages.user_id=user.user_id AND meeting.chat_id = chat.chat_id AND messages.chat_id = chat.chat_id 
AND meeting.meeting_id = ".$meeting_id." ORDER BY timestamp ASC";
$resultA = mysqli_query($db_select, $mess);

if ($resultA){
    $arrayA=array();

    while($countA=mysqli_fetch_array($resultA)){
        array_push($arrayA, $countA);

    }
                    //echo sizeof($arrayA);

    if (sizeof($arrayA)>=1){
        for($i=0;$i<sizeof($arrayA);$i++){

            $texto=htmlentities((string) $arrayA[$i][0],ENT_COMPAT,'UTF-8');
            $user=htmlentities((string) $arrayA[$i][1],ENT_COMPAT,'UTF-8');
            $timestamp = $arrayA[$i][2];
            if ($user == $username) {
                echo "<div class=\"pull-right chip light-blue lighten-5\">".$user.":      ".$texto."</div><br><br><div class=\"pull-right\">".$timestamp."</div><br><br><br>";
            } else {
            echo "<div class=\" chip light-blue lighten-5\">".$user.":      ".$texto."</div><br><br><div>".$timestamp."</div><br><br><br>";}
        }
    }
}
else{
    echo "nao existem mensagens";
}        


?>