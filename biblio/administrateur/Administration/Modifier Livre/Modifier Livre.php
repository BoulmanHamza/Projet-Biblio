<!DOCTYPE html>
<html>
<head>
	<LINK REL="stylesheet" TYPE="text/css" HREF="Modifier Livre.css" />
	<meta charset="utf-8">
	<title>Modifier Livre</title>
</head>
<body>
	<?php
function openDB()
	{
		$DB = "biblio";
		$host = "localhost";
		$user = "root";
		$pass = "";
		$bd = mysqli_connect('localhost','root','','biblio');
		if(mysqli_connect_errno())
			echo "Imposible de se connecter à la base de donneé";
		return $bd;
	}
	$bd=openDB();
	$COTE=$_POST["cote"];
	$req=mysqli_query($bd, "SELECT * FROM livre WHERE (`livre`.`Cote livre` = '$COTE')");
	$res=mysqli_fetch_array($req);
			  $TITRE=$res['Titre'];
	          $AUTEUR=$res['Auteur'];
	          $EDITEUR=$res['Editeur'];
	          $ANNEE=$res['Annee edition'];
	          $RUBRIQUE=$res['Rubrique'];
	          $TYPE=$res['Type'];
	          $cote=$res['Cote livre'];
	          $TITRE1=$_POST['titre'];
	          $AUTEUR1=$_POST['auteur'];
              $EDITEUR1=$_POST['editeur'];
              $ANNEE1=$_POST['annee'];
	          $RUBRIQUE1=$_POST['rubrique'];
	          $TYPE1=$_POST['type'];
if (isset($_POST["recherche"]))
	{
		$bd=openDB();
		$COTE=$_POST["cote"];
	$req=mysqli_query($bd, "SELECT * FROM livre WHERE (`livre`.`Cote livre` = '$COTE')");
	if($req == true)
			{
				if ($cote!=Null) 
				{
				
			  $res=mysqli_fetch_array($req);
			  $cote=$res['Cote livre'];
			  $TITRE=$res['Titre'];
	          $AUTEUR=$res['Auteur'];
	          $EDITEUR=$res['Editeur'];
	          $ANNEE=$res['Annee edition'];
	          $RUBRIQUE=$res['Rubrique'];
	          $TYPE=$res['Type'];
	            }
	          else{echo "<script> alert('le code est incorrect')</script>";}
			}
			else 
			{
				echo "<script> alert('erreur')</script>";
			}
	}
if (isset($_POST["delete"]))
	{
		$bd=openDB();
		$COTE=$_POST["cote"];
	    $req1=mysqli_query($bd, "DELETE FROM `biblio`.`livre` WHERE `livre`.`Cote livre` = '$COTE';");
	    if ($cote!=Null) 
		{
	    if($req1 == true)
			{
			  echo "<script> alert('la suppresion est bien effectuer')</script>";
			}
			else
				{echo "<script> alert('erreur')</script>";}
		}
	}
if (isset($_POST["update"]))
	{
		$bd=openDB();
		$COTE=$_POST["cote"];
		$TITRE1=$_POST['titre'];
	    $AUTEUR1=$_POST['auteur'];
        $EDITEUR1=$_POST['editeur'];
        $ANNEE1=$_POST['annee'];
	    $RUBRIQUE1=$_POST['rubrique'];
	    $TYPE1=$_POST['type'];
	    $dis="disponible";
	    $req1=mysqli_query($bd, "UPDATE `livre` SET `Cote livre`='$COTE',`Titre`='$TITRE1',`Auteur`='$AUTEUR1',`Editeur`='$EDITEUR1',`Annee edition`='$ANNEE1',`Rubrique`='$RUBRIQUE1',`Type`='$TYPE1',`disponable`='disponible' WHERE (`livre`.`Cote livre` = '$COTE')");
	    if ($COTE!=Null) 
		{
	    if($req1 == true)
			{
			  echo "<script> alert('la Modification est bien effectuer')</script>";
			}
			else
				{echo "<script> alert('erreur')</script>";}
		
	}}

?>

	<br><br>
<form method="POST" action="">
	<div class="c1">
	<p class="p1">cote livre</p>
	<input type="text" name="cote" class="mot1" value="<?php echo $cote; ?>">
	<button class="b1" name="recherche">Recherche</button>
	</div>
	<div class="c2">
	<p class="p2">Titre</p>
	<input type="text" name="titre" class="mot2" value="<?php echo $TITRE; ?>">
	<p class="p3">Auteur</p>
	<input type="text" name="auteur" class="mot3"  value="<?php echo $AUTEUR; ?>">
	<p class="p4">Editeur</p>
	<input type="text" name="editeur" class="mot4"  value="<?php echo $EDITEUR; ?>">
	<p class="p5">Annee d'edition</p>
	<input type="text" name="annee" class="mot5"  value="<?php echo $ANNEE; ?>">
    <p class="p6">Rubrique</p>
    <input type="text" name="rubrique" class="mot6"  value="<?php echo $RUBRIQUE; ?>">
	<p class="p7">type</p>
	<input type="text" name="type" class="mot7"  value="<?php echo $TYPE; ?>">
	<button class="b3" name="delete">Supprimer</button>
	<button class="b2" name="update">Modifier</button>
	<button class="b3" name="delete">Supprimer</button>
	<button class="b2" name="update">Modifier</button>
	</div>

</form>
</body>
</html>