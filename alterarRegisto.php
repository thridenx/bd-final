<?php 
    require('ref.php');
    require('init.php');
    require('dados.php');
    
    ?>

    <!DOCTYPE html>
    <html>

    <body>
        <?include 'header.php';?>

            <div class="container">
                <div class="row">
                    <br>
                    <div id="col s6">
                        <h3>alterar perfil</h3>


                        <form id="registo" action="alterarRegistophp.php" method="post">
                            <input name="name" class="registar_input" type="text" placeholder="nome" value="<? echo " $nome "?>" maxlength="70">
                            <input name="password1" class="registar_input" type="password" placeholder="* atual password" maxlength="16" required>
                            <input name="email" class="registar_input" type="email" placeholder="email" value="<? echo " $email "?>" maxlength="80">
                            <input name="password2" class="registar_input" type="password" placeholder="nova password" maxlength="16">
                            <input name="website" class="registar_input" type="text" placeholder="website" value="<? echo " $website "?>">
                            <input name="password3" class="registar_input" type="password" placeholder="confirmar password" maxlength="16">
                            <input class="indigo accent-4 btn center" type="submit" value="registar">

                        </form>
                    </div>
                </div>
            </div>
    </body>

    </html>