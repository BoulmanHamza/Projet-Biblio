<?php
function openDB()
	{
		$DB = "biblio";
		$host = "localhost";
		$user = "root";
		$pass = "hamza";
		$bd = mysqli_connect('localhost','root','','biblio');
		if(mysqli_connect_errno())
			echo "Imposible de se connecter à la base de donneé";
		return $bd;
	}
	$bd=openDB();
		$Nom=$_POST["nome"];
		$Prenom=$_POST["prenom"];
		$Poste=$_POST["poste"];
		$Division=$_POST["division"];

		if($Nom !="" && $Prenom !="" && $Poste != "" && $Division != "")
		{
			if(mysqli_query($bd, "INSERT INTO inscription VALUES('','$Nom','$Prenom','$Division','$Poste')") == true)
			    {
			    	echo "<script> alert('insertion de utilisateur et bien effectue')</script>";
			    }
			else
				echo "<script> alert('erreur')</script>";
        }else
        {echo "<script> alert('Ajouter tous les informations de utilisateur')</script>";}

?>
<!DOCTYPE html>
<html>
<head>
	<LINK REL="stylesheet" TYPE="text/css" HREF="Ajouter utilisateur.css" />
	<meta charset="utf-8">
	<title>Ajouter Utilisateur</title>
</head>
<body>
	<br><br><br>
	<form method="POST" action="">
	<p class="p1">Nom</p>
	<input type="text" name="nome" class="mot1">
	<p class="p2">Prenom</p>
	<input type="text" name="prenom" class="mot2">
	<p class="p3">Poste Telephonique</p>
	<input type="text" name="poste" class="mot3">
	<p class="p4">Division</p>
	<select class="s1" name="division">
		<option></option>
		<option>AP</option>
		<option>BO</option>
		<option>CAB</option>
		<option>DAEC</option>
		<option>DSIC</option>
		<option>DCL</option>
		<option>DAS</option>
		<option>HISBA</option>
	</select>
	<button class="b1">valider<img src="2.png" class="img2"></button>
	</form>

</body>
</html>