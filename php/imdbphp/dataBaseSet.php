<?php 

set_time_limit(5000); 

class insterData
{
    public $tableCheck;
    public $seletData;
    public $idNum;
    public $Arr;
    public $con;
    public $DateAPI;
    public $APIval;
    private function IMDBData()
    {
        include_once 'moduleCompile.php';
        require_once "bootstrap.php";
        
    
    }

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
              while($row = $result->fetch_assoc()) {
               $this->seletData=$row;
              }
            } else {
              echo "0 results";
            }
        }
        elseif ($type == 'S2') {
            include '../dbconn.php';
            $sql = "SELECT $col FROM `$tableName` WHERE $data";
            $result = $conn->query($sql);
            $this->seletData=$result;
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






    public function LanguageTableCreat($DATA)
    {
       
        include '../dbconn.php';
        if($DATA == 'WEB'){
            $this->con = 1;
            $this->IMDBData();
            $moviwArray = new movieModule();
            $moviwArray->get_insterModule();
            $Arr = $moviwArray->IDimdbArr;
            $DateArr = $moviwArray->DateimdbArr;
            // print_r($Arr);
            $arrlenth = count($Arr); 
            // echo $arrlenth.'<br>';   
        }
        else {
            $this->con = 0;
            require_once "bootstrap.php";
            $Arr=$this->Arr;
            $arrlenth = count($Arr);
        }
        
        for ($i=0; $i < $arrlenth ; $i++) {
            $movieUpdate_day=$DateArr[$i];
            // echo $movieUpdate_day;
            $movie = new \Imdb\Title($Arr[$i]);
            $imdbLan= $movie->language();
            // echo $imdbLan.'<br>';
            $imdbID= $movie->imdbid();
            // echo $imdbID.'<br>';
            $this->createTableCheck($imdbLan,$imdbID,$movieUpdate_day);
            if ($this->tableCheck==0) {     
            $sql="CREATE TABLE"."`".$imdbLan."_LanguageMen_tb` ( 
                `".$imdbLan."ID` VARCHAR(100),
                `name` VARCHAR(100),
                `MovieYear` YEAR,
                 PRIMARY KEY (
                `".$imdbLan."ID`
                 )
             )";

               if ($conn->query($sql) === TRUE ) {
                // echo "Table created movieid successfully <br>";
                $sqlinsert = "INSERT INTO createtablename_tb (tableName,LanName)
                    VALUES ('".$imdbLan."_LanguageMen_tb','$imdbLan')";
                
                    // echo $sqlinsert.'<br>';

                if ($conn->query($sqlinsert) === TRUE) {
                    if ($this->con == 0) {
                        $movieUpdate_day = 0;
                    }
                    $this->movieIDCreat($imdbID,$movieUpdate_day);
                    } 
                else {
                    echo "Error movieid: " . $sqlinsert . "<br>" . $conn->error;
                }
              }
                else {
                echo "Error creating movieId table: " . $conn->error.'<br>';
              }     
            }
        }
    }





    public function createTableCheck($imdbLan,$imdbID,$movieUpdate_day)
    {
        include '../dbconn.php';
        $colName = $imdbLan.'_LanguageMen_tb';
        $this->SQLquery('createtablename_tb','tableName',"tableName='$colName'","S");
        if (isset($this->seletData['tableName']))  {
            $this->tableCheck=1;
            $this->movieIDCreat($imdbID,$movieUpdate_day);      
          }
        else {
            $this->tableCheck=0;
          }
    }





    public function movieIDCreat($imdbID,$movieUpdate_day)
    {
        // echo $imdbID.'<br>';
        $this->IMDBData();
        $movie = new \Imdb\Title($imdbID);
        $lan=$movie->language();
        // echo $lan."<br>";
        $lanSpilt = str_split($lan);
        $ID = 'MOV'.$lanSpilt[0].$lanSpilt[1].$lanSpilt[2].'_'.$imdbID;
        $movieID= strtoupper($ID);
        // echo $movieID.'<br>';
        $this->SQLquery('movie_tb','movieID',"'$movieID'",'I');
        // // language ID Create
        $lanID =strtoupper($lanSpilt[0].$lanSpilt[1].$lanSpilt[2]);
        $LanguageID =$lanID.'_'.$imdbID;
        // echo $LanguageID;
        if($this->con==1){
            $this->SQLquery('today_update_tb','movieID,date',"'$movieID','$movieUpdate_day'",'I');
        }

        $this->movieLanguageData($lan,$imdbID,$LanguageID,$movieID,$lanID); 
        // $this->movieKeyWord($imdbID,$movieID);
       

    }





    public function movieLanguageData($lan,$imdbID,$LanguageID,$movieID,$lanID)
    {
        $this->SQLquery('createtablename_tb','tableName',"LanName='$lan'",'S');
        $tableName=$this->seletData['tableName'];
        // echo $tableName;
        $this->IMDBData();
        $movie = new \Imdb\Title($imdbID);
        $year = $movie->year();
        $movieTitel =$movie->title();
        $languageName=$movie->language();
        // echo $languageName;
        $this->SQLquery($tableName,"$lan"."ID,name,MovieYear","'$LanguageID','$movieTitel',$year","I");      
        $this->SQLquery("movienameconnection_tb","movie_tb_movieID,LanguageMenID","'$movieID','$LanguageID'","I");
        $this->SQLquery('languagemovie_tb',"lanName","lanName='$lan'","S");
        
        if (!isset($this->seletData['lanName'])) {
            $this->SQLquery('languagemovie_tb',"lanID,lanName","'$lanID','$languageName'","I");
        }
        $this->movieGenres($imdbID,$movieID);
        $this->movieKeyWord($imdbID,$movieID);
        $this-> imgData($imdbID,$movieID);
        $this->seenData($movieID);
        $this->TrailerData($movieID,$movieTitel,$year);
        $this->DownloadLink($movieID,$movieTitel,$year);
        $this->SubtitleData($movieID,$movieTitel,$year);
        
    }




    public function movieGenres($imdbID,$movieID)
    {
        $this->IMDBData();
        $movie = new \Imdb\Title($imdbID);
        $Genrees = $movie->genres();
        $GenCount = count($Genrees); 
        for ($i=0; $i < $GenCount; $i++) { 
            $Genree = $Genrees[$i];
            $this->SQLquery('genres_tb',"genresID","1 ORDER BY genresID DESC LIMIT 1","S");
            if($this->seletData['genresID']){
                $GenreeID=$this->seletData['genresID'];
                $splitData = explode('N',$GenreeID);
                // print_r($splitData);
                $idNum = $splitData[1];
                $idNum = (int)$idNum;
                $idNum +=1; 
                $filled_int = sprintf("%04d",$idNum);
                $GenreeID = "GEN".$filled_int;
                $this->SQLquery('genres_tb',"genresName","genresName='$Genree'","S");
            // echo $this->seletData['genresName'];
                if (!$this->seletData['genresName']) {
                    $this->SQLquery('genres_tb','genresID,genresName',"'$GenreeID','$Genree'","I");
                }
                else {
                    // echo "Have Data";
                }

            }


            else {
            $idNum =1; 
            $filled_int = sprintf("%04d",$idNum);
            $GenreeID = "GEN".$filled_int;
            $this->SQLquery('genres_tb','genresID,genresName',"'$GenreeID','$Genree'","I");
            }
                    
         
            $this->SQLquery('genres_tb',"genresID","genresName='$Genree'","S");
            $GenreeID=$this->seletData['genresID'];
            $this->SQLquery('genresmovieconnection_tb','genres_tb_genresID,movie_tb_movieID',"'$GenreeID','$movieID'","I");

        } 
        

}




public function seenData($movieID)
{
        $this->SQLquery('seen_tb',"seenID","1 ORDER BY seenID DESC LIMIT 1","S");
        if($this->seletData['seenID']){
            $seenID=$this->seletData['seenID'];
            $splitData = explode('N',$seenID);
            // print_r($splitData);
            $idNum = $splitData[1];
            $idNum = (int)$idNum;
            $idNum +=1; 
            $filled_int = sprintf("%04d",$idNum);
            $SeenID = "SN".$filled_int;
            $this->SQLquery('seen_tb',"movie_tb_movieID","movie_tb_movieID='$movieID'","S");
        // echo $this->seletData['genresName'];
            if (!$this->seletData['movie_tb_movieID']) {
                $this->SQLquery('seen_tb','seenID,movie_tb_movieID',"'$SeenID','$movieID'","I");
            }
            else {
                echo "Have Data";
            }
        }


        else {
        $idNum =1; 
        $filled_int = sprintf("%04d",$idNum);
        $SeenID = "SN".$filled_int;
        $this->SQLquery('seen_tb','seenID,movie_tb_movieID',"'$SeenID','$movieID'","I");
        }
                
     

}

    


public function movieKeyWord($imdbID,$movieID)
{
    $this->IMDBData();
    $movie = new \Imdb\Title($imdbID);
    $keywords = $movie->keywords_all();
    $keyCount = count($keywords); 
    for ($i=0; $i < $keyCount; $i++) { 
        $keyword = $keywords[$i];
        $this->SQLquery('keyword_tb',"keywordID","1 ORDER BY keywordID DESC LIMIT 1","S");
        if($this->seletData['keywordID']){
            $KeyWordID=$this->seletData['keywordID'];
            $splitData = explode('Y',$KeyWordID);
            // print_r($splitData);
            $idNum = $splitData[1];
            $idNum = (int)$idNum;
            $idNum +=1; 
            $filled_int = sprintf("%04d",$idNum);
            $KEYID = "KEY".$filled_int;
            $this->SQLquery('keyword_tb',"keywordName","keywordName='$keyword'","S");
        // echo $this->seletData['genresName'];
            if (!isset($this->seletData['keywordName'])) {
                $this->SQLquery('keyword_tb','keywordID,keywordName',"'$KEYID','$keyword'","I");
            }
            else {
                echo "Have Data";
            }

        }


        else {
        $idNum =1; 
        $filled_int = sprintf("%04d",$idNum);
        $KEYID = "KEY".$filled_int;
        $this->SQLquery('keyword_tb','keywordID,keywordName',"'$KEYID','$keyword'","I");
        }
                
     
        $this->SQLquery('keyword_tb',"keywordID","keywordName='$keyword'","S");
        $keyWordID=$this->seletData['keywordID'];
        $this->SQLquery('keywordconnection_tb','keyWord_tb_keywordID,movie_tb_movieID',"'$keyWordID','$movieID'","I");

       

    }  

}




    public function imgData($imdbID,$movieID)
    {
        $this->IMDBData();
        $movie = new \Imdb\Title($imdbID);
        $webUrl = $movie->main_url();
        include_once 'imdb.class.php';
        $IMDB = new IMDB($webUrl);
        if ($IMDB->isReady) {
             $imgData=$IMDB->getPoster();   
             $this->SQLquery('image_tb','imgID',"1 ORDER BY imgID DESC LIMIT 1",'S' );
             $imgID=$this->seletData['imgID'];
             if ($imgID) {
                $splitData = explode('G',$imgID);
                // print_r($splitData);
                $idNum = $splitData[1];
                $idNum = (int)$idNum;
                $idNum +=1; 
                $filled_int = sprintf("%04d",$idNum);
                $IMGID = "IMG".$filled_int;
                $this->SQLquery('image_tb',"movie_tb_movieID","movie_tb_movieID='$movieID'","S");
                if(!$this->seletData['movie_tb_movieID']){
                    $this->SQLquery('image_tb','imgID,imgUrl,movie_tb_movieID',"'$IMGID','$imgData','$movieID'","I"); 
                }
                
             }
             else {
                $idNum =1; 
                $filled_int = sprintf("%04d",$idNum);
                $IMGID = "IMG".$filled_int;
                $this->SQLquery('image_tb','imgID,imgUrl,movie_tb_movieID',"'$IMGID','$imgData','$movieID'","I");
                
             }
        } else {
              echo 'Movie not found. 😞';
        }
        
    }
   
    public function TrailerData($movieID,$movieName,$year)
{
    
     if ($this->API('Trailer',$movieName,$year)) {
        $x=0;
        $response=$this->APIval['Result']['rq'];

        if ($response == '0') {
            $x+=1;
            $this->API('Trailer',$movieName,$year);
            if ($x==2) {
                $response = '1';
            }

        }
        
    }

     $response=$this->APIval ;
     print_r($response);
     $tralerName = $response['Result']['Name'];
     $trailerID = $response['Result']['ID'];
     $trailerURL = $response['Result']['Link'];
     $trailerVIWE = $response['Result']['Views'];
     $trailerDate = $response['Result']['publishedTime'];
     $date2 = explode(' ', $trailerDate);
     $this->Date($date2);
     $like_added=$this->DateAPI;
     $newDate = date("Y-m-d", strtotime($like_added));
     $this->SQLquery('trailer_tb','trailerID,trailerName,trailerURL,movie_tb_movieID,like_added,viwes',"'$trailerID','$tralerName','$trailerURL','$movieID','$newDate','$trailerVIWE'",'I');


}


public function SubtitleData($movieID,$movieName,$year)
{
    if ($this->API('Subtitle',$movieName,$year)) {
        $x=0;
        $response=$this->APIval['Result']['rq'];
        if ($response == '0') {
            $x+=1;
            $this->API('Subtitle',$movieName,$year);
            if ($x==2) {
                $response = '1';
            }

        }
        
    }
    
    
     
    //  print_r($response);
    if ($this->APIval) {
        $response=$this->APIval;
        $WEBName = $response['Result']['Site'];
        $WEBURL = $response['Result']['SubURL'];
        $this->SQLquery('sinahasub_tb','subID',"1 ORDER BY subID DESC LIMIT 1",'S' );
        $SUBID=$this->seletData['subID'];
        if ($SUBID) {
           $splitData = explode('B',$SUBID);
           // print_r($splitData);
           $idNum = $splitData[1];
           $idNum = (int)$idNum;
           $idNum +=1; 
           $filled_int = sprintf("%04d",$idNum);
           $SUBID = "SUB".$filled_int;
           $this->SQLquery('sinahasub_tb',"movie_tb_movieID","movie_tb_movieID='$movieID'","S");
           if(!$this->seletData['movie_tb_movieID']){
            $this->SQLquery('sinahasub_tb','subID,webName,webUrl,movie_tb_movieID',"'$SUBID','$WEBName','$WEBURL','$movieID'","I"); 
        }
           
        }
    
        else {
           $idNum =1; 
           $filled_int = sprintf("%04d",$idNum);
           $SUBID = "SUB".$filled_int;
           $this->SQLquery('sinahasub_tb','subID,webName,webUrl,movie_tb_movieID',"'$SUBID','$WEBName','$WEBURL','$movieID'","I"); 
           
        }
    }
}


public function DownloadLink($movieID,$movieName,$year)
{
    if ($this->API('Download',$movieName,$year)) {
        $x=0;
        $response=$this->APIval['Result']['rq'];
        if ($response == '0') {
            $this->API('Download',$movieName,$year);
            $x+=1;
            if ($x==2) {
                $response = '1';
            }

        }
        
    }
    
    
     
    //  print_r($response);
    if ($this->APIval) {
        $response=$this->APIval;
        $WEBName = $response['Result']['Site'];
        $WEBURL = $response['Result']['DownloadURL'];
        $this->SQLquery('download_tb','downloadID',"1 ORDER BY downloadID DESC LIMIT 1",'S' );
        $DownloadID=$this->seletData['downloadID'];
        if ($DownloadID) {
           $splitData = explode('W',$DownloadID);
           // print_r($splitData);
           $idNum = $splitData[1];
           $idNum = (int)$idNum;
           $idNum +=1; 
           $filled_int = sprintf("%04d",$idNum);
           $DOWNLOADID = "DOW".$filled_int;
           $this->SQLquery('download_tb',"movie_tb_movieID","movie_tb_movieID='$movieID'","S");
           if(!$this->seletData['movie_tb_movieID']){
            $this->SQLquery('download_tb','downloadID,websiteName,websiteUrl,movie_tb_movieID',"'$DOWNLOADID','$WEBName','$WEBURL','$movieID'","I"); 
        }
           
        }
    
        else {
           $idNum =1; 
           $filled_int = sprintf("%04d",$idNum);
           $DOWNLOADID = "DOW".$filled_int;
           $this->SQLquery('download_tb','downloadID,websiteName,websiteUrl,movie_tb_movieID',"'$DOWNLOADID','$WEBName','$WEBURL','$movieID'","I"); 
           
        }
    }
    
    //  
    //  $trailerID = $response['Result']['ID'];
    //  
    //  $trailerVIWE = $response['Result']['Views'];
    //  $trailerDate = $response['Result']['publishedTime'];
    //  $date2 = explode(' ', $trailerDate);
    //  $this->Date($date2);
    //  $like_added=$this->DateAPI;
    //  $newDate = date("Y-m-d", strtotime($like_added));
    //  $this->SQLquery('trailer_tb','trailerID,trailerName,trailerURL,movie_tb_movieID,like_added,viwes',"'$trailerID','$tralerName','$trailerURL','$movieID','$newDate','$trailerVIWE'",'I');


}


}



   


$m = new insterData();
// $m->DownloadLink('MOVRUS_12216986','The Last Frontier','2020');
// // $m->imgData('12216986','MOVRUS_12216986'); 
// // $m->movieGenres('12216986','MOVRUS_12216986');   
$m->LanguageTableCreat('WEB');

// TRUNCATE `english_languagemen_tb`;
// TRUNCATE `french_languagemen_tb`;
// TRUNCATE `genres_tb`;
// TRUNCATE `hindi_languagemen_tb`;
// TRUNCATE `japanese_languagemen_tb`;
// TRUNCATE `korean_languagemen_tb`;
// TRUNCATE `languagemovie_tb`;
// TRUNCATE `movienameconnection_tb`;
// TRUNCATE `movie_tb`;
// TRUNCATE `russian_languagemen_tb`;
// TRUNCATE `spanish_languagemen_tb`;
// TRUNCATE `tamil_languagemen_tb`;
// TRUNCATE `telugu_languagemen_tb`;
// TRUNCATE `genresmovieconnection_tb`;
// TRUNCATE `keywordconnection_tb`;
// TRUNCATE `keyword_tb`;
// TRUNCATE `image_tb`;
// TRUNCATE `today_update_tb`;
// TRUNCATE `malayalam_languagemen_tb`;
// TRUNCATE `seen_tb`;
// TRUNCATE `thai_languagemen_tb`;
// TRUNCATE `trailer_tb`;
// TRUNCATE `_languagemen_tb`;
// TRUNCATE `download_tb`;
// TRUNCATE `norwegian_languagemen_tb`;
?>