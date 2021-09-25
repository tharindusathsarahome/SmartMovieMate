<?php 

class movieModule
{
    public $baiscopelkData;
    public $cineruData;
    public $piratelkData;
    public $upasirasiData;
    public $zoomlkData;
    public $IDimdbArr;

    public $baiscopelkDate;
    public $cineruDate;
    public $piratelkDate;
    public $upasirasiDate;
    public $zoomlkDate;
    public $DateimdbArr;


    Private $imdbIDarrbaiscopelkData;
    Private $imdbIDarrcineruData;
    Private $imdbIDarrpiratelkData;
    Private $imdbIDarrupasirasiData;
    Private $imdbIDarrzoomlkData;
    
    Private $imdbIDarrbaiscopelkDate;
    Private $imdbIDarrcineruDate;
    Private $imdbIDarrpiratelkDate;
    Private $imdbIDarrupasirasiDate;
    Private $imdbIDarrzoomlkDate;


    Private function set_Arr()
    {
        $this->IDimdbArr=array_merge($this->imdbIDarrbaiscopelkData,$this->imdbIDarrcineruData,$this->imdbIDarrpiratelkData,$this->imdbIDarrupasirasiData,$this->imdbIDarrzoomlkData);
        $this->DateimdbArr=array_merge($this->imdbIDarrbaiscopelkDate,$this->imdbIDarrcineruDate,$this->imdbIDarrpiratelkDate,$this->imdbIDarrupasirasiDate,$this->imdbIDarrzoomlkDate);
        // print_r($this->DateimdbArr);
    }

    Private function baiscopelkData()
    {
        require_once  '../webSearch/baiscopelkData.php';
        $valMovieName=$DATEval->valMovieName;
        $valDate=$DATEval->uploadDateVal;
        // print_r($valDate);
        $this->baiscopelkData = $valMovieName;
        $this->baiscopelkDate = $valDate;
                
    }
    Private function cineruData()
    {
        require_once  '../webSearch/cineruData.php';
        $valMovieName=$DATEval->valMovieName;
        $valDate=$DATEval->uploadDateVal;
        $this->cineruData = $valMovieName;
        $this->cineruDate = $valDate;
                
    }
    Private function piratelkData()
    {
        require_once  '../webSearch/piratelkData.php';
        $valMovieName=$DATEval->valMovieName;
        $valDate=$DATEval->uploadDateVal;
        $this->piratelkData = $valMovieName;
        $this->piratelkDate = $valDate;
                
    }
    Private function upasirasiData()
    {
        require_once  '../webSearch/upasirasiData.php';
        $valMovieName=$DATEval->valMovieName;
        $valDate=$DATEval->uploadDateVal;
        $this->upasirasiData = $valMovieName;
        $this->upasirasiDate = $valDate;
                
    }
    Private function zoomlkData()
    {
        require_once  '../webSearch/zoomlkData.php';
        $valMovieName=$DATEval->valMovieName;
        $valDate=$DATEval->uploadDateVal;
        $this->zoomlkData = $valMovieName;
        $this->zoomlkDate = $valDate;
                
    }

    public function get_insterModule()
    {
  
     function nameInster($movieNameArr)
        {
            require_once("bootstrap.php");
            require_once "inc.php";
            $search = new \Imdb\TitleSearch();
            $arrCount = count($movieNameArr);
            
            for ($i=0; $i < $arrCount; $i++) {
                $movieNameimdb =$movieNameArr[$i]; 
                $spitlName = explode("<",$movieNameimdb) ;
                $movieNameimdb = $spitlName[0];
                // echo $movieNameimdb;        
                $results = $search->search("$movieNameimdb", array(\Imdb\TitleSearch::MOVIE));
                // print_r($results);
                if (!$results) {
                    continue;
                } 
                $imdbID= $results[0]->imdbid();            
                // echo $imdbID;
                $imdbIDarr[] = $imdbID;

               
            }
            return $imdbIDarr;
            // print_r($imdbIDarr);          
        }

        function nameInster0($movieDateArr)
        {
           
            $arrCount = count($movieDateArr);
            
            for ($i=0; $i < $arrCount; $i++) {
                $movieDateimdb = $movieDateArr[$i];
                $spitlDate = explode("<",$movieDateimdb) ;
                $spitlDate = explode(",",$movieDateimdb) ;

                $movieDateimdb = $spitlDate[0];
                // echo $movieDateimdb.'<br>';        
                $Date[] = $movieDateimdb;
            }
            return $Date;
            // print_r($Date);
           
        }


        $this->baiscopelkData();
        $movieNameArr=$this->baiscopelkData;
        $imdbArr=nameInster($movieNameArr);
        $this->imdbIDarrbaiscopelkData=$imdbArr;

        $movieDateArr=$this->baiscopelkDate;
        $imdbArr=nameInster0($movieDateArr);
        $this->imdbIDarrbaiscopelkDate=$imdbArr;



        $this->cineruData();
        $movieNameArr=$this->cineruData;
        $imdbArr=nameInster($movieNameArr);
        $this->imdbIDarrcineruData=$imdbArr;

        $movieDateArr=$this->cineruDate;
        $imdbArr=nameInster0($movieDateArr);
        $this->imdbIDarrcineruDate=$imdbArr;





        $this->piratelkData();
        $movieNameArr=$this->piratelkData;
        $imdbArr=nameInster($movieNameArr);
        $this->imdbIDarrpiratelkData=$imdbArr;

        $movieDateArr=$this->piratelkDate;
        $imdbArr=nameInster0($movieDateArr);
        $this->imdbIDarrpiratelkDate=$imdbArr;





        $this->zoomlkData();
        $movieNameArr=$this->zoomlkData;
        $imdbArr=nameInster($movieNameArr);
        $this->imdbIDarrzoomlkData=$imdbArr;

        $movieDateArr=$this->zoomlkDate;
        $imdbArr=nameInster0($movieDateArr);
        $this->imdbIDarrzoomlkDate=$imdbArr;





        $this->upasirasiData();
        $movieNameArr=$this->upasirasiData;
        $imdbArr=nameInster($movieNameArr);
        $this->imdbIDarrupasirasiData=$imdbArr;

        $movieDateArr=$this->upasirasiDate;
        $imdbArr=nameInster0($movieDateArr);
        $this->imdbIDarrupasirasiDate=$imdbArr;



        $this->set_Arr();
     

       
    }
    // public function set_inster()
    // {
    //     $config = new \Imdb\Config();
    //     $config->language = 'en-US,en';
    //     $movie = new \Imdb\Title($imdbID,$config);
    //     include_once '../../dbContor.php';
    //     $same = new selectData();
    //     $same->select(); 
    // }
}

// $d =new movieModule;
// $d->get_insterModule();


?>