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

//$user = stripslashes($username);
echo $username;

if ($username=='' or $password=='' or $name=='' or $username==' ' or $password==' ' or $name==' '){ //Verificar se este branco ou com espaço
	echo '<meta http-equiv="refresh" content="2; URL=erro_inserir_pass_username.php">';
}
else if($password!=$password2){
	echo '<meta http-equiv="refresh" content="2; URL=erro_confirmar_password.php">'; //Confirmar password
}

else{
	/*Verificar se o username já existe*/
	$verificar = "SELECT * FROM user WHERE username = '".$username."'";
	$result = mysqli_query($db_select, $verificar);

	if ($result){
		$array= array();
		while($count =mysqli_fetch_array($result)){
			array_push($array, $count); 
		}
		$check = sizeof($array);
		echo $check;
		if ($check >= 1) {
			echo"<script language='javascript' type='text/javascript'>alert('Nome de utilizador já existente!');window.location.href='registo.php';</script>";
			echo "inscrito com sucesso";	
		}else{
			$insert = "INSERT into user(name, username, email, password, birth, sex)
			VALUES ('".$name."', '".$username."','".$email."', '".$password."','".$birth."','".$sex."');";

			$sql=mysqli_query($db_select, $insert);
			if ($sql){
				echo '<meta http-equiv="refresh" content="0; URL=index.php">';

			}else{
				echo 'Ocorreu um erro, tente novamente!';
			}
		}
	}
}
?>