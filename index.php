<?php
include_once "classes/Page_Data.class.php"; //import the class

#the below 2 lines display error messages
error_reporting( E_ALL);
ini_set("display_errors", 1);

#using objects to prevent name clashes
$pageData = new Page_Data(); //create an instance of Page_Data class
$pageData->title = "Sande Sydney: Portfolio Site";
$pageData->content = include_once "views/navigation.php";
$pageData->css = "<link href='css/layout.css' rel='stylesheet' />";

#accessing the Url variables using $_GET superglobal array
$navigationIsClicked = isset($_GET['page']);
if ($navigationIsClicked) 
{
     $fileToLoad = $_GET['page'];
} else {
        $fileToLoad = "skills"; //default page to load
}
$pageData->content .= include_once "views/$fileToLoad.php";

//using dynamic style
$pageData->embeddedStyle = "
    <style>
        nav a[href *= '?page=$fileToLoad']{
            padding: 3px;
            background-color:white;
            border-top-left-radius:3px;
            border-top-right-radius:3px;
        }
    </style>
";

#path to the template to include
$page = include_once 'templates/page.php';

echo $page;