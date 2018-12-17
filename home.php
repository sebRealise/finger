<?php
require('connexion.php');
error_reporting(0);

echo <<<MON_HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href='https://fonts.googleapis.com/css?family=Barrio' rel='stylesheet'>
    <script src="main.js"></script>
</head>

<body>
    <div>
        <h1>Recherche de profils</h1>
        <form action="home.php" method="post">
        <input type=text id=recherche name=recherche placeholder="Veuillez taper votre recherche de profils ici" autofocus>
        <br>
        <input type="submit" value="Rechercher" style=font-size:150%;border-radius:45%;height:3em;>
        </form>
    </div>
   
    
</body>

</html>

MON_HTML;



if(is_null($_POST) || $_POST["recherche"]==""){
    population();
}
if(!is_null($_POST["recherche"]) && $_POST["recherche"]!==""){
    $appliBD=new Connexion;
    $ids=$appliBD->search_personne($_POST["recherche"]);
    echo '
        <table class="photo_home">
        
    ';
    $j=1;
    foreach($ids as $i){
        $lien=$i["URL_Photo"];
        $nom=$i["Nom"];
        $prenom=$i["Prenom"];
        if(($j-1)%3==0){
            echo'<tr>';
        }
        echo '
                    <form action="profil.php" method="post">
                    <td class="tdhome">
                        <div class="divInvisib">
                            <input type="hidden" name="id" value="'.$i["Id"].'"></input>
                            <input type="image" src='.$lien.' class="imgmerdique"></input>
                        </div>
                        <p class="np_home" name="id" value="'.$i["Id"].'">'.$nom.' '.$prenom.'</p>
                    </td>
                    </form>
        ';
        if($i%3==0){
            echo'</tr>';
        }
        $j++;
    }
    echo '
    </table>
    <div>
        <a href="creer_compte.php">Créer un compte?</a>
    </div>
    <div>
        <a href="creer_compte.php">Créer un compte?</a>
    </div>
    ';
}

function population(){
    $appliBD=new Connexion;
    $newId=$appliBD->getCompteId();
    echo '
        <table class="photo_home">
    ';
    for($i=1;$i<=$newId;$i++){
        $lien=$appliBD->getImage($i);
        $nom=$appliBD->getNom($i);
        $prenom=$appliBD->getPrenom($i);
        if(($i-1)%3==0){
            echo'<tr>';
        }
        echo '
            <form action="profil.php" method="post">
                <td class="tdhome">
                    <div class="divInvisib">
                        <input type="hidden" name="id" value="'.$i.'">
                        <input type="image" src='.$lien.' class="imgmerdique">
                    </div>
                    <p class="np_home" name="id" value="'.$i.'">'.$nom.' '.$prenom.'</p>
                </td>
            </form>
        ';
        if($i%3==0){
            echo'</tr>';
        }
    }
    echo'
    </table>
    <div>
        <a href="creer_compte.php">Créer un compte?</a>
    </div>

    <div>
        <a href="creer_compte.php">Créer un compte?</a>
    </div>
    ';  
}



?>
