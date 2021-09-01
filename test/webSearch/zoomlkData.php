<?php
//Link to download file...
//pages 397
$url='https://zoom.lk/category/films/page/20/';

// web page viwe
$data = file_get_contents($url);
// create new DOMDocument
$doc = new \DOMDocument('1.0', 'UTF-8');
// set error level
$internalErrors = libxml_use_internal_errors(true);
// load HTML
$doc->loadHTML($data);
// Select Element By ID 

// Select Element By Tag Name
$select_p_tag=$doc->getElementsByTagName('span');
// print_r($select_H_tag);
$uploadDate=$doc->getElementsByTagName('h3');

$movieNameArr=array();
foreach ($uploadDate as $h3 ){
    $AttrValue = $h3->getAttribute('class');
    if ($AttrValue=="entry-title td-module-title") {
        $Data = $h3->nodeValue;
        $spilt=explode(')',$Data);
        $movieName = $spilt[0].')';
        array_push($movieNameArr,$movieName);

    }

}



// print_r($movieNameArr);
$movieCount=count($movieNameArr);
$movieUploadDate=array();
foreach($select_p_tag as $p){
    $AttrValue = $p->getAttribute('class');
    if($AttrValue=="td-post-date"){
        $Data = $p->nodeValue;
        array_push($movieUploadDate,$Data);
        

    }

}

// print_r($movieUploadDate);
$arrCount=count($movieNameArr);
for ($i=0; $i < $arrCount; $i++) { 
    $movieName_Date=$movieNameArr[$i].'&'.$movieUploadDate[$i].'<br>';
    echo $movieName_Date;
}

    


libxml_use_internal_errors($internalErrors);





?>
