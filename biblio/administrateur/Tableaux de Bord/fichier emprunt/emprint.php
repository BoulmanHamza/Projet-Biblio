<!DOCTYPE html>
<html>
<head>
   <LINK REL="stylesheet" TYPE="text/css" HREF="emprint.css" />
    <meta charset="utf-8">
    <title>Emprunt</title>
    <style type="text/css">
        td{ text-align: center; background-color: black}
        table{margin-top: 80px; margin-left: 20px;}
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
            <th>Cote Livre</th>
            <th>Identifiant Inscrit</th>
            <th>Date Emprunt</th>
            <th>Date Retour</th>
            <th>Phase</th>";
    }
    $req= mysqli_query($connexion,"SELECT * FROM emprunt");
    if($req)
    {
        while ($res = mysqli_fetch_array($req)) 
        {
            echo "<tr><td>".$res['Cote Livre']."</td><td>".$res['Code Inscrit']."</td><td>".$res['Date Emprunt']."</td><td>".$res['Date Retour']."</td><td>".$res['Phase']."</td><tr>";
        }
    }else
    {
        echo "erreure</br>";
        echo "le message".mysqli_error($connexion);
    }
    ?>
</body>
</html>
    