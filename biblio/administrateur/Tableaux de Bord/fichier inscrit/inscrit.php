<!DOCTYPE html>
<html>
<head>
	<LINK REL="stylesheet" TYPE="text/css" HREF="inscrit.css" />
	<meta charset="utf-8">
	<title>Fichier inscrit</title>
    <style type="text/css">
        td{ text-align: center; background-color: black}
        table{margin-top: 80px;}
    </style>
</head>
<body>
    <?php
    define('NOM_SERVEUR', "root");
    define('MOT_PASSE', "");
    define('SERVEUR', "localhost");
    define('NOM_BASE', "biblio");

    $connexion = mysqli_connect (SERVEUR, NOM_SERVEUR, MOT_PASSE);
    if (!$connexion) {
     echo "impossible de ce connecter au serveur MYSQL";
     exit;  
    }
    if(!mysqli_select_db($connexion,'biblio'))
    {
        echo "impossible de ce connecter à la BDD";
        exit;
    }else
    {
        echo "<center><table><tr><th>Identifiant inscrit</th><th>Nom inscrit</th><th>Prenom inscrit</th><th>Division inscrit</th><th>Poste inscrit</th></tr>";
    }
    $req= mysqli_query($connexion,"SELECT * FROM inscription");
    if($req)
    {
        while ($res = mysqli_fetch_array($req)) 
        {
            echo "<tr><td>".$res['Identifiant inscrit']."</td><td>".$res['Nom inscrit']."</td><td>".$res['Prenom inscrit']."</td><td>".$res['Division inscrit']."</td><td>".$res['Poste inscrit']."</td></tr>";
        }
    }else
    {
        echo "erreure</br>";
        echo "le message".mysqli_error($connexion);
    }echo "</table></center>";
    ?>
</body>
</html>