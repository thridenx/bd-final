<!DOCTYPE html>
<html>

<?php

        require('init.php');
        require('ref.php');
        include 'sessao.php';
        require('dados.php');
        include 'header.php';
    ?>

    <body>
        <div id="infUser" class="container">
            <div id="nome"><br><br>
                <h3><? echo "$nome"?></h3>
            </div>
            <!--TITULO-->
            <div id="username"><h5>
                <? echo "$username"?></h5><br>
            </div>
            <ul class="collection">
            <div id="infGeral">
                <li class="collection-item"><div id="sex"><h6>sexo:</h6>
                    <? echo " $sex"?>
                </div></li>
                <li class="collection-item"><div id="birth"><h6>data de nascimento:</h6>
                    <? echo " $birth"?>
                </div></li>
                <li class="collection-item"><div id="email"><h6>e-mail:</h6>
                    <? echo " $email"?>
                </div></li>
                <li class="collection-item"><div id="website"><h6>website:</h6>
                    <? echo " $website"?>
                </div></li>
                <li class="collection-item"><div id="equipas"><h6>equipas a que pertence:</h6>
                    <? echo " $equipas"?>
                </div></li>
            </div>
        </div>
        </div>

        <div id="alterar"><a href="alterarRegisto.php">alterar perfil</a></div>
    </body>

</html>