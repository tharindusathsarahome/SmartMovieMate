<?php
set_time_limit(1000);
class UpcomingReleases
{
    //Link to download file...
    public $url;

    function selectUpcoming($url)
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
        $tagList=$doc->getElementById('main');
        // Select Element By Tag Name
        $select_H_tag=$doc->getElementsByTagName('h4');
        // print_r($select_H_tag);

        // Tag Value select
        $str=$tagList->nodeValue;

        // str spirt 
        $x=explode(')',$str);
        // print_r($x);
        $count=0;

        // fech Array
        foreach ($select_H_tag as $h5 ){
            $count+=1;
            $x=str_replace($h5->nodeValue,"",$x);
            
        }
        foreach ($x as $x1) {
            echo $x1.')'.'<br>';
        }


        // Restore error level
        libxml_use_internal_errors($internalErrors);
    }
    
}

$Countrys = array('AF','AL','DZ','AS','AD','AI','AQ','AG','AR','AM','AW','AU','AT','AZ','BS','BH','BD','BB','BY','BZ','BJ','BM','BT','BO','BA','BW','BV','BR','IO','VG','BN','BG','BF','BI','BI','KH','CM','CA','CV','BQ','KY','CF','CX','CC','CO','KM','CG','CD','CK','CR','HR','CU','CW','CY','CZ','CI','DK','DJ','DM','DO','EC','EG','SV','GQ','ER','EE','SZ','ET','FK','FO','FJ','FI','FR','GF','PF','TF','GA','GM','GE','DE','GH','GI','GR','GL','GD','GP','GU','GT','GG','GN','GW','GY','HT','HM','HN','HK','HU','IS','IN','ID','IR','IQ','IE','IM','IL','IT','JM','JP','JE','JO','KZ','KE','KI','KW','KG','LA','LV','LB','LS','LR','LY','LI','LT','LY','MO','MG','MW','MY','MV','ML','MT','MH','MQ','MR','MU','YT','MX','FM','MD','MC','MN','ME','MS','MA','MZ','MM','NA','NR','NP','NR','NP','NL','NC','NZ','NI','NE','NG','NU','NF','KP','MK','NO','OM','PK','PW','PS','PA','PG','PY','PE','PH','PN','PL','PT','PR','QA','RO','RU','RW','RE','WS','SM','SA','SN','RS','SC','SL','SG','SK','SI','SB','SO','ZA','GS','KR','ES','LK','BL','SH','KN','LC','MF','PM','VC','SD','SR','SJ','CH','SY','ST','TW','TJ','TZ','TH','TL','TG','TK','TO','TT','TN','TR','TM','TC','TV','UM','VI','UG','UA','AE','GB','US','UY','UZ','VU','VA','VE','VN','WF','EH','YE','ZM','ZW','AX');
echo count($Countrys);
foreach($Countrys as $Country){
    $creteURL='calendar?region='.$Country.'&ref_=rlm';
    $URL='https://www.imdb.com/'.$creteURL;
    $Upcoming = new UpcomingReleases();
    $Upcoming->selectUpcoming($URL);
}
//




?>
