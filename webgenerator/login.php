<?php 
	session_start();
	if (isset($_POST["ingresar"])) {
		if ($_POST["email"] != "" && $_POST["pass"] != "") {
			
			$email = $_POST["email"];
			$pass = $_POST["pass"];

			$con = mysqli_connect("localhost", "adm_webgenerator", "webgenerator2020", "webgenerator");

			$sql = "SELECT * FROM `usuarios` WHERE `email`='$email'  AND `pass`='$pass'";
			$res = mysqli_query($con, $sql);

			if (mysqli_num_rows($res) > 0) {
				while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
					$_SESSION["id"] = $fila["id_user"];
					$_SESSION["email"] = $fila["email"];
					$_SESSION["pass"] = $fila["pass"];
				header('Location: panel.php?');					
				}
			}else{
				echo '<script language="javascript">alert("Correo electronico o contraseña incorrectos.");</script>';			
			}
		} else {
			echo '<script language="javascript">alert("Debe llenar todos los campos.");</script>';
		}
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>WebGenerator</title>
</head>
<body>
	<center>
		<h1><i>WebGenerator</i></h1>
		<br><br>
		<form action="" method="POST">
			<input type="text" name="email" placeholder="Correo electr&oacute;nico">
			<br><br>
			<input type="password" name="pass" placeholder="Contraseña">
			<br><br>
			<input type="submit" name="ingresar" value="Iniciar sesi&oacute;n">
		</form>
		<br>
		<a href="register.php">¿No ten&eacute;s una cuenta? Registrate ahora.</a>
	</center>
</body>
</html>
