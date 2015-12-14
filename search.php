<?php 
    require('ref.php');
    require('init.php');

    include 'sessao.php';
    include 'team-session.php';

    require('dadosEquipa.php');

    $output='';
    if (isset($_POST['searchVal'])){
        $searchq=$_POST['searchVal'];
        //echo $searchq;
      	$searchq=preg_replace("#[^0-9a-z]#i", "", $searchq);
     //  $query=mysqli_query("SELECT username, email, name FROM user WHERE username like '%'".$searchq."'%' or name like '%''".$searchq."'%' or email like '%''".$searchq."'%'");
        //$query=mysqli_query($db_select,"SELECT username, email, name FROM user WHERE username like '%a%' or name like '%a%' or email like '%a%'");
        $query=mysqli_query($db_select,"SELECT DISTINCT user.username, user.user_id FROM user, team_user WHERE user.username like '%$searchq%'and user.user_id = team_user.user_id and team_id NOT IN ( SELECT team_id from team where team_id = ".$team_id.")";
                            
        
        $count=mysqli_num_rows($query);
        //var_dump($query);
        if ($count == 0){
            $output= "Não encontrei utilizadores!";
        }
        else if ($searchq=''){
            $output='';
        }else{
            $output .= '<form class="" action="addteam.php" method="POST">';
            $i = 0;
            while ($row=mysqli_fetch_array($query)) {
                $fuser=$row['username'];
                $fuser_id=$row['user_id'];
                $output .='<p><input class="indigo accent-4 btn" type="submit" name="username" value="'.$fuser.'"></p>';
                $output .= '<input type="hidden" name="user_id" value="'.$fuser_id.'">';
                $i++;
            }
            $output.='</form>';
        }
    }
    echo $output;
    ?>