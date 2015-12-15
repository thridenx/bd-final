<?php 
require('ref.php');
require('init.php');
?>

    <!DOCTYPE html>
    <html>

    <body>
        <div id="centrar">
            <div id="tituloSec">registo</div>
            <form id="registo" class="input-field" action="registar.php" method="post">


                <input name="name" class="registar_input" type="text" placeholder="* nome" maxlength="70" required>
                <input name="username" class="registar_input" type="text" placeholder="* username" maxlength="70" required>
                <select name="sex" class="registar_inputPeq" maxlength="10">
                    <option value="masc">masculino</option>
                    <option value="fem">feminino</option>
                </select>

                <input name="birth" class="registar_inputMed" type="date" min="1900-01-01" max="2015-01-01" value="2015-01-01" required>
                <input name="password" class="registar_input" type="password" placeholder="* password" maxlength="16" required>
                 <input name="email" class="registar_input" type="email" placeholder="email" maxlength="80">
                <input name="password2" class="registar_input" type="password" placeholder="* confirmar password" maxlength="16" required>
                <input name="website" class="registar_input" type="text" placeholder="website">



                <input class="indigo accent-4 btn" class="button_input" type="submit" value="registar">
            </form>
        </div>
    </body>

    </html>