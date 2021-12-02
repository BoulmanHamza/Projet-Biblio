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
		$titre=$_POST["titre"];
		$auteur=$_POST["auteur"];
		$edition=$_POST["edition"];
		$Date=date("y-m-d");
		if($titre !="" && $auteur !="" && $edition != "")
		{
		
			if(mysqli_query($bd, "INSERT INTO suggestion VALUES('$titre','$auteur','$edition','$Date')") == true)
			    {
			    	echo "<script> alert('insertion de suggestion et bien effectue')</script>";
			    }
			else
				echo "<script> alert('erreur')</script>";
		}else
        {echo "<script> alert('Ajouter tous les informations de la suggestion')</script>";}	
			
?>
<!DOCTYPE html>
<html>
<head>
	<LINK REL="stylesheet" TYPE="text/css" HREF="Suggestion.css" />
	<title>Suggestion</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="">
    <img src="1.png" class="img"/>
	<br><br>
	<b><p class="p">Merci de remplir le formulaire ci-dessous si vous avez une suggestion d'un livre précis</p>
	<p class="p">pour l'inclure éventuellement dans la prochaine acquisition, pour de plus amples informations</p> 
    <p class="p"> veuillez contacter le bibliothécaire à l'adresse suivant:</p></b>
	<p class="p1">hotline@wilayafes.gov.ma</p>

	<p class="p2">Titre du livre</p>
	<input type="text" name="titre" class="mot2">

	<p class="p3">Auteur</p>
	<input type="text" name="auteur" class="mot3">

	<p class="p4">Edition</p>
	<input type="text" name="edition" class="mot4">
	<button class="b1">valider<img src="2.png" class="img2"></button>
	</form>
	<a href="../utilisateure/utilisateur.html"><button class="b2">precedant</button></a>
	
</body>
</html>

