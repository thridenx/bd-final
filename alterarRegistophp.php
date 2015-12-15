<?php 
require('ref.php');
require('init.php');
require('dados.php');

$namePrev=$_POST['name'];

$password1=$_POST['password1'];
$password2=$_POST['password2'];
$password3=$_POST['password3'];

$emailPrev=$_POST['email'];
$websitePrev=$_POST['website'];


if (($password2==$password3) and ($password1!='')){

	$sql = "SELECT password FROM user WHERE user_id = '".$user_id."' and password = '".$password1."' ";
	$result = mysqli_query($db_select, $sql);
	
	if ($result){
	    $array= array();
	    while($count =mysqli_fetch_array($result)){
	        array_push($array, $count); 
	    }

	    if (sizeof($array) == 1) { 
	    	if ($namePrev==''){
				$namePrev=$nome;
			}
			if ($emailPrev==''){
				$emailPrev=$email;
			}
			if ($websitePrev==''){
				$websitePrev=$website;
			}	
			if (($password2=='') or ($password2==' ')){
				$passwordPrev=$password1;
			}


			$update= "UPDATE user
			SET name='".$namePrev."', password='".$passwordPrev."', email='".$emailPrev."', website='".$websitePrev."'
			WHERE user_id='".$user_id."'";

			$sql=mysqli_query($db_select, $update);
			if ($sql){
				echo 'alterado com sucesso! <meta http-equiv="refresh" content="0; URL=perfilUser.php">';

			}else{
				echo '<meta http-equiv="refresh" content="0; URL=erro_confirmar_password.php">';
			}
		}
		else{
			echo '<meta http-equiv="refresh" content="0; URL=erro_confirmar_password.php">';
		}
	
	}
}
else{
	echo '<meta http-equiv="refresh" content="0; URL=erro_confirmar_password.php">';
}

?>