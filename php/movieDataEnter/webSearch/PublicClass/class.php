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
                $uploadDateVal[] = $uploadDate;;
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
      $this->uploadDateVal = $uploadDateVal;
      $this->valMovieName = $valMovieName;
      
    }
}



?>