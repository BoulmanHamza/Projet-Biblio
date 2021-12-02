<!DOCTYPE html>
<html>
<head>
	<LINK REL="stylesheet" TYPE="text/css" HREF="Nouvelles Acquisitions.css" />
	<meta charset="utf-8">
	<title>Nouvelles Acquisitions</title>
    <style type="text/css">
        td{ text-align: center; background-color: black}
        table{margin-top: 80px; margin-left: 1px;}
        .b2
{
    background-image: linear-gradient(180deg,rgba(106,106,106,1.00) 10.88%,rgba(45,45,45,1.00) 45.08%,rgba(75,75,75,1.00) 78.76%);
    outline: none;
    height: 30px;
    font-size: 18px;
    width:110px; 
    color:white;
    border-color: rgba(75,75,75);
    border-radius: 5px;
    margin-top: 40px;
    margin-left: 1100px;
    position: absolute;
}
.b2:hover
{
    cursor: pointer;
    background-image: linear-gradient(180deg,rgba(75,75,75,1.00) 10.88%,rgba(45,45,45,1.00) 45.08%,rgba(106,106,106,1.00) 78.76%);
    color:black;
}

    </style>
</head>
<body>
        <img src="1.png" class="img"/>
        <br><br>
         <p><b>Liste des Livres nouvellement acquis</b></p>
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
    echo"</table>";
    
    ?>  
    <a href="../utilisateure/utilisateur.html"><button class="b2">precedant</button></a>"

</body>
</html>