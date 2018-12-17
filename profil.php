<?php
// error_reporting(0);
require 'connexion.php';
$appliBD= new Connexion();
if(is_null($_POST["id"]) && is_null($_POST[nom])){
    $_POST["id"]=1;
}

var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profil de: NOM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
<!--   <link href='https://fonts.googleapis.com/css?family=Barrio' rel='stylesheet'> -->
</head>

<body> 
    <a href="home.php" id="home"><img class="imghome" src="image/home.png" alt="Maison champignon"></a>
    <div>
        <h1>
        PROFIL
        </h1>
    </div>

    <table>     
        <tr>
            <?php
                if(!is_null($_POST["id"])){
                    $lien= $appliBD->getImage($_POST["id"]);
                    echo '<td rowspan="2" id="topho"><div class="divInvisib"><img class="imgmerdique" src="'.$lien.'" alt="L" style="width:100%"></div></td>';
                }
                else{
                    echo '<td rowspan="2" id="topho"><div class="divInvisib"><img class="imgmerdique" src="'.$_POST["lien"].'" alt="L" style="width:100%"></div></td>';
                }
                if(!is_null($_POST["id"])){
                    echo var_dump($_POST["id"]);
                    $nom= $appliBD->getNom($_POST["id"]);
                    echo '<td class="nm"><div>'.$nom.'</div></td>';
                }
                else{
                    echo '<td class="nm"><div>'.$_POST["nom"].'</div></td>';
                }
                if(!is_null($_POST["id"])){
                    $date= $appliBD->getDate($_POST["id"]);
                    echo '<td rowspan="2" id="teda"><div>'.$appliBD->inverseDate($date).'</div></td>';
                }
                else{
                    echo '<td rowspan="2" id="teda"><div>'.$_POST["naissance"].'</div></td>';
                }
                
            ?>
        </tr>
        <tr>
            <?php
                if(!is_null($_POST["id"])){
                    $prenom= $appliBD->getPrenom($_POST["id"]);
                    echo '<td class="nm"><div>'.$prenom.'</div></td>';
                }
                else{
                    echo '<td class="nm"><div>'.$_POST["prenom"].'</div></td>';
                }
            ?>
        </tr>

    </table>
        

        
    <div>
        <h2 id="stts">
        AUTRE
        </h2>
    </div>

    <div class="flxbx">
        <h2><div class="divInvisib">
        Musique</div>
        </h2>
        <div>
            <ul class="muse">
            <?php 
                if(!is_null($_POST["id"])){
                    $musique= $appliBD->getPersonneMusique($_POST["id"]);
                    foreach ($musique as $music){

                        echo '<li>'.$music["Type"].'</li>';
                    }
                }
                else{
                    foreach ($_POST["metal"] as $music){

                        echo '<li>'.$music.'</li>';
                    }
                }
            ?>
                
               
            </ul>
        </div>
    </div>

    <div class="flxbx">
        <h2><div class="divInvisib">
            HOBBIES</div>
        </h2>
        <div>
            <ul class="muse">
            <?php 
                if(!is_null($_POST["id"])){
                    $hobbies= $appliBD->getPersonneHobby($_POST["id"]);
                    foreach ($hobbies as $hobby){
                        echo '<li>'.$hobby["Type"].'</li>';
                    }
                }
                else{
                    foreach ($_POST["jouer"] as $hobby){

                        echo '<li>'.$hobby.'</li>';
                    }
                }
            ?>
            </ul>
        </div>
    </div>

    <div>
        <table id="sonic">
            <tr>
                <?php
                if(!is_null($_POST["id"])){
                    $relations=$appliBD->getRelationPersonne($_POST["id"]);
                    foreach ($relations as $rel){
                        if(!is_null($rel)){
                            $id=$appliBD->searchId($rel["Nom"]);
                            $lien=$appliBD->getImage($id);
                            echo '<tr>';
                            echo '<td><img class="imgmerdique" src="'.$lien.'" alt="'.$appliBD->getNom($id).' '.$appliBD->getPrenom($id).'"></td>';
                            echo '<td>'.$rel["Nom"].', '.$rel["Prenom"].' :    '.$rel["Type"].'</td>';
                            echo '</tr>';
                        }
                    }
                }
                else{
                    $count=1;
                    foreach ($_POST["relations"] as $rel){
                        if($rel!=""){
                            $id=$appliBD->searchId($_POST["Nom"]);
                            $lien=$appliBD->getImage($count);
                            echo '<tr>';
                            echo '<td><img class="imgmerdique" src="'.$lien.'" alt="'.$appliBD->getNom($count).' '.$appliBD->getPrenom($count).'"></td>';
                            echo '<td>'.$appliBD->getNom($count).', '.$appliBD->getPrenom($count).' :    '.$rel.'</td>';
                            echo '</tr>';
                        }
                        $count++;
                    }
                }
                ?>
            </tr>
          
        </table>
    </div>
    <div>
        <a href="creer_compte.php">Créer un compte?</a>
    </div>

</body>
</html>
<?php





if(!is_null($_POST["nom"])){
    inscription();
}

function inscription(){
    $count=1;
    $appliBD=new Connexion;
    $appliBD->insertPersonne($_POST["nom"],$_POST["prenom"],$_POST["lien"],$_POST["naissance"],$_POST["etat"]);
    $newId=$appliBD->searchId($_POST["nom"]);
    $id=$newId;
    if(!is_null($_POST["metal"])){
        $appliBD->insertPersonneMusique($newId,$_POST["metal"]);
    }
    if(!is_null($_POST["jouer"])){
        $appliBD->insertPersonneHobbies($newId,$_POST["jouer"]);
    }
    if(!is_null($_POST["relations"])){
        foreach($_POST["relations"] as $rel){
            if($rel!==""){
                $appliBD->insertPersonneRelation($newId,$count,$rel);
            }
            $count++;
        }
        
    }
}
?>