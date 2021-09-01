<?php
//Link to download file...
//pages 397
$url='https://www.upasirasi.com/category/films/page/5/';

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
$select_p_tag=$doc->getElementsByTagName('time');
// print_r($select_H_tag);
$uploadDate=$doc->getElementsByTagName('h2');

$movieNameArr=array();
foreach ($uploadDate as $h2 ){
    $AttrValue = $h2->getAttribute('class');
    if ($AttrValue=="entry-title") {
        $Data = $h2->nodeValue;
        // echo $Data;
        $spilt=explode('|',$Data);
        $movieName = str_replace("Sinhala Subtitles","",$spilt[0]);
        array_push($movieNameArr,$movieName);

    }

}



// print_r($movieNameArr);
$movieCount=count($movieNameArr);
$movieUploadDate=array();
foreach($select_p_tag as $p){
    $AttrValue = $p->getAttribute('datetime');
    $upDate = explode('T',$AttrValue);
    // echo $upDate[0];
    array_push($movieUploadDate,$upDate[0]);
        
}

// print_r($movieUploadDate);
$arrCount=count($movieNameArr);
for ($i=0; $i < $arrCount; $i++) { 
    $movieName_Date=$movieNameArr[$i].'&'.$movieUploadDate[$i].'<br>';
    echo $movieName_Date;
}

    


libxml_use_internal_errors($internalErrors);





?>
