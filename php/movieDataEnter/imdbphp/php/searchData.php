<?php
require("../bootstrap.php");
require "../inc.php";
$config = new \Imdb\Config();
$config->language = 'en-US,en';

if (isset($_POST['movieName'])) 
{  
    $movieName=$_POST['movieName'];
    if ($movieName!=" ") {
        // include "bootstrap.php"; // Load the class in if you're not using an autoloader
        $search = new \Imdb\TitleSearch(); // Optional $config parameter
        $results = $search->search($movieName, array(\Imdb\TitleSearch::MOVIE)); // Optional second parameter restricts types returned

        // $results is an array of Title objects
        // The objects will have title, year and movietype available
        // immediately, but any other data will have to be fetched from IMDb
        foreach ($results as $result) { /* @var $result \Imdb\Title */
            echo'<a href="#" name='.'"'.$result->imdbid().'"'. 'class="list-group-itrm list-group-item-action border-1️" id="save">'. $result->title() .' ( ' . $result->year(). ')'.'</a>'.'<br>';

        }

    }

}


if (isset($_POST['nameTag'])) {
    if ($_POST['nameTag']) {
        $imdb_id=$_POST['imdb_id'];
        $nameTag=$_POST['nameTag'];
        $config = new \Imdb\Config();
        $config->language = 'en-US,en';
        $movie = new \Imdb\Title($imdb_id,$config);
        include '../../php/dbconn.php';
        
    }

}

?>