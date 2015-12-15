<?php 

    require('init.php');
    require('ref.php');

    include 'sessao.php';
    include 'team-session.php';

    require('dadosEquipa.php');

    ?>

    <!DOCTYPE html>
    <html>

    <body>
        <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery.min.js"></script>-->
        <script type="text/javascript">
            function searchq() {
                var searchqText = $("input[name='search']").val();
                $.post("search.php", {
                    searchVal: searchqText
                }, function (output) {
                    $("#output").html(output)
                });
            }
        </script>


        <? include 'header.php'; ?>

            <div class="container">
                <div class="row">


                    <br>
                    <br>
                    <br>


                    <div id="col s6">
                        <h3>alterar equipa</h3>
                        <form id="registo" action="alterarRegistophpEquipa.php" method="post">
                            <input name="name" class="registar_input" type="text" placeholder="nome da equipa" value="<? echo  $name; ?>" maxlength="70">
                            <input name="password" class="registar_input" type="password" placeholder="* password" maxlength="16" required>
                            <input name="workfield" class="registar_input" type="text" placeholder="área de trabalho" value="<? echo  $workfield; ?>">
                            <input name="skills" class="registar_input" type="text" placeholder="aptidões" value="<? echo  $skills; ?>">
                            <br>
                            <br>
                            <input class="indigo accent-4 btn center" type="submit" value="registar">

                        </form>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
                <div class="row">
                    <div id="adicionar" class="col s6">
                        <h5>adicionar membro à equipa:</h5>
                        <form id="adicionarMembros" action="alterarRegistoEquipa.php" method="post">
                            <input type="text" name="search" class="registar_input" placeholder="pesquisar membros..." onkeyup="searchq();">
                        </form>
                    </div>
                    <div id="output" class="col s6"></div>
                </div>

            </div>
    </body>

    </html>