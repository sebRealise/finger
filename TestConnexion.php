<?php


require 'connexion.php';

$appliBD= new Connexion;


?>

<?php

/* insertHobby("Education Cannine"); */
/* insertHobby("Conduire");
insertHobby("Apprendre");
insertHobby("Informatique");
insertHobby("Hypopotomonstrosesquipedaliophobie");
insertHobby("Jeux de société");
insertHobby("Jeux Vidéos");
insertHobby("Bricolage");
insertHobby("Mécanique"); */
?>

<?php 

/* insertMusique("Reggea");
insertMusique("Rap Fr");
insertMusique("PsyTrance");
insertMusique("Jodel");
insertMusique("Musique Française");
insertMusique("Classique");
insertMusique("Instrumental");
insertMusique("Metal");
insertMusique("Rock'n'Roll");
 */

?>

<?php

/* $monhobby = $_GET("hobby"); */
/* $monhobby = "Manger";
$succesHobby = insertHobby($monhobby);
if($succesHobby){
    echo "$monhobby a été inséré avec succès <br>";
} else {
        echo "Loupé";
} */

?>

<?php 
/* insertPersonne("Poulain", "Jeremy","LDn", "2001-03-12", "Libre"); */
/* insertPersonne("Roman", "Christian","Christi", "1992-08-04", "Marié");
insertPersonne("Ilderbrand", "Max","No rage", "2003-12-24", "Veuf");
insertPersonne("Boutton", "Elder","Elder photo", "1976-12-21", "Divorcé");
insertPersonne("LeDuck", "Gripsou","bisounours", "1934-06-13", "En couple"); */
/* ; */
/* insertPersonne("Moelleux", "Moomoo","Maskass", "2014-07-07", "Maskassé"); */
/* insertPersonne("Giédé", "Mélissa","Beber", "1956-10-11", "Divorcé"); */
?>
<?php


/* echo "<ol>";
    $hobbies=$appliBD->selectAllHobbies();
        foreach ($hobbies as $hobby){
            foreach ($hobby as $hob){
                echo "<li>".$hob."</li>";         
     }
 } 
echo "</ol>";
 */

 
/* $musics=$appliBD->selectAllMusics();
 foreach ($musics as $music){
     foreach ($music as $mus){
         echo '<input type="checkbox" name=$mus value=$mus>'.$mus.'<br>';
     }
 } */


/*  echo "<ul>";
$person=selectPersonneById(3);
 foreach ($person as $perso){
     foreach ($perso as $pers1){
        echo "<li>". utf8_encode($pers1)."<li>";
     }
 }
 echo "<ul>"; */

/* echo "<ol>";
    $personnes=$appliBD->selectAllPerson();
        foreach ($personnes as $per){
            foreach ($per as $pers){
                echo "<li>".$pers."</li>";         
  }
} 
echo "</ol>"; */

/* echo "<ol>";
    $personnes=$appliBD->selectAllPersonnames();
        foreach ($personnes as $per){
            foreach ($per as $pers){
                echo "<li>".$pers."</li>";         
  }
} 
echo "</ol>"; */
/* 
$monhobby = "Déminer";
$succesHobby = insertHobby(utf8_decode($monhobby));
if($succesHobby){
    echo "$monhobby a été inséré avec succès <br>";
} else {
        echo "Loupé";
}
 */

/* echo "<p> Hobbies</p><br>";
echo "<ul>";
$hobbies=$appliBD->selectAllHobbies();
foreach($hobbies as $hobby){
    echo "<li>" . $hobby-> Type . "</li>";
}
echo "</ul>";
 */
/* 
$personnes=$appliBD->selectPersonneByNomPrenomLike("e");
var_dump($personnes);
 */

/* 
$appliBD->insertHobby("Jouer à WoW"); 
$appliBD->insertHobby("Jouer à ESO");
$appliBD->insertHobby("Jouer à Warhammer");
$appliBD->insertHobby("Jouer à Guild Wars");
$appliBD->insertHobby("Jouer à Conan");
$appliBD->insertHobby("Jouer à SWTOR");
$appliBD->insertHobby("Jouer à RIFT"); 
$appliBD->insertHobby("Hypopotomonstrosesquipedaliophobie");
 */

/* var_dump($appliBD->getPersonneHobby(1)); */

/* var_dump($appliBD->selectAllHobbies()); */

var_dump($appliBD->getImage(1));
?>
