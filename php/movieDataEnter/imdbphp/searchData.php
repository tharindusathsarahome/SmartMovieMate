<?php
require "bootstrap.php";
require "inc.php";
$config = new \Imdb\Config();
$config->language = 'en-US,en';

if (isset($_POST['movieName'])) 
{  
    $movieName=$_POST['movieName'];
    if ($movieName!=" ") {
        $search = new \Imdb\TitleSearch();
        $results = $search->search($movieName, array(\Imdb\TitleSearch::MOVIE));
        for ($x = 0; $x < 5; $x++) {
            echo'<a href="#" name='.'"'.$results[$x]->imdbid().'"'. 'class="list-group-item" id="save">'. $results[$x]->title() .' ( ' . $results[$x]->year(). ')'.'</a>'.'<br>';

        }
    }
}

if (isset($_POST['nameTag'])) {
    if ($_POST['nameTag']) {
        $Arr[]=$_POST['imdb_id'];
        include_once 'dataBaseSet.php';
        $DataSet = new insterData();
        $DataSet->Arr = $Arr;
        $DataSet->LanguageTableCreat(' ');

// 

    }
}



?>