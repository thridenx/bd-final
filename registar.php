<?php 
require('ref.php');
require('init.php');
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$email=$_POST['email'];
$birth=$_POST['birth'];
$sex=$_POST['sex'];
error_reporting(E_ALL);
mysqli_query($db_select, 'SET AUTOCOMMIT=0');
//$user = stripslashes($username);
echo $username;
if ($username=='' or $password=='' or $name=='' or $username==' ' or $password==' ' or $name==' '){ //Certificar mesmo que não acontece 
	echo '<meta http-equiv="refresh" content="2; URL=erro_inserir_pass_username.php">';
}
else if($password!=$password2){
	echo 'Confirme novamente a sua password!
	<meta http-equiv="refresh" content="2; URL=registo.php">';
}
else{
	/*Verificar se o username já existe*/
	$verificar = "SELECT * FROM user WHERE username = '".$username."'";
	$result = mysqli_query($db_select, $verificar);
	if ($result!=''){
		$array= array();
		while($count =mysqli_fetch_array($result)){
			array_push($array, $count); 
		}
		$check = sizeof($array);
		
		if ($check >= 1) {echo"<script language='javascript' type='text/javascript'>alert('Nome de utilizador já existente!');window.location.href='registo.php';</script>";
			echo "inscrito com sucesso";	
		}else{
			$insert = "INSERT into user(name, username, email, password, birth, sex)
			VALUES( '".$name."', '".$username."','".$email."', '".$password."','".$birth."','".$sex."');";
				
			$sql=mysqli_query($db_select, $insert);
			
			if ($sql){
				echo '<meta http-equiv="refresh" content="0; URL=index.php">';
			}else{
				echo 'Ocorreu um erro, tente novamente!';
			}
		}
	}
}?>