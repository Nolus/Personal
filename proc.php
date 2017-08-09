<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sonidodepipocas";

		$name = trim(filter_input(INPUT_POST, "name"));
		$email = trim(filter_input(INPUT_POST, "email"));
		$message = trim(filter_input(INPUT_POST, "message"));
		

		verificarEmail($username,$password,$name,$email,$message);

		function verificarEmail ($username, $password, $name, $email, $message){
		    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
		        echo "Gracias por escribir, que tengas un excelente resto de jornada";

				try {
				    $conn = new PDO("mysql:host=localhost;dbname=sonidodepipocas", $username, $password);
				    // set the PDO error mode to exception
				    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				    $query = $conn->prepare("INSERT INTO contactos (nombre, correo, comentario) VALUES (:name, :email, :message)");
				    $query->bindParam(":name",$name);
				    $query->bindParam(":email",$email);
				    $query->bindParam(":message",$message);
				    $query->execute();
				    header("refresh:4; index.html");
				    }catch(PDOException $e){
				    	echo $conn . "<br>" . $e->getMessage();
				    }
					$conn = null;
		    }else{
		        echo $email. " no es un correo valido, intenta otra vez\n";
		        header("refresh:4; contacto.html");
		    }
		}
?>