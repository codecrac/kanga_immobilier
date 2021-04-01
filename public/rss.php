<?php

$web_url = "http://" . $_SERVER["SERVER_NAME"];

$str = "<?xml version='1.0' ?>";
$str .= "<rss version='2.0'>";
$str .= "<channel>";
$str .= "<title>Kanga immobilier</title>";
$str .= "<description>Agence immobilier de qualité</description>";
$str .= "<language>fr-FR</language>";
$str .= "<link>$web_url</link>";

$conn = new PDO("mysql:host=localhost;dbname=kanga_immobilier", "root", "", );
$result = $conn->query("SELECT proprietes.titre,proprietes.id, proprietes.prix, categories_proprietes.nom as nom_categorie
                                    FROM proprietes,categories_proprietes
                                    WHERE proprietes.categorie_id=categories_proprietes.id
                                    ORDER BY proprietes.id DESC");
$liste_propriete = $result->fetchAll();

//var_dump($liste_propriete);

foreach($liste_propriete as $item_propriete)
{
    $str .= "<item>";
    $str .= "<title>" . htmlspecialchars($item_propriete['titre']) . "</title>";

    if(!preg_match("/[a-z]/i", $item_propriete['prix'])){
        $item_propriete['prix'] .= " FCFA";
    }
//    echo $item_propriete['prix'] ."<br/>";
    $str .= "<description>" . htmlspecialchars($item_propriete['nom_categorie']) ." | " . htmlspecialchars($item_propriete['prix']) . "</description>";
    $str .= "<link> $web_url/proprietes/" . $item_propriete['id'] . "</link>";
    $str .= "</item>";
}

$str .= "</channel>";
$str .= "</rss>";

file_put_contents("rss.xml", $str);
echo "Done";

header("Location:rss.xml");

?>
