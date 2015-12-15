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
                <br>
                <br>
                <h3><? echo $teamname; ?></h3>
            </div>

            <div id="infGeral">
                <div id="birth">
                    <br>
                    <h5>área de trabalho:</h5>
                    <? echo  $workfield; ?>
                </div>
                <div id="skills">aptidões:
                    <? echo  $skills; ?>
                </div>

                <div id="membros">
                    <br>
                    <h5>membros da equipa:</h5>

                    <?
                	 if (sizeof($arrayA)>=1){
                        
                        for($a=0;$a<sizeof($arrayA);$a++){
                            $nomeU=htmlentities((string) $arrayA[$a][1],ENT_COMPAT,'UTF-8');
                        
                            $usernameU=htmlentities((string) $arrayA[$a][2],ENT_COMPAT,'UTF-8');
                            $b=$a+1;
                            echo 'membro '.$b.': '.$nomeU."<br>";
                            echo 'username: '.$usernameU."<br><br>";
                        }
                    }   
                ?>
                </div>

            </div>

            <br>
            <br>
            <br>
            <br>
            <div class="indigo accent-4 btn" id="alterar"><a href="alterarRegistoEquipa.php">alterar perfil</a></div>


        </div>

    </body>