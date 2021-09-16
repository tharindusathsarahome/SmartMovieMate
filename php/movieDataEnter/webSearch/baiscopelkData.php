<?php
//Link to download file...
include 'PublicClass/class.php';
class baiscopelk{   
    public function Data($url)
    {
        # code...
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
        $select_H_tag=$doc->getElementsByTagName('p');
        // print_r($select_H_tag);
        $uploadDate=$doc->getElementsByTagName('h2');
        $movieData_1 = array();
        foreach ($uploadDate as $h2 ){
            $AttrValue = $h2->getAttribute('class');
            if ($AttrValue=="post-box-title") {
                $Data = $h2->nodeValue;
                $spiltData=explode('|',$Data);
                // print_r($spiltData);
                // $spilt = explode(')',$spiltData[1]));
                // $spilt_1 = $spilt[1].')';
                $spiltDate = explode(']',$spiltData[1]);
                // print_r($spiltDate);
                $arrCount=count($spiltDate);
                if ($arrCount>2) {
                    $date=$spiltDate[2];
                }
                else {
                    $date=$spiltDate[1];
                }
                $spiltData[0]=str_replace("Sinhala Subtitles","",$spiltData[0]);
                $spiltData[0]=str_replace("Sinhala subtitles","",$spiltData[0]);
                $movieName = explode(')',$spiltData[0]);
                $movieName = $movieName[0].')';

                array_push($movieData_1,$movieName);
            }
        }
        // print_r($movieData_1);

        foreach($movieData_1 as $nameData_1){
            $nameData_1=str_replace("Sinhala Subtitle","",$nameData_1);

            // echo $nameData_1.'<br>';
        }
            
        $dateArr=array();
        $Date=date("Y/m/d");
        foreach ($select_H_tag as $p ){
            $AttrValue = $p->getAttribute('class');
            if ($AttrValue=="post-meta") {
                $Data = $p->nodeValue;
                // echo $Data.'<br>';
                $x=explode(",",$Data,'3');
                // echo $x[0];
                $x1 = str_replace('18+','',$x[0]);
                $x1.=$x[1];
                $Date_1=str_replace("All","",$x1);
                $Date_2 = str_replace('Featured Articles','',$Date_1);
                $Date_3 =  str_replace('18+','',$Date_2);
                // echo $DateName_1;
                
            
              
                array_push($dateArr,$Date_3);
            }
        
        }
        // print_r($dateArr);
        $arrCount=count($dateArr);
        for ($i=0; $i < $arrCount; $i++) { 
            $movieName_Date=$dateArr[$i].'&'.$movieData_1[$i];
            $movieName_Date=str_replace('Sinhala Subtitle',"",$movieName_Date);
            $values[] = $movieName_Date;
        }
        return $values;

        libxml_use_internal_errors($internalErrors);

    }

    }
$url='https://www.baiscopelk.com/category/%e0%b7%83%e0%b7%92%e0%b6%82%e0%b7%84%e0%b6%bd-%e0%b6%8b%e0%b6%b4%e0%b7%83%e0%b7%92%e0%b6%bb%e0%b7%90%e0%b7%83%e0%b7%92/%e0%b6%a0%e0%b7%92%e0%b6%ad%e0%b7%8a%e2%80%8d%e0%b6%bb%e0%b6%b4%e0%b6%a7%e0%b7%92/page/20/';
$movie = new baiscopelk();
$name = $movie->Data($url);
$DATEval = new DateGenerator();
$DateVal=$DATEval->Date($name);









    










?> 
