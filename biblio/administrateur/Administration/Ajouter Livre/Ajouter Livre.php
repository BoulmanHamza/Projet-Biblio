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
		$COTE=$_POST["cote"];
		$TITRE=$_POST["titre"];
		$AUTEUR=$_POST["auteur"];
		$EDITEUR=$_POST["editeur"];
		$ANNEE=$_POST["annee"];
		$RUBRIQUE=$_POST["rubrique"];
		$TYPE=$_POST["type"];
		$disponible="disponible";
		if($COTE !="" && $TITRE !="" && $AUTEUR !="" && $EDITEUR != "" && $ANNEE !="" && $RUBRIQUE !="" && $TYPE != "")
		{
			if(mysqli_query($bd, "INSERT INTO livre VALUES('$COTE','$TITRE','$AUTEUR','$EDITEUR','$ANNEE','$RUBRIQUE','$TYPE','$disponible')") == true)
			    {
			    	echo "<script> alert('insertion de suggestion et bien effectue')</script>";
			    }
			else
				echo "<script> alert('erreur')</script>";
		}else
        {echo "<script> alert('Ajouter tous les informations de livre')</script>";}
	
?>
<!DOCTYPE html>
<html>
<head>
	<LINK REL="stylesheet" TYPE="text/css" HREF="Ajouter Livre.css" />
	<meta charset="utf-8">
	<title>Ajouter Livre</title>
</head>
<body>
	<br><br>
	<p class="p"><b/>Ajout de Livres</p>
	<form method="POST" action="">
	<p class="p1">cote livre</p>
	<input type="text" name="cote" class="mot1">
	<p class="p2">Titre</p>
	<input type="text" name="titre" class="mot2">
	<p class="p3">Auteur</p>
	<input type="text" name="auteur" class="mot3">
	<p class="p4">Editeur</p>
	<input type="text" name="editeur" class="mot4">
	<p class="p5">Annee d'edition</p>
	<input type="text" name="annee" class="mot5">
    <p class="p6">Rubrique</p>
	<select class="s1" name="rubrique">
		<option></option>
		<option>Droit</option>
		<option>Economie</option>
		<option>Informatique</option>
		<option>Histoire</option>
		<option>Religion</option>
		<option>Géniralité</option>
		<option>littérature</option>
		<option>Urbanisme</option>
	</select>
	<p class="p7">type</p>
	<select class="s2" name="type">
		<option></option>
		<option>Ouvrage</option>
		<option>Dictionnaire</option>
		<option>Encyclopedie</option>
		<option>Periodique</option>
		<option>Bulltin officiel</option>
		<option>Rapport</option>
	</select>
	<button class="b1">valider<img src="2.png" class="img2"></button>
	</form>

</body>
</html>