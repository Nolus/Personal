<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sonidodepipocas";

		error_reporting(E_ALL);
		ini_set('error_reporting', E_ALL);

		if (isset($_POST["submit"])) {


			$nombre = trim(filter_input(INPUT_POST, "nombre"));
			$email = trim(filter_input(INPUT_POST, "email"));
			$sugerencia = trim(filter_input(INPUT_POST, "sugerencia"));
			

			echo "nombre:".$nombre.", email:".$email.", sugerencia:".$sugerencia;

					try {
					    $con = new PDO("mysql:host=localhost;dbname=sonidodepipocas", $username, $password);
					    // set the PDO error mode to exception
					    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					    $query = $con->prepare("INSERT INTO sugerencias_enlaces (nombre, email, sugerencia) VALUES (:nombre, :email, :sugerencia)");
					    $query->bindParam(":nombre",$nombre);
					    $query->bindParam(":email",$email);
					    $query->bindParam(":sugerencia",$sugerencia);
					    $query->execute();
					    //header("refresh:4; index.html");
					    echo "Gracias por escribir, que tengas un excelente resto de jornada";
					    }catch(PDOException $e){
					    	echo $con . "<br>" . $e->getMessage();
					    }
						$con = null;
			
				
			} else {
				echo "error";
			}

?>

