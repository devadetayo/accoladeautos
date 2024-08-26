<?php 

    require "app/core/init.php";

    $url = $_GET['url'] ?? 'home';
    $url = explode("/", $url);
    $page_name = trim($url[0]);
    if($url){
        $filename = "app/pages/".$page_name.".php";
    }else{
        $filename = "app/pages/home.php";
    }

    if(file_exists($filename)){
        require_once $filename;
    }else{
        require_once "app/pages/error.php";
    }

?>