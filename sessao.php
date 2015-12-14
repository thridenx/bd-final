<?php
        session_start();
        if(!isset($_SESSION['user_id'])) { 
            echo '<meta http-equiv="refresh" content="0; URL=index.php">';
        }else{   
           $username= $_SESSION['username'];
            $user_id = $_SESSION['user_id'];
        }
 ?>