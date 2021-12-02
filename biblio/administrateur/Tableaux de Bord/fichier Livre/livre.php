<!DOCTYPE html>
<html>
<head>
	<LINK REL="stylesheet" TYPE="text/css" HREF="livre.css" />
	<meta charset="utf-8">
	<title>Tableaux de livres</title>
    <style type="text/css">
        td{ text-align: center; background-color: black}
        table{margin-top: 80px; margin-left: 1px;}
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
        echo "<table>
        <tr>
            <th>Cote livre</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Editeur</th>
            <th>Annee d'edition</th>
            <th>Rubrique</th>
            <th>Type</th>
            <th>disponabilité</th>
        </tr>";
    }
    $req= mysqli_query($connexion,"SELECT * FROM livre");
    if($req)
    {
        while ($res = mysqli_fetch_array($req)) 
        {
            echo "<tr><td>".$res['Cote livre']."</td><td>".$res['Titre']."</td><td>".$res['Auteur']."</td><td>".$res['Editeur']."</td><td>".$res['Annee edition']."</td><td>".$res['Rubrique']."</td><td>".$res['Type']."</td><td>".$res['disponable']."</td></tr>";
        }
    }else
    {
        echo "erreure</br>";
        echo "le message".mysqli_error($connexion);
    }
    ?>
</body>
</html>