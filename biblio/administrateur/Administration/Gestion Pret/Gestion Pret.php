<!DOCTYPE html>
<html>
<head>
	<LINK REL="stylesheet" TYPE="text/css" HREF="Gestion Pret.css" />
	<meta charset="utf-8">
	<title>Gestion prêt</title>
	<style type="text/css">
		table
{
	border:solid 1px rgba(45,45,45);
	position: absolute;
	margin-top: 390px;
	margin-left: 305px;
}
th
{
	background-image: linear-gradient(180deg,rgba(106,106,106,1.00) 10.88%,rgba(45,45,45,1.00) 45.08%,rgba(75,75,75,1.00) 78.76%);
	border-radius: 5px 5px 0px 0px;
	height: 20px;
	width: 150px;
	text-align-last: center;
	color: white;
}
td
{
	text-align:center;
	color: white;
	background-color: black;
}
.mot4
{
	color:white;
	background-color:#000;
	margin-left: 200px;
	margin-top: 20px;
	border-color: skyblue;
	outline-color: skyblue;
	position: absolute;
	height: 17px;
	width: 180px;
}
.mot4:hover
{
	border-color: orange;
	outline-color: orange;
}
.p4
{
     color:#fff; 
     position:absolute;
     margin-left: 80px;
     margin-top: 20px;
}
.b4:hover
{
	cursor: pointer;
	background-image: linear-gradient(180deg,rgba(75,75,75,1.00) 10.88%,rgba(45,45,45,1.00) 45.08%,rgba(106,106,106,1.00) 78.76%);
	color:black;
}
.b4
{
	background-image: linear-gradient(180deg,rgba(106,106,106,1.00) 10.88%,rgba(45,45,45,1.00) 45.08%,rgba(75,75,75,1.00) 78.76%);
	outline: none;
	height: 25px;
	font-size: 18px;
	width:100px; 
	color:white;
	border-color: rgba(75,75,75);
	border-radius: 5px;
	margin-left: 480px;
	margin-top: 120px;
	position: absolute;
}
.b3:hover
{
	cursor: pointer;
	background-image: linear-gradient(180deg,rgba(75,75,75,1.00) 10.88%,rgba(45,45,45,1.00) 45.08%,rgba(106,106,106,1.00) 78.76%);
	color:black;
}
.b3
{
	background-image: linear-gradient(180deg,rgba(106,106,106,1.00) 10.88%,rgba(45,45,45,1.00) 45.08%,rgba(75,75,75,1.00) 78.76%);
	outline: none;
	height: 25px;
	font-size: 18px;
	width:100px; 
	color:white;
	border-color: rgba(75,75,75);
	border-radius: 5px;
	margin-left: 480px;
	margin-top: 20px;
	position: absolute;
}



	</style>
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
	$CODE=$_POST["code"];
	$req=mysqli_query($bd, "SELECT  `Nom inscrit`, `Prenom inscrit`, 'Identifiant inscrit' FROM `inscription` WHERE (`inscription`.`Identifiant inscrit` = '$CODE')");
	$res=mysqli_fetch_array($req);
			  $NOM=$res['Nom inscrit'];
	          $PRENOM=$res['Prenom inscrit'];
	          $code=$res['Identifiant inscrit'];
	
	 
     if (isset($_POST["recherche"]))
	{
		$bd=openDB();
		$CODE=$_POST["code"];
	$req=mysqli_query($bd, "SELECT  `Nom inscrit`, `Prenom inscrit`, `Identifiant inscrit` FROM `inscription` WHERE (`inscription`.`Identifiant inscrit` = '$CODE')");
	if($req == true)
			{
				if ($code!=Null) 
				{
				
			  $res=mysqli_fetch_array($req);
			  $NOM=$res['Nom inscrit'];
	          $PRENOM=$res['Prenom inscrit'];
	          $code=$res['Identifiant inscrit'];
	            }
	          else{echo "<script> alert('le code est incorrect')</script>";}
			}
			else 
			{
				echo "<script> alert('erreur')</script>";
			}
	}

	$COTE=$_POST["cote"];
	$CODE=$_POST["code"];
	$despona="indisponible";
	$req2=mysqli_query($bd, "SELECT `livre`.`Cote livre`,`livre`.`Titre`,`livre`.`disponable` From `emprunt`,`livre`,`inscription` WHERE (`emprunt`.`Cote Livre`=`livre`.`Cote livre` AND `emprunt` . `Code Inscrit` = `inscription` . `Identifiant inscrit` AND `inscription` . `Identifiant inscrit`= '$CODE' AND `livre`.`Cote livre`='$COTE' AND `livre`.`disponable`='$despona')");
        $res2=mysqli_fetch_array($req2);
			
	$req1=mysqli_query($bd, "SELECT `Cote livre`, `Titre`, `disponable` FROM `livre` WHERE (`livre`.`Cote livre` = '$COTE')");
	$res1=mysqli_fetch_array($req1);
			  $DIS=$res1['disponable'];
	          $TITRE=$res1['Titre'];
	          $cote=$res1['Cote livre'];
	if (isset($_POST["Ajouter"]))
	{
		$bd=openDB();
		$COTE=$_POST["cote"];
		$CODE=$_POST["code"];
		$DIS=$res1['disponable'];
		$cote=$res1['Cote livre'];
		echo "<table><tr><th>Cote livre</th><th>Titre</th><th>Disponibilité</th></tr>";
		if ($cote!=Null) 
				{
	    if($DIS == "disponible")
	        {
	        	$req1=mysqli_query($bd, "SELECT `livre`.`Cote livre`, `livre`.`Titre`, `livre`.`disponable` FROM `livre` WHERE (`livre`.`Cote livre` = '$COTE')");
	         if($req1 == true)
			    {
			    	
			    	
				if($res1 == mysqli_fetch_array($req1))
				   {	
			      echo "<tr><td>".$res1['Cote livre']."</td><td>".$res1['Titre']."</td><td>".$res1['disponable']."</td></tr>";
			       }
			  
			   }else{echo "<script> alert('erreur')</script>";}
			
	        }
	else
		{
			$req2=mysqli_query($bd, "SELECT `livre`.`Cote livre`,`livre`.`Titre`,`livre`.`disponable` From `emprunt`,`livre`,`inscription` WHERE (`emprunt`.`Cote Livre`=`livre`.`Cote livre` AND `emprunt` . `Code Inscrit` = `inscription` . `Identifiant inscrit` AND `inscription` . `Identifiant inscrit`= '$CODE' AND `livre`.`Cote livre`='$COTE' AND `livre`.`disponable`='$despona' AND `emprunt` . `Phase` = 'PH1')");
			if($req2 == true)
		        {
				if($res2 == mysqli_fetch_array($req2))
				{	
					echo "<tr><td>".$res2['Cote livre']."</td><td>".$res2['Titre']."</td><td>".$res2['disponable']."</td></tr>";
	            }
			    }
			    else 
			    {
				echo "<script> alert('erreur')</script>";
			    }}
			
		}else{echo "<script> alert('cette livre est indisponible')</script>";}
					
	}echo "</table>";
	$PH1='PH1';
		$PH2='PH2';
		$DATEE=date("y-m-d");
		$DATER=date("y-m-d");
		$req10=mysqli_query($bd, "SELECT  `Cote livre` FROM `livre` WHERE (`livre`.`Cote livre` = '$COTE')");
		$req11=mysqli_query($bd, "SELECT `livre`.`disponable` FROM `livre` WHERE (`livre`.`disponable` = 'disponible' AND `livre`.`Cote livre`='$COTE')");
		 $res11=mysqli_fetch_array($req11);
     $diso=$res11['disponable'];
if (isset($_POST["valider"]))
	{
		$bd=openDB();
		$COTE=$_POST["cote"];
		$CODE=$_POST["code"];
		
		
		if($COTE != NULL && $CODE !=NULL && $NOM != Null && $PRENOM !=null){
			if(mysqli_query($bd, "SELECT  `Cote livre` FROM `livre` WHERE (`livre`.`Cote livre` = '$COTE')")==true){

     $res10=mysqli_fetch_array($req10);
     $l=$res10['Cote livre'];

            

         if($l!= null){

        if($diso=="disponible")
        {
         	
        if(mysqli_query($bd, "INSERT INTO emprunt VALUES('','$COTE','$CODE','$DATEE','','$PH1')") == true)
			    {
			    	echo "<script> alert('insertion de emprunt et bien effectue')</script>";
			    	if (mysqli_query($bd, "UPDATE livre SET `disponable`='indisponible' WHERE (`livre`.`Cote livre` = '$COTE' )")==true){}
			    		else{echo "<script> alert('il nya pas changes la disponibilite')</script>";}
			    }
			else
				{echo "<script> alert('erreur')</script>";}}else{echo "<script> alert('ce livre est indisponible ')</script>";}}else{echo "<script> alert('ce livre est indisponible ')</script>";}}else{echo "<script> alert('erreurjjjj')</script>";}}}
		
	if (isset($_POST["delete"]))
	{
		
		$bd=openDB();
		$COTE=$_POST["cote"];
		$CODE=$_POST["code"];
		if($COTE != NULL && $CODE !=NULL && $NOM != Null && $PRENOM !=null)
		{
			if(mysqli_query($bd, "SELECT  `Cote livre` FROM `livre` WHERE (`livre`.`Cote livre` = '$COTE')")==true){

     $res10=mysqli_fetch_array($req10);
     $l=$res10['Cote livre'];
     if($l != null){
               if( mysqli_query($bd, "UPDATE emprunt SET `Date Retour`='$DATER', `Phase`='$PH2'WHERE (`emprunt`.`Cote Livre` = '$COTE' AND `emprunt`.`Code Inscrit` = '$CODE')") == true)
			    {
			    	
			    	if (mysqli_query($bd, "UPDATE livre SET `disponable`='disponible' WHERE (`livre`.`Cote livre` = '$COTE')")==true){}
			    		else{echo "<script> alert('il nya pas changes la disponibilite')</script>";}
			    }
			else
				echo "<script> alert('erreur')</script>";	
			
	}else{echo "<script> alert('ce livre est indisponible ')</script>";}}}}

?>
<form method="POST" action="Gestion Pret.php">
	<br><br>
	<div class="c1">
	<p class="p1">Code Inscrit</p>
	<input type="text" name="code" class="mot1" value="<?php echo $CODE; ?>">
	<button class="b1" name="recherche">Recherche</button>
	</div>
	<div class="c2">
	<p class="p2">Nom Inscrit</p>
	<input type="text" name="nom" class="mot2" value="<?php echo $NOM; ?>">
	<p class="p3">Prenom Inscrit</p>
	<input type="text" name="prenom" class="mot3" value="<?php echo $PRENOM; ?>">
    </div>
    <div class="c3">
	<p class="p4">Cote Livre</p>
	<input type="text" name="cote" class="mot4" value="<?php echo $cote; ?>">
	<button class="b2" name="valider" >Valider</button>
	<button class="b3" name="Ajouter" >Ajouter</button>
    <button class="b4" name="delete" >Suppremer</button>
	</div>
	</form>
</body>
</html>