<!DOCTYPE html>
<html>

<?php

        require('init.php');
        require('ref.php');
        include 'sessao.php';
        require('dados.php');
    ?>

    <body>
        <div id="infUser">
            <div id="nome">
                <? echo "$nome"?>
            </div>
            <!--TITULO-->
            <div id="username">
                <? echo "$username"?>
            </div>
            <div id="infGeral">
                <div id="sex">sexo:
                    <? echo " $sex"?>
                </div>
                <div id="birth">data de nascimento:
                    <? echo " $birth"?>
                </div>
                <div id="email">e-mail:
                    <? echo " $email"?>
                </div>
                <div id="website">website:
                    <? echo " $website"?>
                </div>
                <div id="equipas">equipas a que pertence:
                    <? echo " $equipas"?>
                </div>
            </div>
        </div>
        </div>

        <div id="alterar"><a href="alterarRegisto.php">alterar perfil</a></div>
    </body>

</html>