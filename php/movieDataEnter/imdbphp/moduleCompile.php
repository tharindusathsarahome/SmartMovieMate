<?php 

class movieModule
{
    public $baiscopelkData;
    public $cineruData;
    public $piratelkData;
    public $upasirasiData;
    public $zoomlkData;
    public $IDimdbArr;
    Private $imdbIDarrbaiscopelkData;
    Private $imdbIDarrcineruData;
    Private $imdbIDarrpiratelkData;
    Private $imdbIDarrupasirasiData;
    Private $imdbIDarrzoomlkData;
    
    Private function set_Arr()
    {
        $this->IDimdbArr=array_merge($this->imdbIDarrbaiscopelkData,$this->imdbIDarrcineruData,$this->imdbIDarrpiratelkData,$this->imdbIDarrupasirasiData,$this->imdbIDarrzoomlkData);
    }

    Private function baiscopelkData()
    {
        require_once  '../webSearch/baiscopelkData.php';
        $valMovieName=$DATEval->valMovieName;
        $this->baiscopelkData = $valMovieName;
                
    }
    Private function cineruData()
    {
        require_once  '../webSearch/cineruData.php';
        $valMovieName=$DATEval->valMovieName;
        $this->cineruData = $valMovieName;
                
    }
    Private function piratelkData()
    {
        require_once  '../webSearch/piratelkData.php';
        $valMovieName=$DATEval->valMovieName;
        $this->piratelkData = $valMovieName;
                
    }
    Private function upasirasiData()
    {
        require_once  '../webSearch/upasirasiData.php';
        $valMovieName=$DATEval->valMovieName;
        $this->upasirasiData = $valMovieName;
                
    }
    Private function zoomlkData()
    {
        require_once  '../webSearch/zoomlkData.php';
        $valMovieName=$DATEval->valMovieName;
        $this->zoomlkData = $valMovieName;
                
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
           
        }


        $this->baiscopelkData();
        $movieNameArr=$this->baiscopelkData;
        $imdbArr=nameInster($movieNameArr);
        $this->imdbIDarrbaiscopelkData=$imdbArr;

        $this->cineruData();
        $movieNameArr=$this->cineruData;
        $imdbArr=nameInster($movieNameArr);
        $this->imdbIDarrcineruData=$imdbArr;

        $this->piratelkData();
        $movieNameArr=$this->piratelkData;
        $imdbArr=nameInster($movieNameArr);
        $this->imdbIDarrpiratelkData=$imdbArr;


        $this->zoomlkData();
        $movieNameArr=$this->zoomlkData;
        $imdbArr=nameInster($movieNameArr);
        $this->imdbIDarrzoomlkData=$imdbArr;

        $this->upasirasiData();
        $movieNameArr=$this->upasirasiData;
        $imdbArr=nameInster($movieNameArr);
        $this->imdbIDarrupasirasiData=$imdbArr;

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