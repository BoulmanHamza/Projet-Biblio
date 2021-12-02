<!DOCTYPE html>
<html>
<head>
	<LINK REL="stylesheet" TYPE="text/css" HREF="suggestion.css" />
	<meta charset="utf-8">
	<title>suggestion</title>
    <style type="text/css">
        td{ text-align: center; background-color: black}
        table{margin-top: 80px; margin-left: 200px;}
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
        echo "<table><tr><th>Titre livre</th><th>Auteur</th><th>Edition</th><th>Date</th></tr>";
    }
    $req= mysqli_query($connexion,"SELECT * FROM suggestion");
    if($req)
    {
        while ($res = mysqli_fetch_array($req)) 
        {
            echo "<tr><td>".$res['Titre livre']."</td><td>".$res['Auteur']."</td><td>".$res['Edition']."</td><td>".$res['Date']."</td></tr>";
        }
    }else
    {
        echo "erreure</br>";
        echo "le message".mysqli_error($connexion);
    }
    ?>
</body>
</html>
	


