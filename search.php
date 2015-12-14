<?php 
    require('ref.php');
    require('init.php');
    require('dadosEquipa.php');

    $output='';

    if (isset($_POST['searchVal'])){
        $searchq=$_POST['searchVal'];
        //echo $searchq;
      	$searchq=preg_replace("#[^0-9a-z]#i", "", $searchq);

     //  $query=mysqli_query("SELECT username, email, name FROM user WHERE username like '%'".$searchq."'%' or name like '%''".$searchq."'%' or email like '%''".$searchq."'%'");
        //$query=mysqli_query($db_select,"SELECT username, email, name FROM user WHERE username like '%a%' or name like '%a%' or email like '%a%'");
        $query=mysqli_query($db_select,"SELECT username FROM user WHERE username like '%$searchq%'");


        $count=mysqli_num_rows($query);
        //var_dump($query);

        if ($count == 0){
            $output= "Não existe nenhum valor!";
        }
        else{
            while ($row=mysqli_fetch_array($query)) {
                $fuser=$row['username'];
               // $femail=$row['email'];
                //$fname=$row['name']; 
                
                $output ='<div>'.$fuser.'</div>';
                //echo $output;
                //echo $output;
            }

        }

    }



    echo $output;
    ?>