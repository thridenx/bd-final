<?php
        require('init.php');
        include 'sessao.php';
        /*RECOLHER INFORMAÇÃO USER*/
        $sel = mysqli_query($db_select,"SELECT * FROM user WHERE user_id='".$user_id."'" );
        $dados=mysqli_fetch_array($sel);
        $nome=$dados['name'];
        $username = $dados['username'];
        $email = $dados['email'];
        $website = $dados['website'];
        $birth = $dados['birth'];
        $sex = $dados['sex'];
        $photo=$dados['photo'];
        $password=$dados['password'];
        /*RECOLHER INFORMAÇÃO SOBRE AS SUAS EQUIPAS*/
        $sel2 = mysqli_query($db_select,"SELECT name, team_id from team where team_id in (SELECT team_id FROM team_user where user_id= '".$user_id."')");
        if ($sel2){
            $arrayA=array();
            while($dados2=mysqli_fetch_array($sel2)){
                array_push($arrayA, $dados2);
            }
            //echo sizeof($arrayA);
            if (sizeof($arrayA)>=1){
                for($i=0;$i<sizeof($arrayA);$i++){
                    $texto=htmlentities((string) $arrayA[$i][0],ENT_COMPAT,'UTF-8');
                    if ($i==0){
                        $equipas=$texto;
                    }
                    else{
                        $equipas=$equipas.", ".$texto;
                    }
                }
            }
        }    
    ?>