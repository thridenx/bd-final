<?php

        /*RECOLHER INFORMAÇÃO TEAM*/
        $sel = mysqli_query($db_select,"SELECT * FROM team WHERE team_id='".$team_id."'" );
        $dados=mysqli_fetch_array($sel);
        

        $name=$dados['name'];
        $chat_id=$dados['chat_id'];
        $workfield = $dados['workfield'];
        $skills = $dados['skills'];


         /*RECOLHER INFORMAÇÃO SOBRE ADMINISTRADOR*/
        $sel3 = mysqli_query($db_select,"SELECT team.user_id, user.name from team,user where team_id='".$team_id."';");




        /*RECOLHER INFORMAÇÃO SOBRE MEMBROS DA EQUIPA*/
        $sel2 = mysqli_query($db_select,"SELECT user.user_id, user.name, user.username from user, team_user where user.user_id=team_user.user_id and team_user.team_id='".$team_id."';");

        if ($sel2){

            $arrayA=array();
            while($dados2=mysqli_fetch_array($sel2)){
                array_push($arrayA, $dados2);
            } 
}
            

$u=$_POST['u'];

$sel5 = mysqli_query($db_select,"SELECT username from user where username like "%'".$u."'%"");

if ($sel5){

    $arrayC=array();
    while($dados5=mysqli_fetch_array($sel5)){
        array_push($arrayC, $dados5);
    }
}

      

    ?>