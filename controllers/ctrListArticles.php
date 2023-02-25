<?php
require_once './config.php';
require_once './models/Database.php';
require_once './models/Blog.php';

session_start();

$title = "Articles";

/*//exemple foreach
$fruits = array("banane", "pomme", "orange", "fraise");

foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}*/

/*$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
}
// $arr vaut maintenant array(2, 4, 6, 8)*/


$Blog = new Blog();

$articles = $Blog->getAllArticles();


/*var_dump($articles);

var_dump($articles['0']['blog_title']);*/



?>