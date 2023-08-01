<?php
require_once './config.php';
require_once './models/Database.php';
require_once './models/Blog.php';

session_start();

$title = "Articles";


$Blog = new Blog();

$articles = $Blog->getAllArticles();


?>