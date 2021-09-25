<?php
class DateGenerator
{
    public $valMovieName;
    public $uploadDateVal;
    public function Date($name)
{        
        $today=date("Y-m-d");
        $movieMonthDate_1=array("Jan","Feb","Mar","Apr","May","jun","Jul","Aug","Sep","Oct","Nov","Dec");
        $movieMonthDate_2=array("January","February","March","April","May","June","July","August","September","October","November","December");
        foreach($name as $movieName){
            // echo $movieName;
            $date = explode('&',$movieName);
            $date2 = explode(' ',$date[0]);
            $valMovieName[]=$date[1];
            $y = strtotime($date2[0]);
            for ($m=0; $m <12 ; $m++) { 
                $z = strtotime($movieMonthDate_1[$m]);
                if ( $y == $z || $y == $movieMonthDate_2[$m]) {
                    $m +=1;
                    $uploadDate = $date2[2]."-".$m."-".$date2[1];
                    $uploadDate = date($uploadDate);
                    $uploadDateVal[] = $uploadDate;
            }
            }
    
        
            
            if("days" == $date2[1]){    
                    $MovieDay =(int)$date2[0];
                    $uploadDate= date("Y-m-d",strtotime("$today -$MovieDay days"));
                    $uploadDateVal[] = $uploadDate;
            }
            elseif ("day" == $date2[1]){    
                $MovieDay =(int)$date2[0];
                $uploadDate= date("Y-m-d",strtotime("$today -$MovieDay days"));
                $uploadDateVal[] = $uploadDate;
        }
            elseif ("hours" == $date2[1] ) {
                $uploadDate = $today;
                $uploadDateVal[] = $uploadDate;
            }
            elseif ('week'== $date2[1] ) {
                if ('1'==$date2[0]) {
                    $MovieWeek = 7 ;
                    $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                    $uploadDateVal[] = $uploadDate;
                }
                elseif ("2"== $date2[0]) {
                    $MovieWeek = 14 ;
                    $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                    $uploadDateVal[] = $uploadDate;
                }
                elseif ("3"== $date2[0]) {
                    $MovieWeek = 21 ;
                    $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                    $uploadDateVal[] = $uploadDate;
                }
                elseif ("4"== $date2[0]) {
                    $MovieWeek = 28 ;
                    $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                    $uploadDateVal[] = $uploadDate;
                }
            
            }
            elseif ('weeks'== $date2[1] ) {
                if ('1'==$date2[0]) {
                    $MovieWeek = 7 ;
                    $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                    $uploadDateVal[] = $uploadDate;
                }
                elseif ("2"== $date2[0]) {
                    $MovieWeek = 14 ;
                    $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                    $uploadDateVal[] = $uploadDate;
                }
                elseif ("3"== $date2[0]) {
                    $MovieWeek = 21 ;
                    $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                    $uploadDateVal[] = $uploadDate;
                }
                elseif ("4"== $date2[0]) {
                    $MovieWeek = 28 ;
                    $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                    $uploadDateVal[] = $uploadDate;
                }
            
            }
        
            
                
        }
      
      $this->valMovieName = $valMovieName;
      $this->dateSet($uploadDateVal);
     
    }

    public function dateSet($uploadDateVal)
    {
    $count_1 = count($uploadDateVal); 
    for ($i=0; $i < $count_1; $i++) { 
        $dateVal = $uploadDateVal[$i];
        $dateSpilit = explode("-",$dateVal);
        // print_r($dateSpilit);
        if ($dateSpilit[1] == '1') {
            $mm = '01';
        }
        elseif ($dateSpilit[1] == '2') {
            $mm = '02';
        }
        elseif ($dateSpilit[1] == '3') {
            $mm = '03';
        }
        elseif ($dateSpilit[1] == '4') {
            $mm = '04';
        }
        elseif ($dateSpilit[1] == '5') {
            $mm = '05';
        }
        elseif ($dateSpilit[1] == '6') {
            $mm = '06';
        }
        elseif ($dateSpilit[1] == '7') {
            $mm = '07';
        }
        elseif ($dateSpilit[1] == '8') {
            $mm = '08';
        }
        elseif ($dateSpilit[1] == '9') {
            $mm = '09';
        }
        else {
            $mm = $dateSpilit[1];
        }


        $spitlDate0 = explode(",",$dateSpilit[2]);
        $CDD = $spitlDate0[0];
        if ($CDD == '1') {
            $dd = '01';
        }
        elseif ($CDD == '2') {
            $dd = '02';
        }
        elseif ($CDD == '3') {
            $dd = '03';
        }
        elseif ($CDD == '4') {
            $dd = '04';
        }
        elseif ($CDD == '5') {
            $dd = '05';
        }
        elseif ($CDD == '6') {
            $dd = '06';
        }
        elseif ($CDD == '7') {
            $dd = '07';
        }
        elseif ($CDD == '8') {
            $dd = '08';
        }
        elseif ($CDD == '9') {
            $dd = '09';
        }
        else {
            $dd = $dateSpilit[2];
        }
        
        $dd = str_replace(',','',$dd);
        $date =$dateSpilit[0].'-'.$mm.'-'.$dd;
        $newDate = date("Y-m-d", strtotime($date));
        // $date = str_replace('\r','/',$date);
        // echo $newDate .'<br>'; 
        // echo $date."<br>";
        $uploadDateVal1[] = $newDate;
     }
    $this->uploadDateVal = $uploadDateVal1;
    
    }
}



?>