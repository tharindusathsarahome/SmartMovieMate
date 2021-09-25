<?php

class APICall
{

public $seletData;
public $seletData0;
public $APIval;
public $DateAPI;

   
    public function SQLquery($tableName,$col,$data,$type)
    {
        if ($type=='I') {
            include '../dbconn.php';
            $sql = "INSERT INTO ".$tableName." (".$col.")
            VALUES (".$data.")";
            if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully <br>";  
            } 
            
            else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        elseif ($type == 'S') {
            include '../dbconn.php';
            $sql = "SELECT $col FROM `$tableName` WHERE $data";
            // echo $sql;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row[] = $result->fetch_assoc()) {
               $this->seletData=$row;
              }
              
            } else {
              echo "0 results";
            }
        }
        elseif ($type == 'S2') {
            include '../dbconn.php';
            $sql = "SELECT $col FROM `$tableName` WHERE $data";
            // echo $sql;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row[] = $result->fetch_assoc()) {
               $this->seletData0=$row;
              }
              
            } else {
              echo "0 results";
            }
        }
    }

    public function DataInsert()
    {
        $this->SQLquery('createtablename_tb','tableName,LanName','1','S');
        $SQLdata=$this->seletData;
        $lenth = count($SQLdata);
        for ($i=0; $i < $lenth; $i++) { 
            $tableName = $SQLdata[$i]['tableName'];
            $lanName =  $SQLdata[$i]['LanName'].'ID';
            $this->SQLquery("$tableName","*","1",'S2');
            $tableData1 = $this->seletData0;
            $type = gettype($tableData1);
            // echo $type;
            if($type=='array'){
                $t_lenth = count($tableData1);
                print_r($tableData1);
                for ($d=0; $d <$t_lenth ; $d++) { 
                    $name = $tableData1[$d]['name'];
                    $YYY = $tableData1[$d]["MovieYear"];
                    $ID = 0;
                    $this->TrailerData($ID,$name,$YYY);
            }
            }
            
          

        }
    }


    public function API($type,$name,$year)
    {
       
         $name_s = str_replace(' ','%',$name);
         $URL = 'http://127.0.0.1:8000/SearchData/'."$type/?Movie=$name_s&Year=$year";
         $make_call = file_get_contents($URL);
         $response = json_decode($make_call, true);
         $this->APIval = $response;
        
    }


    public function Date($date2)
    {
        
        $today=date("Y-m-d");       
     if("days" == $date2[1]){    
        $MovieDay =(int)$date2[0];
        $uploadDate= date("Y-m-d",strtotime("$today -$MovieDay days"));
        
        }
        elseif ("day" ==$date2[1]){    
            $MovieDay =(int)$date2[0];
            $uploadDate= date("Y-m-d",strtotime("$today -$MovieDay days"));
            
        }
        elseif ("years" == $date2[1]){    
            $MovieDay =(int)$date2[0];
            $uploadDate= date("Y-m-d",strtotime("$today -$MovieDay years"));
            
        }
        elseif ("month" == $date2[1]){    
            $MovieDay =(int)$date2[0];
            $uploadDate= date("Y-m-d",strtotime("$today -$MovieDay month"));
            
        }
        elseif ("months" == $date2[1]){    
            $MovieDay =(int)$date2[0];
            $uploadDate= date("Y-m-d",strtotime("$today -$MovieDay month"));
            
        }
        elseif ("hours" == $date2[1] ) {
            $uploadDate = $today;
            
        }
        elseif ('week'== $date2[1] ) {
            if ('1'==$date2[0]) {
                $MovieWeek = 7 ;
                $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                
            }
            elseif ("2"== $date2[0]) {
                $MovieWeek = 14 ;
                $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                
            }
            elseif ("3"== $date2[0]) {
                $MovieWeek = 21 ;
                $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                
            }
            elseif ("4"== $date2[0]) {
                $MovieWeek = 28 ;
                $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                
            }

        }
        elseif ('weeks'== $date2[1] ) {
            if ('1'==$date2[0]) {
                $MovieWeek = 7 ;
                $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                
            }
            elseif ("2"== $date2[0]) {
                $MovieWeek = 14 ;
                $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                
            }
            elseif ("3"== $date2[0]) {
                $MovieWeek = 21 ;
                $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                
            }
            elseif ("4"== $date2[0]) {
                $MovieWeek = 28 ;
                $uploadDate= date("Y-m-d",strtotime("$today -$MovieWeek days"));
                
            }

        }
        $this->DateAPI = $uploadDate;
    }



    public function TrailerData($movieID,$movieName,$year)
{
    
     $this->API('Trailer',$movieName,$year);
     $response=$this->APIval ;
     print_r($response);
    //  $tralerName = $response['Result']['Name'];
    //  $trailerID = $response['Result']['ID'];
    //  $trailerURL = $response['Result']['Link'];
    //  $trailerVIWE = $response['Result']['Views'];
    //  $trailerDate = $response['Result']['publishedTime'];
    //  $date2 = explode(' ', $trailerDate);
    //  $this->Date($date2);
    //  $like_added=$this->DateAPI;
    // //  $this->SQLquery('trailer_tb','trailerID,trailerName,trailerURL,movie_tb_movieID,like_added,viwes',"'$trailerID','$tralerName','$trailerURL','$movieID','$like_added','$trailerVIWE'",'I');


    //  $this->SQLquery(); 




}

}

$D = new APICall();
$D->DataInsert();

?>