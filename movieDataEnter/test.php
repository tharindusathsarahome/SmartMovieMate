<?php


require("bootstrap.php");
require "inc.php";

// include "bootstrap.php"; // Load the class in if you're not using an autoloader
$search = new \Imdb\TitleSearch(); // Optional $config parameter
$results = $search->search('The Matrix', array(\Imdb\TitleSearch::MOVIE)); // Optional second parameter restricts types returned

// $results is an array of Title objects
// The objects will have title, year and movietype available
// immediately, but any other data will have to be fetched from IMDb
foreach ($results as $result) { /* @var $result \Imdb\Title */
    echo $result->title() . ' ( ' . $result->year() . ')';
}



?>
