<!DOCTYPE html>
<html>

<?php

        require('init.php');
        require('ref.php');
        include 'sessao.php';
        require('dados.php');
    ?>

    <body>
        <? include 'header.php'; ?>
            <div class="container" id="infUser">
                <div id="nome" class="center">
                    <? echo "$nome"?>
                </div>
                <!--TITULO-->

                <div id="username" class="center">
                    <? echo "$username"?>
                </div>
                <div id="infGeral" class="center">
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

            <div class="indigo accent-4 btn center" id="alterar"><a href="alterarRegisto.php">alterar perfil</a></div>
    </body>

</html>