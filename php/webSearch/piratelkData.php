<?php
//Link to download file...
//pages 397
include_once  'PublicClass/class.php';
class PiratelkData
{
    public function Data($url)
    {
        
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
$uploadDate=$doc->getElementsByTagName('h2');

$movieNameArr=array();
foreach ($uploadDate as $h2 ){
    $AttrValue = $h2->getAttribute('class');
    if ($AttrValue=="post-box-title") {
        $Data = $h2->nodeValue;
        $Data = explode('|',$Data);
        $movieName=str_replace('Sinhala Subtitles','',$Data[0]);
        $movieName = explode(')',$movieName);
        $movieName = $movieName[0].')';
        // echo $movieName.'<br>';
        array_push($movieNameArr,$movieName);
    }

}

// print_r($movieNameArr);
$movieCount=count($movieNameArr);
$count=0;
$movieUploadDate=array();
foreach($select_p_tag as $p){
    $AttrValue = $p->getAttribute('class');
    if($AttrValue=="tie-date"){
        $Data = $p->nodeValue;
        $count+=1;
        if($movieCount>=$count){
            array_push($movieUploadDate,$Data);
        }

    }


}
// print_r($movieUploadDate);
$arrCount=count($movieNameArr);
for ($i=0; $i < $arrCount; $i++) { 
    $movieName_Date=$movieUploadDate[$i].'&'.$movieNameArr[$i].'<br>';
    $values[] = $movieName_Date;
}
return $values;
    


libxml_use_internal_errors($internalErrors);




    }
}

$url='https://piratelk.com/category/%e0%b7%83%e0%b7%92%e0%b6%82%e0%b7%84%e0%b6%bd-%e0%b6%8b%e0%b6%b4%e0%b7%83%e0%b7%92%e0%b6%bb%e0%b7%90%e0%b7%83%e0%b7%92/%e0%b6%a0%e0%b7%92%e0%b6%ad%e0%b7%8a%e2%80%8d%e0%b6%bb%e0%b6%b4%e0%b6%a7%e0%b7%92/';
$movie = new PiratelkData();
$name = $movie->Data($url);
$DATEval = new DateGenerator();
$DateVal=$DATEval->Date($name);

?>
