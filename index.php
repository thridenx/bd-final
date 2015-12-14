<!DOCTYPE html>

<html lang="pt">

<?php
require('ref.php');
require('init.php');
?>

    <body>
        <div id="centrar">
            <div id="titulo">slecky</div>
            <!-- <div id="subtitulo">reúna com a sua equipa</div>-->

            <form class="row col s6" action="login.php" method="post">

                <div id="login_form" class="input-field">
                    <input name="username" class="login_input" type="text" placeholder="nome de utilizador" required>
                    <input name="password" class="login_input" type="password" placeholder="palavra-chave" required>

                    <br>
                    <div class="centrar">
                        <input class="btn indigo accent-4" type="submit" value="iniciar sessão">
                    </div>
                    <br>
                    <div>
                        <a class="btn indigo accent-4" href="registo.php">inscrever-se</a>
                    </div>
                </div>

            </form>

    </body>

</html>