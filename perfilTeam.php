<?php

        require('init.php');
        require('ref.php');
        include 'sessao.php';
        $_SESSION['team_id'] = $_GET['team_id'];
        include 'team-session.php';
        require('dadosEquipa.php');
        include 'header.php';
    ?>

    <body>
        <div class="container" id="infTeam">
            <div id="nome">
                <h3><? echo $teamname; ?></h3>
            </div>

            <div id="infGeral" class="center">
                <div id="birth">área de trabalho:
                    <? echo  $workfield; ?>
                </div>
                <div id="skills">aptidões:
                    <? echo  $skills; ?>
                </div>

                <div id="membros">membros da equipa:
                    <br>
                    <?
                	 if (sizeof($arrayA)>=1){
                        
                        for($a=0;$a<sizeof($arrayA);$a++){
                            $nomeU=htmlentities((string) $arrayA[$a][1],ENT_COMPAT,'UTF-8');
                        
                            $usernameU=htmlentities((string) $arrayA[$a][2],ENT_COMPAT,'UTF-8');
                            $b=$a+1;
                            echo 'membro '.$b.': '.$nomeU."/ ";
                            echo 'username: '.$usernameU."<br>";
                        }
                    }   

                ?>
                </div>

            </div>


            <div class="indigo accent-4 btn" id="alterar"><a href="alterarRegistoEquipa.php">alterar perfil</a></div>


        </div>

    </body>