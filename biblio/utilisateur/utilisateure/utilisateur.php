<!DOCTYPE html>
<html>
<head>
    <LINK REL="stylesheet" TYPE="text/css" HREF="utilisateur.css" />
    <title>utilisateur</title>
    <meta charset="utf-8">
    <style type="text/css">
        td{ text-align: center; background-color: black}
    </style>
</head>
<body>
    <img src="1.png" class="img"/>
    <br><br>
    <center>
    <a href="../../acceuil/acceuille.html"><button class="b"><b>Acceuil</b></button></a>
    <a href="../Nouvelles Acquisitions/Nouvelles Acquisitions.php"><button class="b"><b>Nouvelles Acquisitions</b></button></a>
    <a href="../Suggestions/Suggestion.html"><button class="b"><b>Suggestions</b></button></a>
    <a href="../Réglement interne/Réglement interne.pdf"><button class="b"><b>Règlement interne</b></button></a>
    </center>
    <form method="POST" action="">
    <p class="p">Mot clé</p>
    <input type="text" name="Mot" class="mot">
    <button class="b1">Recherche</button>
    <p class="p1">Rubrique</p>
    <select name="Rubrique">
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
    </form>
    <br><br><br>
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
    $MOT=$_POST['Mot'];
    $RUBRIQUE=$_POST['Rubrique'];
    $req= mysqli_query($connexion,"SELECT * FROM livre  WHERE (`livre`.`Rubrique` = '$RUBRIQUE' AND `livre`.`Titre` LIKE '%$MOT%')");
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
    echo"</table>";
    
    ?>  
    <p class="nb">NB: Les livres signalés comme "indisponible" sont en cours de prêt</p>

</body>
</html>
