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
                <? echo "$username"?></h5>
            </div>
            
            <div id="infGeral">
                <ul class="collection">
                    <li class="collection-item"><h6>sexo:</h6>
                        <? echo " $sex"?>
                    </li>
                    <li class="collection-item"><h6>data de nascimento:</h6>
                        <? echo " $birth"?>
                    </li>
                    <li class="collection-item"><h6>e-mail:</h6>
                        <? echo " $email"?>
                    </li>
                    <li class="collection-item"><h6>website:</h6>
                        <? echo " $website"?>
                    </li>
                    <li class="collection-item"><h6>equipas a que pertence:</h6>
                        <? echo " $equipas"?>
                    </li>
                </ul>
            </div>
         <div class="indigo accent-4 btn" id="alterar"><a href="alterarRegisto.php">alterar perfil</a></div>    
        </div>
        

       
    
    </body>

</html>